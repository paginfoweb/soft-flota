<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('direccion');
            $table->string('telefono');
            $table->string('contacto');
            $table->enum('estatus', ['activo','inactivo'])->default('activo');
            $table->enum('type', ['taller','almacen'])->default('taller');    
            $table->timestamps();
        });

        Schema::create('local_user', function (Blueprint $table) {
            $table->increments('id');   
            $table->integer('local_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('local_id')->references('id')->on('locales');             
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
        Schema::drop('local_user');
        Schema::drop('locales');
    }
}
