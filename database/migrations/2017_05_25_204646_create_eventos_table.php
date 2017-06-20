<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_usuario_valida')->unsigned();
            $table->string('nombre_medida');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->decimal('avance');
            $table->string('direccion');
            $table->time('hora');
            $table->integer('meta');
            $table->integer('recaudacion_actual');
            $table->boolean('valida');


            $table->foreign('id_usuario_valida')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_catastrofe')->unsigned();
            $table->foreign('id_catastrofe')->references('id')->on('catastrofes')->onDelete('cascade');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_muro')->unsigned();
            $table->foreign('id_muro')->references('id')->on('muros')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}