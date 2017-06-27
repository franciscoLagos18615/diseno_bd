<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Recoleccion;
use App\Muro;
use DB;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\RecoleccionRequest;
use Auth;

class RecoleccionController extends Controller
{

	public function show($id)
	{
		$catastrofe = Recoleccion::find($id);

		$comentarios = DB::table(DB::raw('users, comentarios, muros, recolecciones WHERE comentarios.id_muro = muros.id AND recolecciones.id_muro = muros.id AND recolecciones.id='.$id.' AND users.id = comentarios.id_usuario order by comentarios.created_at desc'))
		->select(DB::raw('comentarios.*, users.usuario, users.email'))
		->get();


		return view('recolecciones.show', compact('catastrofe','comentarios'));
	}

	public function index()
	{
		$catastrofes = Recoleccion::where('valida','true')
        ->orderBy('id','ASC')
        ->paginate(4);
		return view('recolecciones.index', compact('catastrofes'));

	}

		public function create()
	{
		return view('recolecciones.create');
	}

	public function store(RecoleccionRequest $request)
	{
		$recoleccion = new Recoleccion;
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
		$muro = new Muro;
		$muro->save();
		$recoleccion->id_muro=$muro->id;
		$recoleccion->id_catastrofe = $request->id_catastrofe;
		
		



		$recoleccion->save();

		return redirect()->route('recolecciones.index')->with('info', 'La catastrofe fue actualizada');
	}

		public function destroy($id)
	{
		$product = Recoleccion::find($id);
		$product->delete();

		return redirect()->route('medidasgobierno.index')->with('info', 'El elemento fue eliminado.');
	}

		public function update($id)
	{

		DB::table('recolecciones')
		->where('recolecciones.id','=',$id)
		->update(['valida'=>true]);

		return redirect()->route('medidasgobierno.index')->with('info', 'La medida fue activada.');
	}
		
    
}