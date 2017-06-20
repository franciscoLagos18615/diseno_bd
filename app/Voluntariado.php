<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Voluntariado extends Model{
	protected $table = 'voluntariados';

	protected $fillable = ['nombre_medida','fecha_inicio','fecha_termino','direccion','perfil_voluntario','personas','tipo_trabajo','id_usuario_valida','valida','id_catastrofe','id_usuario','id_muro'];

	public function materiales(){
		return $this->hasMany(Material::class,'id_voluntariado');
	}

	public function objetivos(){
		return $this->hasMany(Objetivo_de_ayuda::class,'id_voluntariado');
	}

	public function personas(){
		return $this->hasMany(Persona::class,'id_voluntariado');
	}

	public function usuario(){
		return $this->belongsTo(User::class,'id_usuario');
	}
	public function catastrofe(){
		return $this->belongsTo(Catastrofe::class,'id_catastrofe');
	}
	public function muro(){
		return $this->belongsTo(Muro::class,'id_muro');
	}
}