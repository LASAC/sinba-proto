/**
 * Created by mariliack on 17/02/17.
 */
var angular = require('angular')

module.exports = (angularModule) => {
  // Source: http://stackoverflow.com/questions/17063000/ng-model-for-input-type-file
  angularModule.directive('fileread', [function () {
      return {
          scope: {
              fileread: '='
          },
          link: function (scope, element, attributes) {
              element.bind('change', function (changeEvent) {
                  var reader = new FileReader();
                  reader.onload = function (loadEvent) {
                      scope.$apply(function () {
                          scope.fileread = loadEvent.target.result;
                      });
                  }
                  reader.readAsDataURL(changeEvent.target.files[0]);
              });
          }
      }
  }]);
}
