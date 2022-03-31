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
            }else if($this->valor == 'proyectoextension'){
                return [
                    '#',
                    'Año',
                    'Semestre',
                    'Código organizacional',
                    'Código proyecto',
                    'Nombre proyecto',
                    'Descripción',
                    'Valor',
                    'Área de extensión',
                    'Fecha inicio',
                    'Fecha final',
                    'Nombre contacto',
                    'Apellido contacto',
                    'Telefono',
                    'Correo',
                    'Área de trabajo',
                    'Ciclo vital',
                    'Entidad nacional',
                    'Fuente nacional',
                    'Valor financiación nacional',
                    'Fuente internacional',
                    'ID País',
                    'Nombre institución internacional',
                    'Valor financiación',
                    'Nombre otra entidad',
                    'Sector entidad',
                    'País',
                    'Población condición',
                    'Cantidad grupo',
                    'Población grupo',
                    'Cantidad grupo',
                    'Soporte'
                ];
            }else if($this->valor == 'servicioextension'){
                return [
                    '#',
                    'Año',
                    'Semestre',
                    'Código organizacional',
                    'Código proyecto',
                    'Nombre proyecto',
                    'Descripción',
                    'Valor',
                    'Área de extensión',
                    'Fecha inicio',
                    'Fecha final',
                    'Nombre contacto',
                    'Apellido contacto',
                    'Telefono',
                    'Correo',
                    'Costo',
                    'Criterio elegibilidad',
                    'Área de trabajo',
                    'Ciclo vital',
                    'Entidad nacional',
                    'Fuente nacional',
                    'Valor financiación nacional',
                    'Fuente internacional',
                    'ID País',
                    'Nombre institución internacional',
                    'Valor financiación',
                    'Nombre otra entidad',
                    'Sector entidad',
                    'País',
                    'Población condición',
                    'Cantidad grupo',
                    'Población grupo',
                    'Cantidad grupo',
                    'Soporte'
                ];  
            }else if($this->valor == 'fotografico'){
                return [
                    '#',
                    'Año',
                    'Periodo',
                    'Tipo actividad',
                    'Actividad',
                    'Ente organizador',
                    'Fecha',
                    'Tipo evento',
                    'Tipo modalidad',
                    'Soporte'
                ];
            }else if($this->valor == 'redacademica'){
                return [
                    '#',
                    'Año',
                    'Periodo',
                    'IES',
                    'Caracter',
                    'Fecha',
                    'Logros',
                    'Resultados',
                    'Función',
                    'Cantidad participantes'
                ];
            }else if($this->valor == 'redorganizacion'){
                return [
                    '#',
                    'Año',
                    'Periodo',
                    'Tipo',
                    'Nombre',
                    'Caracter',
                    'Fecha',
                    'Actividades',
                    'Logro (s)',
                    'Resultado (s)',
                    'Producto (s)',
                    'Función',
                    'Cantidad participantes'
                ];
            }else if($this->valor == 'curriculo'){
                return [
                    '#',
                    'Año',
                    'Periodo',
                    'Asignatura',
                    'Docente',
                    'Uso idioma',
                    'Uso tic',
                    'Competencia global',
                    'Número movilidad estudiantil',
                    'Otra (s) actividad'
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
        }else if($this->valor == 'proyectoextension'){
            $proyectoextension = DB::table('ext_proyecto_extension')
            ->select('ext_proyecto_extension.id','extprex_year','extprex_semestre','extprex_codigo_organizacional','extprex_codigo_pr','extprex_nombre_pr','extprex_descripcion_pr',
            'extprex_valor_pr','coarex_nombre','extprex_fecha_inicio','extprex_fecha_final','extprex_nombre_contacto','extprex_apellido_contacto','extprex_telefono_contacto',
            'extprex_correo_contacto','coartra_nombre','extprex_id_ciclo_vital','coenna_nombre','cofuna_nombre','extprex_valor_financiacion_nac','cofuin_nombre','extprex_id_pais',
            'extprex_nombre_institucion_inter','extprex_valor_financiacion_inter','extprex_nombre_otra_entidad','cose_nombre','extprex_id_pais_otra_entidad','copoco_nombre',
            'extprex_cantidad_condicion','copogr_nombre','extprex_cantidad_grupo','extprex_soporte')
            ->leftJoin('compl_area_extension','ext_proyecto_extension.extprex_id_area_extension','=','compl_area_extension.id')
            ->leftJoin('compl_area_trabajo','ext_proyecto_extension.extprex_id_area_trabajo','=','compl_area_trabajo.id')
            ->leftJoin('compl_entidad_nacional','ext_proyecto_extension.extprex_id_entidad_nacional','=','compl_entidad_nacional.id')
            ->leftJoin('compl_fuente_nacional','ext_proyecto_extension.extprex_id_fuente_nacional','=','compl_fuente_nacional.id')
            ->leftJoin('compl_fuente_internacional','ext_proyecto_extension.extprex_id_fuente_internacional','=','compl_fuente_internacional.id')
            ->leftJoin('compl_sector','ext_proyecto_extension.extprex_id_sector_otra_entidad','=','compl_sector.id')
            ->leftJoin('compl_poblacion_condicion','ext_proyecto_extension.extprex_id_poblacion_condicion','=','compl_poblacion_condicion.id')
            ->leftJoin('compl_poblacion_grupo','ext_proyecto_extension.extprex_id_poblacion_grupo','=','compl_poblacion_grupo.id')
            ->get();
            return $proyectoextension;
        }else if($this->valor == 'servicioextension'){
            $servicioextension = DB::table('ext_servicio_extension')
            ->select('ext_servicio_extension.id','extseex_year','extseex_semestre','extseex_codigo_organizacional','extseex_codigo_ser','extseex_nombre_ser','extseex_descripcion_ser',
            'extseex_valor_ser','coarex_nombre','extseex_fecha_inicio','extseex_fecha_final','extseex_nombre_contacto','extseex_apellido_contacto','extseex_telefono_contacto',
            'extseex_correo_contacto','extseex_costo','extseex_criterio_elegibilidad','coartra_nombre','extseex_id_ciclo_vital','coenna_nombre','cofuna_nombre','extseex_valor_financiacion_nac','cofuin_nombre','extseex_id_pais',
            'extseex_nombre_institucion_inter','extseex_valor_financiacion_inter','extseex_nombre_otra_entidad','cose_nombre','extseex_id_pais_otra_entidad','copoco_nombre',
            'extseex_cantidad_condicion','copogr_nombre','extseex_cantidad_grupo','extseex_soporte')
            ->leftJoin('compl_area_extension','ext_servicio_extension.extseex_id_area_extension','=','compl_area_extension.id')
            ->leftJoin('compl_area_trabajo','ext_servicio_extension.extseex_id_area_trabajo','=','compl_area_trabajo.id')
            ->leftJoin('compl_entidad_nacional','ext_servicio_extension.extseex_id_entidad_nacional','=','compl_entidad_nacional.id')
            ->leftJoin('compl_fuente_nacional','ext_servicio_extension.extseex_id_fuente_nacional','=','compl_fuente_nacional.id')
            ->leftJoin('compl_fuente_internacional','ext_servicio_extension.extseex_id_fuente_internacional','=','compl_fuente_internacional.id')
            ->leftJoin('compl_sector','ext_servicio_extension.extseex_id_sector_otra_entidad','=','compl_sector.id')
            ->leftJoin('compl_poblacion_condicion','ext_servicio_extension.extseex_id_poblacion_condicion','=','compl_poblacion_condicion.id')
            ->leftJoin('compl_poblacion_grupo','ext_servicio_extension.extseex_id_poblacion_grupo','=','compl_poblacion_grupo.id')
            ->get();
            return $servicioextension;
        }else if($this->valor == 'fotografico'){
            $fotograficos = DB::table('ext_registro_fotografico_inter')
            ->select('ext_registro_fotografico_inter.id','extrefoin_year','extrefoin_periodo','extrefoin_tipo_actividad','extrefoin_actividad','extrefoin_ente_organizador',
            'extrefoin_fecha','extrefoin_tipo_evento','extrefoin_tipo_modalidad','extrefoin_soporte')
            ->get();
            return $fotograficos;
        }else if($this->valor == 'redacademica'){
            $redacademica = DB::table('ext_sector_externo_red_academia_convenio')
            ->select('ext_sector_externo_red_academia_convenio.id','exsered_year','exsered_periodo','exsered_ies','exsered_caracter','exsered_fecha',
            'exsered_logros','exsered_resultados','exsered_productos','exsered_funcion','exsered_participantes')
            ->get();
            return $redacademica;
        }else if($this->valor == 'redorganizacion'){
            $redorganizacion = DB::table('ext_sector_externo_organizaciones')
            ->select('ext_sector_externo_organizaciones.id','exseor_year','exseor_periodo','exseor_tipo','exseor_nombre','exseor_caracter','exseor_fecha',
            'exseor_actividades','exseor_logros','exseor_resultados','exseor_productos','exseor_funcion','exseor_participantes')
            ->get();
            return $redorganizacion;
        }else if($this->valor == 'curriculo'){
            $curriculos = DB::table('ext_internacionalizacion_curriculo')
            ->select('ext_internacionalizacion_curriculo.id','exincu_year','exincu_periodo','asig_nombre',DB::raw("CONCAT(per_nombre,' ',per_apellido)"),'ext_uso_idioma',
            'ext_uso_tic','ext_competencia_global','ext_movilidad_estudiante','ext_otra_actividad')
            ->join('persona','ext_internacionalizacion_curriculo.exincu_id_docente','=','persona.id')
            ->join('programa_plan_estudio_asignatura','ext_internacionalizacion_curriculo.exincu_id_asignatura','programa_plan_estudio_asignatura.id')
            ->get();
            return $curriculos;
        }
    }
}
