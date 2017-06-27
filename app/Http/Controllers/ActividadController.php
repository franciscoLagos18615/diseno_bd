<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Actividad;
use App\Muro;
use App\Http\Requests\ActividadRequest;
use App\Http\Requests\ElementoRequest;
use Auth;
use DB;

class ActividadController extends Controller
{

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('eventos.create', compact('catastrofe'));
	}

	public function index()
	{
		$actividades = Actividad::orderBy('id','ASC')->paginate();
		return view('actividades.index', compact('actividades'));

	}

	public function create()
	{
		return view('actividades.create');
	}

	
	public function store(ActividadRequest $request)
	{
		$actividad = new Actividad;
		
		
		$actividad->descripcion = $request->descripcion;
		$actividad->recaudacion = $request->recaudacion;
		$actividad->id_evento = $request->id_evento;
		$actividad->id_usuario = Auth::user()->id;
		$actividad->save();

		DB::select(DB::raw('select avanceEvento('.$request->id_evento.')'));





		return redirect()->route('medidas.index')->with('info', 'La actividad fue añadida');
	}

		public function destroy($id)
	{
		$product = Actividad::find($id);
		$product->delete();

		return back()->with('info', 'El elemento fue eliminado.');
	}
}