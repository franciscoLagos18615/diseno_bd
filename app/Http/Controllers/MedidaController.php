<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Comentario;
use App\Recoleccion;
use App\Voluntariado;
use App\Evento;
use DB;
use App\Http\Requests\CatastrofeRequest;

class MedidaController extends Controller
{
	public function index()
	{
		$recolecciones = Recoleccion::orderBy('id','ASC')->paginate();
		$voluntariados = Voluntariado::orderBy('id','ASC')->paginate();
		$eventos = Evento::orderBy('id','ASC')->paginate();

		return view('medidas.index', compact('recolecciones','voluntariados','eventos'));

	}
}