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

    Route::get('/home', function () {

        $watersheds = [
            'teste1',
            'teste2'
        ];

        return view('home', [
            'isAdmin' => true,
            'resultLabel' => trans('strings.results'),
            'watersheds' => $watersheds
        ]);
    });

    Route::get('/units', function () {

        $units = [
            (object)['id' => 1, 'name'=>'Metros', 'symbol'=>'m'],
            (object)['id' => 2, 'name'=>'Quilômetros', 'symbol'=>'km'],
            (object)['id' => 3, 'name'=>'Segundos', 'symbol'=>'s']
        ];

        return view('units.list', [
            'message' => null,
            'units' => $units
        ]);
    });

    Route::post('/units/search', function(){
        return "Not implemented yet";
    });

    Route::get('/units/create', function () {
        $unit = (object)['id' => 0, 'name'=>'', 'symbol'=>''];
        return view('units.edit', [
            'title' => trans('strings.createUnit'),
            'url' => '/units/create',
            'saveEnabled' => true,
            'attributes' => [],
            'unit' => $unit]);
    });

    Route::get('/units/edit/{id}', function ($id) {
        // buscar por id
        $unit = (object)['name'=>'Quilômetros', 'symbol'=>'km'];
        return view('units.edit', [
            'title' => trans('strings.editUnit'),
            'url' => '/units/edit',
            'saveEnabled' => true,
            'attributes' => [],
            'unit' => $unit]);
    });

    Route::get('/units/show/{id}', function ($id) {
        // buscar por id
        $unit = (object)['id' => $id, 'name'=>'Metros', 'symbol'=>'m'];
        return view('units.edit', [
            'title' => trans('strings.showUnit'),
            'url' => '/units',
            'saveEnabled' => false,
            'attributes' => ['readonly'],
            'unit' => $unit]);
    });

    Route::post('/units/delete/{id}', function ($id) {
        // buscar por id
        $unit = (object)['id' => $id, 'name'=>'Metros', 'symbol'=>'m'];
        return view('units.list', ['message' => 'edit', 'unit' => $unit]);
    });

    Route::get('watersheds/edit' , function () {
        return view('watersheds.edit');
    });

});