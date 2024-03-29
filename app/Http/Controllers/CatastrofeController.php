<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Comentario;
use App\Muro;
use DB;
use Auth;
use App\Http\Requests\CatastrofeRequest;

class CatastrofeController extends Controller
{
	public function index()
	{
		$catastrofes = Catastrofe::orderBy('id','ASC')->paginate();
		//dd($products);
		return view('catastrofes.index', compact('catastrofes'));

	}

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		

		$comentarios = DB::table('comentarios')
		->join('muros','comentarios.id_muro','=','muros.id')
		->select('comentarios.id_usuario','comentarios.id','comentarios.descripcion','comentarios.created_at')
		->get();



		$apoyos_economicos = DB::table(DB::raw('apoyos_economicos, catastrofes WHERE apoyos_economicos.id_catastrofe = catastrofes.id AND catastrofes.id='.$id))
		->select('apoyos_economicos.*')
		->paginate(5);

		$recolecciones = DB::table(DB::raw('recolecciones, catastrofes WHERE recolecciones.id_catastrofe = catastrofes.id AND catastrofes.id='.$id))
		->select('recolecciones.*')
		->paginate(5);
		$eventos = DB::table(DB::raw('eventos, catastrofes WHERE eventos.id_catastrofe = catastrofes.id AND catastrofes.id='.$id))
		->select('eventos.*')
		->paginate(5);
		$voluntariados = DB::table(DB::raw('voluntariados, catastrofes WHERE voluntariados.id_catastrofe = catastrofes.id AND catastrofes.id='.$id))
		->select('voluntariados.*')
		->paginate(5);


		return view('catastrofes.show', compact(['catastrofe','comentarios','apoyos_economicos','recolecciones','eventos','voluntariados']));
	}

	public function create()
	{
		return view('catastrofes.create');
	}

	public function store(CatastrofeRequest $request)
	{
		$catastrofe = new Catastrofe;
		$catastrofe->descripcion = $request->descripcion;
		$catastrofe->region = $request->region;
		$catastrofe->comuna = $request->comuna;
		$catastrofe->id_usuario = Auth::user()->id;
		$catastrofe->save();

		$muro = new Muro;
		$muro->save();

		return redirect()->route('catastrofes.index')->with('info', 'La catastrofe fue actualizada');
	}
	

	public function edit($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('catastrofes.edit', compact('catastrofe'));
	}

	public function update(CatastrofeRequest $request, $id)
	{
		$catastrofe = Catastrofe::find($id);

		$catastrofe->descripcion = $request->descripcion;
		$catastrofe->region = $request->region;
		$catastrofe->comuna = $request->comuna;

		$catastrofe->save();		
		return redirect()->route('catastrofes.index')->with('info', 'La catastrofe fue actualizada');
	}

	public function destroy($id)
	{
		$product = Catastrofe::find($id);
		$product->delete();

		return back()->with('info', 'La catastrofe fue eliminada');
	}
}
