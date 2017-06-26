<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Recoleccion;
use App\Muro;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\RecoleccionRequest;
use Auth;

class RecoleccionController extends Controller
{

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('recolecciones.show', compact('catastrofe'));
	}

	public function index()
	{
		$catastrofes = Catastrofe::orderBy('id','ASC')->paginate();
		return view('recolecciones.index', compact('catastrofes'));

	}

		public function create()
	{
		return view('recolecciones.create');
	}

	public function store(RecoleccionRequest $request)
	{
		$recoleccion = new Recoleccion;
		$muro = new Muro;

		$recoleccion->nombre_medida = $request->nombre_medida;
		$recoleccion->fecha_inicio = $request->fecha_inicio;
		$recoleccion->fecha_termino = $request->fecha_termino;
		$recoleccion->direccion = $request->direccion;
		$recoleccion->elementos_necesarios = $request->elementos_necesarios;
		$recoleccion->perfil_voluntario = $request->perfil_voluntario;
		$recoleccion->valida = 'false';
		$recoleccion->id_usuario = Auth::user()->id;
		$recoleccion->id_usuario_valida = Auth::user()->id;
		$recoleccion->avance=0;
		$recoleccion->id_catastrofe = $request->id;
		$muro = new Muro;
		$muro->save();



		$recoleccion->save();

		return redirect()->route('recolecciones.index')->with('info', 'La catastrofe fue actualizada');
	}

		
    
}