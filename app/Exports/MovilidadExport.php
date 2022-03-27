<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class MovilidadExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
            return [
                '#',
                'Año',
                'Periodo',
                'Tipo persona',
                'Nombre completo',
                'Tipo movilidad',
                'Evento',
                'País',
                'Ciudad',
                'Observación',
            ];
        
    }
    public function collection()
    {
        $redes = DB::table('movilidad')
        ->select(
            'movilidad.id','movi_year','movi_periodo','movi_tipo_persona',DB::raw("CONCAT(persona.per_nombre,' ',persona.per_apellido)"),'movi_tipo_movilidad',
            'movi_evento','movi_pais','movi_ciudad','movi_observacion'
        )
        ->join('persona','movilidad.movi_id_persona','=','persona.id')
        ->get();
        return $redes;
    }
}
