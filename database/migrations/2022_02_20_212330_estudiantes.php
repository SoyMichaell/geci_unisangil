<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estudiantes extends Migration
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
            $table->string('estu_programa');
            $table->string('estu_tipo_documento');
            $table->string('estu_numero_documento');
            $table->string('estu_nombre');
            $table->string('estu_apellido');
            $table->string('estu_telefono1');
            $table->string('estu_telefono2');
            $table->string('estu_direccion');
            $table->string('estu_correo');
            $table->string('estu_estrato');
            $table->string('estu_departamento');
            $table->string('estu_municipio');
            $table->date('estu_fecha_nacimiento');
            $table->string('estu_ingreso');
            $table->string('estu_ult_periodo');
            $table->string('estu_semestre');
            $table->string('estu_financiamiento');
            $table->string('estu_beca');
            $table->string('estu_estado');
            $table->string('estu_matricula');
            $table->integer('estu_pga');
            $table->string('estu_grado');
            $table->string('estu_reconocimiento');
            $table->string('estu_egresado');
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
