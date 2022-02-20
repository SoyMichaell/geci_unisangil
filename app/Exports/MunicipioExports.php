<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MunicipioExports implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Departamento',
            'Municipio',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $municipios = DB::table('municipio')->select(
            'municipio.id',
            'dep_nombre',
            'mun_nombre',
            'municipio.created_at',
        )->join('departamento','municipio.mun_departamento','=','departamento.id')
            ->get();

        return $municipios;
    }
}
