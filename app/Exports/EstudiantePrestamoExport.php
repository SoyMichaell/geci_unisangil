<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class EstudiantePrestamoExport implements FromCollection, WithHeadings
{

    public function __construct(int $programa)
    {
        $this->programa = $programa;
    }

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
        $estudiantes = DB::table('persona')
            ->select(
                'persona.id',
                'per_tipo_documento',
                'per_numero_documento',
                'per_nombre',
                'per_apellido',
                'per_telefono',
                'estu_telefono2',
                'per_correo',
                'dep_nombre',
                'mun_nombre',
                'pro_nombre',
                'pp_plan',
                'estu_direccion',
                'estu_estrato',
                'estu_fecha_nacimiento',
                'estu_fecha_expedicion',
                'estu_sexo',
                'estu_estado_civil',
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
                'estu_administrativo',
                'estu_cargo',
                'estu_dependencia',
                'estu_fecha_ingreso',
                'estu_no_contrato'
            )
            ->join('estudiante', 'persona.id', '=', 'estudiante.estu_id_estudiante')
            ->join('programa', 'estudiante.estu_programa', '=', 'programa.id')
            ->join('departamento', 'persona.per_departamento', '=', 'departamento.id')
            ->join('municipio', 'persona.per_ciudad', '=', 'municipio.id')
            ->leftJoin('programa_plan_estudio', 'estudiante.estu_programa_plan', '=', 'programa_plan_estudio.id')
            ->where('estudiante.estu_programa', $this->programa)
            ->where('estudiante.estu_financiamiento', 'prestamo')
            ->where(function($q){
                $q->where('persona.per_tipo_usuario', 6)
                ->orWhere('persona.per_tipo_usuario', 9);
            })->get();
        return $estudiantes;
    }
}
