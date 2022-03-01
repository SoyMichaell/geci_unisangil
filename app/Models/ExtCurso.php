<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtCurso extends Model
{
    use HasFactory;

    protected $table = "ext_curso";

    protected $fillable = [
            'id',
            'extcurso_codigo', 
            'extcurso_nombre',
            'extcurso_id_cine',
            'extcurso_extension',
            'extcurso_estado',
    ];

}
