<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistroFotografico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_registro_fotografico_inter', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('extrefoin_year');
            $table->string('extrefoin_periodo');
            $table->string('extrefoin_tipo_actividad');
            $table->string('extrefoin_actividad');
            $table->string('extrefoin_ente_organizador');
            $table->date('extrefoin_fecha');
            $table->string('extrefoin_tipo_evento');
            $table->string('extrefoin_tipo_modalidad');
            $table->text('extrefoin_soporte');
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
