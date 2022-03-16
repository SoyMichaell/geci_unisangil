<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = "facultad";

    protected $fillable = [
        'id',
        'fac_nombre',
    ];

    public function asignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

    public function movilidadnacional(){
        return $this->hasMany(ExtMovilidadNacional::class, 'id');
    }

    public function movilidadintersede(){
        return $this->hasMany(ExtMovilidadIntersede::class, 'id');
    }

    public function movilidadinternacional(){
        return $this->hasMany(ExtMovilidadInternacional::class, 'id');
    }

}
