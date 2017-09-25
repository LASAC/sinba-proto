require('./bootstrap')
require('angular-material')

var angular = require('angular')
var moment = require('moment')

var services = require('./services')
var controllers = require('./controllers')
var directives = require('./directives')

var sinbaApp = angular.module('SinbaApp', ['ngMaterial', 'ngMessages'])
  .config([
    '$interpolateProvider',
    '$logProvider',
    '$mdDateLocaleProvider',
    function(
      $interpolateProvider,
      $logProvider,
      $mdDateLocaleProvider
    ) {
      // Interpolation
      $interpolateProvider.startSymbol('<[')
      $interpolateProvider.endSymbol(']>')

      // Log
      $logProvider.debugEnabled(true) // put false to disable logs in production

      // Locale: https://material.angularjs.org/latest/api/service/$mdDateLocaleProvider
      $mdDateLocaleProvider.formatDate = function (date) {
        return date ? moment(date).format('DD/MM/YYYY') : ''
      }
    }
  ])

services(sinbaApp, document.documentElement.lang)
controllers(sinbaApp)
directives(sinbaApp)
