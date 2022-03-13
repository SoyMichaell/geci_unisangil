<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectorExternoOrganizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_sector_externo_organizaciones', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exseor_year');
            $table->string('exseor_periodo');
            $table->string('exseor_tipo');
            $table->string('exseor_nombre');
            $table->string('exseor_caracter');
            $table->text('exseor_actividades');
            $table->text('exseor_logros');
            $table->text('exseor_resultados');
            $table->text('exseor_productos');
            $table->string('exseor_funcion');
            $table->integer('exseor_participantes');
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
