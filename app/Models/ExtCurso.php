<?php

namespace App\Models;

use App\Models\complemento\CineDetallado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtCurso extends Model
{
    use HasFactory;

    protected $table = "ext_curso";

    protected $fillable = [
            'id',
            'extcurso_year',
            'extcurso_semestre',
            'extcurso_codigo', 
            'extcurso_nombre',
            'extcurso_id_cine',
            'extcurso_extension',
            'extcurso_estado',
            'extcurso_fecha',
            'extcurso_id_docente',
            'extcurso_url_soporte',
    ];
    
    public function cines(){
        return $this->belongsTo(CineDetallado::class, 'extcurso_id_cine');
    }

    public function docentes(){
        return $this->belongsTo(User::class, 'extcurso_id_docente');
    }
}
