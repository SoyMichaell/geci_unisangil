<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = "docente";

    protected $fillable = [
        'id',
        'id_persona_docente',
        'ciudad_procedencia',
        'correo_personal',
        'dedicacion',
        'tipo_contratacion',
        'fecha_vinculacion',
        'institucion_esp',
        'certificado_esp',
        'institucion_dip',
        'certificado_esp',
        'titulo_pregrado',
        ''
    ];

}
