<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoModulo extends Model
{
    use HasFactory;

    protected $table = "tipo_modulo";

    protected $fillable = [
        'id',
        'tipo_modulo_nombre',
        'tipo_modulo_id_prueba',
    ];

    public function pruebas(){
        return $this->belongsTo(TipoPrueba::class, 'tipo_modulo_id_prueba');
    }

}
