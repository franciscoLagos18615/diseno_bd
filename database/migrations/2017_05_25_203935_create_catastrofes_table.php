<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatastrofesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catastrofes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',50);
            $table->string('region',20);
            $table->string('comuna',20);

            $table->integer('id_usuario')->unsigned();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('catastrofes');
    }
}

