<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramaAsignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_asignatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pas_id_facultad');
            $table->integer('pas_id_municipio');
            $table->integer('pas_id_programa');
            $table->integer('pas_id_programa_plan');
            $table->string('pas_nombre');
            $table->integer('pas_creditos');
            $table->integer('pas_horas_semana');
            $table->integer('pas_horas_semestre');
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
