<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Elemento extends Model{
	protected $table = 'elementos';

	protected $fillable = ['nombre','cantidad','id_recoleccion'];

	public function recoleccion(){
		return $this->belongsTo(Recoleccion::class,'id_recoleccion');
	}

}