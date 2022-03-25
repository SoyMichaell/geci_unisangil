<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class DocenteVisitanteExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'Año',
            'Periodo',
            'Tipo documento',
            'Número documento',
            'Nombre (s)',
            'Apellido (s)',
            'Telefono',
            'Correo electronico',
            'Entidad origen',
            'País',
            'Ciudad',
            'Fecha estadía',
            'Cantidad hora (s)',
            'Cantidad día (s)',
            'Cantidad semana (s)',
            'Cantidad mes',
            'Cantidad año (s)',
            'Objeto',
            'Actividades desarrolladas',
        ];
    }
    public function collection()
    {
        $docentes = DB::table('docente_visitante')
        ->select('docente_visitante.id','docvi_year','docvi_periodo','docvi_tipo_documento','docvi_numero_documento','docvi_nombre','docvi_apellido','docvi_telefono',
        'docvi_correo','docvi_entidad_origen','docvi_pais','docvi_ciudad','docvi_fecha_estadia','docvi_cantidad_hora','docvi_cantidad_dia',
        'docvi_cantidad_semana','docvi_cantidad_mes','docvi_cantidad_year','docvi_objeto','docvi_actividad_desarrolladas')
        ->get();
        return $docentes;
    }
}
