<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movilidad extends Model
{
    use HasFactory;

    protected $table = "movilidad";

    protected $fillable = [
            'id',
            'movi_year',
            'movi_periodo',
            'movi_tipo_persona',
            'movi_id_persona',
            'movi_tipo_movilidad',
            'movi_evento',
            'movi_pais',
            'movi_ciudad',
            'movi_observacion',
    ];

    public function docentes(){
        return $this->belongsTo(User::class, 'movi_id_persona');
    }

    public function administrativos(){
        return $this->belongsTo(User::class, 'movi_id_persona');
    }

    public function estudiantes(){
        return $this->belongsTo(User::class, 'movi_id_persona');
    }

}
