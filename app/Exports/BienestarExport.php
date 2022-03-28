<?php

namespace App\Exports;

use App\Models\Bienestar;
use App\Models\Convenio;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class BienestarExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
            return [
                '#',
                'Fecha',
                'Actividad',
                'Total participantes',
                '# Estudiantes',
                '# Docentes',
                '# Administrativos',
                '# Egresados',
                '# Particulares',
                'Código SNIES',
                'Soporte',
                'Observación',
                'Fecha registro',
                'Fecha actualización'
            ];
        
    }
    public function collection()
    {
        $bienestars = Bienestar::all();
        return $bienestars;
    }
}
