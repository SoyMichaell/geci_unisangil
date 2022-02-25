<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteEvaluacion extends Model
{
    use HasFactory;

    protected $table = "docente_evaluacion";

    protected $fillable = [
            'id',
            'doe_persona_docente',
            'doe_year',
            'doe_semestre',
            'doe_cal_auto',
            'doe_cal_hete',
            'doe_cal_coe',
            'doe_total_pro',
            'doe_observacion',
            'doe_url_evaluacion',
    ];

}
