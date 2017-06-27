<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Voluntariado;
use App\Muro;
use App\Http\Requests\VoluntariadoRequest;
use Auth;
use DB;

class VoluntariadoController extends Controller
{

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('voluntariados.create', compact('catastrofe'));
	}

	public function index()
	{
		$catastrofes = Voluntariado::orderBy('id','ASC')->paginate();
		return view('voluntariados.index', compact('catastrofes'));

	}

	public function create()
	{
		return view('voluntariados.create');
	}

	
	public function store(VoluntariadoRequest $request)
	{
		$voluntariado = new Voluntariado;
		$muro = new Muro;

		$muro->save();

		$voluntariado->nombre_medida = $request->nombre_medida;
		$voluntariado->fecha_inicio = $request->fecha_inicio;
		$voluntariado->fecha_termino = $request->fecha_termino;
		$voluntariado->direccion = $request->direccion;
		$voluntariado->personas = $request->personas;
		$voluntariado->avance= 0;
		$voluntariado->tipo_trabajo = $request->tipo_trabajo;
		$voluntariado->perfil_voluntario = $request->perfil_voluntario;
		$voluntariado->valida = 'false';
		$voluntariado->id_usuario_valida= 2;
		$voluntariado->id_usuario = Auth::user()->id;
		$voluntariado->id_catastrofe = $request->id_catastrofe;
		$voluntariado->id_muro=$muro->id;

		$voluntariado->save();

		return redirect()->route('recolecciones.index')->with('info', 'El voluntariado fue añadido');
	}

		public function destroy($id)
	{
		$product = Voluntariado::find($id);
		$product->delete();

		return redirect()->route('medidasgobierno.index')->with('info', 'El elemento fue eliminado.');
	}

		public function update($id)
	{

		DB::table('voluntariados')
		->where('voluntariados.id','=',$id)
		->update(['valida'=>true]);

		return redirect()->route('medidasgobierno.index')->with('info', 'La medida fue activada.');
	}

    
}