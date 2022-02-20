<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Docente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona_docente');
            $table->string('ciudad_procedencia');
            $table->string('correo_personal');
            $table->string('dedicacion');
            $table->string('tipo_contratacion');
            $table->date('fecha_vinculacion');
            $table->string('institucion_esp');
            $table->string('certificado_esp');
            $table->string('institucion_dip');
            $table->string('certificado_dip');
            $table->string('titulo_pregrado');
            $table->string('institucion_pre');
            $table->string('titulo_especializacion');
            $table->string('institucion_espe');
            $table->string('titulo_maestria');
            $table->string('institucion_mae');
            $table->string('titulo_doctorado');
            $table->string('institucion_doc');
            $table->string('area_conocimiento');
            $table->string('maximo_nivel_formacion');
            $table->string('titulo_maximo_nivel');
            $table->string('institucion_maximo_nivel');
            $table->string('modalidad_programa');
            $table->string('eps');
            $table->string('riesgo');
            $table->string('caja_compensacion');
            $table->string('pension');
            $table->string('estado');
            $table->string('soporte_hoja_vida');
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
