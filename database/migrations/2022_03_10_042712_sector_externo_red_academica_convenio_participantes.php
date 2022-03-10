<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectorExternoRedAcademicaConvenioParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_sector_externo_red_academia_convenio_participantes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exseredpar_id_red_academica');
            $table->string('exseredpar_nombre_participante');
            $table->string('exseredpar_rol_participante');
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
