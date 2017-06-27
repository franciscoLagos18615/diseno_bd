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

class MedidaGobiernoController extends Controller
{
	public function index()
	{
		$recolecciones = Recoleccion::orderBy('id','ASC')->paginate();
		$voluntariados = Voluntariado::orderBy('id','ASC')->paginate();
		$eventos = Evento::orderBy('id','ASC')->paginate();
		$apoyoseconomicos = Apoyo_economico::orderBy('id','ASC')->paginate();

		return view('medidasgobierno.index', compact('recolecciones','voluntariados','eventos','apoyoseconomicos'));

	}

// BLOQUEAR USUARIO
	public function update($id)
	{
		DB::table('users')
		->where('users.id','=',$id)
		->update(['activo'=>false]);

		return redirect()->route('medidasgobierno.index')->with('info', 'El usuario ha sido bloqueado.');
	}


	public function panelmedidas()
	{
		$recolecciones =  DB::table(DB::raw("recolecciones WHERE recolecciones.avance > 60 AND recolecciones.avance < 100 AND (SELECT DATE_PART('day',now()- recolecciones.fecha_termino)) <10 AND (SELECT EXTRACT(YEAR from recolecciones.fecha_termino))= date_part('year', current_date)"))
		->paginate(5);

		$voluntariados =  DB::table(DB::raw("voluntariados WHERE voluntariados.avance > 60 AND voluntariados.avance < 100 AND (SELECT DATE_PART('day',now()- voluntariados.fecha_termino)) <10 AND (SELECT EXTRACT(YEAR from voluntariados.fecha_termino))= date_part('year', current_date)"))
		->paginate(5);

		$eventos =  DB::table(DB::raw("eventos WHERE eventos.avance > 60 AND eventos.avance < 100 AND (SELECT DATE_PART('day',now()- eventos.fecha_termino)) <10 AND (SELECT EXTRACT(YEAR from eventos.fecha_termino))= date_part('year', current_date)"))
		->paginate(5);

		 $apoyoseconomicos =  DB::table(DB::raw("apoyos_economicos WHERE apoyos_economicos.avance > 60 AND apoyos_economicos.avance < 100 AND (SELECT DATE_PART('day',now()- apoyos_economicos.fecha_termino)) <10 AND (SELECT EXTRACT(YEAR from apoyos_economicos.fecha_termino))= date_part('year', current_date)"))
        ->paginate(5);

		 // select "apoyos_economicos".* from apoyos_economicos WHERE apoyos_economicos.avance > 60 AND (now() - apoyos_economicos.fecha_termino) < (10 * '1 sec'::interval) AND (SELECT EXTRACT(YEAR from apoyos_economicos.fecha_termino))= date_part('year', current_date);

        // ->select('apoyoseconomicos.*')
        $twitter=0;
		if(count($recolecciones)>0 || count($recolecciones)>0 || count($voluntariados)>0 || count($eventos)>0)
		{
			$twitter=1;
		}


		return view('medidasgobierno.panelmedidas', compact('recolecciones','voluntariados','eventos','apoyoseconomicos','twitter'));
	}

}