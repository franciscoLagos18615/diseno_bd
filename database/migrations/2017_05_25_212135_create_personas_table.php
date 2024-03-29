<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('run');
            $table->string('nombre',20);
            $table->string('apellido_paterno',20);
            $table->string('apellido_materno',20);

            $table->integer('id_recoleccion')->unsigned();
            $table->foreign('id_recoleccion')->references('id')->on('recolecciones')->onDelete('cascade');

            $table->integer('id_apoyo');
            $table->foreign('id_apoyo')->references('id')->on('apoyos_economicos')->onDelete('cascade');

            $table->integer('id_evento');
            $table->foreign('id_evento')->references('id')->on('eventos')->onDelete('cascade');

            $table->integer('id_voluntariado');
            $table->foreign('id_voluntariado')->references('id')->on('voluntariados')->onDelete('cascade');
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
        Schema::dropIfExists('personas');
    }
}

