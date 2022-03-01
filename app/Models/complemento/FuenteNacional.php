<?php

namespace App\Models\complemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteNacional extends Model
{
    use HasFactory;

    protected $table = "compl_fuente_nacional";

    protected $fillable = [
        'id',
        'cofuna_nombre',
    ];

}
