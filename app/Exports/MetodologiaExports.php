<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MetodologiaExports implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Metodología',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $metodologias = DB::table('metodologia')->select(
            'metodologia.id',
            'met_nombre',
            'created_at',
        )
            ->get();

        return $metodologias;
    }
}
