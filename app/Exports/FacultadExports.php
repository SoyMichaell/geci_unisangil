<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FacultadExports implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Facultad',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $facultades = DB::table('facultad')->select(
            'facultad.id',
            'fac_nombre',
            'created_at',
        )
            ->get();

        return $facultades;
    }
}
