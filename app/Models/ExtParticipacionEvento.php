<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtParticipacionEvento extends Model
{
    use HasFactory;

    protected $table = "ext_participacion_eventos";

    protected $fillable = [
        'id',
        'expaev_year',
        'expaev_periodo',
        'expaev_tipo_evento',
        'expaev_nombre_evento',
        'expaev_fecha',
        'expaev_organizador',
        'expaev_id_persona'
    ];

    public function personas(){
        return $this->belongsTo(User::class, 'expaev_id_persona');
    }

}
