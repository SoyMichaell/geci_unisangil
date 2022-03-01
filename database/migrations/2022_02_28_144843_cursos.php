<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extcurso_codigo', 20);
            $table->string('extcurso_nombre', 255);
            $table->integer('extcurso_id_cine');
            $table->string('extcurso_extension', 1);
            $table->string('extcurso_estado', 1);
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
