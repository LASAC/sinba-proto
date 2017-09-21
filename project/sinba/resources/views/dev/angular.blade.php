<html lang="pt-br">
<head>
    <link href="/css/app.css" rel="stylesheet">
</head>
{{ csrf_field() }}
<md-content ng-controller="AppCtrl as ctrl" layout-padding="" ng-cloak="" class="datepickerdemoBasicUsage" ng-app="SinbaApp">
  <div layout-gt-xs="row">
    <div flex-gt-xs="">
      <h4>Standard date-picker</h4>
      <md-datepicker ng-model="ctrl.myDate" md-placeholder="Enter date"></md-datepicker>
    </div>

    <div flex-gt-xs="">
      <h4>Disabled date-picker</h4>
      <md-datepicker ng-model="ctrl.myDate" md-placeholder="Enter date" disabled=""></md-datepicker>
    </div>
  </div>

  <div layout-gt-xs="row">
    <div flex-gt-xs="">
      <h4>Opening the calendar when the input is focused</h4>
      <md-datepicker ng-model="ctrl.myDate" md-placeholder="Enter date" md-open-on-focus=""></md-datepicker>
    </div>

    <div flex-gt-xs="">
      <h4>Date-picker that goes straight to the year view</h4>
      <md-datepicker ng-model="ctrl.myDate" md-current-view="year" md-placeholder="Enter date"></md-datepicker>
    </div>
  </div>

  <div layout-gt-xs="row">
    <div flex-gt-xs="">
      <h4>Custom calendar trigger</h4>
      <md-datepicker ng-model="ctrl.myDate" md-placeholder="Enter date" md-is-open="ctrl.isOpen"></md-datepicker>
      <md-button class="md-primary md-raised" ng-click="ctrl.isOpen = true">Open</md-button>
    </div>
  </div>
</md-content>

<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/app.js"></script>
<script>
    angular.module('SinbaApp',['ngMaterial', 'ngMessages'])
        .controller('AppCtrl', function() {
          this.myDate = new Date();
          this.isOpen = false;
        });
</script>
</html>
