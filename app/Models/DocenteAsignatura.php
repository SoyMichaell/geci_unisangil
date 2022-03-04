<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteAsignatura extends Model
{
    use HasFactory;

    protected $table = "docente_asignatura";

    protected $fillable = [
            'id',
            'docasi_id_docente',
            'docasi_id_asignatura',
            'docasi_numero_hora_docencia',
            'docasi_numero_hora_investigacion',
            'docasi_numero_hora_extension',
            'docasi_numero_hora_administrativas',
    ];

    public function docentes(){
        return $this->belongsTo(User::class, 'docasi_id_docente');
    }

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'doa_id_asignatura');
    }
}
