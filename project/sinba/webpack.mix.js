let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.scss', 'public/css')
  .js('resources/assets/js/app.js', 'public/js')
  .extract([
    'angular',
    'angular-animate',
    'angular-aria',
    'angular-material',
    'angular-messages',
    'axios',
    'jquery'
  ])
  .sourceMaps();
