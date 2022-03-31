<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class ExtensionExport implements FromCollection, WithHeadings
{

    public function __construct(String $valor)
    {
        $this->valor = $valor;
    }

    public function headings(): array
    {
            if($this->valor == 'actividadcultural'){
                return [
                    '#',
                    'Año',
                    'Semestre',
                    'Código organizacional',
                    'Código actividad',
                    'Descripción actividad',
                    'Tipo actividad',
                    'Fecha inicio',
                    'Fecha fin',
                    'Fuente nacional',
                    'Valor nacional',
                    'Nombre institución',
                    'Fuente internacional',
                    'Pais financiador',
                    'Valor internacional',
                    'Tipo de documento',
                    'Número de documento',
                    'Nombre (s)',
                    'Apellido (s)',
                    'Dedicación'
                ];
            }else if($this->valor == 'consultoria'){
                return [
                    '#',
                    'Año',
                    'Semestre',
                    'Código consultoria',
                    'Descripción',
                    'ID Cine detallado',
                    'Nombre entidad',
                    'Sector',
                    'Valor',
                    'Fecha inicio',
                    'Fecha fin',
                    'Fuente nacional',
                    'Valor nacional',
                    'Nombre institución',
                    'Fuente internacional',
                    'País',
                    'Valor internacional',
                    'Tipo documento',
                    'Número documento',
                    'Nombre (s)',
                    'Apellido (s)',
                    'Nivel de estudio'
                ];
            }else if($this->valor == 'curso'){
                return [
                    '#',
                    'Año',
                    'Semestre',
                    'Código curso',
                    'Nombre curso',
                    'CINE Detallado',
                    '¿Es curso de extensión?',
                    '¿Estado del curso?',
                    'Fecha curso',
                    'Url',
                    'Tipo documento',
                    'Número documento',
                    'Nombre (s)',
                    'Apellido (s)'
                ];  
            }else if($this->valor == 'educacioncontinua'){
                return [
                    '#',
                    'Semestre',
                    'Código curso',
                    'Número de horas',
                    'Tipo curso',
                    'Valor',
                    'Tipo documento',
                    'Número documento',
                    'Nombre (s)',
                    'Apellido (s)',
                    'Tipo extension',
                    'Cantidad',
                    'Url soporte'
                ];
            }else if($this->valor == 'participante'){
                return [
                    '#',
                    'Tipo documento',
                    'Número de documento',
                    'Fecha expedición',
                    'Nombre (s)',
                    'Apellido (s)',
                    'ID Sexo bilogico',
                    'ID Estado civil',
                    'ID País',
                    'ID Municipio',
                    'Telefono',
                    'Correo personal',
                    'Correo institucional',
                    'Dirección institucional'
                ];
            }
        
    }
    public function collection()
    {
        if($this->valor == 'actividadcultural'){

            $actividadculturals = DB::table('ext_actividad_cultural')
            ->select('ext_actividad_cultural.id','extcul_year','extcul_semestre','extcul_codigo_unidad_org','extcul_codigo_actividad','extcul_descripcion_actividad','extcul_tipo_actividad',
            'extcul_fecha_inicio','extcul_fecha_fin','cofuna_nombre','extcul_valor_financiacion_nac','extcul_nombre_institucion','cofuin_nombre','extcul_pais_financiador',
            'extcul_valor_internacional','per_tipo_documento','per_numero_documento','per_nombre','per_apellido','extcul_dedicacion')
            ->leftJoin('compl_fuente_nacional','ext_actividad_cultural.extcul_fuente_nacional','=','compl_fuente_nacional.id')
            ->leftJoin('compl_fuente_internacional','ext_actividad_cultural.extcul_fuente_internacional','=','compl_fuente_internacional.id')
            ->leftJoin('persona','ext_actividad_cultural.extcul_persona','=','persona.id')
            ->get();
            return $actividadculturals;
        }else if($this->valor == 'consultoria'){
            $consultorias = DB::table('ext_consultoria')
            ->select('ext_consultoria.id','extcon_year','extcon_semestre','extcon_codigo_consultoria','extcon_descripcion','cocide_nombre','extcon_nombre_entidad','cose_nombre',
            'extcon_valor','extcon_fecha_inicio','extcon_fecha_fin','cofuna_nombre','extcon_valor_nacional','extcon_nombre_institucion','cofuin_nombre','extcon_pais','extcon_valor_internacional',
            'per_tipo_documento','per_numero_documento','per_nombre','per_apellido','conies_nombre')
            ->leftJoin('compl_cine_detallado','ext_consultoria.extcon_id_cine_campo','=','compl_cine_detallado.id')
            ->leftJoin('compl_sector','ext_consultoria.ext_sector_consultoria','=','compl_sector.id')
            ->leftJoin('compl_fuente_nacional','ext_consultoria.extcon_fuente_nacional','=','compl_fuente_nacional.id')
            ->leftJoin('compl_fuente_internacional','ext_consultoria.extcon_fuente_internacional','=','compl_fuente_internacional.id')
            ->leftJoin('persona','ext_consultoria.extcon_id_persona','persona.id')
            ->leftJoin('compl_nivel_estudio','ext_consultoria.extcon_id_nivel_estudio','compl_nivel_estudio.id')
            ->get();
            return $consultorias;
        }else if($this->valor == 'curso'){
            $curso = DB::table('ext_curso')
            ->select('ext_curso.id','extcurso_year','extcurso_semestre','extcurso_codigo','extcurso_nombre','cocide_nombre','extcurso_extension','extcurso_estado','extcurso_fecha','extcurso_url_soporte',
            'per_tipo_documento','per_numero_documento','per_nombre','per_apellido')
            ->leftJoin('compl_cine_detallado','ext_curso.extcurso_id_cine','=','compl_cine_detallado.id')
            ->leftJoin('persona','ext_curso.extcurso_id_docente','=','persona.id')
            ->get();
            return $curso;
        }else if($this->valor == 'educacioncontinua'){
            $educacions = DB::table('ext_educacion_continua')
            ->select('ext_educacion_continua.id','extedu_semestre','extedu_codigo_curso','extedu_numero_horas','extedu_tipo_curso','extedu_valor_curso','per_tipo_documento',
            'per_numero_documento','per_nombre','per_apellido','coarex_nombre','extedu_cantidad','extedu_url_soporte')
            ->leftJoin('persona','ext_educacion_continua.extedu_id_docente','=','persona.id')
            ->leftJoin('compl_area_extension','ext_educacion_continua.extedu_tipo_extension','=','compl_area_extension.id')
            ->get();
            return $educacions;
        }else if($this->valor == 'participante'){
            $participantes = DB::table('ext_participante')
            ->select('ext_participante.id','per_tipo_documento','per_numero_documento','dop_fecha_expedicion','per_nombre','per_apellido','dop_sexo_biologico',
            'dop_estado_civil','dop_id_pais','dop_id_municipio','per_telefono','dop_correo_personal','per_correo','dop_direccion')
            ->join('persona','ext_participante.dop_id_docente','=','persona.id')
            ->get();
            return $participantes;
        }
    }
}
