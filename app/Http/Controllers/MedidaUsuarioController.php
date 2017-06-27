<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Comentario;
use App\Recoleccion;
use App\Voluntariado;
use App\Apoyo_economico;
use App\Evento;
use DB;
use App\Http\Requests\CatastrofeRequest;

class MedidaUsuarioController extends Controller
{
	public function index()
	{

		$recolecciones = Recoleccion::where('valida','true')
		->orderBy('id','ASC')
		->paginate(4);

		$voluntariados = Voluntariado::where('valida','true')
		->orderBy('id','ASC')
		->paginate(4);

		$eventos = Evento::where('valida','true')
		->orderBy('id','ASC')
		->paginate(4);

		$apoyoseconomicos = Apoyo_economico::where('valida','true')
		->orderBy('id','ASC')
		->paginate(4);


		return view('medidasusuario.index', compact('recolecciones','voluntariados','eventos','apoyoseconomicos'));
	}


// BLOQUEAR USUARIO
		public function update($id)
	{
		DB::table('users')
		->where('users.id','=',$id)
		->update(['activo'=>false]);

		return redirect()->route('medidasgobierno.index')->with('info', 'El usuario ha sido bloqueado.');
	}
}