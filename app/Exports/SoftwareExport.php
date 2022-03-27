<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class SoftwareExport implements FromCollection, WithHeadings
{

    public function __construct(String $valor)
    {
        $this->valor = $valor;
    }

    public function headings(): array
    {
        if($this->valor == 'software'){
            return [
                '#',
                'Tipo',
                'Software',
                'Desarrollador',
                'Versión',
                'No. licencia',
                'Año adquisición de licencia',
                'Año vencimiento de licencia',
                'Asignatura (s)',
                'Cantidad licencia',
                'Programa (s)',
                'Valor unitario',
                'Valor total',
                'Fecha actualización software',
                'Fecha instalación software',
                'Fecha registro',
                'Fecha actualización registro'
            ];
        }else if($this->valor == 'recurso'){
            return [
                '#',
                'Año',
                'Periodo',
                'Tipo recurso',
                'Docente',
                'Asignatura'
            ];
        }
        
    }
    public function collection()
    {
        if($this->valor == 'software'){
            $softwares = DB::table('software')->get();
            return $softwares;
        }else if($this->valor == 'recurso'){
            $recursos = DB::table('software_recurso_tecnologico')
            ->select('software_recurso_tecnologico.id','sofrete_year','sofrete_periodo','sofrete_tipo_recurso',DB::raw("CONCAT(per_nombre,' ',per_apellido)"),'asig_nombre')
            ->join('persona','software_recurso_tecnologico.sofrete_id_docente','=','persona.id')
            ->join('programa_plan_estudio_asignatura','software_recurso_tecnologico.sofrete_id_asignatura','=','programa_plan_estudio_asignatura.id')
            ->get();
            return $recursos;
        }
        
    }
}
