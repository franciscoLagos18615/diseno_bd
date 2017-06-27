<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Actividad;
use App\Muro;
use App\Persona;
use App\Http\Requests\ActividadRequest;
use App\Http\Requests\PersonaRequest;
use Auth;
use DB;

class PersonaController extends Controller
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
		return view('personas.create');
	}

	
	public function store(PersonaRequest $request)
	{
		$persona = new Persona;
		
		$persona->run = $request->run;
		$persona->nombre = $request->nombre;
		$persona->apellido_paterno = $request->apellido_paterno;
		$persona->apellido_materno = $request->apellido_materno;
		$persona->id_recoleccion = 4;
		$persona->id_apoyo = 5;
		$persona->id_evento = 1;
		$persona->id_voluntariado = $request->id_voluntariado;
		$persona->save();

		DB::select(DB::raw('select avanceVoluntariado('.$request->id_voluntariado.')'));

		return redirect()->route('medidasusuario.index')->with('info', 'Has sido inscrito');
	}

		public function destroy($id)
	{
		$product = Actividad::find($id);
		$product->delete();

		return back()->with('info', 'El elemento fue eliminado.');
	}
}