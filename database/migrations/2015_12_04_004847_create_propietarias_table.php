<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropietariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruc');
            $table->string('name');
            $table->text('direccion');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('contacto');
            $table->enum('estatus', ['activo','inactivo'])->default('activo');
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
        Schema::drop('propietarias');
    }
}
