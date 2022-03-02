<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaPlan extends Model
{
    use HasFactory;

    protected $table = "programa_plan_estudio";

    protected $fillable = [
        'id',
        'pp_id_sede',
        'pp_id_programa',
        'pp_plan',
        'pp_creditos',
        'pp_no_asignaturas',
        'pp_estado',
    ];

    public function programas(){
        return $this->belongsTo(Programa::class, 'pp_id_programa');
    }

    public function sedes(){
        return $this->belongsTo(Municipio::class, 'pp_id_sede');
    }

    public function programaasignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function estudiantes(){
        return $this->hasMany(Estudiante::class, 'id');
    }

}
