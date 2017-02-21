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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dev', function () {
    if(env('APP_ENV') === 'local') {
        phpinfo();
    }
});

// Rotas de Autenticação
Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => 'can:manage'], function () {
        // User Management

        Route::get('users/search', 'UserManagementController@index');
        Route::post('users/search', 'UserManagementController@search');
        Route::resource('users', 'UserManagementController');

        // Unit CRUD:

        Route::get('units/search', 'UnitController@index');
        Route::post('units/search', 'UnitController@search');
        Route::resource('units', 'UnitController');

        // Parameter CRUD:

        Route::get('parameters/search', 'ParameterController@index');
        Route::post('parameters/search', 'ParameterController@search');
        Route::resource('parameters', 'ParameterController');

        // Watershed Models Import/Export Actions

        Route::get('watersheds/models/{modelId}/download', 'ExcelFileController@download');

        // Watershed Models

        Route::resource('watersheds/models', 'WatershedModelController');

        // Watershed CRUD:

        Route::get('watersheds/search', 'WatershedController@index');
        Route::post('watersheds/search', 'WatershedController@search');
        Route::resource('watersheds', 'WatershedController');
    });

    Route::get('home', function () {

        // get last accessed watershed.
        $access = new \App\WatershedAccess();
        $watersheds = $access->watershedsAccessedBy(Auth::id());
        \Illuminate\Support\Facades\Log::debug("HOME - ACCESSES: {$watersheds->toJson()}");

        return view('home', [
            'resultLabel' => trans('strings.lastAccess'),
            'watersheds' => $watersheds
        ]);
    });

});
