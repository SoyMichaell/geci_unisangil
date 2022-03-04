<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstudianteReporteGenerals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_reporte_general', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('esture_id_programa');
            $table->integer('esture_year');
            $table->string('esture_periodo');
            $table->integer('esture_inscritos');
            $table->integer('esture_admitidos');
            $table->integer('esture_mat_antiguos');
            $table->integer('esture_mat_primer_semestre');
            $table->integer('esture_mat_total');
            $table->integer('esture_egresado_no_graduado');
            $table->integer('esture_graduados');
            $table->integer('esture_retirados');
            $table->integer('esture_tasa_desercion');
            $table->integer('esture_tasa_desercion_pro');
            $table->integer('esture_porcentaje_termina');
            $table->integer('esture_nro_estudiante_ies_nacional');
            $table->integer('esture_nro_estudiante_ies_internacional');
            $table->integer('esture_vis_nacional');
            $table->integer('esture_vis_internacional');
            
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
