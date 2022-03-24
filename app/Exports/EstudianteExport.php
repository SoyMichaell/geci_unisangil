<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class EstudianteExport implements FromCollection, WithHeadings
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
            'Telefono 2',
            'Correo electronico',
            'Departamento',
            'Sede',
            'Programa',
            'Plan',
            'Dirección',
            'Estrato',
            'Fecha de nacimiento',
            'Fecha de expedición',
            'Sexó biologico',
            'Estado civil',
            'Fecha de ingreso',
            'Periodo de ingreso',
            'Ultimo periodo matriculado',
            'Semestre',
            'Tipo financiamiento',
            'Tipo de beca',
            'Estado',
            'Tipo matricula',
            'Matricula',
            'Promedio general acumulado',
            'Reconocimiento',
            'Egresado',
            'Administrativo',
            'Cargo',
            'Dependencia',
            'Fecha ingreso',
            'No. contrato'
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
