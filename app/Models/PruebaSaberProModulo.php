<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaSaberProModulo extends Model
{
    use HasFactory;

    protected $table = "prueba_saber_pro_modulo";

    protected $fillable = [
            'id',
            'prsaprmo_id_estudiante',
            'prsaprmo_id_modulo',
            'prsaprmo_puntaje',
            'prsaprmo_nivel_desempeno',
            'prsaprmo_percentil_nacional',
            'prsaprmo_percentil_grupo',
    ];

}
