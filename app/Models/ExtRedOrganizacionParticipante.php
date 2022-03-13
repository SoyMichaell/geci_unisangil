<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtRedOrganizacionParticipante extends Model
{
    use HasFactory;

    protected $table = "ext_sector_externo_organizaciones_part";

    protected $fillable = [
            'id',
            'exseorpar_id_organizacion',
            'exseorpar_numero_identificacion',
            'exseorpar_nombre_completo',
            'exseorpar_rol',
    ];

}
