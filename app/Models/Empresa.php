<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'compl_empresa';

    protected $fillable = [
        'id',
        'razon_social',
        'nit',
        'pais',
        'departamento',
        'ciudad',
        'direccion',
        'telefono',
        'url',
        'correo',
        'area'
    ];
}
