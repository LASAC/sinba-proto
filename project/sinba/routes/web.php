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
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/units', function () {
        return view('units.list', ['message' => null]);
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
        $unit = (object)['name'=>'Metros', 'symbol'=>'m'];
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

});