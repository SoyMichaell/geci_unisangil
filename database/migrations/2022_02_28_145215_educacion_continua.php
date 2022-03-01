<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EducacionContinua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_educacion_continua', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extedu_semestre', 4);
            $table->string('extedu_codigo_curso', 20);
            $table->integer('extedu_numero_horas');
            $table->integer('extedu_tipo_curso');
            $table->integer('extedu_valor_curso');
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
