<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class RedExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
            return [
                '#',
                'Año',
                'Red',
                'Nombre contacto',
                'Telefono',
                'País',
                'Ciudad',
                'Alcance',
                'Acción',
                'Programa (s)',
                'Observación',
            ];
        
    }
    public function collection()
    {
        $redes = DB::table('red_academica')
        ->select(
            'red_academica.id','red_year','red_nombre','red_nombre_contacto','red_telefono','red_pais',
            'red_ciudad','red_alcance','red_accion','red_id_programa','red_observacion'
        )
        ->get();
        return $redes;
    }
}
