<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtMovilidadIntersede extends Model
{
    use HasFactory;

    protected $table = "ext_movilidad_intersede";

    protected $fillable = [
            'id',
            'exmoin_tipo',
            'exmoin_rol',
            'exmoin_id_sede_or',
            'exmoin_id_facultad_or',
            'exmoin_id_programa_or',
            'exmoin_id_persona',
            'exmoin_id_sede_des',
            'exmoin_id_facultad_des',
            'exmoin_id_programa_des',
            'exmoin_tipo_movilidad',
            'exmoin_descripcion',
            'exmoin_fecha_inicio',
            'exmoin_fecha_final',
    ];

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'exmoin_id_sede_or');
    }

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'exmoin_id_facultad_or');
    }

    public function programas(){
        return $this->belongsTo(Programa::class, 'exmoin_id_programa_or');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'exmoin_id_persona');
    }

}
