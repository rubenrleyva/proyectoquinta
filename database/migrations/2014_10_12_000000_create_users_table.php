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
            $table->string('name')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('dni')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('localidad')->nullable();
            $table->string('codigopostal')->nullable();
            $table->string('matricula')->nullable();
            $table->integer('clasespracticas')->nullable();
            $table->integer('teorico')->nullable();
            $table->integer('practico')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('tipousuario');
            $table->string('password');
            $table->string('comentario')->nullable();
            $table->integer('id_foto')->nullable();
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
