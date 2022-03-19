<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = "convenio";

    protected $fillable = [
        'id',
        'con_numero',
        'con_alcance',
        'con_tipo',
        'con_institucion',
        'con_nit',
        'con_direccion',
        'con_pais',
        'con_ciudad',
        'con_contacto',
        'con_correo',
        'con_telefono',
        'con_objeto',
        'con_logro_resultado',
        'con_vigencia',
        'con_programa_beneficiado',
        'con_actividad_year_programa',
        'con_fecha_inicio',
        'con_fecha_final',
        'con_observacion'
    ];

}
