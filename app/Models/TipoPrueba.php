<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrueba extends Model
{
    use HasFactory;

    protected $table = "tipo_prueba";

    protected $fillable = [
        'id',
        'tipo_prueba_nombre',
    ];

    public function modulos(){
        return $this->hasMany(TipoModulo::class, 'id');
    }

}
