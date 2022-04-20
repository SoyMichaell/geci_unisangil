<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAsignatura extends Model
{
    use HasFactory;

    protected $table = "programa_plan_estudio_asignatura";

    protected $fillable = [
        'id',
        'asig_codigo',
        'asig_nombre',
        'asig_semestre',
        'asig_id_plan_estudio',
        'asig_id_componente',
        'asig_id_area',
        'asig_no_creditos',
        'asig_no_semanales',
        'asig_no_semestre',
        'asig_id_programa',
        'asig_id_sede',
        'asig_estado',
    ];

    public function sedes(){
        return $this->belongsTo(Municipio::class, 'asig_id_sede');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'asig_id_programa');
    }

    public function planes(){
        return $this->belongsTo(ProgramaPlan::class, 'asig_id_plan_estudio');
    }

    public function horarios(){
        return $this->hasMany(ProgramaHorario::class, 'id');
    }

    public function software(){
        return $this->hasMany(Software::class, 'id');
    }

    public function softwarecurso(){
        return $this->hasMany(SoftwareRecurso::class, 'id');
    }
    
    public function internacionalizacioncurriculo(){
        return $this->hasMany(ExtInternacionalizacionCurriculo::class , 'id');
    }

}
