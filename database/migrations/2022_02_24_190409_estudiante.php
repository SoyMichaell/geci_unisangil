<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estu_programa');
            $table->integer('estu_programa_plan');
            $table->string('estu_tipo_documento');
            $table->string('estu_numero_documento');
            $table->string('estu_nombre');
            $table->string('estu_apellido');
            $table->string('estu_telefono1');
            $table->string('estu_telefono2');
            $table->string('estu_direccion');
            $table->string('estu_correo');
            $table->string('estu_estrato');
            $table->integer('estu_departamento');
            $table->integer('estu_ciudad');
            $table->date('estu_ingreso');
            $table->string('estu_ult_matricula');
            $table->integer('estu_semestre');
            $table->string('estu_financiamiento');
            $table->string('estu_entidad');
            $table->string('estu_estado');
            $table->string('estu_matricula');
            $table->double('estu_pga');
            $table->date('estu_fecha_grado');
            $table->integer('estu_reconocimiento');
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
