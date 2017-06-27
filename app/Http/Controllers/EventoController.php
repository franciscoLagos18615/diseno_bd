<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Evento;
use App\Muro;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\EventoRequest;
use Auth;
use DB;

class EventoController extends Controller
{

	public function show($id)
	{
		$catastrofe = Evento::find($id);
		$comentarios = DB::table(DB::raw('users, comentarios, muros, eventos WHERE comentarios.id_muro = muros.id AND eventos.id_muro = muros.id AND eventos.id='.$id.' AND users.id = comentarios.id_usuario order by comentarios.created_at desc'))
		->select(DB::raw('comentarios.*, users.usuario, users.email'))
		->get();
		return view('eventos.show', compact('catastrofe','comentarios'));
	}

	public function index()
	{
		$catastrofes = Evento::orderBy('id','ASC')->paginate();
		return view('eventos.index', compact('catastrofes'));

	}

	public function create()
	{
		return view('eventos.create');
	}

	
	public function store(EventoRequest $request)
	{
		$evento = new Evento;
		

		$evento->nombre_medida = $request->nombre_medida;
		$evento->fecha_inicio = $request->fecha_inicio;
		$evento->fecha_termino = $request->fecha_termino;
		$evento->direccion = $request->direccion;
		$evento->hora = $request->hora;
		$evento->meta = $request->meta;
		$evento->avance= 0;
		$evento->valida = 'false';
		$evento->id_usuario_valida= 2;
		$evento->id_usuario = Auth::user()->id;
		$evento->id_catastrofe = $request->id_catastrofe;
		$evento->recaudacion_actual=0;

		$muro = new Muro;
		$muro->save();
		$evento->id_muro=$muro->id;

		$evento->save();

		return redirect()->route('recolecciones.index')->with('info', 'El Evento fue añadido');
	}

		public function destroy($id)
	{
		$product = Evento::find($id);
		$product->delete();

		return redirect()->route('medidasgobierno.index')->with('info', 'El Evento fue eliminado');
	}

		public function update($id)
	{

		DB::table('eventos')
		->where('eventos.id','=',$id)
		->update(['valida'=>true]);

		return redirect()->route('medidasgobierno.index')->with('info', 'El evento ha sido activado.');
	}

}