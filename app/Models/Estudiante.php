<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = "estudiante";

    protected $fillable = [
            'id',
            'estu_programa',
            'estu_programa_plan',
            'estu_tipo_documento',
            'estu_numero_documento',
            'estu_nombre',
            'estu_apellido',
            'estu_telefono1',
            'estu_telefono2',
            'estu_direccion',
            'estu_correo',
            'estu_estrato',
            'estu_departamento',
            'estu_ciudad',
            'estu_fecha_nacimiento',
            'estu_ingreso',
            'estu_periodo_ingreso',
            'estu_ult_matricula',
            'estu_semestre',
            'estu_financiamiento',
            'estu_entidad',
            'estu_estado',
            'estu_tipo_matricula',
            'estu_matricula',
            'estu_pga',
            'estu_reconocimiento',
            'estu_egresado',
            'estu_grado',
            
    ];

    public function trabajos(){
        return $this->hasMany(Trabajo::class, 'id');
    }

    public function planes(){
        return $this->belongsTo(ProgramaPlan::class, 'estu_programa_plan');
    }

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'estu_ciudad');
    }

}
