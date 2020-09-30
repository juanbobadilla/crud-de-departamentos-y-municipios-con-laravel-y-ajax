<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','terceroController@index')->name('tercero.index');

Route::get('/crear','terceroController@create')->name('tercero.create');

Route::get('/getMunicipios/{id}','terceroController@municipio')->name('tercero.municipio');

Route::get('/modificar{id}','terceroController@edit')->name('modificar.terceros');

Route::get('borrar/{id}','terceroController@borrar')->name('borrar.terceros');

Route::PUT('/actualizar/tercero/{id}','terceroController@update')->name('update.terceros');

Route::POST('/store','terceroController@store')->name('store.tercero');

Route::get('borrar/definitivo/{id}','terceroController@destroy')->name('destroy.terceros');



