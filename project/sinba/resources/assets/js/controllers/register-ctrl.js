var angular = require('angular')
var moment = require('moment')

console.log('importing register-ctrl')

module.exports = (angularModule) => {
  angularModule.controller('RegisterCtrl', [
    '$scope',
    '$log',
    function ($scope, $log) {
      $log.debug('RegisterCtrl')

      // Properties
      // ...

      // Methods
      const init = () => {
        $log.debug('RegisterCtrl.init')

        const oldBirthDate = $('#oldBirthDate').val()
        if (oldBirthDate) {
          $log.debug('preenchendo com data anterior')
          $scope.birthDate = moment(oldBirthDate, 'DD/MM/YYYY').toDate()
        }

        $log.debug('$(\'#oldBirthDate\').val(): ', $('#oldBirthDate').val())
        $log.debug('$scope.birthDate: ', $scope.birthDate)
      }

      angular.extend($scope, {
          // Properties
          // ...

          // Methods
          init
      })
    }
  ])
}
