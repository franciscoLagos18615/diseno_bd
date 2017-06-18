<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Evento extends Model{
	protected $table = 'eventos';

	protected $fillable = ['nombre_medida','fecha_inicio','fecha_termino','direccion','hora','meta','id_usuario_valida','valida','id_cuenta_banco','id_catastrofe','id_usuario','id_muro'];

	public function actividades(){
		return $this -> hasMany(Actividad::class,'id_evento');
	}

	public function usuario(){
		return $this->belongsTo(Usuario::class,'id_usuario');
	}

	public function catastrofe(){
		return $this->belongsTo(Catastrofe::class,'id_catastrofe');
	}

	public function muro(){
		return $this->belongsTo(Muro::class,'id_muro');
	}

	public function personas(){
		return $this->hasMany(Persona::class,'id_evento');
	}
	public function materiales(){
		return $this->hasMany(Material::class,'id_evento');
	}

	public function objetivos(){
		return $this->hasMany(Objetivo_de_ayuda::class,'id_evento');
	}
}