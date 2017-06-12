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
/*
Route::get('/', function () {
    return view('esquema/home');
});*/


Route::resource('inventario/categoria','CategoriaController');


Route::resource('inventario/barrio','BarrioController');
Route::get('inventario/barrio/{id}/editmodal','BarrioController@editmodal');


Route::resource('inventario/barriodos','BarriodosController');
Route::get('inventario/barriodos/{id}/editmodal','BarriodosController@editmodal');


Route::resource('inventario/ciudad','CiudadController');

Route::resource('inventario/inmueble','InmuebleController');

Route::resource('ventas/cliente','ClienteController');

Route::resource('ventas/venta','VentaController');

Route::get('listall/{page?}','BarrioController@listall');

Route::get('listalldos/{page?}','BarriodosController@listall');

Route::resource('seguridad/usuario','UsuarioController');

Route::resource('inventario/reporte','ReportesController');

Route::auth();

Route::resource('/','HomeController');

Route::get('esquema/show/{id}','HomeController@show');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/{slug?}','HomeController@index');

Route::get('inventario/inmueble/create/ajax-barrio','InmuebleController@getBarrios');

Route::get('inventario/inmueble/edit/ajax-barrio','InmuebleController@getBarrios');

Route::get('inventario/inmueble/partials/filters/ajax-barr','InmuebleController@getBarriosCiu');

Route::get('esquema/partials/filters/ajax-barr','HomeController@getBarriosCiu');

