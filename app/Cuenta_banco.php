<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Cuenta_banco extends Model{
	protected $table = 'cuentas_bancos';

	protected $fillable = ['numero_cuenta','banco'´,'tipo_cuenta','rut'];

	public function apoyo_economico(){
		return $this -> hasOne(Apoyo_economico::class,'id_cuenta_banco');
	}

	public function donaciones(){
		return $this->hasMany(Donacion::class,'id_cuenta_banco');
	}

}