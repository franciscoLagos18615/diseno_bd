<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Elemento;
use App\Muro;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\ElementoRequest;
use Auth;
use DB;

class ElementoController extends Controller
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
		return view('elementos.create');
	}

	
	public function store(ElementoRequest $request)
	{
		$elemento = new Elemento;
		
		['nombre','cantidad','id_recoleccion'];

		$elemento->nombre = $request->nombre;
		$elemento->cantidad = $request->cantidad;
		$elemento->id_recoleccion = $request->id_recoleccion;
		$elemento->save();



		DB::select(DB::raw('select avanceRecoleccion('.$request->id_recoleccion.')'));

		return redirect()->route('medidas.index')->with('info', 'El Elemento fue añadido');
	}

		public function destroy($id)
	{
		$product = Elemento::find($id);
		$product->delete();

		return back()->with('info', 'El elemento fue eliminado.');
	}
}