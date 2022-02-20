<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NivelFormacionExports implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Nivel formación',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $nivelformacion = DB::table('nivel_formacion')->select(
            'nivel_formacion.id',
            'niv_nombre',
            'created_at',
        )
        ->get();

        return $nivelformacion;
    }
}
