<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtInternacionalizacionCurriculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_internacionalizacion_curriculo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exincu_year');
            $table->string('exincu_periodo');
            $table->integer('exincu_id_asignatura');
            $table->integer('exincu_id_docente');
            $table->text('ext_uso_idioma');
            $table->text('ext_uso_tic');
            $table->text('ext_competencia_global');
            $table->string('ext_movilidad_estudiante');
            $table->text('ext_otra_actividad');
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
