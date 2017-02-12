angular.module('SinbaApp').controller('WatershedModelCtrl', function ($scope, $http, $log, notify) {
    $log.debug('WatershedModelCtrl')
    $scope.importData = false
    $scope.createNewSheet = true

    // Properties
    var containsError = false

    // Methods
    const init = function() {
        $log.debug('WatershedModelCtrl.init')
        getParameters()
    }

    //
    // Requests
    //

    const getParameters = function () {
        $scope.availableParameters = []
        $scope.availableSelected = []
        $scope.chosenParameters = []
        $scope.chosenSelected = []
        $http({
            method: 'GET',
            url: '/parameters',
            Accept: 'application/json'
        }).then(function (response) {
            $scope.availableParameters = response.data
        }).catch(function (response) {
            $log.debug('ERROR:', response)
        })
    }

    const exportModel = function () {
        $log.debug('EXPORT MODEL', $scope.chosenParameters)
        // notify.showDanger('Showing Danger')
        // notify.showSuccess('Showing Success')
        // notify.showWarning('Showing Warning')
        // notify.showInfo('Showing Info')

        if (validateForm()) {
            $http({
                method: 'POST',
                url: '/watersheds/models',
                data: $scope.chosenParameters
            }).then(function (response) {
                $log.debug('POST SUCCESS:', response)
                notify.showSuccess(response.data.message)
            }).catch(function (response) {
                $log.debug('POST ERROR:', response)
                notify.showDanger('POST ERROR: ' + JSON.stringify(response.data))
            })
        }
    }

    const validateForm = function () {
        $log.debug('VALIDATE FORM:', $scope.modelName)
        var errors = []
        if (!$scope.modelName) {
            errors.push('Preencha o nome do modelo')
        }
        if ($scope.chosenParameters.length === 0) {
            errors.push('Adicione pelo menos um parâmetro')
        }

        if (errors.length) {
            notify.showWarning('Erros encontrados no preenchimento:<br> - ' + errors.join('<br> - '))
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
            return (v1.index < v2.index) ? -1 : 1;
        }

        // Compare strings alphabetically, taking locale into account
        return v1.value.localeCompare(v2.value);
    };

    const chooseModel = function () {
        containsError = true
    }

    const showError = function () {
        return containsError
    }

    const add = function () {
        $log.debug('ADD', $scope.availableSelected)
        // add to chosen
        $scope.chosenParameters = $scope.chosenParameters.concat($scope.availableSelected)
        // remove from available
        $scope.availableParameters = $scope.availableParameters.filter(function(available){
            return $scope.availableSelected.indexOf(available) < 0
        })
    }

    const remove = function () {
        $log.debug('REMOVE', $scope.chosenSelected)
        // add to available
        $scope.availableParameters = $scope.availableParameters.concat($scope.chosenSelected)
        // remove from chosen
        $scope.chosenParameters = $scope.chosenParameters.filter(function(chosen){
            return $scope.chosenSelected.indexOf(chosen) < 0
        })
    }

    // Public Elements
    angular.extend($scope, {
        // Properties
        containsError: containsError,

        // Methods
        init: init,
        chooseModel: chooseModel,
        showError: showError,
        nameAndSymbol: nameAndSymbol,
        add: add,
        remove: remove,
        localeSensitiveComparator: localeSensitiveComparator,
        exportModel: exportModel
    })
})