<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Catastrofe extends Model{
	protected $table = 'catastrofes';

	protected $fillable = ['descripcion','region','comuna','id_usuario'];

	public function usuario(){
		return $this->belongsTo(Usuario::class,'id_usuario');
	}

	public function recolecciones(){
		return $this-> hasMany(Recoleccion::class,'id_catastrofe');
	}
	public function apoyos_economicos(){
		return $this-> hasMany(Apoyo_economico::class,'id_catastrofe');
	}
	public function voluntariado(){
		return $this-> hasMany(Voluntariado::class,'id_catastrofe');
	}
	public function evento(){
		return $this-> hasMany(Recoleccion::class,'id_catastrofe');
	}
}