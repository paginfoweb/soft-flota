<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('placa')->unique();
            $table->string('ano');
            $table->string('chasis')->unique();
            $table->string('serial')->unique();
            $table->string('cupo')->unique();
            $table->date('fechacupo');
            $table->string('poliza');
            $table->date('polizacompra');
            $table->date('polizavence');
            $table->date('revision');
            $table->string('gps');
            $table->string('radio');
            $table->enum('estatus', ['activo','inactivo'])->default('activo');
            $table->string('financiado');
            $table->string('cuotasfinanciamiento');
            $table->string('cobrar');
            $table->integer('tarifa_id')->unsigned();
            $table->integer('propietaria_id')->unsigned();
            $table->integer('modelo_id')->unsigned();
            $table->foreign('tarifa_id')->references('id')->on('tarifas');
            $table->foreign('propietaria_id')->references('id')->on('propietarias');
            $table->foreign('modelo_id')->references('id')->on('modelos');
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
        Schema::drop('vehiculos');
    }
}
