<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtEducacionContinuaDocente extends Model
{
    use HasFactory;

    protected $table = "ext_educacion_continua_docente";

    protected $fillable = [
            'id',
            'extedud_year', 
            'extedud_semestre', 
            'extedud_codigo_curso', 
            'extedud_tipo_documento', 
            'extedud_numero_documento', 
    ];

}
