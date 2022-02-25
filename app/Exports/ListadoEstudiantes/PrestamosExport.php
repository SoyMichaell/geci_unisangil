<?php
namespace App\Exports\ListadoEstudiantes;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrestamosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
       
    }
    public function collection()
    {
        
    }
}
