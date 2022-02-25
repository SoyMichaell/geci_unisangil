<?php
namespace App\Exports\ListadoEstudiantes;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContadosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
           
        ];
    }
    public function collection()
    {
        
    }
}
