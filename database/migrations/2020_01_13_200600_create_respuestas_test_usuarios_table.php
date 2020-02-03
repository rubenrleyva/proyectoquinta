<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTestUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_test_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('n_test')->nullable();
            $table->integer('n_votacion')->default(0);
            $table->integer('id_pregunta')->nullable();
            $table->integer('id_respuesta')->nullable();
            $table->integer('id_usuario')->nullable();
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
        Schema::dropIfExists('respuestas_test_usuarios');
    }
}
