<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EducacionContinuaBeneficiario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_educacion_continua_beneficiario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extedub_year', 4);
            $table->string('extedub_semestre', 2);
            $table->string('extedub_codigo', 30);
            $table->integer('extedub_tipo_beneficio');
            $table->integer('extedub_cantidad'); 
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
