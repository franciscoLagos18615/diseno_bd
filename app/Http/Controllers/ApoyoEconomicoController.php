<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Apoyo_Economico;
use App\Cuenta_banco;
use App\Muro;
use App\Http\Requests\CatastrofeRequest;
use App\Http\Requests\ApoyoEconomicoRequest;
use DB;
use Auth;

class ApoyoEconomicoController extends Controller
{

	public function show($id)
	{
		$catastrofe = Apoyo_Economico::find($id);

		$cuenta = DB::table('cuentas_banco')
		->join('apoyos_economicos','apoyos_economicos.id_cuenta_banco','=','cuentas_banco.id')
		->where('apoyos_economicos.id','=',$id)
		->select('cuentas_banco.*')
		->get();



		


// $comentarios = DB::table('comentarios')
// 		->join('muros','comentarios.id_muro','=','muros.id')
//         ->join(	'apoyos_economicos','apoyos_economicos.id_muro','=', 'muro.id')
//         ->where('apoyos_economicos.id','=',$id)
//         -> select('cuentas_banco.*')         
//         ->get();

		$comentarios = DB::table(DB::raw('users, comentarios, muros, apoyos_economicos WHERE comentarios.id_muro = muros.id AND apoyos_economicos.id_muro = muros.id AND apoyos_economicos.id='.$id.' AND users.id = comentarios.id_usuario order by comentarios.created_at desc'))
		->select(DB::raw('comentarios.*, users.usuario, users.email'))
		->get();

		return view('apoyoeconomico.show', compact('catastrofe','cuenta','comentarios'));
	}

	public function index()
	{
		$catastrofes = Apoyo_Economico::orderBy('id','ASC')->paginate();
		return view('apoyoeconomico.index', compact('catastrofes'));

	}

	public function create()
	{
		return view('apoyoeconomico.create');
	}


	public function edit($id)
	{
		$catastrofe = Catastrofe::find($id);
		$q=1;
		return view('catastrofes.edit', compact('catastrofe','q'));
	}

	public function store(ApoyoEconomicoRequest $request)
	{
		$muro = new Muro;
		$muro->save();

		$cuenta = new Cuenta_banco;
		$cuenta->numero_cuenta=$request->numero_cuenta;
		$cuenta->banco=$request->banco;
		$cuenta->tipo_cuenta=$request->tipo_cuenta;
		$cuenta->run=$request->run;
		$cuenta->save();

		$ApoyoEconomico = new Apoyo_Economico;
		$ApoyoEconomico->nombre_medida = $request->nombre_medida;
		$ApoyoEconomico->meta = $request->meta;
		$ApoyoEconomico->fecha_inicio = $request->fecha_inicio;
		$ApoyoEconomico->fecha_termino = $request->fecha_termino;
		$ApoyoEconomico->nombre_medida = $request->nombre_medida;
		$ApoyoEconomico->avance = 0;
		$ApoyoEconomico->valida = 0;
		$ApoyoEconomico->id_usuario = Auth::user()->id;
		$ApoyoEconomico->id_muro = $muro->id;
		$ApoyoEconomico->recaudacion_actual=0;
		$ApoyoEconomico->id_usuario_valida= Auth::user()->id;
		$ApoyoEconomico->id_cuenta_banco=$cuenta->id;
		$ApoyoEconomico->id_catastrofe=$request->id_catastrofe;
		$ApoyoEconomico->save();

		return redirect()->route('apoyoeconomico.index')->with('info', 'La catastrofe fue actualizada');
	}

		public function destroy($id)
	{
		$product = ApoyoEconomico::find($id);
		$product->delete();

		return back()->with('info', 'El apoyo economico fue eliminado.');
	}	


		public function update($id)
	{

		DB::table('apoyos_economicos')
		->where('apoyos_economicos.id','=',$id)
		->update(['valida'=>true]);

		return redirect()->route('medidasgobierno.index')->with('info', 'La medida fue activada.');
	}
    
}
