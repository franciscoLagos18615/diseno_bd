<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Historial extends Model{
	protected $table = 'historiales';

	protected $fillable = ['fecha','hora','id_usuario'];

	public function usuario(){
		return $this->belongsTo(Usuario::class,'id_usuario');
	}
}