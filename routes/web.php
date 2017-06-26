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
Route::get('/inicio2', function () {
    return view('welcomeDos');
})->middleware('auth','es_gobierno');
Route::get('view', function(){
	return view('index');
});
Route::resource('catastrofes','CatastrofeController');
Route::resource('recolecciones','RecoleccionController');
Route::resource('apoyoeconomico','ApoyoEconomicoController');
Auth::routes();
Route::get('/home', function () {
    return view('home');
});
Route::post('/catastrofes/1','ComentariosController@store');