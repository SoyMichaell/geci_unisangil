<?php

namespace App\Exports;

use App\Models\Convenio;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class ConvenioExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
            return [
                '#',
                'Número de convenio',
                'Alcance',
                'Tipo',
                'Institución',
                'Nit',
                'Dirección',
                'Ciudad',
                'País',
                'Nombre contacto',
                'Correo electronico',
                'Telefono',
                'Objeto',
                'Logros o resultados',
                'Vigencia',
                'Programa (s) beneficiado (s)',
                'Actividad o Actividades',
                'Fecha inicio',
                'Fecha final',
                'Observacion',
                'Fecha registro',
                'Fecha actulización registro'
            ];
        
    }
    public function collection()
    {
        $convenios = Convenio::all();
        return $convenios;
    }
}
