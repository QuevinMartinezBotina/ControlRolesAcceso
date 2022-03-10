<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('observaciones')->nullable();
            $table->timestamp('fecha_entrada')->nullable();
            $table->timestamp('fecha_salida')->nullable();
            $table->string('observaciones_equipos')->nullable();
            $table->string('marca')->nullable();
            $table->string('serial')->nullable();
            $table->string('planta_porteria')->nullable();

            $table->bigInteger("id_visita")->unsigned();
            $table->bigInteger("id_estado")->unsigned();
            $table->bigInteger("id_carnet")->unsigned();

            $table->foreign("id_visita")->references('id')->on("visitas")
                ->onUpdate('cascade');

            $table->foreign("id_estado")->references('id')->on("estados")
                ->onUpdate('cascade');

            $table->foreign("id_carnet")->references('id')->on("carnets")
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
        Schema::dropIfExists('recepcion_visitantes');
    }
}
