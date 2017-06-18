<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Muro extends Model{
	protected $table = 'muros';

	public function comentarios(){
		return $this->hasMany(Comentario::class,'id_muro');
	}

	public function evento(){
		return $this->hasOne(Evento::class, 'id_muro');
	}
	public function voluntariado(){
		return $this->hasOne(Voluntariado::class, 'id_muro');
	}
	public function apoyo_economico(){
		return $this->hasOne(Apoyo_economico::class, 'id_muro');
	}
	public function recoleccion(){
		return $this->hasOne(Recoleccion::class, 'id_muro');
	}
}