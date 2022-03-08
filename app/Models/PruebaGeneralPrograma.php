<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaGeneralPrograma extends Model
{
    use HasFactory;

    protected $table = "prueba_resultado_programa";

    protected $fillable = [
            'id',
            'prurepro_id_programa',
            'prurepro_global_programa',
            'prurepro_global_grupo_referencia',
            'prurepro_global_institucion',
            'prurepro_global_sede',
    ];

    public function programas(){
        return $this->belongsTo(Programa::class, 'prurepro_id_programa');
    }

}
