<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtRedOrganizacion extends Model
{
    use HasFactory;

    protected $table = "ext_sector_externo_organizaciones";

    protected $fillable = [
            'id',
            'exseor_year',
            'exseor_periodo',
            'exseor_tipo',
            'exseor_nombre',
            'exseor_caracter',
            'exseor_actividades',
            'exseor_logros',
            'exseor_resultados',
            'exseor_productos',
            'exseor_funcion',
            'exseor_participantes',
    ];

}
