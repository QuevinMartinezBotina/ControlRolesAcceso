<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnets', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->bigInteger('numero');
            $table->bigInteger("id_estado")->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('carnets');
    }
}
