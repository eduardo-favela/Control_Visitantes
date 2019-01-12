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

Route::get('/','RutasController@iniciosesion');
Route::get('/inicio','OperacionesBDController@inicio');
Route::get('/visitantes','OperacionesBDController@getvisitantes');
Route::get('/placas','OperacionesBDController@getplacas');
Route::post('/placasfiltradas','OperacionesBDController@getplacasfiltradas');
Route::get('/registrarcolono','OperacionesBDController@getcolonos');
Route::get('/visitas','OperacionesBDController@getvisitas');
Route::post('/registrarcolonos','OperacionesBDController@setcolonos');
Route::post('/registrarvisitantes','OperacionesBDController@setvisitantes');
Route::get('/verhora','OperacionesBDController@verhora');
Route::post('/registrarvisitas','OperacionesBDController@setvisitas');
Route::post('/iniciarsesion','OperacionesBDController@iniciarsesion');
Route::post('/ultimovisitado','OperacionesBDController@ultimovisitado');
