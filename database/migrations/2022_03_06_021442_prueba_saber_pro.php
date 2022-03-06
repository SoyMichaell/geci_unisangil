<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PruebaSaberPro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_saber_pro', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prsapr_year');
            $table->string('prsapr_periodo');
            $table->integer('prsapr_id_estudiante');
            $table->string('prsapr_numero_registro');
            $table->string('prsapr_grupo_referencia');
            $table->integer('prsapr_puntaje_global');
            $table->integer('prsapr_percentil_nacional');
            $table->integer('prsapr_percentil_grupo');
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
