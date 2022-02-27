<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Software extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sof_tipo');
            $table->string('sof_desarrollador');
            $table->string('sof_version');
            $table->string('sof_no_licencia');
            $table->string('sof_year_ad_licencia');
            $table->string('sof_year_ve_licencia');
            $table->integer('sof_asignatura');
            $table->integer('sof_cantidad');
            $table->integer('sof_id_programa');
            $table->double('sof_valor_unitario');
            $table->double('sof_valor_total');
            $table->date('sof_fecha_actualizar');
            $table->date('sof_fecha_instalacion');
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
