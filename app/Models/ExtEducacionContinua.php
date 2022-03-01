<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtEducacionContinua extends Model
{
    use HasFactory;

    protected $table = "ext_educacion_continua";

    protected $fillable = [
        'id',
        'extedu_semestre',
        'extedu_codigo_curso',
        'extedu_numero_horas',
        'extedu_tipo_curso',
        'extedu_valor_curso',
    ];
}
