<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtActividadCulturalRecursoHumano extends Model
{
    use HasFactory;

    protected $table = "ext_actividad_cultural_recurso_humano";

    protected $fillable = [
        'id',
        'extculre_codigo_organizacional',
        'extculre_year',
        'extculre_codigo_actividad',
        'extculre_tipo_documento',
        'extculre_numero_documento',
        'extculre_dedicacion',
    ];
}
