<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstudianteEgresado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_egresado', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('este_id');
            $table->date('este_fecha_finalizacion');
            $table->integer('este_promedio_acumulado');
            $table->string('este_nombre_empresa');
            $table->string('este_area');
            $table->string('este_cargo');
            $table->string('este_sitio_trabajo');
            $table->string('este_tipo_contrato');
            $table->string('este_pais_residencia');
            $table->string('este_ciudad_residencia');
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
