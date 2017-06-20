<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model{
	protected $table = 'usuarios';

	protected $fillable = ['usuario','password','run','email','telefono','tipo_usuario','activo','visible'];

	public function historiales(){
		return $this->hasMany(Historial::class,'id_usuario');
	}

	public function apoyos_economicos(){
		return $this->hasMany(Apoyo_economico::class,'id_usuario');
	}

	public function voluntariados(){
		return $this->hasMany(Voluntariado::class,'id_usuario');
	}

	public function eventos(){
		return $this->hasMany(Evento::class,'id_usuario');
	}

	public function recolecciones(){
		return $this->hasMany(Recoleccion::class,'id_usuario');
	}

	public function comentarios(){
		return $this->hasMany(Comentario::class,'id_usuario');
	}

	public function catastrofes(){
		return $this->hasMany(Catastrofe::class,'id_usuario');
	}

	public function actividades(){
		return $this->hasMany(Actividad::class,'id_usuario');
	}

}