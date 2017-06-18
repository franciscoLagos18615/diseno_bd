<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Recoleccion extends Model{
	protected $table = 'recolecciones';

	protected $fillable = ['nombre_medida','fecha_inicio','fecha_termino','direccion','elementos_necesarios','perfil_voluntario','id_usuario_valida','valida','id_catastrofe','id_usuario','id_muro'];

	public function elementos(){
		return $this->hasMany(Elemento::class,'id_recoleccion');
	}

	public function materiales(){
		return $this->hasMany(Material::class,'id_recoleccion');
	}
	public function objetivos(){
		return $this->hasMany(Objetivo_de_ayuda::class,'id_recoleccion');
	}

	public function personas(){
		return $this->hasMany(Persona::class,'id_recoleccion');
	}

	public function catastrofe(){
		return $this->belongsTo(Catastrofe::class,'id_catastrofe');
	}
	public function usuario(){
		return $this->belongsTo(Usuario::class,'id_usuario');
	}
	public function muro(){
		return $this->belongsTo(Muro::class,'id_muro');
	}
}