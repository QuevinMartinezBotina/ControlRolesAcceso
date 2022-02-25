<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->id();
            $table->String('nom_visitante');
            $table->bigInteger('num_documento');
            $table->bigInteger('telefono');
            $table->String('correo');
            $table->String('nom_empresa');
            $table->String('arl_empresa');
            $table->String('motivo_visita');
            $table->String('observaciones')->nullable();
            $table->timestamp('fecha_programada');
            $table->timestamp('fecha_visita')->nullable();
            $table->String('placa')->nullable();
            $table->String('color')->nullable();
            $table->String('tipo')->nullable();

            /* Llaves foraneas */
            $table->bigInteger("id_documento")->unsigned();
            $table->bigInteger("id_area")->unsigned();
            $table->bigInteger("id_sede")->unsigned();

            $table->foreign("id_documento")->references('id')->on("documentos")
                ->onUpdate('cascade');

            $table->foreign("id_area")->references('id')->on("areas")
                ->onUpdate('cascade');

            $table->foreign("id_sede")->references('id')->on("sedes")
                ->onUpdate('cascade');

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
        Schema::dropIfExists('visitas');
    }
}
