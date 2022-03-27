<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class PracticaExport implements FromCollection, WithHeadings
{

    public function __construct(String $valor){ 
        $this->valor = $valor;
    }

    public function headings(): array
    {
        return [
            '#',
            'Año',
            'Rol',
            'Tipo documento',
            'Número documento',
            'Nombre (s)',
            'Apellido (s)',
            'Razón social',
            'Nit empresa',
            'País',
            'Departamento',
            'Ciudad',
            'Dirección',
            'Telefono',
            'Url',
            'Correo electronico',
            'Área de practica',
            'Cargo',
        ];
    }
    public function collection()
    {
        if($this->valor == 'general'){
            $datos = DB::table('practica_laboral')
            ->select(
                'practica_laboral.id','prac_year','prac_rol','per_tipo_documento','per_numero_documento','per_nombre','per_apellido',
                'prac_razon_social','prac_nit_empresa','prac_pais','prac_departamento','prac_ciudad','prac_direccion',
                'prac_telefono','prac_url_web','prac_correo','prac_area_practica','prac_cargo'
            )
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->get();
            return $datos;
        }else if($this->valor == 'docente'){
            $datos = DB::table('practica_laboral')
            ->select(
                'practica_laboral.id','prac_year','prac_rol','per_tipo_documento','per_numero_documento','per_nombre','per_apellido',
                'prac_razon_social','prac_nit_empresa','prac_pais','prac_departamento','prac_ciudad','prac_direccion',
                'prac_telefono','prac_url_web','prac_correo','prac_area_practica','prac_cargo'
            )
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->where('prac_rol', 'Docente')
            ->get();
            return $datos;
        }else if($this->valor == 'estudiante'){
            $datos = DB::table('practica_laboral')
            ->select(
                'practica_laboral.id','prac_year','prac_rol','per_tipo_documento','per_numero_documento','per_nombre','per_apellido',
                'prac_razon_social','prac_nit_empresa','prac_pais','prac_departamento','prac_ciudad','prac_direccion',
                'prac_telefono','prac_url_web','prac_correo','prac_area_practica','prac_cargo'
            )
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->where('prac_rol', 'Estudiante')
            ->get();
            return $datos;
        }
    }
}
