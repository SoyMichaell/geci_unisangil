<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtMovilidadIntersedess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_movilidad_intersede', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exmoin_tipo');
            $table->integer('exmoin_rol');
            $table->integer('exmoin_id_sede_or');
            $table->integer('exmoin_id_facultad_or');
            $table->integer('exmoin_id_programa_or');
            $table->integer('exmoin_id_persona');
            $table->integer('exmoin_id_sede_des');
            $table->integer('exmoin_id_facultad_des');
            $table->integer('exmoin_id_programa_des');
            $table->integer('exmoin_tipo_movilidad');
            $table->string('exmoin_descripcion');
            $table->date('exmoin_fecha_inicio');
            $table->date('exmoin_fecha_final');
            
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
