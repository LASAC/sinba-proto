/**
 * Created by mariliack on 17/02/17.
 */
var angular = require('angular')
module.exports = (angularModule) => {
  angularModule.directive('modelDisplay', function() {
      return {
          restrict: 'E',
          scope: {
              model: '='
          },
          templateUrl: '/html/directive-model-display.html',
          controller: [
            '$scope',
            '$log',
            'locale',
            function($scope, $log, locale) {
              $log.debug('Model Display Directive:', $scope)
              const MODEL_LAYOUTS = {
                  LINE: false,
                  COLUMN: true
              }

              $scope.init = function () {
                  $log.debug('modelDisplay.init(model):', $scope.model)

                  var result = parametersAndLabelsToArray()
                  var parametersArray = result.parametersArray
                  var labelsArray = result.labelsArray

                  $log.debug('modelDisplay.init(parametersArray):', parametersArray)
                  $log.debug('modelDisplay.init(labelsArray):', labelsArray)

                  $scope.reorderedParameter = {
                      all: parametersArray,
                      selected: null
                  }
                  $scope.labels = {
                      all: labelsArray,
                      text : labelsArray.reduce(
                          function (accumulator, current) {
                          return accumulator + '\n' + current.label
                      }, '').trim()
                  }
              }

              const parametersAndLabelsToArray = function () {
                  var parameters = $scope.model.parameters
                  var labels = $scope.model.labels
                  var parametersArray = []
                  var labelsArray = []
                  Object.keys(parameters).forEach(
                      function (i) {
                          var parameter = parameters[i]
                          var label = labels[i]
                          parametersArray[label.sequence] = parameter
                          labelsArray[label.sequence] = label
                      }
                  )
                  return {
                      parametersArray: parametersArray,
                      labelsArray: labelsArray
                  }
              }

              $scope.getLayout = function () {
                  if ($scope.model) {
                      if ($scope.model.layout_header_in_first_column === MODEL_LAYOUTS.LINE) {
                          return locale.str('line')
                      }
                      return locale.str('column')
                  }
                  return ''
              }

              $scope.nameAndSymbol = function (parameter) {
                  if (parameter) {
                      return parameter.name + (parameter.unit ? ' (' + parameter.unit.symbol + ')' : '')
                  }
                  return parameter
              }

              // exporting locale
              $scope.locale = locale
            }
          ]
      }
  })
}
