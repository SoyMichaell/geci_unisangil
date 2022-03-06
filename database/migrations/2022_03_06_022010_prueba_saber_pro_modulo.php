<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PruebaSaberProModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_saber_pro_modulo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prsaprmo_id_estudiante');
            $table->integer('prsaprmo_id_modulo');
            $table->integer('prsaprmo_puntaje');
            $table->string('prsaprmo_nivel_desempeno');
            $table->integer('prsaprmo_percentil_nacional');
            $table->integer('prsaprmo_percentil_grupo');
            $table->string('prsaprmo_novedad');
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
