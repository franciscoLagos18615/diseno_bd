<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model{
	protected $table = 'personas';

	protected $fillable = ['run','nombre','apellido_paterno','apellido_materno','id_recoleccion','id_apoyo','id_evento','id_voluntariado'];

	public function donaciones(){
		return $this->HasMany(Donacion::class,'id_persona');
	}

	public function evento(){
		return $this->belongsTo(Evento::class,'id_evento');
	}
	public function recoleccion(){
		return $this->belongsTo(Recoleccion::class,'id_recoleccion');
	}
	public function apoyo_economico(){
		return $this->belongsTo(Apoyo_economico::class,'id_apoyo');
	}
	public function voluntariado(){
		return $this->belongsTo(Voluntariado::class,'id_voluntariado');
	}
}
