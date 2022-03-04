<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteReporte extends Model
{
    use HasFactory;

    protected $table = "estudiante_reporte_general";

    protected $fillable = [
            'id',
            'esture_year',
            'esture_id_programa',
            'esture_periodo',
            'esture_inscritos',
            'esture_admitidos',
            'esture_mat_antiguos',
            'esture_mat_primer_semestre',
            'esture_mat_total',
            'esture_egresado_no_graduado',
            'esture_graduados',
            'esture_retirados',
            'esture_tasa_desercion',
            'esture_tasa_desercion_pro',
            'esture_porcentaje_termina',
            'esture_nro_estudiante_ies_nacional',
            'esture_nro_estudiante_ies_internacional',
            'esture_vis_nacional',
            'esture_vis_internacional',
    ];

    public function programas (){
        return $this->belongsTo(Programa::class, 'esture_id_programa');
    }

}
