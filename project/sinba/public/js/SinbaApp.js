var SinbaApp = angular.module('SinbaApp', [])

SinbaApp.config(function($interpolateProvider, $logProvider) {
    $interpolateProvider.startSymbol('<[')
    $interpolateProvider.endSymbol(']>')
    $logProvider.debugEnabled(true) // put false to disable logs in production
})
