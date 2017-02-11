angular.module('SinbaApp').controller('WatershedModelCtrl', function ($scope, $http, $log) {
    $log.debug('WatershedModelCtrl')

    // Properties
    var selectedParameters = []
    var importData = false
    var createNewSheet = false
    var containsError = false

    // Methods
    const init = function() {
        $log.debug('WatershedModelCtrl.init')

        $http({
            method: 'GET',
            url: '/parameters',
            Accept: 'application/json'
        }).then(function success(response) {
            $log.debug('SUCCESS!!!', response)
            $scope.parameterList = response.data
        }).catch(function error(response) {
            $log.debug('ERROR:', response)
        })

    }

    const nameAndSymbol = function (parameter) {
        if (parameter) {
            return parameter.name + (parameter.unit ? ' (' + parameter.unit.symbol + ')' : '')
        }
        return parameter
    }

    const chooseModel = function () {
        containsError = true
    }

    const showError = function () {
        return containsError
    }

    const parameterListChanged = function () {
        if($scope.selectedParameter) {
            selectedParameters.push($scope.selectedParameter)

            // adiciona elemento no array de params. selecionados
            $scope.textareaParameters = selectedParameters.map(function (param) {
                return nameAndSymbol(param)
            }).join("\n")

            // remove dos parametros disponíveis
            $scope.parameterList = $scope.parameterList.filter(function (param) {
                return param !== $scope.selectedParameter
            })

            $log.debug('$scope.parameterList:', $scope.parameterList)
            $log.debug('selectedParameters:', selectedParameters)
        }
    }

    angular.extend($scope, {
        // Properties
        importData: importData,
        createNewSheet: createNewSheet,
        containsError: containsError,

        // Methods
        init: init,
        chooseModel: chooseModel,
        showError: showError,
        parameterListChanged: parameterListChanged,
        nameAndSymbol: nameAndSymbol
    })
})