<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtConsultoria extends Model
{
    use HasFactory;

    protected $table = "ext_consultoria";

    protected $fillable = [
            'id',
            'extcon_year', 
            'extcon_semestre',
            'extcon_codigo_consultoria',
            'extcon_descripcion',
            'extcon_id_cine_campo',
            'extcon_nombre_entidad',
            'ext_sector_consultoria',
            'extcon_valor',
            'extcon_fecha_inicio',
            'extcon_fecha_fin',
            'extcon_fuente_nacional',
            'extcon_valor_nacional',
            'extcon_nombre_institucion', 
            'extcon_fuente_internacional',
            'extcon_pais',
            'extcon_valor_internacional',
            'extcon_id_persona',
            'extcon_id_nivel_estudio',
    ];

}
