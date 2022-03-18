<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtEventoVirtual extends Model
{
    use HasFactory;

    protected $table = "ext_eventos_virtuales";

    protected $fillable = [
        'id',
        'exevir_nombre_evento',
        'exevir_fecha_inicio',
        'exevir_fecha_fin',
        'exevir_enlace_ingreso',
        'exevir_enlace_imagen',
        'exevir_nombre_ponente',
        'exevir_institucion_origen',
        'exevir_pais',
        'exevir_nombre_ponencia'
    ];

}
