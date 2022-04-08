<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $table = "laboratorio";

    protected $fillable = [
            'id',
            'lab_nombre',
            'lab_ubicacion',
            'lab_fecha',
            'lab_id_docente',
            'lab_finalidad',
            'lab_id_facultad',
            'lab_id_programa',
            'lab_id_practicante',
            'lab_nombre_practica',
            'lab_cantidad_estudiante',
            'lab_id_software',
            'lab_material',
            'lab_observaciones',
    ];

    public function docentes(){
        return $this->belongsTo(User::class, 'lab_id_docente');
    }

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'lab_id_facultad');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'lab_id_programa');
    }

    public function estudiantes(){
        return $this->belongsTo(User::class, 'lab_id_practicante');
    }

    public function softwares(){
        return $this->belongsTo(Software::class, 'lab_id_software');
    }
}
