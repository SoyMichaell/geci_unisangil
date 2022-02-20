<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Programa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_estado');
            $table->integer('pro_departamento');
            $table->integer('pro_municipio');
            $table->integer('pro_facultad');
            $table->string('pro_nombre');
            $table->string('pro_titulo');
            $table->integer('pro_codigosnies');
            $table->string('pro_resolucion');
            $table->date('pro_fecha_ult');
            $table->date('pro_fecha_prox');
            $table->integer('pro_nivel_formacion');
            $table->string('pro_programa_ciclo');
            $table->integer('pro_metodologia');
            $table->integer('pro_duraccion');
            $table->string('pro_periodo_admision');
            $table->string('pro_tipo_norma');
            $table->integer('pro_id_director');
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
