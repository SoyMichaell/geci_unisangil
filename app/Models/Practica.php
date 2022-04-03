<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $table = "practica_laboral";

    protected $fillable = [
            'id',
            'prac_razon_social',
            'prac_nit_empresa',
            'prac_pais',
            'prac_departamento',
            'prac_ciudad',
            'prac_direccion',
            'prac_telefono',
            'prac_url_web',
            'prac_correo',
            'prac_area_practica',
            'prac_id_persona',
            'prac_id_rol',
            'prac_cargo',
    ];
}
