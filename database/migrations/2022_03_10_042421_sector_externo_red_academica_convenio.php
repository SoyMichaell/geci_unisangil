<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectorExternoRedAcademicaConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_sector_externo_red_academia_convenio', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exsered_year');
            $table->string('exsered_periodo');
            $table->string('exsered_ies');
            $table->string('exsered_caracter');
            $table->date('exsered_fecha');
            $table->text('exsered_logros');
            $table->text('exsered_resultados');
            $table->text('exsered_productos');
            $table->string('exsered_funcion');
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
