<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanEstudioAsignaturaHorario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_plan_asignatura_horario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pph_year');
            $table->integer('pph_semestre');
            $table->integer('pph_id_asignatura');
            $table->string('pph_grupo');
            $table->integer('pph_id_docente');
            $table->text('pph_horario');
            $table->string('pph_aula');
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
