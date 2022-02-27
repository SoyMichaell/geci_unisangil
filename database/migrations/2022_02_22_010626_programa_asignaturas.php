<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramaAsignaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_plan_estudio_asignatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asig_codigo');
            $table->string('asig_nombre');
            $table->integer('asig_id_plan_estudio');
            $table->integer('asig_no_creditos');
            $table->integer('asig_no_semanales');
            $table->integer('asig_no_semestre');
            $table->integer('asig_id_programa');
            $table->integer('asig_id_sede');
            $table->string('asig_estado');
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
