<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtMovilidadInternacional extends Model
{
    use HasFactory;

    protected $table = "ext_movilidad_internacional";

    protected $fillable = [
            'id',
            'exmointer_tipo',
            'exmointer_rol',
            'exmointer_id_sede_or',
            'exmointer_id_facultad_or',
            'exmointer_id_programa_or',
            'exmointer_id_persona',
            'exmointer_pais_des',
            'exmointer_ciudad_des',
            'exmointer_institucion_nombre',
            'exmointer_tipo_movilidad',
            'exmointer_descripcion',
            'exmointer_fecha_inicio',
            'exmointer_fecha_final',
    ];

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'exmointer_id_sede_or');
    }

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'exmointer_id_facultad_or');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'exmointer_id_programa_or');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'exmointer_id_persona');
    }

}
