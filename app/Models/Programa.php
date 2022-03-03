<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = "programa";

    protected $fillable = [
        'id','pro_estado','pro_departamento','pro_municipio','pro_facultad','pro_nombre',
        'pro_titulo','pro_codigosnies','pro_resolucion','pro_fecha_ult',
        'pro_fecha_prox','pro_nivel_formacion','pro_programa_ciclo','pro_metodologia',
        'pro_duraccion','pro_periodo_admision','pro_tipo_norma','pro_id_director'
    ];

    public function directorprograma(){
        return $this->belongsTo(User::class, 'pro_id_director');
    }

    public function niveles(){
        return $this->belongsTo(NivelFormacion::class, 'pro_nivel_formacion');
    }

    public function metodologias(){
        return $this->belongsTo(Metodologia::class, 'pro_metodologia');
    }

    public function asignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function programaplan(){
        return $this->hasMany(ProgramaPlan::class, 'id');
    }

    public function programaasignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function software(){
        return $this->hasMany(Software::class, 'id');
    }

    public function redes(){
        return $this->hasMany(RedAcademica::class, 'id');
    }

}
