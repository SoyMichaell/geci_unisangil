<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultadoPrueba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_resultado_programa', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prurepro_id_programa');
            $table->integer('prurepro_global_programa');
            $table->integer('prurepro_global_grupo_referencia');
            $table->integer('prurepro_global_institucion');
            $table->integer('prurepro_global_sede');
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
