<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Apoyo_economico extends Model{
	protected $table = 'apoyos_economicos';

	protected $fillable = ['nombre_medida','fecha_inicio','fecha_termino','meta','id_usuario_valida','valida','id_cuenta_banco','id_catastrofe','id_usuario','id_muro'];


	public function usuario(){
		return $this->belongsTo(User::class,'id_usuario');
	}

	public function cuenta_banco(){
		return $this->belongsTo(Cuenta_banco::class,'id_cuenta_banco');
	}

	public function catastrofe(){
		return $this -> belongsTo(Catastrofe::class,'id_catatrofe');
	}

	public function muro(){
		return $this -> belongsTo(Muro::class,'id_muro');
	}
	public function objetivos(){
		return $this -> hasMany(Objetivo_de_ayuda::class,'id_apoyo');
	}

	public function materiales(){
		return $this->hasMany(Material::class,'id_apoyo');
	}

	public function personas(){
		return $this->hasMany(Persona::class,'id_apoyo');
	}
}