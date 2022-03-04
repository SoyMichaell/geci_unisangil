<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteEgresado extends Model
{
    use HasFactory;

    protected $table = "estudiante_egresado";

    protected $fillable = [
            'id',
            'este_id_estudiante',
            'este_fecha_finalizacion',
            'este_promedio_acumulado',
            'este_nombre_empresa',
            'este_area',
            'este_cargo',
            'este_sitio_trabajo',
            'este_tipo_contrato',
            'este_pais_residencia',
            'este_ciudad_residencia',
    ];

}
