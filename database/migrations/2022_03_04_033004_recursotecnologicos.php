<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recursotecnologicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_recurso_tecnologico', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('sofrete_year');
            $table->string('sofrete_periodo');
            $table->string('sofrete_tipo_recurso');
            $table->integer('sofrete_id_docente');
            $table->integer('sofrete_id_asignatura');
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
