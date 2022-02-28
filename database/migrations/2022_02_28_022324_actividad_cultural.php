<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActividadCultural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_actividad_cultural', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extcul_year', 4);
            $table->string('extcul_semestre');
            $table->string('extcul_codigo_unidad_org', 30);
            $table->string('extcul_codigo_actividad', 15);
            $table->string('extcul_descripcion_actividad', 200);
            $table->integer('extul_tipo_actividad', 2);
            $table->date('extcul_fecha_inicio');
            $table->date('extcul_fecha_fin');
            $table->integer('extcul_fuente_nacional', 2);
            $table->integer('extcul_valor_financiacion_nac', 10);
            $table->string('extcul_nombre_institucion', 200);
            $table->integer('extcul_fuente_internacional', 2);
            $table->integer('extcul_pais_financiador', 3);
            $table->integer('extcul_valor_internacional', 10);
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
