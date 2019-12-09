<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('domicilio');
            $table->date('fechanacimiento');
            $table->string('telefono');
            $table->string('localidad');
            $table->string('codigopostal');
            $table->string('matricula')->nullable();
            $table->integer('clasespracticas')->nullable();
            $table->integer('teorico')->nullable();
            $table->integer('practico')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('tipousuario');
            $table->string('password');
            $table->string('trabajo')->nullable();
            $table->string('comentario')->nullable();
            $table->unsignedInteger('foto_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
