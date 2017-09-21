/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

/**
 * Create an AngularJS app here.
 */
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
