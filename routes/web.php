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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','ClientesController@index');

Route::get('clientes/Producto','ClientesController@Producto')->name('clientes/Producto');

Route::post('clientes/addProducto','ClientesController@addProducto')->name('addProducto');

Route::any('buscar','ClientesController@buscar')->name('buscar');

Route::resource('clientes','ClientesController');

Route::resource('productos','ProductosController');

Route::get('precios','ClientesController@precios')->name('precios');

Route::post('getPrecios','ClientesController@getPrecios')->name('getPrecios');

Route::post('addClienteProducto','ClientesController@addClienteProducto')->name('addClienteProducto');

Route::resource('ventas','VentasController');

Route::post('ventas/create','VentasController@create')->name('create');
