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
        'pp_id_programa',
        'pp_nombre',
        'pp_creditos',
        'pp_asignaturas',
        'pp_estado'
    ];

    public function asignatura(){
        return $this->hasMany(ProgramaAsignatura::class, 'id');
    }

}
