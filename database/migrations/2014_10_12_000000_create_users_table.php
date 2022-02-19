<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('per_tipo_documento');
            $table->string('per_numero_documento');
            $table->string('per_nombre');
            $table->string('per_apellido');
            $table->string('per_correo')->unique();
            $table->string('per_contrasena');
            $table->string('per_telefono');
            $table->string('per_departamento');
            $table->string('per_ciudad');
            $table->string('per_tipo_usuario');
            $table->string('per_id_estado');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
