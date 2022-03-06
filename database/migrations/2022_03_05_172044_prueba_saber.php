<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PruebaSaber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_saber', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('prueba_saber_year');
            $table->string('prueba_saber_periodo');
            $table->integer('prueba_saber_id_estudiante');
            $table->double('prueba_saber_puntaje_global');
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
