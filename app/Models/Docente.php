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
        'certificado_dip',
        'titulo_pregrado',
        'institucion_pre',
        'titulo_especializacion',
        'institucion_espe',
        'titulo_maestria',
        'institucion_mae',
        'titulo_doctorado',
        'institucion_doc',
        'area_conocimiento',
        'maximo_nivel_formacion',
        'titulo_maximo_nivel',
        'institucion_maximo_nivel',
        'modalidad_programa',
        'eps',
        'riesgo',
        'caja_compensacion',
        'pension',
        'banco',
        'no_cuenta',
        'estado',
        'soporte_hoja_vida',
        'id_proceso'
    ];

}
