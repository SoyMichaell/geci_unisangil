<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtRegistroFotograficoInter extends Model
{
    use HasFactory;

    protected $table = "ext_registro_fotografico_inter";

    protected $fillable = [
            'id',
            'extrefoin_year',
            'extrefoin_periodo',
            'extrefoin_tipo_actividad',
            'extrefoin_actividad',
            'extrefoin_ente_organizador',
            'extrefoin_fecha',
            'extrefoin_tipo_evento',
            'extrefoin_tipo_modalidad',
            'extrefoin_soporte',
    ];
}
