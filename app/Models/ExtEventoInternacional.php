<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtEventoInternacional extends Model
{
    use HasFactory;

    protected $table = "ext_eventos_nac_inter";

    protected $fillable = [
        'id',
        'exevin_tipo',
        'exevin_year',
        'exevin_periodo',
        'exevin_nombre_evento',
        'exevin_fecha_inicio',
        'exevin_fecha_final',
        'exevin_lugar',
        'exevin_sede',
        'exevin_ponentes',
        'exevin_institucion',
        'exevin_pais',
        'exevin_nombre_ponencia',
    ];

}
