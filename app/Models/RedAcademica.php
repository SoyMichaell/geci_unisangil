<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedAcademica extends Model
{
    use HasFactory;

    protected $table = "red_academica";

    protected $fillable = [
            'id',
            'red_nombre',
            'red_nombre_contacto',
            'red_telefono',
            'red_pais',
            'red_ciudad',
            'red_alcance',
            'red_accion',
            'red_year',
            'red_id_programa',
            'red_observacion',
    ];

    public function programas(){
        return $this->belongsTo(Programa::class, 'red_id_programa');
    }

}
