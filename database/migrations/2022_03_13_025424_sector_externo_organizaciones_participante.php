<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectorExternoOrganizacionesParticipante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_sector_externo_organizaciones_part', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exseorpar_id_organizacion');
            $table->string('exseorpar_numero_identificacion');
            $table->string('exseorpar_nombre_completo');
            $table->string('exseorpar_rol');
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
