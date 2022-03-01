<?php

namespace App\Models\complemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CineDetallado extends Model
{
    use HasFactory;

    protected $table = "compl_cine_detallado";

    protected $fillable = [
        'id',
        'cocide_nombre',
    ];
}
