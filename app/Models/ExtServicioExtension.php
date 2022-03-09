<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtServicioExtension extends Model
{
    use HasFactory;

    protected $table = "ext_servicio_extension";

    protected $fillable = [
            'id',
            'extseex_year',
            'extseex_semestre',
            'extseex_codigo_organizacional',
            'extseex_codigo_ser',
            'extseex_nombre_ser',
            'extseex_descripcion_ser',
            'extseex_valor_ser',
            'extseex_id_area_extension',
            'extseex_fecha_inicio',
            'extseex_fecha_final',
            'extseex_nombre_contacto',
            'extseex_apellido_contacto',
            'extseex_telefono_contacto',
            'extseex_correo_contacto',
            'extseex_costo',
            'extseex_criterio_elegibilidad',
            'extseex_id_area_trabajo',
            'extseex_id_ciclo_vital',
            'extseex_id_entidad_nacional',
            'extseex_id_fuente_nacional',
            'extseex_valor_financiacion_nac',
            'extseex_id_fuente_internacional',
            'extseex_id_pais',
            'extseex_nombre_institucion_inter',
            'extseex_valor_financiacion_inter',
            'extseex_id_pais_otra_entidad',
            'extseex_id_sector_otra_entidad',
            'extseex_nombre_otra_entidad',
            'extseex_id_poblacion_condicion',
            'extseex_cantidad_condicion',
            'extseex_id_poblacion_grupo',
            'extseex_cantidad_grupo',
            'extseex_soporte',
    ];

}
