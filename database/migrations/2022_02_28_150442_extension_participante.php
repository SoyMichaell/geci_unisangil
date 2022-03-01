<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtensionParticipante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_participante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extpar_tipo_documento', 2);
            $table->string('extpar_numero_documento', 15);
            $table->date('extpar_fecha_expedicion');
            $table->string('extpar_primer_nombre', 100);
            $table->string('extpar_segundo_nombre', 100);
            $table->string('extpar_primer_apellido', 100);
            $table->string('extpar_segundo_apellido', 100);
            $table->integer('extpar_sexo'); //1 m - 2 f
            $table->integer('extpar_estado_civil');
            $table->date('extpar_fecha_nacimiento');
            $table->integer('extpar_id_pais');
            $table->integer('extpar_id_municipio');
            $table->string('extpar_telefono', 12);
            $table->string('extpar_correo_persona', 100);
            $table->string('extpar_correo_institucional', 100);
            $table->string('extpar_direccion', 255);
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
