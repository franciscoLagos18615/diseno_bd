<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Actividad extends Model{
	protected $table = 'actividades';

	protected $fillable = ['descripcion','id_evento','id_usuario'];

	public function evento(){
		$this -> belongsTo (Evento::class,'id_evento');
	}

	public function usuario(){
		$this -> belongsTo(User::class,'id_usuario');
	}
}