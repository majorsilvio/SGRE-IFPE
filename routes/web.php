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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/equipamento', 'EquipamentoController@index')->name('equipamento');
Route::post('/equipamento/cadastrar','EquipamentoController@create')->name('equip_cadastro');
Route::get('/equipamento/delete/{id}','EquipamentoController@destroy')->name('excluir_equip');
Route::get('/equipamento/editar/{id}','EquipamentoController@edit')->name('editar_equip');
Route::post('/equipamento/editar/{id}','EquipamentoController@update')->name('update_cadastro');

Route::get('/reserva', 'ReservasController@index')->name('reserva');
Route::post('/reserva/cadastrar','ReservasController@create')->name('reserva_cadastro');
Route::get('/reserva/delete/{id}','ReservasController@destroy')->name('excluir_reserva');
Route::get('/reserva/editar/{id}','ReservasController@edit')->name('editar_reserva');
Route::post('/reserva/editar/{id}','ReservasController@update')->name('update_reserva');