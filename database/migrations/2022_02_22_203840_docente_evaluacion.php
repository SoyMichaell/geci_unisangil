<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteEvaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doe_persona_docente');
            $table->string('doe_year');
            $table->integer('doe_semestre');
            $table->double('doe_cal_auto');
            $table->double('doe_cal_hete');
            $table->double('doe_cal_coe');
            $table->double('doe_total_pro');
            $table->text('doe_observacion');
            $table->string('doe_url_evaluacion');
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
