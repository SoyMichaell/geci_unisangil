<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movilidads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movilidad', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('movi_year');
            $table->string('movi_periodo');
            $table->integer('movi_tipo_persona');
            $table->integer('movi_id_persona');
            $table->string('movi_tipo_movilidad');
            $table->text('movi_evento');
            $table->string('movi_pais');
            $table->string('movi_ciudad');
            $table->string('movi_observacion');
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
        //
    }
}
