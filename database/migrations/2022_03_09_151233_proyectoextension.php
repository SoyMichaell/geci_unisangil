<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proyectoextension extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_proyecto_extension', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('extprex_year');
            $table->integer('extprex_semestre');
            $table->string('extprex_codigo_organizacional');
            $table->string('extprex_codigo_pr');
            $table->string('extprex_nombre_pr');
            $table->text('extprex_descripcion_pr');
            $table->integer('extprex_valor_pr');
            $table->integer('extprex_id_area_extension');
            $table->date('extprex_fecha_inicio');
            $table->date('extprex_fecha_final');
            $table->string('extprex_nombre_contacto');
            $table->string('extprex_apellido_contacto');
            $table->string('extprex_telefono_contacto');
            $table->string('extprex_correo_contacto');
            $table->integer('extprex_id_area_trabajo');
            $table->integer('extprex_id_ciclo_vital');
            $table->integer('extprex_id_entidad_nacional');
            $table->integer('extprex_id_fuente_nacional');
            $table->integer('extprex_valor_financiacion_nac');
            $table->integer('extprex_id_fuente_internacional');
            $table->integer('extprex_id_pais');
            $table->string('extprex_nombre_institucion_inter');
            $table->integer('extprex_valor_financiacion_inter');
            $table->integer('extprex_id_pais_otra_entidad');
            $table->integer('extprex_id_sector_otra_entidad');
            $table->integer('extprex_nombre_otra_entidad');
            $table->integer('extprex_id_poblacion_condicion');
            $table->integer('extprex_cantidad_condicion');
            $table->integer('extprex_id_poblacion_grupo');
            $table->integer('extprex_cantidad_grupo');
            $table->integer('extprex_soporte');
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
