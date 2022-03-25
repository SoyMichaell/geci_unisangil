<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class DocenteExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'Tipo documento',
            'Número documento',
            'Nombre (s)',
            'Apellido (s)',
            'Telefono 1',
            'Correo electronico institucional',
            'Departamento',
            'Sede',
            'Ciudad procedencia',
            'Correo personal',
            'Dedicación',
            'Tipo de contratación',
            'Fecha vinculación',
            'EPS',
            'Institución especialización',
            'Institución diplomado',
            'Titulo pregrado',
            'Institución pregrado',
            'Titulo especialización',
            'Institución especialización',
            'Titulo maestría',
            'Institución maestría',
            'Titulo doctorado',
            'Institución doctorado',
            'Área de conocimiento',
            'Máximo nivel de formación',
            'Titulo máximo nivel formación',
            'Institución máximo nivel formación',
            'Modalidad programa',
            'Riesgo',
            'Caja de compensación',
            'Banco',
            'No. cuenta',
            'Pensión',
            'Estado'
        ];
    }
    public function collection()
    {
        $docentes = DB::table('persona')
            ->select(
                'per_tipo_documento','per_numero_documento','per_nombre','per_apellido','per_telefono','per_correo','dep_nombre','mun_nombre',
                'ciudad_procedencia','correo_personal','dedicacion','tipo_contratacion','fecha_vinculacion','eps','institucion_esp',
                'institucion_dip','titulo_pregrado','institucion_pre','titulo_especializacion','institucion_espe','titulo_maestria',
                'institucion_mae','titulo_doctorado','institucion_doc','area_conocimiento','maximo_nivel_formacion','titulo_maximo_nivel',
                'institucion_maximo_nivel','modalidad_programa','riesgo','caja_compensacion','banco','no_cuenta','pension','estado'
            )
            ->join('docente','persona.id','=','docente.id_persona_docente')
            ->join('departamento','persona.per_departamento','=','departamento.id')
            ->join('municipio','persona.per_ciudad','=','municipio.id')
            ->where('persona.per_tipo_usuario', 3)
            ->orWhere('persona.per_tipo_usuario', 2)
            ->get();
        return $docentes;
    }
}
