<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaHorario extends Model
{
    use HasFactory;

    protected $table = "programa_asignatura_horario";

    protected $fillable = [
        'pph_year',
        'pph_semestre',
        'pph_id_asignatura',
        'pph_grupo',
        'pph_id_docente',
        'pph_horario',
        'pph_aula',
    ];

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'pph_id_asignatura');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'pph_id_docente');
    }

}
