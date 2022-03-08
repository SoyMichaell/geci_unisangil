<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaGeneralProgramaModulo extends Model
{
    use HasFactory;

    protected $table = "prueba_resultado_programa_modulo";

    protected $fillable = [
        'id',
        'prurepromo_id_prueba_programa',
        'prureprono_id_modulo',
        'prureprono_puntaje_programa',
        'prureprono_puntaje_institucion',
        'prureprono_puntaje_sede',
        'prureprono_puntaje_grupo_referencia',
    ];

}
