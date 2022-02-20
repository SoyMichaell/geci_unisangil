<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepartamentoExports implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Departamento',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $departamentos = DB::table('departamento')->select(
            'departamento.id',
            'dep_nombre',
            'created_at',
        )
            ->get();

        return $departamentos;
    }
}
