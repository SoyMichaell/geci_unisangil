<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtActividadCultural extends Model
{
    use HasFactory;

    protected $table = "ext_actividad_cultural";

    protected $fillable = [
            'id',
            'extcul_year',
            'extcul_semestre',
            'extcul_codigo_unidad_org', 
            'extcul_codigo_actividad', 
            'extcul_descripcion_actividad',
            'extcul_tipo_actividad',
            'extcul_fecha_inicio',
            'extcul_fecha_fin',
            'extcul_fuente_nacional',
            'extcul_valor_financiacion_nac',
            'extcul_nombre_institucion',
            'extcul_fuente_internacional',
            'extcul_pais_financiador',
            'extcul_valor_internacional',
    ];

}
