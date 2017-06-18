<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Objetivo_de_ayuda extends Model{
	protected $table = 'objetivos_de_ayuda';

	protected $fillable = ['descripcion','id_recoleccion','id_apoyo','id_evento','id_voluntariado'];

	public function apoyo_economico(){
		return $this->belongsTo(Apoyo_economico::class,'id_apoyo');
	}

	public function recoleccion(){
		return $this->belongsTo(Recoleccion::class,'id_recoleccion');
	}

	public function voluntariado(){
		return $this->belongsTo(Voluntariado::class,'id_voluntariado');
	}

	public function evento(){
		return $this->belongsTo(Evento::class,'id_evento');
	}
}