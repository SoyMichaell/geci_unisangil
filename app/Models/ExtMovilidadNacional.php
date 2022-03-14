<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtMovilidadNacional extends Model
{
    use HasFactory;

    protected $table = "ext_movilidad_nacional";

    protected $fillable = [
            'id',
            'exmona_tipo',
            'exmona_rol',
            'exmona_id_sede',
            'exmona_id_facultad',
            'exmona_id_programa',
            'exmona_id_persona',
            'exmona_institucion_proviene',
            'exmona_tipo_movilidad',
            'exmona_descripcion',
            'exmona_fecha_inicio',
            'exmona_fecha_final',
    ];

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'exmona_id_facultad');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'exmona_id_programa');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'exmona_id_persona');
    }

}
