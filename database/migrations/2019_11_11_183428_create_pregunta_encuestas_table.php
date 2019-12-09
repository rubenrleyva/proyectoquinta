<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_encuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_encuesta');
            $table->integer('numero');
            $table->integer('tipo')->nullable();
            $table->string('pregunta')->nullable();
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
        Schema::dropIfExists('pregunta_encuestas');
    }
}
