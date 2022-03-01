<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consultoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_consultoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extcon_year', 4);
            $table->string('extcon_semestre');
            $table->string('extcon_codigo_consultoria', 15);
            $table->string('extcon_descripcion', 200);
            $table->integer('extcon_id_cine_campo');
            $table->string('extcon_nombre_entidad', 100);
            $table->integer('ext_sector_consultoria');
            $table->integer('extcon_valor');
            $table->date('extcon_fecha_inicio');
            $table->date('extcon_fecha_fin');
            $table->integer('extcon_fuente_nacional');
            $table->integer('extcon_valor_nacional');
            $table->string('extcon_nombre_institucion', 100);
            $table->integer('extcon_fuente_internacional');
            $table->string('extcon_pais');
            $table->integer('extcon_valor_internacional');
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
