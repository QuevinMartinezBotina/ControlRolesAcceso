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
            $table->engine = "InnoDB";
            $table->id();
            $table->String('empresa_transportadora')->nullable();
            $table->String('empresa_vendedora')->nullable();
            $table->String('num_placa')->nullable();
            $table->String('color')->nullable();
            $table->String('tipo')->nullable();
            $table->integer('num_personas')->nullable();
            $table->integer('num_documento')->nullable();
            $table->String('nombre')->nullable();
            $table->String('observaciones')->nullable();
            $table->timestamp('fecha_entrada')->nullable();
            $table->timestamp('fecha_salida')->nullable();

            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_documento')->unsigned();

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
