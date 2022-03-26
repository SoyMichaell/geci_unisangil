<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class TrabajoGradoExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'Fecha inicio',
            'Código proyecto',
            'Titulo proyecto',
            'Autores',
            'Modalidad de grado',
            'Director',
            'Codirector',
            'Estado propuesta',
            'Estado proyecto',
            'Jurado 1',
            'Jurado 2',
            'Número acta de sustentación',
            'Número acta de grado ',
            'Fecha finalización',
            'Observación'
        ];
    }
    public function collection()
    {
        $trabajos = DB::table('trabajo_grado')
            ->select(
                'trabajo_grado.id',
                'tra_fecha_inicio',
                'tra_codigo_proyecto',
                'tra_titulo_proyecto',
                'tra_id_estudiante',
                'mod_nombre',
                DB::raw("CONCAT(director.per_nombre,' ',director.per_apellido)"),
                DB::raw("CONCAT(codirector.per_nombre,' ',codirector.per_apellido)"),
                'tra_estado_propuesta',
                'tra_estado_proyecto',
                DB::raw("CONCAT(jurado1.per_nombre,' ',jurado1.per_apellido)"),
                DB::raw("CONCAT(jurado2.per_nombre,' ',jurado2.per_apellido)"),
                'tra_numero_acta_sustentacion',
                'tra_numero_acta_grado',
                'tra_fecha_finalizacion',
                'tra_observacion'
            )
            ->join('persona AS director','trabajo_grado.tra_id_director','=','director.id')
            ->join('persona AS codirector','trabajo_grado.tra_id_codirector','=','codirector.id')
            ->join('persona AS jurado1','trabajo_grado.tra_id_jurado1','=','jurado1.id')
            ->join('persona AS jurado2','trabajo_grado.tra_id_jurado2','=','jurado2.id')
            ->join('modalidad_grado','trabajo_grado.tra_modalidad_grado','=','modalidad_grado.id')
            ->orderByDesc('tra_fecha_inicio')->get();
        return $trabajos;
    }
}
