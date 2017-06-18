<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Material extends Model{
	protected $table = 'materiales';

	protected $fillable = ['nombre','cantidad','id_recoleccion','id_apoyo','id_evento','id_voluntariado'];

	public function recoleccion(){
		return $this->belongsTo(Recoleccion::class,'id_recoleccion');
	}

	public function apoyo_economico(){
		return $this->belongsTo(Apoyo_economico::class,'id_apoyo');
	}

	public function evento(){
		return $this->belongsTo(Evento::class,'id_evento');
	}

	public function voluntariado(){
		return $this->belongsTo(Voluntariado::class,'id_voluntariado');
	}
}