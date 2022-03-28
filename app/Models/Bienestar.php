<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bienestar extends Model
{
    use HasFactory;

    protected $table = "bienestar_institucional";

    protected $fillable = [
        'id',
        'bie_fecha',
        'bie_nombre_actividad',
        'bie_total_participantes',
        'bie_estudiantes',
        'bie_docentes',
        'bie_administrativos',
        'bie_egresados',
        'bie_particulares',
        'bie_codigo_snies',
        'bie_observacion'
    ];

}
