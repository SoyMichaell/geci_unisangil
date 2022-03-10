<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtInterRedConvenio extends Model
{
    use HasFactory;

    protected $table = "ext_sector_externo_red_academia_convenio";

    protected $fillable = [
            'id',
            'exsered_year',
            'exsered_periodo',
            'exsered_ies',
            'exsered_caracter',
            'exsered_fecha',
            'exsered_logros',
            'exsered_resultados',
            'exsered_productos',
            'exsered_funcion',
    ];

}
