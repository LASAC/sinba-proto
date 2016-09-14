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
    });

    Route::get('home', function () {

        $watersheds = [
            (object)['id' => 1, 'name' => 'Bacia 01'],
            (object)['id' => 2, 'name' => 'Bacia 02'],
        ];

        return view('home', [
            'isAdmin' => true,
            'resultLabel' => trans('strings.results'),
            'watersheds' => $watersheds
        ]);
    });

    Route::get('watersheds/edit/{id}' , function ($id) {
        return view('watersheds.edit');
    });

    Route::get('watersheds/model/{id}', function ($id) {
        return view('watersheds.model');
    });

});