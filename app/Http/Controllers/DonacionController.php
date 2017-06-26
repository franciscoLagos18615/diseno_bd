<?php

namespace App\Http\Controllers;
use App\Donacion;
use App\Persona;
use Auth;
use DB;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->run=0;
        $persona->nombre="guest";
        $persona->apellido_paterno="apellido_paterno";
        $persona->apellido_materno="apellido_materno";
        $persona->id_recoleccion=4;
        $persona->id_apoyo=5;
        $persona->id_evento=1;
        $persona->id_voluntariado=1;
        $persona->save();
        $donacion = new Donacion;
        $donacion->monto=$request->monto;
        $donacion->fecha= date('Y-m-d');
        $donacion->hora= date('H:i');
        $donacion->id_persona=$persona->id;
        $cuentas_banco =  DB::table(DB::raw('cuentas_banco, apoyos_economicos WHERE apoyos_economicos.id_cuenta_banco = cuentas_banco.id AND apoyos_economicos.id = '.$request->id_apoyo_economico))
        ->select('cuentas_banco.id')
        ->get();
        $donacion->id_cuenta_banco = $cuentas_banco[0]->id;
        $donacion->save();

        // DB::table('apoyos_economicos')
        //     // ->where(DB::raw('apoyos_economicos.id ='.$request->id_apoyo_economico.'->update '))
        //     ->where('apoyos_economicos.id',$request->id_apoyo_economico)
        //     // ->update(['recaudacion_actual'=>'recaudacion_actual'+$request->monto+1]);
        //     ->update(DB::raw('SET recaudacion_actual = recaudacion_actual+'.))

        DB::select(DB::raw('select avanceApoyoEconomico('.$request->id_apoyo_economico.')'));

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
