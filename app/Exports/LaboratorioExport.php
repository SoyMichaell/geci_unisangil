<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class LaboratorioExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
            return [
                '#',
                'Fecha',
                'Nombre laboratorio',
                'Ubicación',
                'Docente responsable',
                'Finalidad',
                'Facultad',
                'Programa',
                'Practicante responsable',
                'Cantidad estudiantes',
                'Software',
                'Materiales',
                'Observaciones'
            ];
        
    }
    public function collection()
    {
        $redes = DB::table('laboratorio')
        ->select(
            'laboratorio.id','lab_fecha','lab_nombre','lab_ubicacion',DB::raw("CONCAT(docente.per_nombre,' ',docente.per_apellido)"),'lab_finalidad',
            'fac_nombre','pro_nombre',DB::raw("CONCAT(practicante.per_nombre,' ',practicante.per_apellido)"),'lab_cantidad_estudiante','sof_nombre',
            'lab_material','lab_observaciones'
        )
        ->join('persona AS docente','laboratorio.lab_id_docente','=','docente.id')
        ->join('persona AS practicante','laboratorio.lab_id_practicante','=','practicante.id')
        ->join('facultad','laboratorio.lab_id_facultad','=','facultad.id')
        ->join('programa','laboratorio.lab_id_programa','=','programa.id')
        ->join('software','laboratorio.lab_id_software','=','software.id')
        ->get();
        return $redes;
    }
}
