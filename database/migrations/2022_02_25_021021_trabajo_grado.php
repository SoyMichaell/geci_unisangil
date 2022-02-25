<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrabajoGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_grado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tra_codigo_proyecto');
            $table->string('tra_id_estudiante');
            $table->date('tra_fecha_inicio');
            $table->integer('tra_modalidad_grado');
            $table->integer('tra_id_director');
            $table->integer('tra_id_codirector');
            $table->integer('tra_id_externo');
            $table->string('tra_estado_propuesta');
            $table->string('tra_estado_proyecto');
            $table->integer('tra_id_jurado1');
            $table->integer('tra_id_jurado2');
            $table->string('tra_numero_acta_sustentacion');
            $table->string('tra_numero_acta_grado');
            $table->date('tra_fecha_finalizacion');
            $table->text('tra_observacion');
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
