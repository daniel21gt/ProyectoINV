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


Route::get('/panel', 'PanelController@index');
Route::post('/panel/filtusuario', 'CuentaController@filtusuario')->name('usuario.filtusuario');
Route::post('/panel/gestion', 'CuentaController@ugestion')->name('usuario.ugestion');
Route::get('/panel/bestado', 'CuentaController@bestado')->name('usuario.bestado');
Route::get('/panel/selectord', 'CuentaController@selectord')->name('usuario.selectord');
Route::get('/panel/revisar', 'CuentaController@revisar')->name('cuenta.revisar');
Route::post('/panel/estado', 'CuentaController@cestado')->name('cuenta.cestado');
Route::post('/panel/asignar', 'CuentaController@asignar')->name('cuenta.asignar');
Route::get('/panel/tareas', 'CuentaController@tareas')->name('cuenta.tareas');
Route::get('/panel/inactivo', 'CuentaController@inactivo')->name('cuenta.inactivo');
Route::get('/panel/reportes', 'CuentaController@reportes')->name('cuenta.reportes');
Route::get('/panel/reportesd', 'CuentaController@reportes')->name('cuenta.reportesd');
Route::get('/panel/governor', 'CuentaController@governor')->name('usuario.governor');
Route::get('/panel/mayor', 'CuentaController@mayor')->name('usuario.mayor');
Route::get('/panel/advice', 'CuentaController@advice')->name('usuario.advice');
Route::get('/panel/assembly', 'CuentaController@assembly')->name('usuario.assembly');
Route::get('panel/descarga', 'CuentaController@excel')->name('products.excel');
Route::get('panel/excelestados', 'CuentaController@excelestados')->name('products.excelestados');
Route::get('panel/excelestadostres', 'CuentaController@excelestadostres')->name('products.excelestadostres');
Route::get('panel/excelestadoscuatro', 'CuentaController@excelestadoscuatro')->name('products.excelestadoscuatro');
Route::resource('/panel/ecuentas', 'CuentaController')->except(['show']);
Route::resource('/panel/registros', 'RegistrosController');
Route::get('/panel/fecha', 'UsuarioController@fecha')->name('usuario.fecha');
Route::get('/panel/selector', 'UsuarioController@selector')->name('usuario.selector');
Route::post('/panel/cedula', 'UsuarioController@cedula')->name('usuario.cedula');
Route::post('/panel/create', 'UsuarioController@store')->name('usuario.store');
Route::post('/panel/update', 'UsuarioController@update')->name('usuario.update');
Route::get('panel/excelgobernadores', 'UsuarioController@excelgobernadores')->name('products.excelgobernadores');
Route::get('panel/excelalcaldes', 'UsuarioController@excelalcaldes')->name('products.excelalcaldes');
Route::get('panel/excelconsejales', 'UsuarioController@excelconsejales')->name('products.excelconsejales');
Route::get('panel/excelasamblea', 'UsuarioController@excelasamblea')->name('products.excelasamblea');
Route::resource('/panel/usuario', 'UsuarioController')->except(['show']);
Auth::routes();






