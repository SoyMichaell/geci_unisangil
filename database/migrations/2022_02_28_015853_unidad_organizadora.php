<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnidadOrganizadora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {-
        Schema::create('ext_actividad_cultural_recurso_humano', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extculre_codigo_organizacional',30);
            $table->string('extculre_year', 4);
            $table->string('extculre_codigo_actividad', 15);
            $table->string('extculre_tipo_documento', 2);
            $table->string('extculre_numero_documento', 30);
            $table->string('extculre_dedicacion', 30);
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
