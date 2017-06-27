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
 Route::group(['middleware' => ['auth','es_gobierno']], function(){
 Route::resource('catastrofes','CatastrofeController');
 });

  Route::resource('catastrofesusuario','CatastrofeUsuarioController');
 
 Route::resource('recolecciones','RecoleccionController');
  Route::resource('donaciones','DonacionController');

 Route::resource('apoyoeconomico','ApoyoEconomicoController');
 
 Route::resource('eventos', 'EventoController');

 Route::resource('voluntariados','VoluntariadoController');

 Route::resource('medidas', 'MedidaController');

 Route::group(['middleware' => ['auth','es_gobierno']], function(){
 	 Route::resource('medidasgobierno','MedidaGobiernoController');
 });

 Route::resource('medidasusuario','MedidaUsuarioController');

 Route::resource('elementos', 'ElementoController');

 Route::resource('actividades', 'ActividadController');

 Route::resource('personas','PersonaController');
 
 Auth::routes();
 
 Route::get('/panelmedidas', 'MedidaGobiernoController@panelmedidas'); 


 Route::get('/home', function () {
     return view('home');
 });

 Route::get('/enviar_tweet', function()
{
    return Twitter::postTweet(['status' => 'Tienes 1 o más medidas que poseen más de un 60% de avance y se encuentran a menos de una semana de su plazo máximo', 'format' => 'json']);
});
 
 Route::post('/apoyoeconomico/1','ComentariosController@store');