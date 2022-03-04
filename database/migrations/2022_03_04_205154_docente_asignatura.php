<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenteAsignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_asignatura', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('docasi_id_docente');
            $table->integer('docasi_numero_hora_docencia');
            $table->integer('docasi_numero_hora_investigacion');
            $table->integer('docasi_numero_hora_extension');
            $table->integer('docasi_numero_hora_administrativas');
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
