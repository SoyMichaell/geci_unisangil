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
            'doa_id_docente',
            'doa_year',
            'doa_semestre',
            'doa_id_asignatura',
            'doa_grupo',
            'doa_id_municipio',
            'doa_unidad',
            'doa_horas_semana_doc',
            'doa_horas_semana_inv',
            'doa_horas_extension',
            'doa_horas_admin',
    ];

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'doa_id_asignatura');
    }

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'doa_id_municipio');
    }

}
