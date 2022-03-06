<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaSaberPro extends Model
{
    use HasFactory;

    protected $table = "prueba_saber_pro";

    protected $fillable = [
            'id',
            'prsapr_year',
            'prsapr_periodo',
            'prsapr_id_estudiante',
            'prsapr_numero_registro',
            'prsapr_grupo_referencia',
            'prsapr_puntaje_global',
            'prsapr_percentil_nacional',
            'prsapr_percentil_grupo',
            'prsapr_novedad',
    ];

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'prsapr_id_estudiante');
    }

}
