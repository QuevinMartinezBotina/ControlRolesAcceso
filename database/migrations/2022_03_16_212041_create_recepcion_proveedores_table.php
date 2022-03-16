<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_proveedores', function (Blueprint $table) {
            $table->id();
            $table->String('empresa_transportadora');
            $table->String('empresa_vendedora');
            $table->String('num_placa');
            $table->String('color');
            $table->String('tipo');
            $table->String('num_personas');
            $table->String('num_documento');
            $table->String('nombre');
            $table->String('observaciones');

            $table->bigInteger('id_estado');
            $table->bigInteger('id_documento');

            $table->foreign("id_estado")->references('id')->on("estados")
                ->onUpdate('cascade');

            $table->foreign("id_documento")->references('id')->on("documentos")
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
        Schema::dropIfExists('recepcion_proveedores');
    }
}
