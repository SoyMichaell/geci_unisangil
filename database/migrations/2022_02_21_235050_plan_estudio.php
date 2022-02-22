<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanEstudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_plan_estudi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pp_id_programa');
            $table->string('pp_nombre');
            $table->integer('pp_creditos');
            $table->integer('pp_asignaturas');
            $table->string('pp_estado');
            
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
