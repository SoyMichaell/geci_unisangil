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
        'dop_id_docente',
        'dop_fecha_expedicion',
        'dop_sexo_biologico', //1 m - 2 f
        'dop_estado_civil',
        'dop_id_pais',
        'dop_id_municipio',
        'dop_correo_personal',
        'dop_direccion',
    ];

    public function docentes(){
        return $this->belongsTo(User::class, 'dop_id_docente');
    }

}
