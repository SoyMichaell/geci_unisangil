<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Practicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica_laboral', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prac_year');
            $table->string('prac_razon_social', 255);
            $table->string('prac_nit_empresa');
            $table->string('prac_pais');
            $table->string('prac_departamento');
            $table->string('prac_ciudad');
            $table->string('prac_direccion');
            $table->string('prac_telefono', 10);
            $table->string('prac_url_web');
            $table->string('prac_correo');
            $table->string('prac_area_practica');
            $table->integer('prac_id_estudiante');
            $table->integer('prac_id_docente');
            $table->string('prac_cargo');
            $table->string('prac_telefono_per');
            $table->string('prac_correo_per');
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
