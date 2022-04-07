<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaSaber extends Model
{
    use HasFactory;

    protected $table = "prueba_saber";

    protected $fillable = [
            'id',
            'prueba_saber_year',
            'prueba_saber_periodo',
            'prueba_saber_id_estudiante',
            'prueba_saber_puntaje_global',
    ];

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'prueba_saber_id_estudiante');
    }
}
