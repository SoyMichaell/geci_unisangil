<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelFormacion extends Model
{
    use HasFactory;
    protected $table = "nivel_formacion";

    protected $fillable = [
        'id',
        'niv_nombre',
    ];
}
