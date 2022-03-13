<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtInterRedConvenioParticipante extends Model
{
    use HasFactory;

    protected $table = "ext_sector_externo_red_academia_convenio_participantes"; 

    protected $fillable = [
            'id',
            'exseredpar_id_red_academica',
            'exseredpar_numero_identificacion',
            'exseredpar_nombre_participante',
            'exseredpar_rol_participante',
    ];

}
