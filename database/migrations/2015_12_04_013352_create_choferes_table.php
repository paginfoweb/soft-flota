<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('ci')->unique();
            $table->string('edad');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('telefono2');
            $table->enum('estadocivil', ['casado','soltero','divolciado','viudo'])->default('soltero');
            $table->enum('estatus', ['activo','inactivo'])->default('activo');
            $table->date('fechaingreso');
            $table->date('vencelicencia');
            $table->date('fechanacimiento');
            $table->text('direccion');
            $table->string('contrato');
            $table->date('vencecontrato');
            $table->string('contacto');
            $table->string('parentesco');
            $table->string('telefonocontacto');
            $table->integer('provincia_id')->unsigned();
            $table->integer('licencia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('licencia_id')->references('id')->on('licencias');
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
        Schema::drop('choferes');
    }
}
