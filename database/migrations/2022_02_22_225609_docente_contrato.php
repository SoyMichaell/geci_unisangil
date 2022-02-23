<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteContrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_contrato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doco_persona_docente');
            $table->string('doco_numero_contrato');
            $table->text('doco_objeto_contrato');
            $table->string('doco_tipo_contrato');
            $table->date('doco_fecha_inicio');
            $table->date('doco_fecha_fin');
            $table->string('doco_rol');
            $table->string('doco_url_soporte');
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
