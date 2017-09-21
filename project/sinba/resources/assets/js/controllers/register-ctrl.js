var angular = require('angular')

console.log('importing register-ctrl')

module.exports = (angularModule) => {
  angularModule.controller('RegisterCtrl', [
    '$scope',
    '$log',
    function ($scope, $log) {
      $log.debug('RegisterCtrl')

      // Properties
      let date = new Date()

      // Methods
      const init = () => {
        $log.debug('RegisterCtrl.init')
      }

      angular.extend($scope, {
          // Properties
          date,

          // Methods
          init
      })
    }
  ])
}
