<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteAsignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_asignatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doa_id_docente');
            $table->string('doa_year');
            $table->integer('doa_semestre');
            $table->integer('doa_id_asignatura');
            $table->string('doa_grupo');
            $table->integer('doa_id_municipio');
            $table->string('doa_unidad');
            $table->integer('doa_horas_semana_doc');
            $table->integer('doa_horas_semana_inv');
            $table->integer('doa_horas_extension');
            $table->integer('doa_horas_admin');
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
