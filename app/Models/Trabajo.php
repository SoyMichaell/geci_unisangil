<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $table = "trabajo_grado";

    protected $fillable = [
        'id',
        'tra_codigo_proyecto',
        'tra_titulo_proyecto',
        'tra_id_estudiante',
        'tra_fecha_inicio',
        'tra_modalidad_grado',
        'tra_id_director',
        'tra_id_codirector',
        'tra_id_externo',
        'tra_estado_propuesta',
        'tra_estado_proyecto',
        'tra_id_jurado1',
        'tra_id_jurado2',
        'tra_numero_acta_sustentacion',
        'tra_numero_acta_grado',
        'tra_fecha_finalizacion',
        'tra_observacion',
        'tra_id_proceso',
    ];

    public function directores(){
        return $this->belongsTo(User::class, 'tra_id_director');
    }

    public function codirectores(){
        return $this->belongsTo(User::class, 'tra_id_codirector');
    }

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'tra_id_estudiante');
    }

}
