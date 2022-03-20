<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvInvestigador extends Model
{
    use HasFactory;

    protected $table = "inv_investigador";

    protected $fillable = [
        'id',
        'inves_id_persona',
        'inves_enlace_cvlac',
        'inves_tipo_vinculacion',
        'inves_categoria',
        'inves_id_grupo'
    ];

    

}
