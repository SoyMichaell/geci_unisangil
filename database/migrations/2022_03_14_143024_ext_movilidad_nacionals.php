<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtMovilidadNacionals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_movilidad_nacional', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exmona_tipo');
            $table->integer('exmona_rol');
            $table->integer('exmona_id_sede');
            $table->integer('exmona_id_facultad');
            $table->integer('exmona_id_programa');
            $table->integer('exmona_id_persona');
            $table->string('exmona_institucion_proviene');
            $table->integer('exmona_tipo_movilidad');
            $table->string('exmona_descripcion');
            $table->date('exmona_fecha_inicio');
            $table->date('exmona_fecha_final');
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
