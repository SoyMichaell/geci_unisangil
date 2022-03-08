<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laboratorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorio', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('lab_nombre');
            $table->string('lab_ubicacion');
            $table->string('lab_fecha');
            $table->integer('lab_id_docente');
            $table->string('lab_finalidad');
            $table->integer('lab_id_facultad');
            $table->integer('lab_id_programa');
            $table->integer('lab_id_practicante');
            $table->string('lab_nombre_practica');
            $table->integer('lab_cantidad_estudiante');
            $table->string('lab_id_software');
            $table->text('lab_material');
            $table->text('lab_observaciones');
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
