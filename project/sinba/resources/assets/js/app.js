require('./bootstrap')
require('angular-material')

var angular = require('angular')
var services = require('./services')
var controllers = require('./controllers')
var directives = require('./directives')

var sinbaApp = angular.module('SinbaApp', [])
  .config(function($interpolateProvider, $logProvider) {
    $interpolateProvider.startSymbol('<[')
    $interpolateProvider.endSymbol(']>')
    $logProvider.debugEnabled(true) // put false to disable logs in production
  })

services(sinbaApp, document.documentElement.lang)
controllers(sinbaApp)
directives(sinbaApp)
