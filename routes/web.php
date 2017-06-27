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
 });
  
  Route::get('view', function(){
  	return view('index');
 });
 
 Route::resource('catastrofes','CatastrofeController');
 
 Route::resource('recolecciones','RecoleccionController');
  Route::resource('donaciones','DonacionController');

 Route::resource('apoyoeconomico','ApoyoEconomicoController');
 
 Route::resource('eventos', 'EventoController');

 Route::resource('voluntariados','VoluntariadoController');

 Route::resource('medidas', 'MedidaController');

 Route::resource('medidasgobierno','MedidaGobiernoController');

 Route::resource('medidasusuario','MedidaUsuarioController');

 Route::resource('elementos', 'ElementoController');

 Route::resource('actividades', 'ActividadController');
 
 Auth::routes();
 
 Route::get('/home', function () {
     return view('home');
 });
 
 Route::post('/apoyoeconomico/1','ComentariosController@store');