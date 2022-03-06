<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaSaberModulo extends Model
{
    use HasFactory;

    protected $table = "prueba_saber_modulo";

    protected $fillable = [
        'id',
        'prsamo_id_estudiante',
        'prsamo_id_modulo',
        'prsamo_puntaje',
    ];

}
