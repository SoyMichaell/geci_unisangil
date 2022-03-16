<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = "municipio";

    protected $fillable = [
        'id',
        'mun_nombre',
        'mun_departamento'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'mun_departamento');
    }

    public function asignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function docenteasignatura(){
        return $this->hasMany(DocenteAsignatura::class, 'id');
    }

    public function programaplan(){
        return $this->hasMany(ProgramaPlan::class, 'id');
    }

    public function programaasignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function estudiantes(){
        return $this->hasMany(Estudiante::class, 'id');
    }

    public function movilidadintersede(){
        return $this->hasMany(ExtMovilidadIntersede::class, 'id');
    }

    public function movilidadinternacional(){
        return $this->hasMany(ExtMovilidadInternacional::class, 'id');
    }

}
