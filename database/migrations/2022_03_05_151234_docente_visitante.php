<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteVisitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_visitante', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('docvi_tipo_documento');
            $table->string('docvi_numero_documento');
            $table->string('docvi_nombre');
            $table->string('docvi_apellido');
            $table->string('docvi_entidad_origen');
            $table->string('docvi_pais');
            $table->string('docvi_ciudad');
            $table->date('docvi_fecha_estadia');
            $table->double('docvi_cantidad_hora');
            $table->double('docvi_cantidad_dia');
            $table->double('docvi_cantidad_semana');
            $table->double('docvi_cantidad_mes');
            $table->double('docvi_cantidad_year');
            $table->text('docvi_objeto');
            $table->text('docvi_actividad_desarrolladas');
            $table->integer('docvi_year');
            $table->string('docvi_periodo');
            $table->string('docvi_url_soporte');
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
