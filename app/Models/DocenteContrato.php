<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteContrato extends Model
{
    use HasFactory;

    protected $table = "docente_contrato";

    protected $fillable = [
        'id',
        'doco_persona_docente',
        'doco_numero_contrato',
        'doco_objeto_contrato',
        'doco_tipo_contrato',
        'doco_fecha_inicio',
        'doco_fecha_fin',
        'doco_rol',
        'doco_url_soporte',
    ];
}
