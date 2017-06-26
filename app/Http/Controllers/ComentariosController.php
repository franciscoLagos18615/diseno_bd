<?php

namespace App\Http\Controllers;
use App\Comentario;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
    	$comentario = new Comentario();
    	$comentario-> descripcion=$request->descripcion;
    	$comentario-> id_usuario=2;
    	$comentario-> id_muro=1;
    	$comentario->save();
    	return back();
    }


}
