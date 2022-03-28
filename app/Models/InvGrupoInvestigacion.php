<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvGrupoInvestigacion extends Model
{
    use HasFactory;

    protected $table = "inv_grupo_investigacion";

    protected $fillable = [
        'id',
        'inv_id_coordinador',
        'inv_nombre_grupo',
        'inv_correo_institucional_grupo',
        'inv_codigo_minciencias',
        'inv_mision',
        'inv_vision',
        'inv_url_grupo',
        'inv_url_gruplac',
        'inv_area_conocimiento_principal',
        'inv_nucleo_conocimiento_nbc',
        'inv_sede',
        'inv_facultad',
        'inv_categoria_grupo',
        'inv_aval_minciencias',
        'inv_lineas_investigacion',
    ];

    public function personas(){
        return $this->belongsTo(User::class, 'inv_id_coordinador');
    }

    public function sedes(){
        return $this->belongsTo(Municipio::class, 'inv_sede');
    }

    public function facultades(){
        return $this->belongsTo(Facultad::class, 'inv_facultad');
    }

    public function investigadores(){
        return $this->hasMany(InvInvestigador::class, 'id');
    }

    public function proyectos(){
        return $this->hasMany(InvProyecto::class, 'id');
    }

}
