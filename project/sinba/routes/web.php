<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/{pathToFile?}', function ($pathToFile = 'index.html') {
    \Illuminate\Support\Facades\Log::debug('pathToFile:[' . $pathToFile . ']' );
    return response()->file("$pathToFile");
});
