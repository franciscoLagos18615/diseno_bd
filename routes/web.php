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


Route::get('view', function(){
	return view('index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/addCatastrofe',function(){
	return view('agregarCatastrofe');
});

Route::get('/menuInicio',function(){
	return view('menuPrincipalG');
});