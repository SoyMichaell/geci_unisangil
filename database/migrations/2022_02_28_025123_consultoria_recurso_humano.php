<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConsultoriaRecursoHumano extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_consultoria_recurso_humano', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extcor_year', 4);
            $table->string('extcor_semestre');
            $table->string('extcor_codigo_consultoria', 15);
            $table->string('extcor_tipo_documento', 2);
            $table->string('extcor_numero_documento', 30);
            $table->integer('extcor_id_nivel_estudio');
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
