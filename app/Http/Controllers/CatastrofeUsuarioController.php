<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Comentario;
use App\Muro;
use DB;
use Auth;
use App\Http\Requests\CatastrofeRequest;

class CatastrofeUsuarioController extends Controller
{
	public function index()
	{
		$catastrofes = Catastrofe::orderBy('id','ASC')->paginate();
		//dd($products);
		return view('catastrofesusuarios.index', compact('catastrofes'));

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


		return view('catastrofesusuario.show', compact(['catastrofe','comentarios','apoyos_economicos','recolecciones','eventos','voluntariados']));
	}

}
