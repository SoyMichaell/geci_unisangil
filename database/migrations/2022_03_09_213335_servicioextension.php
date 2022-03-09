<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servicioextension extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_servicio_extension', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('extseex_year');
            $table->integer('extseex_semestre');
            $table->string('extseex_codigo_organizacional');
            $table->string('extseex_codigo_ser');
            $table->string('extseex_nombre_ser');
            $table->text('extseex_descripcion_ser');
            $table->integer('extseex_valor_ser');
            $table->integer('extseex_id_area_extension');
            $table->date('extseex_fecha_inicio');
            $table->date('extseex_fecha_final');
            $table->string('extseex_nombre_contacto');
            $table->string('extseex_apellido_contacto');
            $table->string('extseex_telefono_contacto');
            $table->string('extseex_correo_contacto');
            $table->string('extseex_costo');
            $table->text('extseex_criterio_elegibilidad');
            $table->integer('extseex_id_area_trabajo');
            $table->integer('extseex_id_ciclo_vital');
            $table->integer('extseex_id_entidad_nacional');
            $table->integer('extseex_id_fuente_nacional');
            $table->integer('extseex_valor_financiacion_nac');
            $table->integer('extseex_id_fuente_internacional');
            $table->integer('extseex_id_pais');
            $table->string('extseex_nombre_institucion_inter');
            $table->integer('extseex_valor_financiacion_inter');
            $table->integer('extseex_id_pais_otra_entidad');
            $table->integer('extseex_id_sector_otra_entidad');
            $table->integer('extseex_nombre_otra_entidad');
            $table->integer('extseex_id_poblacion_condicion');
            $table->integer('extseex_cantidad_condicion');
            $table->integer('extseex_id_poblacion_grupo');
            $table->integer('extseex_cantidad_grupo');
            $table->integer('extseex_soporte');
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
