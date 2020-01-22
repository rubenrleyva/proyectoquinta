<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_pregunta');
            $table->string('respuesta')->nullable();
            $table->boolean('correcta')->nullable();
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
        Schema::dropIfExists('respuesta_tests');
    }
}
