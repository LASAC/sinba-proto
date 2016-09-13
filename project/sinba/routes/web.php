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

    Route::resource('units', 'UnitController');

    Route::post('units/search', 'UnitController@search');

    Route::get('watersheds/edit/{id}' , function ($id) {
        return view('watersheds.edit');
    });

    Route::get('watersheds/model/{id}', function ($id) {
        return view('watersheds.model');
    });

});