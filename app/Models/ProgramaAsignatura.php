<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAsignatura extends Model
{
    use HasFactory;

    protected $table = "programa_asignatura";

    protected $fillable = [
            'id',
            'pas_id_facultad',
            'pas_id_municipio',
            'pas_id_programa',
            'pas_id_programa_plan',
            'pas_nombre',
            'pas_creditos',
            'pas_horas_semana',
            'pas_horas_semestre',
    ];

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'pas_id_municipio');
    }

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'pas_id_facultad');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'pas_id_programa');
    }

    public function planes(){
        return $this->belongsTo(ProgramaPlan::class, 'pas_id_programa_plan');
    }

    public function docenteasignatura(){
        return $this->hasMany(DocenteAsignatura::class, 'id');
    }

}
