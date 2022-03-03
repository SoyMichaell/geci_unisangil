<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Redes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_academica', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('red_nombre');
            $table->string('red_nombre_contacto');
            $table->string('red_telefono');
            $table->string('red_pais');
            $table->string('red_ciudad');
            $table->string('red_alcance');
            $table->text('red_accion');
            $table->string('red_year');
            $table->integer('red_id_programa');
            $table->text('red_observacion');
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
