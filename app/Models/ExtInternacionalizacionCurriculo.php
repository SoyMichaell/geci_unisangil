<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtInternacionalizacionCurriculo extends Model
{
    use HasFactory;

    protected $table = "ext_internacionalizacion_curriculo";

    protected $fillable = [
            'id',
            'exincu_year',
            'exincu_periodo',
            'exincu_id_asignatura',
            'exincu_id_docente',
            'ext_uso_idioma',
            'ext_uso_tic',
            'ext_competencia_global',
            'ext_movilidad_estudiante',
            'ext_otra_actividad',
    ];

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'exincu_id_asignatura');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'exincu_id_docente');
    }

}
