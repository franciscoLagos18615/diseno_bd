<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Evento;
use App\Muro;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\EventoRequest;
use Auth;

class EventoController extends Controller
{

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('eventos.create', compact('catastrofe'));
	}

	public function index()
	{
		$catastrofes = Catastrofe::orderBy('id','ASC')->paginate();
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

		return back()->with('info', 'El evento fue eliminado.');
	}

}