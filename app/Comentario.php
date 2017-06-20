<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Comentario extends Model{
	protected $table = 'comentarios';

	protected $fillable = ['descripcion','id_usuario','id_muro'];

	public function usuario(){
		return $this->belongsTo(User::class,'id_usuario');
	}

	public function muro(){
		return $this->belongsTo(Muro::class,'id_muro');
	}
}