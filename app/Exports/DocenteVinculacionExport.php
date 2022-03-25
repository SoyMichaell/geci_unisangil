<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class DocenteVinculacionExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'Fecha inicio',
            'Fecha final',
            'Nombre (s)',
            'Apellido (s)',
            'Número de contrato',
            'Objeto de contrato',
            'Tipo de contrato',
            'Rol',
        ];
    }
    public function collection()
    {
        $docentes = DB::table('persona')
        ->select('docente_contrato.id','doco_fecha_inicio','doco_fecha_fin','per_nombre','per_apellido','doco_numero_contrato',
        'doco_objeto_contrato','doco_tipo_contrato','doco_rol')
        ->join('docente_contrato','persona.id','=','docente_contrato.doco_persona_docente')
        ->get();
        return $docentes;
    }
}
