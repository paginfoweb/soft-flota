<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialchoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialchoferes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('motivo');
            $table->enum('estatus', ['activo','inactivo','amonestado','eventualidad'])->default('eventualidad');
            $table->date('fecha');
            $table->integer('chofer_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
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
        Schema::drop('historialchoferes');
    }
}
