<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('usuario_ad')->nullable();
            $table->timestamp('fecha')->required();
            $table->string('cargo')->required();
            $table->string('dependencia')->required();
            $table->string('dispo_afectado')->required();
            $table->string('email')->required()->unique();
            $table->string('cedula')->required()->unique();
            $table->string('numero_contacto')->required();
            $table->string('estado');
            $table->string('falla_detectada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
