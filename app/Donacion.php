<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Donacion extends Model{
}
	protected $table='donaciones';

	protected $fillable = ['fecha','hora','monto','id_persona','id_cuenta_banco'];

	public function cuenta_banco(){
		return $this->belongsTo(Cuenta_banco::class,'id_cuenta_banco');
	}

	public function persona(){
		return $this->belongsTo(Persona::class,'id_persona');
	}