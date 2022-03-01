<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtEducacionContinuaBeneficiario extends Model
{
    use HasFactory;

    protected $table = "ext_educacion_continua_beneficiario";

    protected $fillable = [
        'id',
        'extedub_year',
        'extedub_semestre',
        'extedub_codigo',
        'extedub_tipo_beneficio',
        'extedub_cantidad',
    ];
}
