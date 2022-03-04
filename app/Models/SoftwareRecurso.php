<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareRecurso extends Model
{
    use HasFactory;

    protected $table = "software_recurso_tecnologico";

    protected $fillable = [
            'id',
            'sofrete_year',
            'sofrete_periodo',
            'sofrete_tipo_recurso',
            'sofrete_id_docente',
            'sofrete_id_asignatura',
    ];

    public function docentes(){
        return $this->belongsTo(User::class, 'sofrete_id_docente');
    }

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'sofrete_id_asignatura');
    }

    

}
