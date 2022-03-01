<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtParticipante extends Model
{
    use HasFactory;

    protected $table = "ext_participante";

    protected $fillable = [
        'id',
        'extpar_tipo_documento',
        'extpar_numero_documento',
        'extpar_fecha_expedicion',
        'extpar_primer_nombre',
        'extpar_segundo_nombre',
        'extpar_primer_apellido',
        'extpar_segundo_apellido',
        'extpar_sexo', //1 m - 2 f
        'extpar_estado_civil',
        'extpar_fecha_nacimiento',
        'extpar_id_pais',
        'extpar_id_municipio',
        'extpar_telefono',
        'extpar_correo_persona',
        'extpar_correo_institucional',
        'extpar_direccion',
    ];
}
