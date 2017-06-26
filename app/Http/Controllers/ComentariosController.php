<?php

namespace App\Http\Controllers;
use App\Comentario;
use Auth;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
    	$comentario = new Comentario();
    	$comentario-> descripcion=$request->descripcion;
    	$comentario-> id_usuario=Auth::user()->id;
    	$comentario-> id_muro=$request-> id_muro;
    	$comentario-> created_at=time();
    	$comentario->save();
    	return back();
    }


}
