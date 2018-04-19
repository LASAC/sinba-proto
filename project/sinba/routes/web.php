<?php
use Illuminate\Support\Facades\Log;
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
    Log::debug('GET /{pathToFile?} --> [' . $pathToFile . ']' );
    return view('index');
});

Route::prefix('api')->group(function () {
    
    Route::get('version', function (Request $request) {
        $version = config('app.version');
        $hits = session('hits', 0) + 1;
        session(['hits' => $hits]);

        Log::debug('GET /version --> ' . $version);
        Log::debug('GET /version --> (hits): ' . $hits);

        return response()->json(['version' => $version, 'hits' => $hits]);
    });
    
    // Authentication Routes
    Route::post('login', 'Auth\LoginController@login');
    // Route::post('login', function (Request $request) {
    //     return response()->json($request->all());
    // });

    Route::get('home', function (Request $request) {
        return 'OK!';
    });

    Route::group(['middleware' => 'dev'], function () {

        Route::get('ping', function (Request $request) {
            Log::debug('GET /ping');
            return 'pong';
        });
    
        Route::post('ping', function (Request $request) {
            Log::debug('POST /test');
            return 'pong';
        });

        Route::get('csrf', function () {
            return response()->json([ '_token' => csrf_token()]);
        });

    });
});
