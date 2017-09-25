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

        // birth date
        const oldBirthDate = $('#oldBirthDate').val()
        if (oldBirthDate) {
          $log.debug('preenchendo com data anterior')
          $scope.birthDate = moment(oldBirthDate, 'DD/MM/YYYY').toDate()
        }

        $log.debug('$(\'#oldBirthDate\').val(): ', $('#oldBirthDate').val())
        $log.debug('$scope.birthDate: ', $scope.birthDate)

        // cpf
        const oldCpf = $('#oldCpf').val()
        if (oldCpf) {
          $log.debug('preenchendo com cpf anterior')
          $scope.cpf = oldCpf
        }

        $log.debug('$(\'#oldCpf\').val(): ', $('#oldCpf').val())
        $log.debug('$scope.cpf: ', $scope.cpf)

        // phone
        const oldPhone = $('#oldPhone').val()
        if (oldPhone) {
          $log.debug('preenchendo com cpf anterior')
          $scope.phone = oldPhone
        }

        $log.debug('$(\'#oldPhone\').val(): ', $('#oldPhone').val())
        $log.debug('$scope.phone: ', $scope.phone)

        // cellphone
        const oldCellphone = $('#oldCellphone').val()
        if (oldCellphone) {
          $log.debug('preenchendo com cpf anterior')
          $scope.cellphone = oldCellphone
        }

        $log.debug('$(\'#oldCellphone\').val(): ', $('#oldCellphone').val())
        $log.debug('$scope.cellphone: ', $scope.cellphone)
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
