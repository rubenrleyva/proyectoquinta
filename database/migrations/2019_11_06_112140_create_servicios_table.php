<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_servicio');
            $table->string('nombre_servicio');
            $table->string('descripcion');
            $table->string('texto1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('texto3')->nullable();
            $table->string('texto4')->nullable();
            $table->string('texto5')->nullable();
            $table->string('texto6')->nullable();
            $table->string('texto7')->nullable();
            $table->string('texto8')->nullable();
            $table->integer('clases');
            $table->float('precio');
            $table->float('precioiva');
            //$table->float('precioferta')->nullable();
            $table->integer('oferta');
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
        Schema::dropIfExists('servicios');
    }
}
