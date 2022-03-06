<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteVisitante extends Model
{
    use HasFactory;

    protected $table = "docente_visitante";

    protected $fillable = [
            'id',
            'docvi_tipo_documento',
            'docvi_numero_documento',
            'docvi_nombre',
            'docvi_apellido',
            'docvi_entidad_origen',
            'docvi_pais',
            'docvi_ciudad',
            'docvi_fecha_estadia',
            'docvi_cantidad_hora',
            'docvi_cantidad_dia',
            'docvi_cantidad_semana',
            'docvi_cantidad_mes',
            'docvi_cantidad_year',
            'docvi_cantidad_hora',
            'docvi_cantidad_dia',
            'docvi_cantidad_semana',
            'docvi_cantidad_mes',
            'docvi_cantidad_year',
            'docvi_objeto',
            'docvi_actividad_desarrolladas',
            'docvi_year',
            'docvi_periodo',
            'docvi_url_soporte',
    ];

}
