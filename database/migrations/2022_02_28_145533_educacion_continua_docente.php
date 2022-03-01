<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EducacionContinuaDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_educacion_continua_docente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extedud_year', 4);
            $table->string('extedud_semestre', 2);
            $table->string('extedud_codigo_curso', 20);
            $table->string('extedud_tipo_documento', 3);
            $table->string('extedud_numero_documento', 30);
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
