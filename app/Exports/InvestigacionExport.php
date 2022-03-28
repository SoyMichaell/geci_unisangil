<?php

namespace App\Exports;

use App\Models\Convenio;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class InvestigacionExport implements FromCollection, WithHeadings
{

    public function __construct(String $valor)
    {
        $this->valor = $valor;   
    }


    public function headings(): array
    {

        if($this->valor == 'grupo'){
            return [
                '#',
                'Coordinador grupo',
                'Grupo',
                'Correo institucional grupo',
                'Código minciencias',
                'Misión',
                'Visión',
                'Url grupo',
                'Url GrupLac',
                'Área conocimiento principal',
                'Nucleo del conocimiento NBC',
                'Sede',
                'Facultad',
                'Categoria grupo',
                'Aval minciencias',
                'Lineas de investigación'
            ];
        }else if($this->valor == 'integrante'){
            return [
                '#',
                'Tipo documento',
                'Número documento',
                'Nombre (s)',
                'Apellido (s)',
                'Enlace CvLAC',
                'Tipo vinculación',
                'Categoria',
                'Grupo de investigación'
            ];
        }else if($this->valor == 'proyecto'){
            return [
                '#',
                'Grupo de investigación',
                'Titulo proyecto',
                'Resumen',
                'Impacto',
                'Lugar',
                'Resultados',
                'Fecha inicio',
                'Integrantes',
                'Palabras claves',
                'Estado'
            ];
        }
        
    }
    public function collection()
    {

        if($this->valor == 'grupo'){
            $grupos = DB::table('inv_grupo_investigacion')
        ->select(
            'inv_grupo_investigacion.id',DB::raw("CONCAT(per_nombre,' ',per_apellido)"),'inv_nombre_grupo','inv_correo_institucional_grupo',
            'inv_codigo_minciencias','inv_mision','inv_vision','inv_url_grupo','inv_url_gruplac','inv_area_conocimiento_principal',
            'inv_nucleo_conocimiento_nbc','mun_nombre','fac_nombre','inv_categoria_grupo','inv_aval_minciencias','inv_lineas_investigacion'
        )
        ->join('persona','inv_grupo_investigacion.inv_id_coordinador','=','persona.id')
        ->join('municipio','inv_grupo_investigacion.inv_sede','=','municipio.id')
        ->join('facultad','inv_grupo_investigacion.inv_facultad','=','facultad.id')
        ->get();
        return $grupos;
        }else if($this->valor == 'integrante'){
            $integrantes = DB::table('inv_investigador')
        ->select(
            'inv_investigador.id','per_tipo_documento','per_numero_documento','per_nombre','per_apellido',
            'inves_enlace_cvlac','inves_tipo_vinculacion','inves_categoria','inv_nombre_grupo'
        )
        ->join('persona','inv_investigador.inves_id_persona','=','persona.id')
        ->join('inv_grupo_investigacion','inv_investigador.inves_id_grupo','=','inv_grupo_investigacion.id')
        ->get();
        return $integrantes;
        }else if($this->valor == 'proyecto'){
            $proyectos = DB::table('inv_proyecto')
            ->select(
                'inv_proyecto.id','inv_nombre_grupo','invpro_titulo','invpro_resumen','invpro_impacto','invpro_lugar',
                'invpro_resultados','invpro_fecha_inicio','invpro_id_integrantes','invpro_palabras_clave','invpro_estado'
            )
            ->join('inv_grupo_investigacion','inv_proyecto.invpro_id_grupo','=','inv_grupo_investigacion.id')
            ->get();
            return $proyectos;
        }

        
    }
}
