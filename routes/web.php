<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {


    Route::get('/entrenamiento', 'EntrenamientoController@index')->name('entrenamiento');

    Route::get('/entrenamiento/create', 'EntrenamientoController@create')->name('entrenamiento.crear');

    Route::post('/entrenamiento/create', 'EntrenamientoController@store')->name('entrenamiento.store');

    Route::get('/entrenamiento/show', 'EntrenamientoController@show')->name('entrenamiento.show');

    Route::get('/entrenamiento/show/edit/{id}', 'EntrenamientoController@edit')->name('entrenamiento.edit');

    Route::put('/entrenamiento/show/edit/{id}', 'EntrenamientoController@update')->name('entrenamiento.update');

    Route::get('/entrenamiento/show/{id}', 'EntrenamientoController@destroy')->name('entrenamiento.destroy');
    
    
});
