<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = "software";

    protected $fillable = [
            'id',
            'sof_tipo',
            'sof_desarrollador',
            'sof_version',
            'sof_no_licencia',
            'sof_year_ad_licencia',
            'sof_year_ve_licencia',
            'sof_asignatura',
            'sof_cantidad',
            'sof_id_programa',
            'sof_valor_unitario',
            'sof_valor_total',
            'sof_fecha_actualizar',
            'sof_fecha_instalacion',
    ];

    public function programas(){
        return $this->belongsTo(Programa::class, 'sof_id_programa');
    }

    public function asignaturas(){
        return $this->belongsTo(ProgramaAsignatura::class, 'sof_asignatura'); 
    }
}
