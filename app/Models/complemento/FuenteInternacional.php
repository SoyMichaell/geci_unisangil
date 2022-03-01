<?php

namespace App\Models\complemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteInternacional extends Model
{
    use HasFactory;

    protected $table = "compl_fuente_internacional";

    protected $fillable = [
        'id',
        'cofuin_nombre',
    ];

}
