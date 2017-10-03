var angular = require('angular')

module.exports = (angularModule) => {
  angularModule.controller('HomeCtrl', [
    '$scope',
    '$log',
    function ($scope, $log) {
      $log.debug('HomeCtrl')

      // Properties
      var searchTerm = ''

      // Methods
      var isBtnDisabled = function () {
          return $scope.searchTerm.length === 0 ? 'disabled' : ''
      }

      var search = function() {
          $log.debug('HomeCtrl: not implemented yet.')
      }

      angular.extend($scope, {
          // Properties
          searchTerm: searchTerm,

          // Methods
          isBtnDisabled: isBtnDisabled,
          search: search
      })
    }
  ])
}
