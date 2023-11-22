<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->foreign('tipos_usuarios_id')->references('idc')->on('tipos_usuarios');
			$table->string('refer');
			$table->string('name');
            $table->string('last_name');
            $table->string('username',15)->unique();
            $table->string('email')->unique();
            $table->string('password');
			$table->unsignedInteger('tipos_usuarios_id');
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
