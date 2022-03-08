<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultadoPruebaModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_resultado_programa_modulo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prurepromo_id_prueba_programa');
            $table->integer('prureprono_id_modulo');
            $table->integer('prureprono_puntaje_programa');
            $table->integer('prureprono_puntaje_institucion');
            $table->integer('prureprono_puntaje_sede');
            $table->integer('prureprono_puntaje_grupo_referencia');
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
