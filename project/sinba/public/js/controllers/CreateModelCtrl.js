angular.module('SinbaApp').controller('CreateModelCtrl', function ($rootScope, $scope, $http, $log, notify, locale) {
    $log.debug('CreateModelCtrl')

    //
    // Constants
    //
    const STEPS = {
        SELECT_PARAMETERS: 1,
        ORDER_LABELS_AND_LAYOUT: 2,
        CONFIRM_INFORMATION: 3
    }
    const MIN_STEP = 1
    const MAX_STEP = Object.keys(STEPS).length
    const MODEL_LAYOUTS = {
        LINE: false,
        COLUMN: true
    }

    //
    // Public Properties
    //
    $scope.createNewSheet = false
    $scope.editMode = false
    $scope.step = MIN_STEP

    // Sheet model being created/updated
    $scope.modelId = 0
    $scope.model = {
        name: '',
        layout_header_in_first_column: MODEL_LAYOUTS.LINE,
        parameters: [],
        labels: []
    }

    $rootScope.initCreateModelCtrl = function () {
        $scope.createNewSheet = true
        init()
    }

    // Methods
    const init = function () {
        $scope.locale = locale
        $scope.editMode = !!parseInt(angular.element( document.querySelector( '#editMode' ) )[0].value);
        $scope.modelId = parseInt(angular.element( document.querySelector( '#modelId' ) )[0].value);
        $log.debug('CreateModelCtrl.init(modelId, editMode):', $scope.modelId, $scope.editMode)

        $scope.availableParameters = {
            all: [],
            selected: []
        }
        $scope.chosenParameters = {
            all: [],
            selected: []
        }
        $scope.reorderedParameter = {
            all: [],
            selected: []
        }
        $scope.labels = {
            all: [],
            text: ''
        }
        getParameters()

        if ($scope.modelId) {
            $log.debug('GET MODEL CALLED')
            getModel()
        }
    }

    const getLayout = function () {
        if ($scope.model.layout_header_in_first_column === MODEL_LAYOUTS.LINE) {
            return locale.str('line')
        }
        return locale.str('column')
    }

    const getStepDescription = function () {
        switch ($scope.step) {
            case STEPS.SELECT_PARAMETERS:
                return locale.str('selectParameters')
            case STEPS.ORDER_LABELS_AND_LAYOUT:
                return locale.str('orderLabelsAndLayout')
            case STEPS.CONFIRM_INFORMATION:
            default:
                return locale.str('confirmInformation')
        }
    }

    const validateForm = function () {
        $log.debug('VALIDATE FORM:', $scope.model.name)
        var errors = []
        if (!$scope.model.name || $scope.model.name.length === 0) {
            errors.push(locale.str('fillModelName'))
        }
        if ($scope.model.parameters.length === 0) {
            errors.push(locale.str('addAtLeastOneParameter'))
        }
        if ($scope.model.labels.length !== $scope.model.parameters.length) {
            errors.push(locale.str('labelDifferentFromColumn'))
        }
        // if there is an empty label
        if ($scope.model.parameters.find(function (element) { return element.label && element.label.length === 0 })) {
            errors.push(locale.str('labelDifferentFromColumn'))
        }

        if (errors.length) {
            notify.showWarning(locale.str('errorsFound') + ':<br> - ' + errors.join('<br> - '))
        }

        return errors.length === 0
    }

    const nameAndSymbol = function (parameter) {
        if (parameter) {
            return parameter.name + (parameter.unit ? ' (' + parameter.unit.symbol + ')' : '')
        }
        return parameter
    }

    // https://docs.angularjs.org/api/ng/filter/orderBy
    const localeSensitiveComparator = function(v1, v2) {
        // If we don't get strings, just compare by index
        if (v1.type !== 'string' || v2.type !== 'string') {
            return (v1.index < v2.index) ? -1 : 1
        }

        // Compare strings alphabetically, taking locale into account
        return v1.value.localeCompare(v2.value)
    }

    const add = function (step) {
        const _addTo = function (object) {
            $log.debug('ADD', $scope.availableParameters.selected)
            // add to object
            object.all = object.all.concat($scope.availableParameters.selected)
            // remove from available
            $scope.availableParameters.all = $scope.availableParameters.all.filter(function(available){
                return $scope.availableParameters.selected.indexOf(available) < 0
            })
        }
        if (!step) {
            step = STEPS.SELECT_PARAMETERS
        }
        switch (step) {
            case STEPS.SELECT_PARAMETERS:
                _addTo($scope.chosenParameters)
                break
            case STEPS.ORDER_LABELS_AND_LAYOUT:
                _addTo($scope.reorderedParameter)
                break
            default:
                notify.showWarning(locale.str('invalidOperation'))
        }
    }
    const remove = function () {
        const _removeFrom = function (object) {
            $log.debug('REMOVE', object.selected)
            // add to available
            $scope.availableParameters.all = $scope.availableParameters.all.concat(object.selected)
            // remove from chosen
            object.all = object.all.filter(function(chosen){
                return object.selected.indexOf(chosen) < 0
            })
        }

        switch ($scope.step) {
            case STEPS.SELECT_PARAMETERS:
                _removeFrom($scope.chosenParameters)
                break
            case STEPS.ORDER_LABELS_AND_LAYOUT:
                _removeFrom($scope.reorderedParameter)
                updateLabels()
                break
            default:
                notify.showWarning(locale.str('invalidOperation'))
        }


    }

    const nextStep = function () {
        $log.debug('nextStep (step, MAX_STEP):', $scope.step, MAX_STEP)
        if ($scope.step === STEPS.SELECT_PARAMETERS) {
            loadReorderedParameters()
            loadLabels()
        }
        else if ($scope.step === STEPS.ORDER_LABELS_AND_LAYOUT) {
            updateLabels()
            fulfillModel()
        }

        if ($scope.step < MAX_STEP) {
            $scope.step += 1
        }
    }
    const previousStep = function () {
        $log.debug('previousStep (step, MIN_STEP):', $scope.step, MIN_STEP)
        if ($scope.step === STEPS.ORDER_LABELS_AND_LAYOUT) {
            loadChosenParameters()
        }

        if ($scope.step > MIN_STEP) {
            $scope.step -= 1
        }
    }

    const loadReorderedParameters = function () {
        $log.debug('loadReorderedParameters')
        $scope.reorderedParameter.all = $scope.chosenParameters.all.slice()
    }


    const loadLabels = function () {
        $log.debug('loadLabels(labels, reorderedParameter):', $scope.labels, $scope.reorderedParameter)
        loadEmptyLabels()
        updateLabelsText()
    }

    const updateLabels = function () {
        $log.debug('updateLabels')
        updateLabelsArray()
        updateLabelsText()
    }

    const loadEmptyLabels = function () {
        $scope.labels.all = $scope.reorderedParameter.all.map(function (parameter, index) {
            return ($scope.labels.all[index])
                ? $scope.labels.all[index]
                : {parameterId: parameter.id, label: nameAndSymbol(parameter)}
        })
    }

    const updateLabelsArray = function () {
        var newLabelsAll = []
        $scope.reorderedParameter.all.map(function (parameter, index) {
            newLabelsAll[index] =  $scope.labels.all.find(function (label) {
                return label.parameterId === parameter.id
            })
        })
        $scope.labels.all = newLabelsAll
    }

    const updateLabelsText = function () {
        $scope.labels.text = $scope.labels.all.reduce(function (accumulator, current) {
            return accumulator + '\n' + current.label
        }, '').trim()
    }

    const updateLabelsFromText = function () {
        labels = $scope.labels.text.split('\n')
        $log.debug('updateLabelsFromText(labels):', labels)
        $scope.labels.all.map(function (element) {
            if(element) {
                element.label = ''
            }
        })
        labels.map(function (label, index) {
            $scope.labels.all[index].label = label
        })
    }

    const fulfillModel = function () {
        $scope.model = Object.assign({}, $scope.model, {
            parameters: $scope.reorderedParameter.all,
            labels: $scope.labels.all
        })
    }

    //
    // Re-ordering operations
    //

    const loadChosenParameters = function () {
        $log.debug('loadChosenParameters')
        $scope.chosenParameters.all = $scope.reorderedParameter.all.slice()
    }
    const swap = function () {
        $log.debug('swapping', $scope.reorderedParameter.selected)
        var selected = $scope.reorderedParameter.selected
        if(selected.length === 2) {
            $scope.reorderedParameter.all = $scope.reorderedParameter.all.map(function (parameter){
                if (parameter.id === selected[0].id) {
                    return selected[1]
                }
                else if (parameter.id === selected[1].id) {
                    return selected[0]
                }
                else {
                    return parameter
                }
            })
            updateLabels()
        }
        else {
            notify.showDanger(locale.str('pickTwoParameters'))
        }
    }

    const moveUp = function () {
        var selected = $scope.reorderedParameter.selected
        $log.debug('moveUp(selected):', selected)
        if (selected.length > 0) {
            var all = $scope.reorderedParameter.all
            $log.debug('moveUp(all):', all)
            var index = all.indexOf(selected[0])
            $log.debug('moveUp(index):', index)
            if (index > 0) {
                var filtered = all.filter(function(elements){
                    return selected.indexOf(elements) < 0
                })
                $log.debug('moveUp(filtered):', filtered)
                index = filtered.indexOf(all[index-1])
                $log.debug('moveUp(index)2:', index)
                var head = filtered.slice(0, index)
                $log.debug('moveUp(head):', head)
                var tail = filtered.slice(index)
                $log.debug('moveUp(tail):', tail)
                all = head.concat(selected).concat(tail)
                $log.debug('moveUp(all)2:', all)

                $scope.reorderedParameter.all = all
                updateLabels()
            }
        }
    }

    const moveDown = function () {
        $log.debug('TODO: moveDown')
        var selected = $scope.reorderedParameter.selected
        $log.debug('moveDown(selected):', selected)
        if (selected.length > 0) {
            var all = $scope.reorderedParameter.all
            $log.debug('moveDown(all):', all)

            var filtered = all.filter(function(elements){
                return selected.indexOf(elements) < 0
            })
            $log.debug('moveDown(filtered):', filtered)

            var index = all.indexOf(selected[selected.length-1])
            $log.debug('moveDown(index):', index)

            // if there is at least one element next to the last of selected
            if (index < all.length - 1) {
                // find the index at filtered of that next element
                index = filtered.indexOf(all[index + 1])
                $log.debug('moveDown(index)2:', index)

                var head = filtered.slice(0, index+1)
                var tail = filtered.slice(index+1)
                all = head.concat(selected).concat(tail)
                $log.debug('moveDown(all)2:', all)

                $scope.reorderedParameter.all = all
                updateLabels()
            }
        }
    }

    //
    // Requests
    //

    const getModel = function () {
        $http({
            method: 'GET',
            url: '/watersheds/models/' + $scope.modelId,
            Accept: 'application/json'
        }).then(function (response) {
            $log.debug('SUCCESSFULLY RETRIEVED MODELS(response):', response)

            $scope.model = response.data
            $log.debug('MODEL OBJECT($scope.model):', $scope.model)

            $log.debug('PREPARING SELECTED...')
            // Pré-requisito do ADD: colocar parâmetros escolhidos em $scope.availableParameters.selected
            $scope.model.parameters.forEach(function (param) {
                $scope.availableParameters.selected.push(
                    $scope.availableParameters.all.find(function (available) {
                        return available.id === param.id
                    })
                )
            })
            $log.debug('AVAILABLE PARAMETERS($scope.availableParameters.all):', $scope.availableParameters.all)
            $log.debug('SELECTED PARAMETERS($scope.availableParameters.selected):', $scope.availableParameters.selected)

            $log.debug('ADDING...')
            add()
            $log.debug('CHOSEN PARAMETERS($scope.chosenParameters.all):', $scope.chosenParameters.all)

            $log.debug('SETTING UP REORDERED AND LABELS...')
            $scope.model.labels.forEach(function (label) {
                $scope.reorderedParameter.all[label.sequence] =
                    $scope.chosenParameters.all.find(function (chosen) {
                        $log.debug('label:', label)
                        $log.debug('chosen:', chosen)
                        return chosen.id === label.parameterId
                    })

                $scope.labels.all[label.sequence] = {
                    parameterId: label.parameterId,
                    label: label.label
                }
            })

            $log.debug('REORDERED PARAMETERS($scope.reorderedParameter.all):', $scope.reorderedParameter.all)
            $log.debug('LABELS($scope.labels.all):', $scope.labels.all)

            $log.debug('SETTING UP LABELS TEXT...')
            updateLabelsText()
            $log.debug('LABELS($scope.labels.text):', $scope.labels.text)

        }).catch(function (response) {
            $log.debug('ERROR:', response)
            notify.showDanger(response.data.error.message)
        })
    }

    const getParameters = function () {
        $http({
            method: 'GET',
            url: '/parameters',
            Accept: 'application/json'
        }).then(function (response) {
            $scope.availableParameters.all = response.data
        }).catch(function (response) {
            $log.debug('ERROR:', response)
        })
    }

    const saveModel = function () {
        $log.debug('EXPORT MODEL', $scope.model)

        if (validateForm()) {
            var method = 'POST'
            var url = '/watersheds/models' //$socope.model.id ? '/watersheds/models/' + $scope.model.id : '/watersheds/models'

            if($scope.model.id) {
                method = 'PATCH'
                url = '/watersheds/models/' + $scope.model.id
            }

            $log.debug('METHOD:', method)
            $log.debug('URL:', url)
            $http({
                method: method,
                url: url,
                data: $scope.model
            }).then(function (response) {
                $log.debug('POST SUCCESS:', response)
                notify.showSuccess(response.data.message)
                $scope.createNewSheet = false
            }).catch(function (response) {
                $log.debug('POST ERROR:', response)
                notify.showDanger(response.data.error.message)
            })
        }
    }

    // Public Elements
    angular.extend($scope, {
        // Public Methods
        init: init,
        getLayout: getLayout,
        getStepDescription: getStepDescription,
        nameAndSymbol: nameAndSymbol,
        add: add,
        remove: remove,
        localeSensitiveComparator: localeSensitiveComparator,
        saveModel: saveModel,
        nextStep: nextStep,
        previousStep: previousStep,
        swap: swap,
        moveUp: moveUp,
        moveDown: moveDown,
        updateLabelsFromText: updateLabelsFromText,
    })
})