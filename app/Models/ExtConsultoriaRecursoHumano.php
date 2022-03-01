<?php

namespace App\Models;

use App\Models\complemento\NivelEstudio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtConsultoriaRecursoHumano extends Model
{
    use HasFactory;

    protected $table = "ext_consultoria_recurso_humano";

    protected $fillable = [
            'id',
            'extcor_year',
            'extcor_semestre',
            'extcor_codigo_consultoria', 
            'extcor_tipo_documento',
            'extcor_numero_documento', 
            'extcor_id_nivel_estudio',
    ];

    public function niveles(){
        return $this->belongsTo(NivelEstudio::class, 'extcor_id_nivel_estudio');
    }

}
