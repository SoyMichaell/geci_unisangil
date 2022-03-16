<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Extmovilidadinternacionals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_movilidad_internacional', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('exmointer_tipo');
            $table->string('exmointer_rol');
            $table->integer('exmointer_id_sede_or');
            $table->integer('exmointer_id_facultad_or');
            $table->integer('exmointer_id_programa_or');
            $table->integer('exmointer_id_persona');
            $table->string('exmointer_pais_des');
            $table->string('exmointer_ciudad_des');
            $table->string('exmointer_institucion_nombre');
            $table->integer('exmointer_tipo_movilidad');
            $table->string('exmointer_descripcion');
            $table->date('exmointer_fecha_inicio');
            $table->date('exmointer_fecha_final');
            
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
