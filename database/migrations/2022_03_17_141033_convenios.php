<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Convenios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->primary();
            $table->string('con_nombre');
            $table->string('con_pais');
            $table->date('con_fecha_inicio');
            $table->date('con_fecha_final');
            $table->date('con_renovacion');
            $table->text('con_tipo_estado');
            $table->text('con_posibilidad_oferta');
            $table->text('con_especifico');
            $table->text('con_contacto_universidad_ext');
            $table->integer('con_id_programa_interesados');
            $table->text('con_productos_deseados');
            $table->text('con_tipo_estado');
            $table->integer('con_id_programa_activos');
            $table->integer('con_id_persona_responsable');
            $table->integer('con_id_persona_programa');
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
