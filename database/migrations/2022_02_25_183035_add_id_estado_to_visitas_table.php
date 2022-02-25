<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEstadoToVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitas', function (Blueprint $table) {
            $table->bigInteger("id_estado")->unsigned()->nullable();

            $table->foreign("id_estado")->references('id')->on("estados")
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitas', function (Blueprint $table) {
            //
        });
    }
}
