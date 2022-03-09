<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtProyectoExtension extends Model
{
    use HasFactory;

    protected $table = "ext_proyecto_extension";

    protected $fillable = [
            'id',
            'extprex_year',
            'extprex_semestre',
            'extprex_codigo_organizacional',
            'extprex_codigo_pr',
            'extprex_nombre_pr',
            'extprex_descripcion_pr',
            'extprex_valor_pr',
            'extprex_id_area_extension',
            'extprex_fecha_inicio',
            'extprex_fecha_final',
            'extprex_nombre_contacto',
            'extprex_apellido_contacto',
            'extprex_telefono_contacto',
            'extprex_correo_contacto',
            'extprex_id_area_trabajo',
            'extprex_id_ciclo_vital',
            'extprex_id_entidad_nacional',
            'extprex_id_fuente_nacional',
            'extprex_valor_financiacion_nac',
            'extprex_id_fuente_internacional',
            'extprex_id_pais',
            'extprex_nombre_institucion_inter',
            'extprex_valor_financiacion_inter',
            'extprex_id_pais_otra_entidad',
            'extprex_id_sector_otra_entidad',
            'extprex_nombre_otra_entidad',
            'extprex_id_poblacion_condicion',
            'extprex_cantidad_condicion',
            'extprex_id_poblacion_grupo',
            'extprex_cantidad_grupo',
            'extprex_soporte',
    ];

}
