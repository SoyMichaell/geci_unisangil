<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteParticipantex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_participante', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('dop_id_docente');
            $table->date('dop_fecha_expedicion');
            $table->integer('dop_sexo_biologico');
            $table->integer('dop_estado_civil');
            $table->integer('dop_id_pais');
            $table->integer('dop_id_municipio');
            $table->string('dop_correo_institucional');
            $table->text('dop_direccion');
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
