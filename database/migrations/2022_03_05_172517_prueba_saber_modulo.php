<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PruebaSaberModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_saber_modulo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prsamo_id_estudiante');
            $table->integer('prsamo_id_modulo');
            $table->double('prsamo_puntaje');
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
