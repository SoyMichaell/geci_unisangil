<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvProyecto extends Model
{
    use HasFactory;

    protected $table = "inv_proyecto";

    protected $fillable = [
        'id',
        'invpro_id_grupo',
        'invpro_titulo',
        'invpro_resumen',
        'invpro_impacto',
        'invpro_lugar',
        'invpro_resultados',
        'invpro_fecha_inicio',
        'invpro_id_integrantes',
        'invpro_palabras_clave',
        'invpro_estado'
    ];

    public function grupos(){
        return $this->belongsTo(InvGrupoInvestigacion::class, 'invpro_id_grupo');
    }

}
