<?php

namespace App\Models\complemento;

use App\Models\ExtConsultoriaRecursoHumano;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEstudio extends Model
{
    use HasFactory;

    protected $table = "compl_nivel_estudio";

    protected $fillable = [
        'id',
        'conies_nombre',
    ];

    public function consultoriarecurso(){
        return $this->hasMany(ExtConsultoriaRecursoHumano::class, id);
    }

}
