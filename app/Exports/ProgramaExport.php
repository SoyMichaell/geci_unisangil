<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class ProgramaExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Programa',
            'Estado programa',
            'Departamento',
            'Municipio',
            'Facultad',
            'Titulo',
            'Codigo SNIES',
            'Plan de estudio',
            'Número de creditos',
            'Número de asignaturas',
            'Estado plan de estudio',
            'Resolución',
            'Fecha ultimo registro',
            'Fecha próximo registro',
            'Nivel formación',
            'Programa por ciclos (si/no)',
            'Metodologia',
            'Duracción (semestres)',
            'Periodo admisión',
            'Grupo de referencia',
            'Grupo de referencia NBC',
            'Norma creación',
            'Director de programa'
        ];
    }
    public function collection()
    {
        $programas = DB::table('programa')->select(
            'programa.id',
            'pro_nombre',
            'pro_estado',
            'dep_nombre',
            'mun_nombre',
            'fac_nombre',
            'pro_titulo',
            'pro_codigosnies',
            'pp_plan',
            'pp_creditos',
            'pp_no_asignaturas',
            'pp_estado',
            'pro_resolucion',
            'pro_fecha_ult',
            'pro_fecha_prox',
            'niv_nombre',
            'pro_programa_ciclo',
            'met_nombre',
            'pro_duraccion',
            'pro_periodo_admision',
            'pro_grupo_referencia',
            'pro_grupo_referencia_nbc',
            'pro_tipo_norma',
            DB::raw("CONCAT(per_nombre,' ',per_apellido)")
        )
            ->join('departamento', 'programa.pro_departamento', '=', 'departamento.id')
            ->join('municipio', 'programa.pro_municipio', '=', 'municipio.id')
            ->join('facultad', 'programa.pro_facultad', '=', 'facultad.id')
            ->join('nivel_formacion', 'programa.pro_nivel_formacion', '=', 'nivel_formacion.id')
            ->join('metodologia', 'programa.pro_metodologia', '=', 'metodologia.id')
            ->join('persona', 'programa.pro_id_director', '=', 'persona.id')
            ->join('programa_plan_estudio', 'programa.id', '=', 'programa_plan_estudio.pp_id_programa')
            ->get();
        return $programas;
    }
}