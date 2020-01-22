<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_test');
            $table->string('tipo')->nullable();
            $table->string('pregunta')->nullable();
            $table->integer('id_foto')->nullable();
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
        Schema::dropIfExists('pregunta_tests');
    }
}
