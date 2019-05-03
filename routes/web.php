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

Route::get('/reserva', 'ReservasController@index')->name('reserva');
