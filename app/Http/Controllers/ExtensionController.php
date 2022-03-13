<?php

namespace App\Http\Controllers;

use App\Models\complemento\CineDetallado;
use App\Models\complemento\FuenteInternacional;
use App\Models\ExtActividadCultural;
use App\Models\complemento\FuenteNacional;
use App\Models\complemento\NivelEstudio;
use App\Models\complemento\Sector;
use App\Models\ExtActividadCulturalRecursoHumano;
use App\Models\ExtConsultoria;
use App\Models\ExtConsultoriaRecursoHumano;
use App\Models\ExtCurso;
use App\Models\ExtEducacionContinua;
use App\Models\ExtInternacionalizacionCurriculo;
use App\Models\ExtInterRedConvenio;
use App\Models\ExtInterRedConvenioParticipante;
use App\Models\ExtParticipante;
use App\Models\ExtProyectoExtension;
use App\Models\ExtRedOrganizacion;
use App\Models\ExtRegistroFotograficoInter;
use App\Models\ExtServicioExtension;
use App\Models\ProgramaAsignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Svg\Tag\Rect;

class ExtensionController extends Controller
{
    public function index()
    {
        return view('extension.index');
    }

    public function mostraractividad()
    {
        $actividadescul = ExtActividadCultural::all();
        return view('extension/cultural.index')->with('actividadescul', $actividadescul);
    }

    public function crearactividad()
    {
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        return view('extension/cultural.create')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales);
    }

    public function registroactividad(Request $request)
    {
        $rules = [
            'extcul_year' => 'required',
            'extcul_semestre' => 'required',
            'extcul_codigo_unidad_org' => 'required',
            'extcul_codigo_actividad' => 'required',
            'extcul_descripcion_actividad' => 'required',
            'extcul_tipo_actividad' => 'required|not_in:0',
            'extcul_fecha_inicio' => 'required',
            'extcul_fecha_fin' => 'required',
            'extcul_fuente_nacional' => 'required|not_in:0',
            'extcul_valor_financiacion_nac' => 'required',
            'extcul_nombre_institucion' => 'required',
        ];
        $message = [
            'extcul_year.required' => 'El campo año es requerido',
            'extcul_semestre.required' => 'El campo semestre es requerido',
            'extcul_codigo_unidad_org.required' => 'El campo código unidad organizacional es requerido',
            'extcul_codigo_actividad.required' => 'El campo código actividad es requerido',
            'extcul_descripcion_actividad.required' => 'El campo descripción es requerido',
            'extcul_tipo_actividad.required' => 'El campo tipo actividad es requerido',
            'extcul_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extcul_fecha_fin.required' => 'El campo fecha fin es requerido',
            'extcul_fuente_nacional.required' => 'El campo fuente nacional es requerido',
            'extcul_valor_financiacion_nac.required' => 'El campo valor financiación nacional es requerido',
            'extcul_nombre_institucion.required' => 'El campo nombre institución es requerido',
        ];

        $this->validate($request, $rules, $message);

        $actividad = new ExtActividadCultural();
        $actividad->extcul_year = $request->get('extcul_year');
        $actividad->extcul_semestre = $request->get('extcul_semestre');
        $actividad->extcul_codigo_unidad_org = $request->get('extcul_codigo_unidad_org');
        $actividad->extcul_codigo_actividad = $request->get('extcul_codigo_actividad');
        $actividad->extcul_descripcion_actividad = $request->get('extcul_descripcion_actividad');
        $actividad->extcul_tipo_actividad = $request->get('extcul_tipo_actividad');
        $actividad->extcul_fecha_inicio = $request->get('extcul_fecha_inicio');
        $actividad->extcul_fecha_fin = $request->get('extcul_fecha_fin');
        $actividad->extcul_fuente_nacional = $request->get('extcul_fuente_nacional');
        $actividad->extcul_valor_financiacion_nac = $request->get('extcul_valor_financiacion_nac');
        $actividad->extcul_nombre_institucion = $request->get('extcul_nombre_institucion');
        $actividad->extcul_fuente_internacional = $request->get('extcul_fuente_internacional');
        $actividad->extcul_pais_financiador = $request->get('extcul_pais_financiador');
        $actividad->extcul_valor_internacional = $request->get('extcul_valor_internacional');

        $actividad->save();

        Alert::success('Exitoso', 'La actividad se ha creado con exito');
        return redirect('/extension/mostraractividad');
    }

    public function editaractividad($id)
    {
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $actividad = ExtActividadCultural::find($id);
        return view('extension/cultural.edit')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('actividad', $actividad);
    }

    public function actualizaractividad(Request $request, $id)
    {

        $rules = [
            'extcul_year' => 'required',
            'extcul_semestre' => 'required',
            'extcul_codigo_unidad_org' => 'required',
            'extcul_codigo_actividad' => 'required',
            'extcul_descripcion_actividad' => 'required',
            'extcul_tipo_actividad' => 'required|not_in:0',
            'extcul_fecha_inicio' => 'required',
            'extcul_fecha_fin' => 'required',
            'extcul_fuente_nacional' => 'required|not_in:0',
            'extcul_valor_financiacion_nac' => 'required',
            'extcul_nombre_institucion' => 'required',
        ];
        $message = [
            'extcul_year.required' => 'El campo año es requerido',
            'extcul_semestre.required' => 'El campo semestre es requerido',
            'extcul_codigo_unidad_org.required' => 'El campo código unidad organizacional es requerido',
            'extcul_codigo_actividad.required' => 'El campo código actividad es requerido',
            'extcul_descripcion_actividad.required' => 'El campo descripción es requerido',
            'extcul_tipo_actividad.required' => 'El campo tipo actividad es requerido',
            'extcul_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extcul_fecha_fin.required' => 'El campo fecha fin es requerido',
            'extcul_fuente_nacional.required' => 'El campo fuente nacional es requerido',
            'extcul_valor_financiacion_nac.required' => 'El campo valor financiación nacional es requerido',
            'extcul_nombre_institucion.required' => 'El campo nombre institución es requerido',
        ];

        $this->validate($request, $rules, $message);

        $actividad = ExtActividadCultural::find($id);
        $actividad->extcul_year = $request->get('extcul_year');
        $actividad->extcul_semestre = $request->get('extcul_semestre');
        $actividad->extcul_codigo_unidad_org = $request->get('extcul_codigo_unidad_org');
        $actividad->extcul_codigo_actividad = $request->get('extcul_codigo_actividad');
        $actividad->extcul_descripcion_actividad = $request->get('extcul_descripcion_actividad');
        $actividad->extcul_tipo_actividad = $request->get('extcul_tipo_actividad');
        $actividad->extcul_fecha_inicio = $request->get('extcul_fecha_inicio');
        $actividad->extcul_fecha_fin = $request->get('extcul_fecha_fin');
        $actividad->extcul_fuente_nacional = $request->get('extcul_fuente_nacional');
        $actividad->extcul_valor_financiacion_nac = $request->get('extcul_valor_financiacion_nac');
        $actividad->extcul_nombre_institucion = $request->get('extcul_nombre_institucion');
        $actividad->extcul_fuente_internacional = $request->get('extcul_fuente_internacional');
        $actividad->extcul_pais_financiador = $request->get('extcul_pais_financiador');
        $actividad->extcul_valor_internacional = $request->get('extcul_valor_internacional');

        $actividad->save();

        Alert::success('Exitoso', 'La actividad se actualizo con exito');
        return redirect('/extension/mostraractividad');
    }

    public function veractividad($id)
    {
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $actividad = ExtActividadCultural::find($id);
        return view('extension/cultural.show')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('actividad', $actividad);
    }

    public function eliminaractividad($id)
    {
        $actividad = ExtActividadCultural::find($id);
        $actividad->delete();
        Alert::success('Exitoso', 'La actividad se ha eliminado con exito');
        return redirect('/extension/mostraractividad');
    }

    public function mostraractrecurso()
    {
        $actrecursos  = ExtActividadCulturalRecursoHumano::all();
        return view('extension/culturalrecurso.index')->with('actrecursos', $actrecursos);
    }

    public function crearactrecurso()
    {
        return view('extension/culturalrecurso.create');
    }

    public function registroactrecurso(Request $request)
    {
        $rules = [
            'extculre_year' => 'required',
            'extculre_codigo_organizacional' => 'required',
            'extculre_codigo_actividad' => 'required',
            'extculre_tipo_documento' => 'required',
            'extculre_numero_documento' => 'required',
            'extculre_dedicacion' => 'required|not_in:0',
        ];
        $message = [
            'extculre_year.required' => 'El campo año es requerido',
            'extculre_codigo_organizacional.required' => 'El campo código unidad organizacional es requerido',
            'extculre_codigo_actividad.required' => 'El campo código actividad es requerido',
            'extculre_tipo_documento.required' => 'El campo tipo documento es requerido',
            'extculre_numero_documento.required' => 'El campo número de documento es requerido',
            'extculre_dedicacion.required' => 'El campo dedicación recurso humano es requerido',
        ];

        $this->validate($request, $rules, $message);

        $recurso = new ExtActividadCulturalRecursoHumano();
        $recurso->extculre_year = $request->get('extculre_year');
        $recurso->extculre_codigo_organizacional = $request->get('extculre_codigo_organizacional');
        $recurso->extculre_codigo_actividad = $request->get('extculre_codigo_actividad');
        $recurso->extculre_tipo_documento = $request->get('extculre_tipo_documento');
        $recurso->extculre_numero_documento = $request->get('extculre_numero_documento');
        $recurso->extculre_dedicacion = $request->get('extculre_dedicacion');

        $recurso->save();

        Alert::success('Exitoso', 'La actividad recurso humano se ha creado con exito');
        return redirect('/extension/mostraractrecurso');
    }

    public function veractrecurso($id)
    {
        $actrecurso = ExtActividadCulturalRecursoHumano::find($id);
        return view('extension/culturalrecurso.show')->with('actrecurso', $actrecurso);
    }

    public function editaractrecurso($id)
    {
        $actrecurso = ExtActividadCulturalRecursoHumano::find($id);
        return view('extension/culturalrecurso.edit')->with('actrecurso', $actrecurso);
    }

    public function actualizaractrecurso(Request $request, $id)
    {
        $rules = [
            'extculre_year' => 'required',
            'extculre_codigo_organizacional' => 'required',
            'extculre_codigo_actividad' => 'required',
            'extculre_tipo_documento' => 'required',
            'extculre_numero_documento' => 'required',
            'extculre_dedicacion' => 'required|not_in:0',
        ];
        $message = [
            'extculre_year.required' => 'El campo año es requerido',
            'extculre_codigo_organizacional.required' => 'El campo código unidad organizacional es requerido',
            'extculre_codigo_actividad.required' => 'El campo código actividad es requerido',
            'extculre_tipo_documento.required' => 'El campo tipo documento es requerido',
            'extculre_numero_documento.required' => 'El campo número de documento es requerido',
            'extculre_dedicacion.required' => 'El campo dedicación recurso humano es requerido',
        ];

        $this->validate($request, $rules, $message);

        $recurso = ExtActividadCulturalRecursoHumano::find($id);
        $recurso->extculre_year = $request->get('extculre_year');
        $recurso->extculre_codigo_organizacional = $request->get('extculre_codigo_organizacional');
        $recurso->extculre_codigo_actividad = $request->get('extculre_codigo_actividad');
        $recurso->extculre_tipo_documento = $request->get('extculre_tipo_documento');
        $recurso->extculre_numero_documento = $request->get('extculre_numero_documento');
        $recurso->extculre_dedicacion = $request->get('extculre_dedicacion');

        $recurso->save();

        Alert::success('Exitoso', 'La actividad recurso humano se ha actualizado con exito');
        return redirect('/extension/mostraractrecurso');
    }

    public function mostrarconsultoria()
    {
        $consultorias = ExtConsultoria::all();
        return view('extension/consultoria.index')
            ->with('consultorias', $consultorias);
    }

    public function crearconsultoria()
    {
        $cinedetallados = CineDetallado::all();
        $sectores = Sector::all();
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        return view('extension/consultoria.create')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales);
    }

    public function registroconsultoria(Request $request)
    {
        $rules = [
            'extcon_year' => 'required',
            'extcon_semestre' => 'required',
            'extcon_codigo_consultoria' => 'required',
            'extcon_descripcion' => 'required',
            'extcon_id_cine_campo' => 'required|not_in:0',
            'ext_sector_consultoria' => 'required',
            'extcon_valor' => 'required',
            'extcon_fecha_inicio' => 'required',
        ];
        $message = [
            'extcon_year.required' => 'El campo año es requerido',
            'extcon_semestre.required' => 'El campo semestre es requerido',
            'extcon_codigo_consultoria.required' => 'El campo código consultoria es requerido',
            'extcon_descripcion.required' => 'El campo descripción es requerido',
            'extcon_id_cine_campo.required' => 'El campo CINE Detallado es requerido',
            'ext_sector_consultoria.required' => 'El campo sector consultoria es requerido',
            'extcon_valor.required' => 'El campo valor consultoria es requerido',
            'extcon_fecha_inicio.required' => 'El campo fecha de inicio es requerido',
        ];
        $this->validate($request, $rules, $message);

        $consultoria = new ExtConsultoria();
        $consultoria->extcon_year = $request->get('extcon_year');
        $consultoria->extcon_semestre = $request->get('extcon_semestre');
        $consultoria->extcon_codigo_consultoria = $request->get('extcon_codigo_consultoria');
        $consultoria->extcon_descripcion = $request->get('extcon_descripcion');
        $consultoria->extcon_id_cine_campo = $request->get('extcon_id_cine_campo');
        $consultoria->extcon_nombre_entidad = $request->get('extcon_nombre_entidad');
        $consultoria->ext_sector_consultoria = $request->get('ext_sector_consultoria');
        $consultoria->extcon_valor = $request->get('extcon_valor');
        $consultoria->extcon_fecha_inicio = $request->get('extcon_fecha_inicio');
        $consultoria->extcon_fecha_fin = $request->get('extcon_fecha_fin');
        $consultoria->extcon_fuente_nacional = $request->get('extcon_fuente_nacional');
        $consultoria->extcon_valor_nacional = $request->get('extcon_valor_nacional');
        $consultoria->extcon_nombre_institucion = $request->get('extcon_nombre_institucion');
        $consultoria->extcon_fuente_internacional = $request->get('extcon_fuente_internacional');
        $consultoria->extcon_pais = $request->get('extcon_pais');
        $consultoria->extcon_valor_internacional = $request->get('extcon_valor_internacional');
        $consultoria->save();

        Alert::success('Exitoso', 'La consultoria se ha registrado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    public function editarconsultoria($id)
    {
        $cinedetallados = CineDetallado::all();
        $sectores = ComplementoSector::all();
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $consultoria = ExtConsultoria::find($id);
        return view('extension/consultoria.edit')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('consultoria', $consultoria);
    }

    public function verconsultoria($id)
    {
        $cinedetallados = CineDetallado::all();
        $sectores = ComplementoSector::all();
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $consultoria = ExtConsultoria::find($id);
        return view('extension/consultoria.show')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('consultoria', $consultoria);
    }

    public function actualizarconsultoria(Request $request, $id)
    {
        $rules = [
            'extcon_year' => 'required',
            'extcon_semestre' => 'required',
            'extcon_codigo_consultoria' => 'required',
            'extcon_descripcion' => 'required',
            'extcon_id_cine_campo' => 'required|not_in:0',
            'ext_sector_consultoria' => 'required',
            'extcon_valor' => 'required',
            'extcon_fecha_inicio' => 'required',
        ];
        $message = [
            'extcon_year.required' => 'El campo año es requerido',
            'extcon_semestre.required' => 'El campo semestre es requerido',
            'extcon_codigo_consultoria.required' => 'El campo código consultoria es requerido',
            'extcon_descripcion.required' => 'El campo descripción es requerido',
            'extcon_id_cine_campo.required' => 'El campo CINE Detallado es requerido',
            'ext_sector_consultoria.required' => 'El campo sector consultoria es requerido',
            'extcon_valor.required' => 'El campo valor consultoria es requerido',
            'extcon_fecha_inicio.required' => 'El campo fecha de inicio es requerido',
        ];
        $this->validate($request, $rules, $message);

        $consultoria = ExtConsultoria::find($id);
        $consultoria->extcon_year = $request->get('extcon_year');
        $consultoria->extcon_semestre = $request->get('extcon_semestre');
        $consultoria->extcon_codigo_consultoria = $request->get('extcon_codigo_consultoria');
        $consultoria->extcon_descripcion = $request->get('extcon_descripcion');
        $consultoria->extcon_id_cine_campo = $request->get('extcon_id_cine_campo');
        $consultoria->extcon_nombre_entidad = $request->get('extcon_nombre_entidad');
        $consultoria->ext_sector_consultoria = $request->get('ext_sector_consultoria');
        $consultoria->extcon_valor = $request->get('extcon_valor');
        $consultoria->extcon_fecha_inicio = $request->get('extcon_fecha_inicio');
        $consultoria->extcon_fecha_fin = $request->get('extcon_fecha_fin');
        $consultoria->extcon_fuente_nacional = $request->get('extcon_fuente_nacional');
        $consultoria->extcon_valor_nacional = $request->get('extcon_valor_nacional');
        $consultoria->extcon_nombre_institucion = $request->get('extcon_nombre_institucion');
        $consultoria->extcon_fuente_internacional = $request->get('extcon_fuente_internacional');
        $consultoria->extcon_pais = $request->get('extcon_pais');
        $consultoria->extcon_valor_internacional = $request->get('extcon_valor_internacional');
        $consultoria->save();

        Alert::success('Exitoso', 'La consultoria se ha actualizado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    //falta eliminar consultoria

    public function mostrarconsurecurso()
    {
        $consulrecursos  = ExtConsultoriaRecursoHumano::all();
        return view('extension/consultoriarecurso.index')
            ->with('consulrecursos', $consulrecursos);
    }

    public function crearconsurecurso()
    {
        $nivelestudios = NivelEstudio::all();
        return view('extension/consultoriarecurso.create')
            ->with('nivelestudios', $nivelestudios);
    }

    public function registroconsurecurso(Request $request)
    {
        $rules = [
            'extcor_year' => 'required',
            'extcor_semestre' => 'required',
            'extcor_codigo_consultoria' => 'required',
            'extcor_tipo_documento' => 'required',
            'extcor_numero_documento' => 'required',
            'extcor_id_nivel_estudio' => 'required',
        ];
        $message = [
            'extcor_year.required' => 'El campo año es requerido',
            'extcor_semestre.required' => 'El campo semestre es requerido',
            'extcor_codigo_consultoria.required' => 'El campo código consultoria es requerido',
            'extcor_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'extcor_numero_documento.required' => 'El campo número de documento es requerido',
            'extcor_id_nivel_estudio.required' => 'El campo máximo nivel de estudio es requerido',
        ];
        $this->validate($request, $rules, $message);
        $consulrecurso = new ExtConsultoriaRecursoHumano();
        $consulrecurso->extcor_year = $request->get('extcor_year');
        $consulrecurso->extcor_semestre = $request->get('extcor_semestre');
        $consulrecurso->extcor_codigo_consultoria = $request->get('extcor_codigo_consultoria');
        $consulrecurso->extcor_tipo_documento = $request->get('extcor_tipo_documento');
        $consulrecurso->extcor_numero_documento = $request->get('extcor_numero_documento');
        $consulrecurso->extcor_id_nivel_estudio = $request->get('extcor_id_nivel_estudio');
        $consulrecurso->save();

        Alert::success('Exitoso', 'La consultoria de recurso humano ha sido registrada con exito');
        return redirect('extension/mostrarconsurecurso');
    }

    public function verconsurecurso($id)
    {
        $nivelestudios = NivelEstudio::all();
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        return view('extension/consultoriarecurso.show')
            ->with('nivelestudios', $nivelestudios)
            ->with('consurecurso', $consurecurso);
    }

    public function editarconsurecurso($id)
    {
        $nivelestudios = NivelEstudio::all();
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        return view('extension/consultoriarecurso.edit')
            ->with('nivelestudios', $nivelestudios)
            ->with('consurecurso', $consurecurso);
    }

    public function actualizarconsurecurso(Request $request, $id)
    {
        $rules = [
            'extcor_year' => 'required',
            'extcor_semestre' => 'required',
            'extcor_codigo_consultoria' => 'required',
            'extcor_tipo_documento' => 'required',
            'extcor_numero_documento' => 'required',
            'extcor_id_nivel_estudio' => 'required',
        ];
        $message = [
            'extcor_year.required' => 'El campo año es requerido',
            'extcor_semestre.required' => 'El campo semestre es requerido',
            'extcor_codigo_consultoria.required' => 'El campo código consultoria es requerido',
            'extcor_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'extcor_numero_documento.required' => 'El campo número de documento es requerido',
            'extcor_id_nivel_estudio.required' => 'El campo máximo nivel de estudio es requerido',
        ];
        $this->validate($request, $rules, $message);
        $consulrecurso = ExtConsultoriaRecursoHumano::find($id);
        $consulrecurso->extcor_year = $request->get('extcor_year');
        $consulrecurso->extcor_semestre = $request->get('extcor_semestre');
        $consulrecurso->extcor_codigo_consultoria = $request->get('extcor_codigo_consultoria');
        $consulrecurso->extcor_tipo_documento = $request->get('extcor_tipo_documento');
        $consulrecurso->extcor_numero_documento = $request->get('extcor_numero_documento');
        $consulrecurso->extcor_id_nivel_estudio = $request->get('extcor_id_nivel_estudio');
        $consulrecurso->save();

        Alert::success('Exitoso', 'La consultoria de recurso humano ha sido actualizada con exito');
        return redirect('extension/mostrarconsurecurso');
    }

    public function eliminarconsurecurso($id)
    {
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        $consurecurso->delete();
        Alert::success('Exitoso', 'La consultoria de recurso humano ha sido eliminada con exito');
        return redirect('extension/mostrarconsurecurso');
    }

    public function mostrarcurso()
    {
        $cursos = ExtCurso::all();
        return view('extension/curso.index')
            ->with('cursos', $cursos);
    }

    public function crearcurso()
    {
        $cines = CineDetallado::all();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/curso.create')
            ->with('cines', $cines)
            ->with('personas', $personas);
    }

    public function registrocurso(Request $request)
    {
        $rules = [
            'extcurso_year' => 'required',
            'extcurso_semestre' => 'required',
            'extcurso_codigo' => 'required',
            'extcurso_nombre' => 'required',
            'extcurso_id_cine' => 'required|not_in:0',
            'extcurso_extension' => 'required',
            'extcurso_estado' => 'required',
            'extcurso_fecha' => 'required',
            'extcurso_id_docente' => 'required|not_in:0',
            'extcurso_url_soporte' => 'required',
        ];
        $message = [
            'extcurso_year.required' => 'El campo año es requerido',
            'extcurso_semestre.required' => 'El campo semestre es requerido',
            'extcurso_codigo.required' => 'El campo código curso es requerido',
            'extcurso_nombre.required' => 'El campo nombre curso es requerido',
            'extcurso_id_cine.required' => 'El campo CINE Detallado es requerido',
            'extcurso_extension.required' => 'El campo es requerido',
            'extcurso_estado.required' => 'El campo estado activo es requerido',
            'extcurso_fecha.required' => 'El campo fecha curso es requerido',
            'extcurso_id_docente.required' => 'El campo docente es requerido',
            'extcurso_url_soporte.required' => 'El campo url soporte es requerido',
        ];
        $this->validate($request, $rules, $message);

        if ($request->file('extcurso_url_soporte')) {
            $file = $request->file('extcurso_url_soporte');
            $name_curso = $request->get('extcurso_year') . '_' . $request->get('extcurso_nombre') . '_' . $request->get('extcurso_fecha') . '.' . $file->extension();

            $ruta = public_path('datos/curso/' . $name_curso);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        }

        $curso = new ExtCurso();
        $curso->extcurso_year = $request->get('extcurso_year');
        $curso->extcurso_semestre = $request->get('extcurso_semestre');
        $curso->extcurso_codigo = $request->get('extcurso_codigo');
        $curso->extcurso_nombre = $request->get('extcurso_nombre');
        $curso->extcurso_id_cine = $request->get('extcurso_id_cine');
        $curso->extcurso_extension = $request->get('extcurso_extension');
        $curso->extcurso_estado = $request->get('extcurso_estado');
        $curso->extcurso_fecha = $request->get('extcurso_fecha');
        $curso->extcurso_id_docente = $request->get('extcurso_id_docente');
        $curso->extcurso_url_soporte = $name_curso;

        $curso->save();

        Alert::success('Exitoso', 'El curso se ha registrado con exito');
        return redirect('extension/mostrarcurso');
    }

    public function editarcurso($id)
    {
        $cines = CineDetallado::all();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $curso = ExtCurso::find($id);
        return view('extension/curso.edit')
            ->with('cines', $cines)
            ->with('personas', $personas)
            ->with('curso', $curso);
    }

    public function vercurso($id)
    {
        $cines = CineDetallado::all();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $curso = ExtCurso::find($id);
        return view('extension/curso.show')
            ->with('cines', $cines)
            ->with('personas', $personas)
            ->with('curso', $curso);
    }

    public function actualizarcurso(Request $request, $id)
    {
        $rules = [
            'extcurso_year' => 'required',
            'extcurso_semestre' => 'required',
            'extcurso_codigo' => 'required',
            'extcurso_nombre' => 'required',
            'extcurso_id_cine' => 'required|not_in:0',
            'extcurso_extension' => 'required',
            'extcurso_estado' => 'required',
            'extcurso_fecha' => 'required',
            'extcurso_id_docente' => 'required|not_in:0',
        ];
        $message = [
            'extcurso_year.required' => 'El campo año es requerido',
            'extcurso_semestre.required' => 'El campo semestre es requerido',
            'extcurso_codigo.required' => 'El campo código curso es requerido',
            'extcurso_nombre.required' => 'El campo nombre curso es requerido',
            'extcurso_id_cine.required' => 'El campo CINE Detallado es requerido',
            'extcurso_extension.required' => 'El campo es requerido',
            'extcurso_estado.required' => 'El campo estado activo es requerido',
            'extcurso_fecha.required' => 'El campo fecha curso es requerido',
            'extcurso_id_docente.required' => 'El campo docente es requerido',
        ];

        $this->validate($request, $rules, $message);

        $cursoFind = DB::table('ext_curso')->where('id', $id)->first();

        $curso = ExtCurso::find($id);

        if ($request->file('extcurso_url_soporte')) {
            $file = $request->file('extcurso_url_soporte');
            $titulo_curso = str_replace(' ', '-', $request->get('extcurso_nombre'));
            $name_curso = $request->get('extcurso_year') . '_' . $titulo_curso . '_' . $request->get('extcurso_fecha') . '.' . $file->extension();

            $ruta = public_path('datos/curso/' . $name_curso);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        } else {
            $name_curso = $cursoFind->extcurso_url_soporte;
        }


        $curso->extcurso_year = $request->get('extcurso_year');
        $curso->extcurso_semestre = $request->get('extcurso_semestre');
        $curso->extcurso_codigo = $request->get('extcurso_codigo');
        $curso->extcurso_nombre = $request->get('extcurso_nombre');
        $curso->extcurso_id_cine = $request->get('extcurso_id_cine');
        $curso->extcurso_extension = $request->get('extcurso_extension');
        $curso->extcurso_estado = $request->get('extcurso_estado');
        $curso->extcurso_fecha = $request->get('extcurso_fecha');
        $curso->extcurso_id_docente = $request->get('extcurso_id_docente');
        $curso->extcurso_url_soporte = $name_curso;

        $curso->save();

        Alert::success('Exitoso', 'El curso se ha actualizado con exito');
        return redirect('extension/mostrarcurso');
    }

    public function eliminarcurso($id)
    {
        $curso = ExtCurso::find($id);
        $curso->delete();
        Alert::success('Exitoso', 'El curso se ha eliminado con exito');
        return redirect('extension/mostrarcurso');
    }

    public function mostrareducacion()
    {
        $educacions = ExtEducacionContinua::all();
        return view('extension/educacion.index')
            ->with('educacions', $educacions);
    }

    public function creareducacion()
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/educacion.create')
            ->with('docentes', $docentes);
    }

    public function registroeducacion(Request $request)
    {
        $rules = [
            'extedu_semestre' => 'required',
            'extedu_codigo_curso' => 'required',
            'extedu_numero_horas' => 'required',
            'extedu_tipo_curso' => 'required|not_in:0',
            'extedu_valor_curso' => 'required',
            'extedu_id_docente' => 'required|not_in:0',
            'extedu_tipo_extension' => 'required|not_in:0',
            'extedu_cantidad' => 'required',
        ];
        $message = [
            'extedu_semestre' => 'El campo semestre es requerido',
            'extedu_codigo_curso' => 'El campo código curso es requerido',
            'extedu_numero_horas' => 'El campo número de horas es requerido',
            'extedu_tipo_curso' => 'El campo tipo curso es requerido',
            'extedu_valor_curso' => 'El campo valor curso es requerido',
            'extedu_id_docente' => 'El campo docente es requerido',
            'extedu_tipo_extension' => 'El campo tipo extensión es requerido',
            'extedu_cantidad' => 'El campo cantidad beneficiados es requerido',
        ];
        $this->validate($request, $rules, $message);

        if ($request->file('extedu_url_soporte')) {
            $file = $request->file('extedu_url_soporte');
            $name_educacion = $request->get('extedu_codigo_curso') . '_' . $request->get('extedu_tipo_curso') . '.' . $file->extension();

            $ruta = public_path('datos/educacion/' . $name_educacion);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        }

        $educacion = new ExtEducacionContinua();
        $educacion->extedu_semestre = $request->get('extedu_semestre');
        $educacion->extedu_codigo_curso = $request->get('extedu_codigo_curso');
        $educacion->extedu_numero_horas = $request->get('extedu_numero_horas');
        $educacion->extedu_tipo_curso = $request->get('extedu_tipo_curso');
        $educacion->extedu_valor_curso = $request->get('extedu_valor_curso');
        $educacion->extedu_id_docente = $request->get('extedu_id_docente');
        $educacion->extedu_tipo_extension = $request->get('extedu_tipo_extension');
        $educacion->extedu_cantidad = $request->get('extedu_cantidad');
        $educacion->extedu_url_soporte = $name_educacion;
        $educacion->save();

        Alert::success('Exitoso', 'Educación continua registrada con exito');
        return redirect('extension/mostrareducacion');
    }

    public function vereducacion($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $educacion = ExtEducacionContinua::find($id);
        return view('extension/educacion.show')
            ->with('docentes', $docentes)
            ->with('educacion', $educacion);
    }

    public function editareducacion($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $educacion = ExtEducacionContinua::find($id);
        return view('extension/educacion.edit')
            ->with('docentes', $docentes)
            ->with('educacion', $educacion);
    }


    public function actualizareducacion(Request $request, $id)
    {
        $rules = [
            'extedu_semestre' => 'required',
            'extedu_codigo_curso' => 'required',
            'extedu_numero_horas' => 'required',
            'extedu_tipo_curso' => 'required|not_in:0',
            'extedu_valor_curso' => 'required',
            'extedu_id_docente' => 'required|not_in:0',
            'extedu_tipo_extension' => 'required|not_in:0',
            'extedu_cantidad' => 'required',
        ];
        $message = [
            'extedu_semestre' => 'El campo semestre es requerido',
            'extedu_codigo_curso' => 'El campo código curso es requerido',
            'extedu_numero_horas' => 'El campo número de horas es requerido',
            'extedu_tipo_curso' => 'El campo tipo curso es requerido',
            'extedu_valor_curso' => 'El campo valor curso es requerido',
            'extedu_id_docente' => 'El campo docente es requerido',
            'extedu_tipo_extension' => 'El campo tipo extensión es requerido',
            'extedu_cantidad' => 'El campo cantidad beneficiados es requerido',
        ];
        $this->validate($request, $rules, $message);

        $educacionx = DB::table('ext_educacion_continua')
            ->where('id', $id)
            ->first();

        if ($request->file('extedu_url_soporte')) {
            $file = $request->file('extedu_url_soporte');
            $name_educacion = $request->get('extedu_codigo_curso') . '_' . $request->get('extedu_tipo_curso') . '.' . $file->extension();

            $ruta = public_path('datos/educacion/' . $name_educacion);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        } else {
            $name_educacion = $educacionx->extedu_url_soporte;
        }

        $educacion = ExtEducacionContinua::find($id);
        $educacion->extedu_semestre = $request->get('extedu_semestre');
        $educacion->extedu_codigo_curso = $request->get('extedu_codigo_curso');
        $educacion->extedu_numero_horas = $request->get('extedu_numero_horas');
        $educacion->extedu_tipo_curso = $request->get('extedu_tipo_curso');
        $educacion->extedu_valor_curso = $request->get('extedu_valor_curso');
        $educacion->extedu_id_docente = $request->get('extedu_id_docente');
        $educacion->extedu_tipo_extension = $request->get('extedu_tipo_extension');
        $educacion->extedu_cantidad = $request->get('extedu_cantidad');
        $educacion->extedu_url_soporte = $name_educacion;
        $educacion->save();

        Alert::success('Exitoso', 'Educación continua actualizada con exito');
        return redirect('extension/mostrareducacion');
    }

    public function eliminareducacion($id)
    {
        //generar 3 tipos de excel -> educacion continua -> educacion continua docente -> educacion continua beneficiaros
        $educacion = ExtEducacionContinua::find($id);
        $educacion->delete();
        Alert::success('Exitoso', 'Educación continua eliminada con exito');
        return redirect('extension/mostrareducacion');
    }

    public function mostrarparticipante()
    {
        $participantes = ExtParticipante::all();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/participante.index')
            ->with('participantes', $participantes)
            ->with('docentes', $docentes);
    }

    public function crearparticipante()
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/participante.create')
            ->with('docentes', $docentes);
    }

    public function registroparticipante(Request $request)
    {
        $rules = [
            'dop_id_docente' => 'required|not_in:0',
            'dop_fecha_expedicion' => 'required',
            'dop_sexo_biologico' => 'required|not_in:0',
            'dop_estado_civil' => 'required',
            'dop_id_pais' => 'required',
            'dop_id_municipio' => 'required',
            'dop_correo_personal' => 'required',
            'dop_direccion' => 'required',
        ];
        $message = [
            'dop_id_docente.required' => 'El campo docente es requerido',
            'dop_fecha_expedicion.required' => 'El campo fecha de expedición es requerido',
            'dop_sexo_biologico.required' => 'El campo sexó biologico es requerido',
            'dop_estado_civil.required' => 'El campo estado civil es requerido',
            'dop_id_pais.required' => 'El campo país es requerido',
            'dop_id_municipio.required' => 'El campo municipio es requerido',
            'dop_correo_personal.required' => 'El campo correo personal es requerido',
            'dop_direccion.required' => 'El campo dirección es requerido',
        ];
        $this->validate($request, $rules, $message);

        $participante = new ExtParticipante();
        $participante->dop_id_docente = $request->get('dop_id_docente');
        $participante->dop_fecha_expedicion = $request->get('dop_fecha_expedicion');
        $participante->dop_sexo_biologico = $request->get('dop_sexo_biologico');
        $participante->dop_estado_civil = $request->get('dop_estado_civil');
        $participante->dop_id_pais = $request->get('dop_id_pais');
        $participante->dop_id_municipio = $request->get('dop_id_municipio');
        $participante->dop_correo_personal = $request->get('dop_correo_personal');
        $participante->dop_direccion = $request->get('dop_direccion');

        $participante->save();

        Alert::success('Exitoso', 'Participante registrado con exito');
        return redirect('extension/mostrarparticipante');
    }

    public function editarparticipante($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $participante = ExtParticipante::find($id);
        return view('extension/participante.edit')
            ->with('docentes', $docentes)
            ->with('participante', $participante);
    }

    public function verparticipante($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $participante = ExtParticipante::find($id);
        return view('extension/participante.show')
            ->with('docentes', $docentes)
            ->with('participante', $participante);
    }

    public function actualizarparticipante(Request $request, $id)
    {
        $rules = [
            'dop_id_docente' => 'required|not_in:0',
            'dop_fecha_expedicion' => 'required',
            'dop_sexo_biologico' => 'required|not_in:0',
            'dop_estado_civil' => 'required',
            'dop_id_pais' => 'required',
            'dop_id_municipio' => 'required',
            'dop_correo_personal' => 'required',
            'dop_direccion' => 'required',
        ];
        $message = [
            'dop_id_docente.required' => 'El campo docente es requerido',
            'dop_fecha_expedicion.required' => 'El campo fecha de expedición es requerido',
            'dop_sexo_biologico.required' => 'El campo sexó biologico es requerido',
            'dop_estado_civil.required' => 'El campo estado civil es requerido',
            'dop_id_pais.required' => 'El campo país es requerido',
            'dop_id_municipio.required' => 'El campo municipio es requerido',
            'dop_correo_personal.required' => 'El campo correo personal es requerido',
            'dop_direccion.required' => 'El campo dirección es requerido',
        ];
        $this->validate($request, $rules, $message);

        $participante = ExtParticipante::find($id);
        $participante->dop_id_docente = $request->get('dop_id_docente');
        $participante->dop_fecha_expedicion = $request->get('dop_fecha_expedicion');
        $participante->dop_sexo_biologico = $request->get('dop_sexo_biologico');
        $participante->dop_estado_civil = $request->get('dop_estado_civil');
        $participante->dop_id_pais = $request->get('dop_id_pais');
        $participante->dop_id_municipio = $request->get('dop_id_municipio');
        $participante->dop_correo_personal = $request->get('dop_correo_personal');
        $participante->dop_direccion = $request->get('dop_direccion');

        $participante->save();

        Alert::success('Exitoso', 'Participante actualizado con exito');
        return redirect('extension/mostrarparticipante');
    }

    public function eliminarparticipante($id)
    {
        $participante = ExtParticipante::find($id);
        $participante->delete();
        Alert::success('Exitoso', 'Participante eliminado con exito');
        return redirect('extension/mostrarparticipante');
    }

    public function mostrarproyectoextension()
    {
        $proyectos = ExtProyectoExtension::all();
        return view('extension/proyectoextension.index')
            ->with('proyectos', $proyectos);
    }

    public function crearproyectoextension()
    {
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        return view('extension/proyectoextension.create')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos);
    }

    public function registroproyectoextension(Request $request)
    {
        $rules = [
            'extprex_year' => 'required',
            'extprex_semestre' => 'required',
            'extprex_codigo_organizacional' => 'required',
            'extprex_codigo_pr' => 'required',
            'extprex_nombre_pr' => 'required',
            'extprex_descripcion_pr' => 'required',
            'extprex_valor_pr' => 'required',
            'extprex_id_area_extension' => 'required|not_in:0',
            'extprex_fecha_inicio' => 'required',
            'extprex_fecha_final' => 'required',
            'extprex_nombre_contacto' => 'required',
            'extprex_apellido_contacto' => 'required',
            'extprex_telefono_contacto' => 'required',
            'extprex_correo_contacto' => 'required',
        ];
        $message = [
            'extprex_year.required' => 'El campo año es requerido',
            'extprex_semestre.required' => 'El campo semestre es requerido',
            'extprex_codigo_organizacional.required' => 'El campo código organizacional es requerido',
            'extprex_codigo_pr.required' => 'El campo código proyecto es requerido',
            'extprex_nombre_pr.required' => 'El campo nombre proyecto es requerido',
            'extprex_descripcion_pr.required' => 'El campo descripción es requerido',
            'extprex_valor_pr.required' => 'El campo valor proyecto es requerido',
            'extprex_id_area_extension.required' => 'El campo area extensión es requerido',
            'extprex_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extprex_fecha_final.required' => 'El campo fecha final es requerido',
            'extprex_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'extprex_apellido_contacto.required' => 'El campo apellido contacto es requerido',
            'extprex_telefono_contacto.required' => 'El campo telefono contacto es requerido',
            'extprex_correo_contacto.required' => 'El campo correo electronico contacto es requerido',
        ];
        $this->validate($request, $rules, $message);

        $proyectoextension = new ExtProyectoExtension();
        $proyectoextension->extprex_year = $request->get('extprex_year');
        $proyectoextension->extprex_semestre = $request->get('extprex_semestre');
        $proyectoextension->extprex_codigo_organizacional = $request->get('extprex_codigo_organizacional');
        $proyectoextension->extprex_codigo_pr = $request->get('extprex_codigo_pr');
        $proyectoextension->extprex_nombre_pr = $request->get('extprex_nombre_pr');
        $proyectoextension->extprex_descripcion_pr = $request->get('extprex_descripcion_pr');
        $proyectoextension->extprex_valor_pr = $request->get('extprex_valor_pr');
        $proyectoextension->extprex_id_area_extension = $request->get('extprex_id_area_extension');
        $proyectoextension->extprex_fecha_inicio = $request->get('extprex_fecha_inicio');
        $proyectoextension->extprex_fecha_final = $request->get('extprex_fecha_final');
        $proyectoextension->extprex_nombre_contacto = $request->get('extprex_nombre_contacto');
        $proyectoextension->extprex_apellido_contacto = $request->get('extprex_apellido_contacto');
        $proyectoextension->extprex_telefono_contacto = $request->get('extprex_telefono_contacto');
        $proyectoextension->extprex_correo_contacto = $request->get('extprex_correo_contacto');
        $proyectoextension->extprex_id_area_trabajo = $request->get('extprex_id_area_trabajo');
        $proyectoextension->extprex_id_ciclo_vital = $request->get('extprex_id_ciclo_vital');
        $proyectoextension->extprex_id_entidad_nacional = $request->get('extprex_id_entidad_nacional');
        $proyectoextension->extprex_id_fuente_nacional = $request->get('extprex_id_fuente_nacional');
        $proyectoextension->extprex_valor_financiacion_nac = $request->get('extprex_valor_financiacion_nac');
        $proyectoextension->extprex_id_fuente_internacional = $request->get('extprex_id_fuente_internacional');
        $proyectoextension->extprex_id_pais = $request->get('extprex_id_pais');
        $proyectoextension->extprex_nombre_institucion_inter = $request->get('extprex_nombre_institucion_inter');
        $proyectoextension->extprex_valor_financiacion_inter = $request->get('extprex_valor_financiacion_inter');
        $proyectoextension->extprex_nombre_otra_entidad = $request->get('extprex_nombre_otra_entidad');
        $proyectoextension->extprex_id_sector_otra_entidad = $request->get('extprex_id_sector_otra_entidad');
        $proyectoextension->extprex_id_pais_otra_entidad = $request->get('extprex_id_pais_otra_entidad');
        $proyectoextension->extprex_id_poblacion_condicion = $request->get('extprex_id_poblacion_condicion');
        $proyectoextension->extprex_cantidad_condicion = $request->get('extprex_cantidad_condicion');
        $proyectoextension->extprex_id_poblacion_grupo = $request->get('extprex_id_poblacion_grupo');
        $proyectoextension->extprex_cantidad_grupo = $request->get('extprex_cantidad_grupo');
        if ($request->file('extprex_soporte')) {
            $file = $request->file('extprex_soporte');
            $evidencia_proyecto_extension = $request->get('extprex_fecha_inicio').'_'.$request->get('extprex_nombre_pr').'.' . $file->extension();

            $ruta = public_path('datos/proyecto-extension/' . $evidencia_proyecto_extension);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        } 
        $proyectoextension->extprex_soporte = $request->get('extprex_soporte');

        $proyectoextension->save();
        Alert::success('Exitoso', 'El proyecto de extensión se ha registrado con exito');
        return redirect('extension/mostrarproyectoextension');
    }

    public function editarproyectoextension($id)
    {
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        $proyectoextension = ExtProyectoExtension::find($id);
        return view('extension/proyectoextension.edit')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos)
            ->with('proyectoextension', $proyectoextension);
    }

    public function verproyectoextension($id)
    {
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        $proyectoextension = ExtProyectoExtension::find($id);
        return view('extension/proyectoextension.show')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos)
            ->with('proyectoextension', $proyectoextension);
    }

    public function actualizarproyectoextension(Request $request, $id)
    {
        $rules = [
            'extprex_year' => 'required',
            'extprex_semestre' => 'required',
            'extprex_codigo_organizacional' => 'required',
            'extprex_codigo_pr' => 'required',
            'extprex_nombre_pr' => 'required',
            'extprex_descripcion_pr' => 'required',
            'extprex_valor_pr' => 'required',
            'extprex_id_area_extension' => 'required|not_in:0',
            'extprex_fecha_inicio' => 'required',
            'extprex_fecha_final' => 'required',
            'extprex_nombre_contacto' => 'required',
            'extprex_apellido_contacto' => 'required',
            'extprex_telefono_contacto' => 'required',
            'extprex_correo_contacto' => 'required',
        ];
        $message = [
            'extprex_year.required' => 'El campo año es requerido',
            'extprex_semestre.required' => 'El campo semestre es requerido',
            'extprex_codigo_organizacional.required' => 'El campo código organizacional es requerido',
            'extprex_codigo_pr.required' => 'El campo código proyecto es requerido',
            'extprex_nombre_pr.required' => 'El campo nombre proyecto es requerido',
            'extprex_descripcion_pr.required' => 'El campo descripción es requerido',
            'extprex_valor_pr.required' => 'El campo valor proyecto es requerido',
            'extprex_id_area_extension.required' => 'El campo area extensión es requerido',
            'extprex_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extprex_fecha_final.required' => 'El campo fecha final es requerido',
            'extprex_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'extprex_apellido_contacto.required' => 'El campo apellido contacto es requerido',
            'extprex_telefono_contacto.required' => 'El campo telefono contacto es requerido',
            'extprex_correo_contacto.required' => 'El campo correo electronico contacto es requerido',
        ];
        $this->validate($request, $rules, $message);

        $proyectoext = DB::table('ext_proyecto_extension')
            ->where('id', $id)
            ->first();

        $proyectoextension = ExtProyectoExtension::find($id);
        $proyectoextension->extprex_year = $request->get('extprex_year');
        $proyectoextension->extprex_semestre = $request->get('extprex_semestre');
        $proyectoextension->extprex_codigo_organizacional = $request->get('extprex_codigo_organizacional');
        $proyectoextension->extprex_codigo_pr = $request->get('extprex_codigo_pr');
        $proyectoextension->extprex_nombre_pr = $request->get('extprex_nombre_pr');
        $proyectoextension->extprex_descripcion_pr = $request->get('extprex_descripcion_pr');
        $proyectoextension->extprex_valor_pr = $request->get('extprex_valor_pr');
        $proyectoextension->extprex_id_area_extension = $request->get('extprex_id_area_extension');
        $proyectoextension->extprex_fecha_inicio = $request->get('extprex_fecha_inicio');
        $proyectoextension->extprex_fecha_final = $request->get('extprex_fecha_final');
        $proyectoextension->extprex_nombre_contacto = $request->get('extprex_nombre_contacto');
        $proyectoextension->extprex_apellido_contacto = $request->get('extprex_apellido_contacto');
        $proyectoextension->extprex_telefono_contacto = $request->get('extprex_telefono_contacto');
        $proyectoextension->extprex_correo_contacto = $request->get('extprex_correo_contacto');
        $proyectoextension->extprex_id_area_trabajo = $request->get('extprex_id_area_trabajo');
        $proyectoextension->extprex_id_ciclo_vital = $request->get('extprex_id_ciclo_vital');
        $proyectoextension->extprex_id_entidad_nacional = $request->get('extprex_id_entidad_nacional');
        $proyectoextension->extprex_id_fuente_nacional = $request->get('extprex_id_fuente_nacional');
        $proyectoextension->extprex_valor_financiacion_nac = $request->get('extprex_valor_financiacion_nac');
        $proyectoextension->extprex_id_fuente_internacional = $request->get('extprex_id_fuente_internacional');
        $proyectoextension->extprex_id_pais = $request->get('extprex_id_pais');
        $proyectoextension->extprex_nombre_institucion_inter = $request->get('extprex_nombre_institucion_inter');
        $proyectoextension->extprex_valor_financiacion_inter = $request->get('extprex_valor_financiacion_inter');
        $proyectoextension->extprex_nombre_otra_entidad = $request->get('extprex_nombre_otra_entidad');
        $proyectoextension->extprex_id_sector_otra_entidad = $request->get('extprex_id_sector_otra_entidad');
        $proyectoextension->extprex_id_pais_otra_entidad = $request->get('extprex_id_pais_otra_entidad');
        $proyectoextension->extprex_id_poblacion_condicion = $request->get('extprex_id_poblacion_condicion');
        $proyectoextension->extprex_cantidad_condicion = $request->get('extprex_cantidad_condicion');
        $proyectoextension->extprex_id_poblacion_grupo = $request->get('extprex_id_poblacion_grupo');
        $proyectoextension->extprex_cantidad_grupo = $request->get('extprex_cantidad_grupo');
        if ($request->file('extprex_soporte')) {
            $file = $request->file('extprex_soporte');
            $evidencia_proyecto_extension = $request->get('extprex_fecha_inicio').'_'.$request->get('extprex_nombre_pr').'.' . $file->extension();

            $ruta = public_path('datos/proyecto-extension/' . $evidencia_proyecto_extension);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        }else{
            $evidencia_proyecto_extension = $proyectoext->extprex_soporte;
        }
        $proyectoextension->extprex_soporte = $request->get('extprex_soporte');

        $proyectoextension->save();
        Alert::success('Exitoso', 'El proyecto de extensión se ha actualizado con exito');
        return redirect('extension/mostrarproyectoextension');
    }

    public function mostrarservicioextension(){
        $serviciosextension = ExtServicioExtension::all();
        return view('extension/servicioextension.index')
            ->with('serviciosextension', $serviciosextension);
    }

    public function crearservicioextension(){
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        return view('extension/servicioextension.create')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos);
    }

    public function registroservicioextension(Request $request){
        $rules = [
            'extseex_year' => 'required',
            'extseex_semestre' => 'required',
            'extseex_codigo_organizacional' => 'required',
            'extseex_codigo_ser' => 'required',
            'extseex_nombre_ser' => 'required',
            'extseex_descripcion_ser' => 'required',
            'extseex_valor_ser' => 'required',
            'extseex_id_area_extension' => 'required|not_in:0',
            'extseex_fecha_inicio' => 'required',
            'extseex_fecha_final' => 'required',
            'extseex_nombre_contacto' => 'required',
            'extseex_apellido_contacto' => 'required',
            'extseex_telefono_contacto' => 'required',
            'extseex_correo_contacto' => 'required',
        ];
        $message = [
            'extseex_year.required' => 'El campo año es requerido',
            'extseex_semestre.required' => 'El campo semestre es requerido',
            'extseex_codigo_organizacional.required' => 'El campo código organizacional es requerido',
            'extseex_codigo_ser.required' => 'El campo código proyecto es requerido',
            'extseex_nombre_ser.required' => 'El campo nombre proyecto es requerido',
            'extseex_descripcion_ser.required' => 'El campo descripción es requerido',
            'extseex_valor_ser.required' => 'El campo valor proyecto es requerido',
            'extseex_id_area_extension.required' => 'El campo area extensión es requerido',
            'extseex_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extseex_fecha_final.required' => 'El campo fecha final es requerido',
            'extseex_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'extseex_apellido_contacto.required' => 'El campo apellido contacto es requerido',
            'extseex_telefono_contacto.required' => 'El campo telefono contacto es requerido',
            'extseex_correo_contacto.required' => 'El campo correo electronico contacto es requerido',
        ];
        $this->validate($request, $rules, $message);

        $servicioextension = new ExtServicioExtension();
        $servicioextension->extseex_year = $request->get('extseex_year');
        $servicioextension->extseex_semestre = $request->get('extseex_semestre');
        $servicioextension->extseex_codigo_organizacional = $request->get('extseex_codigo_organizacional');
        $servicioextension->extseex_codigo_ser = $request->get('extseex_codigo_ser');
        $servicioextension->extseex_nombre_ser = $request->get('extseex_nombre_ser');
        $servicioextension->extseex_descripcion_ser = $request->get('extseex_descripcion_ser');
        $servicioextension->extseex_valor_ser = $request->get('extseex_valor_ser');
        $servicioextension->extseex_id_area_extension = $request->get('extseex_id_area_extension');
        $servicioextension->extseex_fecha_inicio = $request->get('extseex_fecha_inicio');
        $servicioextension->extseex_fecha_final = $request->get('extseex_fecha_final');
        $servicioextension->extseex_nombre_contacto = $request->get('extseex_nombre_contacto');
        $servicioextension->extseex_apellido_contacto = $request->get('extseex_apellido_contacto');
        $servicioextension->extseex_telefono_contacto = $request->get('extseex_telefono_contacto');
        $servicioextension->extseex_correo_contacto = $request->get('extseex_correo_contacto');
        $servicioextension->extseex_costo = $request->get('extseex_costo');
        $servicioextension->extseex_criterio_elegibilidad = $request->get('extseex_criterio_elegibilidad');
        $servicioextension->extseex_id_area_trabajo = $request->get('extseex_id_area_trabajo');
        $servicioextension->extseex_id_ciclo_vital = $request->get('extseex_id_ciclo_vital');
        $servicioextension->extseex_id_entidad_nacional = $request->get('extseex_id_entidad_nacional');
        $servicioextension->extseex_id_fuente_nacional = $request->get('extseex_id_fuente_nacional');
        $servicioextension->extseex_valor_financiacion_nac = $request->get('extseex_valor_financiacion_nac');
        $servicioextension->extseex_id_fuente_internacional = $request->get('extseex_id_fuente_internacional');
        $servicioextension->extseex_id_pais = $request->get('extseex_id_pais');
        $servicioextension->extseex_nombre_institucion_inter = $request->get('extseex_nombre_institucion_inter');
        $servicioextension->extseex_valor_financiacion_inter = $request->get('extseex_valor_financiacion_inter');
        $servicioextension->extseex_nombre_otra_entidad = $request->get('extseex_nombre_otra_entidad');
        $servicioextension->extseex_id_sector_otra_entidad = $request->get('extseex_id_sector_otra_entidad');
        $servicioextension->extseex_id_pais_otra_entidad = $request->get('extseex_id_pais_otra_entidad');
        $servicioextension->extseex_id_poblacion_condicion = $request->get('extseex_id_poblacion_condicion');
        $servicioextension->extseex_cantidad_condicion = $request->get('extseex_cantidad_condicion');
        $servicioextension->extseex_id_poblacion_grupo = $request->get('extseex_id_poblacion_grupo');
        $servicioextension->extseex_cantidad_grupo = $request->get('extseex_cantidad_grupo');
        if ($request->file('extseex_soporte')) {
            $file = $request->file('extseex_soporte');
            $evidencia_servicio_extension = $request->get('extseex_fecha_inicio').'_'.$request->get('extseex_nombre_ser').'.' . $file->extension();

            $ruta = public_path('datos/servicio-extension/' . $evidencia_servicio_extension);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        } 
        $servicioextension->extseex_soporte = $request->get('extseex_soporte');

        $servicioextension->save();
        Alert::success('Exitoso', 'El servicio de extensión se ha registrado con exito');
        return redirect('extension/mostrarservicioextension');
    }

    public function editarservicioextension($id){
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        $servicioextension = ExtServicioExtension::find($id);
        return view('extension/servicioextension.edit')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos)
            ->with('servicioextension', $servicioextension);
    }
    public function verservicioextension($id){
        $areas = DB::table('compl_area_extension')->get();
        $areastrabajo = DB::table('compl_area_trabajo')->get();
        $entidadesnac = DB::table('compl_entidad_nacional')->get();
        $fuentenacionals = DB::table('compl_fuente_nacional')->get();
        $entidadesinter = DB::table('compl_fuente_internacional')->get();
        $sectores = DB::table('compl_sector')->get();
        $poblacioncondicions = DB::table('compl_poblacion_condicion')->get();
        $poblaciongrupos = DB::table('compl_poblacion_grupo')->get();
        $servicioextension = ExtServicioExtension::find($id);
        return view('extension/servicioextension.show')
            ->with('areas', $areas)
            ->with('areastrabajo', $areastrabajo)
            ->with('entidadesnac', $entidadesnac)
            ->with('fuentenacionals', $fuentenacionals)
            ->with('entidadesinter', $entidadesinter)
            ->with('sectores', $sectores)
            ->with('poblacioncondicions', $poblacioncondicions)
            ->with('poblaciongrupos', $poblaciongrupos)
            ->with('servicioextension', $servicioextension);
    }

    public function actualizarservicioextension(Request $request, $id){
        $rules = [
            'extseex_year' => 'required',
            'extseex_semestre' => 'required',
            'extseex_codigo_organizacional' => 'required',
            'extseex_codigo_ser' => 'required',
            'extseex_nombre_ser' => 'required',
            'extseex_descripcion_ser' => 'required',
            'extseex_valor_ser' => 'required',
            'extseex_id_area_extension' => 'required|not_in:0',
            'extseex_fecha_inicio' => 'required',
            'extseex_fecha_final' => 'required',
            'extseex_nombre_contacto' => 'required',
            'extseex_apellido_contacto' => 'required',
            'extseex_telefono_contacto' => 'required',
            'extseex_correo_contacto' => 'required',
        ];
        $message = [
            'extseex_year.required' => 'El campo año es requerido',
            'extseex_semestre.required' => 'El campo semestre es requerido',
            'extseex_codigo_organizacional.required' => 'El campo código organizacional es requerido',
            'extseex_codigo_ser.required' => 'El campo código proyecto es requerido',
            'extseex_nombre_ser.required' => 'El campo nombre proyecto es requerido',
            'extseex_descripcion_ser.required' => 'El campo descripción es requerido',
            'extseex_valor_ser.required' => 'El campo valor proyecto es requerido',
            'extseex_id_area_extension.required' => 'El campo area extensión es requerido',
            'extseex_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'extseex_fecha_final.required' => 'El campo fecha final es requerido',
            'extseex_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'extseex_apellido_contacto.required' => 'El campo apellido contacto es requerido',
            'extseex_telefono_contacto.required' => 'El campo telefono contacto es requerido',
            'extseex_correo_contacto.required' => 'El campo correo electronico contacto es requerido',
        ];
        $this->validate($request, $rules, $message);

        $serviciox = DB::table('ext_servicio_extension')
            ->where('id', $id)
            ->first();

        $servicioextension = ExtServicioExtension::find($id);
        $servicioextension->extseex_year = $request->get('extseex_year');
        $servicioextension->extseex_semestre = $request->get('extseex_semestre');
        $servicioextension->extseex_codigo_organizacional = $request->get('extseex_codigo_organizacional');
        $servicioextension->extseex_codigo_ser = $request->get('extseex_codigo_ser');
        $servicioextension->extseex_nombre_ser = $request->get('extseex_nombre_ser');
        $servicioextension->extseex_descripcion_ser = $request->get('extseex_descripcion_ser');
        $servicioextension->extseex_valor_ser = $request->get('extseex_valor_ser');
        $servicioextension->extseex_id_area_extension = $request->get('extseex_id_area_extension');
        $servicioextension->extseex_fecha_inicio = $request->get('extseex_fecha_inicio');
        $servicioextension->extseex_fecha_final = $request->get('extseex_fecha_final');
        $servicioextension->extseex_nombre_contacto = $request->get('extseex_nombre_contacto');
        $servicioextension->extseex_apellido_contacto = $request->get('extseex_apellido_contacto');
        $servicioextension->extseex_telefono_contacto = $request->get('extseex_telefono_contacto');
        $servicioextension->extseex_correo_contacto = $request->get('extseex_correo_contacto');
        $servicioextension->extseex_costo = $request->get('extseex_costo');
        $servicioextension->extseex_criterio_elegibilidad = $request->get('extseex_criterio_elegibilidad');
        $servicioextension->extseex_id_area_trabajo = $request->get('extseex_id_area_trabajo');
        $servicioextension->extseex_id_ciclo_vital = $request->get('extseex_id_ciclo_vital');
        $servicioextension->extseex_id_entidad_nacional = $request->get('extseex_id_entidad_nacional');
        $servicioextension->extseex_id_fuente_nacional = $request->get('extseex_id_fuente_nacional');
        $servicioextension->extseex_valor_financiacion_nac = $request->get('extseex_valor_financiacion_nac');
        $servicioextension->extseex_id_fuente_internacional = $request->get('extseex_id_fuente_internacional');
        $servicioextension->extseex_id_pais = $request->get('extseex_id_pais');
        $servicioextension->extseex_nombre_institucion_inter = $request->get('extseex_nombre_institucion_inter');
        $servicioextension->extseex_valor_financiacion_inter = $request->get('extseex_valor_financiacion_inter');
        $servicioextension->extseex_nombre_otra_entidad = $request->get('extseex_nombre_otra_entidad');
        $servicioextension->extseex_id_sector_otra_entidad = $request->get('extseex_id_sector_otra_entidad');
        $servicioextension->extseex_id_pais_otra_entidad = $request->get('extseex_id_pais_otra_entidad');
        $servicioextension->extseex_id_poblacion_condicion = $request->get('extseex_id_poblacion_condicion');
        $servicioextension->extseex_cantidad_condicion = $request->get('extseex_cantidad_condicion');
        $servicioextension->extseex_id_poblacion_grupo = $request->get('extseex_id_poblacion_grupo');
        $servicioextension->extseex_cantidad_grupo = $request->get('extseex_cantidad_grupo');
        if ($request->file('extseex_soporte')) {
            $file = $request->file('extseex_soporte');
            $evidencia_servicio_extension = $request->get('extseex_fecha_inicio').'_'.$request->get('extseex_nombre_ser').'.' . $file->extension();

            $ruta = public_path('datos/servicio-extension/' . $evidencia_servicio_extension);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        }else{
            $evidencia_servicio_extension = $serviciox->extseex_soporte;
        } 
        $servicioextension->extseex_soporte = $evidencia_servicio_extension;

        $servicioextension->save();
        Alert::success('Exitoso', 'El servicio de extensión se ha actualizado con exito');
        return redirect('extension/mostrarservicioextension');
    }

    public function mostrarregistrofotografico()
    {
        $fotograficos = ExtRegistroFotograficoInter::all();
        return view('extension/registrofo.index')
            ->with('fotograficos', $fotograficos);
    }

    public function crearregistrofotografico()
    {
        return view('extension/registrofo.create');
    }

    public function registrofotografico(Request $request)
    {
        $rules = [
            'extrefoin_year' => 'required',
            'extrefoin_periodo' => 'required',
            'extrefoin_actividad' => 'required',
            'extrefoin_ente_organizador' => 'required',
            'extrefoin_fecha' => 'required',
            'extrefoin_soporte' => 'required',
        ];
        $message = [
            'extrefoin_year.required' => 'El campo año es requerido',
            'extrefoin_periodo.required' => 'El campo periodo es requerido',
            'extrefoin_actividad.required' => 'El campo actividad es requerido',
            'extrefoin_ente_organizador.required' => 'El campo ente organizador es requerido',
            'extrefoin_fecha.required' => 'El campo fecha es requerido',
            'extrefoin_soporte.required' => 'El campo soporte es requerido',
        ];
        $this->validate($request, $rules, $message);

        $fotografico = new ExtRegistroFotograficoInter();
        $fotografico->extrefoin_year = $request->get('extrefoin_year');
        $fotografico->extrefoin_periodo = $request->get('extrefoin_periodo');
        $fotografico->extrefoin_tipo_actividad = $request->get('extrefoin_tipo_actividad');
        $fotografico->extrefoin_actividad = $request->get('extrefoin_actividad');
        $fotografico->extrefoin_ente_organizador = $request->get('extrefoin_ente_organizador');
        $fotografico->extrefoin_fecha = $request->get('extrefoin_fecha');
        $fotografico->extrefoin_tipo_evento = $request->get('extrefoin_tipo_evento');
        $fotografico->extrefoin_tipo_modalidad = $request->get('extrefoin_tipo_modalidad');

        if ($request->file('extrefoin_soporte')) {
            $file = $request->file('extrefoin_soporte');
            $name_registro = $request->get('extrefoin_year') . '_' . $request->get('extrefoin_actividad') . '.' . $file->extension();

            $ruta = public_path('datos/registro-fotografico/' . $name_registro);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        }
        $fotografico->extrefoin_soporte = $name_registro;

        $fotografico->save();
        Alert::success('Exitoso', 'El registro fotografico se guardo con exito');
        return redirect('extension/mostrarregistrofotografico');
    }

    public function verregistrofotografico($id)
    {
        $fotografico = ExtRegistroFotograficoInter::find($id);
        return view('extension/registrofo.show')
            ->with('fotografico', $fotografico);
    }

    public function editarregistrofotografico($id)
    {
        $fotografico = ExtRegistroFotograficoInter::find($id);
        return view('extension/registrofo.edit')
            ->with('fotografico', $fotografico);
    }

    public function actualizarregistrofotografico(Request $request, $id)
    {
        $rules = [
            'extrefoin_year' => 'required',
            'extrefoin_periodo' => 'required',
            'extrefoin_actividad' => 'required',
            'extrefoin_ente_organizador' => 'required',
            'extrefoin_fecha' => 'required',
        ];
        $message = [
            'extrefoin_year.required' => 'El campo año es requerido',
            'extrefoin_periodo.required' => 'El campo periodo es requerido',
            'extrefoin_actividad.required' => 'El campo actividad es requerido',
            'extrefoin_ente_organizador.required' => 'El campo ente organizador es requerido',
            'extrefoin_fecha.required' => 'El campo fecha es requerido',
        ];
        $this->validate($request, $rules, $message);

        $fotografico = ExtRegistroFotograficoInter::find($id);
        $fotografico->extrefoin_year = $request->get('extrefoin_year');
        $fotografico->extrefoin_periodo = $request->get('extrefoin_periodo');
        $fotografico->extrefoin_tipo_actividad = $request->get('extrefoin_tipo_actividad');
        $fotografico->extrefoin_actividad = $request->get('extrefoin_actividad');
        $fotografico->extrefoin_ente_organizador = $request->get('extrefoin_ente_organizador');
        $fotografico->extrefoin_fecha = $request->get('extrefoin_fecha');
        $fotografico->extrefoin_tipo_evento = $request->get('extrefoin_tipo_evento');
        $fotografico->extrefoin_tipo_modalidad = $request->get('extrefoin_tipo_modalidad');

        $sfotografico = DB::table('ext_registro_fotografico_inter')
            ->where('id', $id)
            ->first();

        if ($request->file('extrefoin_soporte')) {
            $file = $request->file('extrefoin_soporte');
            $name_registro = $request->get('extrefoin_year') . '_' . $request->get('extrefoin_actividad') . '.' . $file->extension();

            $ruta = public_path('datos/registro-fotografico/' . $name_registro);

            if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                copy($file, $ruta);
            } else {
                Alert::warning('Los formatos admitidos son .zip y .rar');
                return back()->withInput();
            }
        } else {
            $name_registro = $sfotografico->extrefoin_soporte;
        }
        $fotografico->extrefoin_soporte = $name_registro;

        $fotografico->save();
        Alert::success('Exitoso', 'El registro fotografico se actualizo con exito');
        return redirect('extension/mostrarregistrofotografico');
    }

    public function mostrarinterredconvenio(){
        $interredconvenios = ExtInterRedConvenio::all();
        return view('extension/interredconvenio.index')
            ->with('interredconvenios', $interredconvenios);
    }

    public function crearinterredconvenio(){
        return view('extension/interredconvenio.create');
    }

    public function registrointerredconvenio(Request $request){
        $rules = [
            'exsered_year' => 'required',
            'exsered_periodo' => 'required',
            'exsered_ies' => 'required',
            'exsered_fecha' => 'required',
        ];
        $message = [
            'exsered_year.required' => 'El campo año es requerido',
            'exsered_periodo.required' => 'El campo periodo es requerido',
            'exsered_ies.required' => 'El campo IES es requerido',
            'exsered_fecha.required' => 'El campo fecha es requerido',
        ];
        $this->validate($request,$rules,$message);

        $cant = $request->get('cantidad');

        DB::table('ext_sector_externo_red_academia_convenio')
            ->insert([
                'exsered_year' => $request->get('exsered_year'),
                'exsered_periodo' => $request->get('exsered_periodo'),
                'exsered_ies' => $request->get('exsered_ies'),
                'exsered_caracter' => $request->get('exsered_caracter'),
                'exsered_fecha' => $request->get('exsered_fecha'),
                'exsered_logros' => $request->get('exsered_logros'),
                'exsered_resultados' => $request->get('exsered_resultados'),
                'exsered_productos' => $request->get('exsered_productos'),
                'exsered_funcion' => $request->get('exsered_funcion'),
                'exsered_participantes' => $cant,
        ]);

        $id = DB::getPdo()->lastInsertId();

    
        for ($i=0; $i<$cant ; $i++) { 
            DB::table('ext_sector_externo_red_academia_convenio_participantes')->insert(
                [
                    'exseredpar_id_red_academica' => $id,
                    'exseredpar_numero_identificacion' => $request->get('exseredpar_numero_identificacion')[$i],
                    'exseredpar_nombre_participante' => $request->get('exseredpar_nombre_participante')[$i],
                    'exseredpar_rol_participante' => $request->get('exseredpar_rol_participante')[$i],
                ]
            );   
        }
        Alert::success('Exitoso', 'El registro de convenio se ha registrado con exito');
        return redirect('/extension/mostrarinterredconvenio');
    }

    public function editarinterredconvenio($id){
        $participantes = DB::table('ext_sector_externo_red_academia_convenio_participantes')
            ->where('exseredpar_id_red_academica', $id)->get();
        $interredconvenio = ExtInterRedConvenio::find($id);
        return view('extension/interredconvenio.edit')
            ->with('participantes', $participantes)
            ->with('interredconvenio', $interredconvenio);
    }

    public function verinterredconvenio($id){
        $participantes = DB::table('ext_sector_externo_red_academia_convenio_participantes')
            ->where('exseredpar_id_red_academica', $id)->get();
        $interredconvenio = ExtInterRedConvenio::find($id);
        return view('extension/interredconvenio.show')
            ->with('participantes', $participantes)
            ->with('interredconvenio', $interredconvenio);
    }

    public function actualizarinterredconvenio(Request $request, $id){
        $rules = [
            'exsered_year' => 'required',
            'exsered_periodo' => 'required',
            'exsered_ies' => 'required',
            'exsered_fecha' => 'required',
        ];
        $message = [
            'exsered_year.required' => 'El campo año es requerido',
            'exsered_periodo.required' => 'El campo periodo es requerido',
            'exsered_ies.required' => 'El campo IES es requerido',
            'exsered_fecha.required' => 'El campo fecha es requerido',
        ];

        $this->validate($request,$rules,$message);

    

        DB::table('ext_sector_externo_red_academia_convenio')
            ->where('id', $id)
            ->update([
                'exsered_year' => $request->get('exsered_year'),
                'exsered_periodo' => $request->get('exsered_periodo'),
                'exsered_ies' => $request->get('exsered_ies'),
                'exsered_caracter' => $request->get('exsered_caracter'),
                'exsered_fecha' => $request->get('exsered_fecha'),
                'exsered_logros' => $request->get('exsered_logros'),
                'exsered_resultados' => $request->get('exsered_resultados'),
                'exsered_productos' => $request->get('exsered_productos'),
                'exsered_funcion' => $request->get('exsered_funcion'),
        ]);

        $cantidad = DB::table('ext_sector_externo_red_academia_convenio')
            ->where('id', $id)
            ->first();
    
        for ($i=0; $i<$cantidad->exsered_participantes ; $i++) { 
            DB::table('ext_sector_externo_red_academia_convenio_participantes')
            ->where('exseredpar_id_red_academica', $id)
            ->where('exseredpar_numero_identificacion',$request->get('exseredpar_numero_identificacion')[$i])
            ->update(
                [
                    'exseredpar_numero_identificacion' =>  $request->get('exseredpar_numero_identificacion')[$i],
                    'exseredpar_nombre_participante' => $request->get('exseredpar_nombre_participante')[$i],
                    'exseredpar_rol_participante' => $request->get('exseredpar_rol_participante')[$i],
                ]
            );   
        }

        
        Alert::success('Exitoso', 'Los datos se actulizaron con exito');
        return redirect('/extension/mostrarinterredconvenio');
    }

    public function eliminarinterredconvenio($id){

        DB::table('ext_sector_externo_red_academia_convenio_participantes')
        ->where('exseredpar_id_red_academica', $id)
        ->delete();

        DB::table('ext_sector_externo_red_academia_convenio')
        ->where('id', $id)
        ->delete();

        Alert::success('Exitoso', 'Los datos se han eliminado con exito');
        return redirect('/extension/mostrarinterredconvenio');

    }

    public function mostrarinterorganizacion(){
        $interredorganizaciones = ExtRedOrganizacion::all();
        return view('extension/interredorganizacion.index') 
            ->with('interredorganizaciones', $interredorganizaciones);
    }

    public function crearinterorganizacion(){
        return view('extension/interredorganizacion.create');
    }

    public function registrointerorganizacion(Request $request){
        $rules = [
            'exseor_year' => 'required',
            'exseor_periodo' => 'required',
            'exseor_nombre' => 'required',
            'exseor_fecha' => 'required',
        ];
        $message = [
            'exseor_year.required' => 'El campo año es requerido',
            'exseor_periodo.required' => 'El campo periodo es requerido',
            'exseor_nombre.required' => 'El campo nombre es requerido',
            'exseor_fecha.required' => 'El campo fecha es requerido',
        ];
        $this->validate($request,$rules,$message);

        $cant = $request->get('cantidad');

        DB::table('ext_sector_externo_organizaciones')
            ->insert([
                'exseor_year' => $request->get('exseor_year'),
                'exseor_periodo' => $request->get('exseor_periodo'),
                'exseor_tipo' => $request->get('exseor_tipo'),
                'exseor_nombre' => $request->get('exseor_nombre'),
                'exseor_caracter' => $request->get('exseor_caracter'),
                'exseor_fecha' => $request->get('exseor_fecha'),
                'exseor_actividades' => $request->get('exseor_actividades'),
                'exseor_logros' => $request->get('exseor_logros'),
                'exseor_resultados' => $request->get('exseor_resultados'),
                'exseor_productos' => $request->get('exseor_productos'),
                'exseor_funcion' => $request->get('exseor_funcion'),
                'exseor_participantes' => $cant,
        ]);

        $id = DB::getPdo()->lastInsertId();

    
        for ($i=0; $i<$cant ; $i++) { 
            DB::table('ext_sector_externo_organizaciones_part')->insert(
                [
                    'exseorpar_id_organizacion' => $id,
                    'exseorpar_numero_identificacion' => $request->get('exseredpar_numero_identificacion')[$i],
                    'exseorpar_nombre_completo' => $request->get('exseredpar_nombre_participante')[$i],
                    'exseorpar_rol' => $request->get('exseredpar_rol_participante')[$i],
                ]
            );   
        }
        Alert::success('Exitoso', 'El registro de convenio se ha registrado con exito');
        return redirect('/extension/mostrarinterorganizacion');
    }

    public function editarinterorganizacion($id){
        $interredorganizacion = ExtRedOrganizacion::find($id);
        $participantes = DB::table('ext_sector_externo_organizaciones_part')
            ->where('exseorpar_id_organizacion', $id)
            ->get();
        return view('extension/interredorganizacion.edit')
        ->with('interredorganizacion', $interredorganizacion)
        ->with('participantes', $participantes);
    }

    public function verinterorganizacion($id){
        $interredorganizacion = ExtRedOrganizacion::find($id);
        $participantes = DB::table('ext_sector_externo_organizaciones_part')
            ->where('exseorpar_id_organizacion', $id)
            ->get();
        return view('extension/interredorganizacion.show')
        ->with('interredorganizacion', $interredorganizacion)
        ->with('participantes', $participantes);
    }

    public function actualizarinterorganizacion(Request $request, $id){
        $rules = [
            'exseor_year' => 'required',
            'exseor_periodo' => 'required',
            'exseor_nombre' => 'required',
            'exseor_fecha' => 'required',
        ];
        $message = [
            'exseor_year.required' => 'El campo año es requerido',
            'exseor_periodo.required' => 'El campo periodo es requerido',
            'exseor_nombre.required' => 'El campo nombre es requerido',
            'exseor_fecha.required' => 'El campo fecha es requerido',
        ];
        $this->validate($request,$rules,$message);

        DB::table('ext_sector_externo_organizaciones')
            ->where('id', $id)
            ->update([
                'exseor_year' => $request->get('exseor_year'),
                'exseor_periodo' => $request->get('exseor_periodo'),
                'exseor_tipo' => $request->get('exseor_tipo'),
                'exseor_nombre' => $request->get('exseor_nombre'),
                'exseor_caracter' => $request->get('exseor_caracter'),
                'exseor_fecha' => $request->get('exseor_fecha'),
                'exseor_actividades' => $request->get('exseor_actividades'),
                'exseor_logros' => $request->get('exseor_logros'),
                'exseor_resultados' => $request->get('exseor_resultados'),
                'exseor_productos' => $request->get('exseor_productos'),
                'exseor_funcion' => $request->get('exseor_funcion'),
        ]);

        $cantidad = DB::table('ext_sector_externo_organizaciones')
            ->where('id', $id)
            ->first();
    
        for ($i=0; $i<$cantidad->exseor_participantes ; $i++) { 
            DB::table('ext_sector_externo_organizaciones_part')
            ->where('exseorpar_id_organizacion', $id)
            ->where('exseorpar_numero_identificacion',$request->get('exseorpar_numero_identificacion')[$i])
            ->update(
                [
                    'exseorpar_numero_identificacion' => $request->get('exseorpar_numero_identificacion')[$i],
                    'exseorpar_nombre_completo' => $request->get('exseorpar_nombre_completo')[$i],
                    'exseorpar_rol' => $request->get('exseorpar_rol')[$i],
                ]
            );   
        }
        Alert::success('Exitoso', 'El registro de convenio se ha actualizado con exito');
        return redirect('/extension/mostrarinterorganizacion');
    }

    public function eliminarinterorganizacion($id){

        DB::table('ext_sector_externo_organizaciones_part')
        ->where('exseorpar_id_organizacion', $id)
        ->delete();

        DB::table('ext_sector_externo_organizaciones')
        ->where('id', $id)
        ->delete();

        Alert::success('Exitoso', 'Los datos se han eliminado con exito');
        return redirect('/extension/mostrarinterorganizacion');

    }

    public function mostrarcurriculo(){
        $curriculos = ExtInternacionalizacionCurriculo::all();
        return view('extension/curriculo.index')
            ->with('curriculos', $curriculos);
    }

    public function crearcurriculo(){
        $asignaturas = ProgramaAsignatura::all();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/curriculo.create')
            ->with('asignaturas', $asignaturas)
            ->with('docentes', $docentes);
    }

    public function registrocurriculo(Request $request){
        $rules = [
            'exincu_year' => 'required',
            'exincu_periodo' => 'required',
        ];
        $message = [
            'exincu_year.required' => 'El campo año es requerido',
            'exincu_periodo.required' => 'El campo periodo es requerido',
        ];
        $this->validate($request,$rules,$message);

        $curriculo = new ExtInternacionalizacionCurriculo();

        
        $curriculo->exincu_year = $request->get('exincu_year');
        $curriculo->exincu_periodo = $request->get('exincu_periodo');
        $curriculo->exincu_id_asignatura = $request->get('exincu_id_asignatura');
        $curriculo->exincu_id_docente = $request->get('exincu_id_docente');
        if($request->get('ext_uso_idioma') != ""){
            $curriculo->ext_uso_idioma = implode(';', $request->get('ext_uso_idioma'));
        }
        if($request->get('ext_uso_tic') != ""){
            $curriculo->ext_uso_tic = implode(';', $request->get('ext_uso_tic'));
        }
        if($request->get('ext_competencia_global') != ""){
            $curriculo->ext_competencia_global = implode(';', $request->get('ext_competencia_global'));
        }
        $curriculo->ext_movilidad_estudiante = $request->get('ext_movilidad_estudiante');
        $curriculo->ext_otra_actividad = $request->get('ext_otra_actividad');

        $curriculo->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrarcurriculo');
    }

    public function editarcurriculo($id){
        $curriculo = ExtInternacionalizacionCurriculo::find($id);
        $asignaturas = ProgramaAsignatura::all();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('extension/curriculo.edit')
            ->with('asignaturas', $asignaturas)
            ->with('docentes', $docentes)
            ->with('curriculo', $curriculo);
    }

    public function vercurriculo($id){
        $curriculo = DB::table('ext_internacionalizacion_curriculo')
            ->join('persona','persona.id', '=', 'ext_internacionalizacion_curriculo.exincu_id_docente')
            ->join('programa_plan_estudio_asignatura', 'programa_plan_estudio_asignatura.id', '=', 'ext_internacionalizacion_curriculo.exincu_id_asignatura')
            ->where('ext_internacionalizacion_curriculo.id', $id)
            ->first();
        return view('extension/curriculo.show')
            ->with('curriculo', $curriculo);
    }

    public function actualizarcurriculo(Request $request, $id){
        $rules = [
            'exincu_year' => 'required',
            'exincu_periodo' => 'required',
        ];
        $message = [
            'exincu_year.required' => 'El campo año es requerido',
            'exincu_periodo.required' => 'El campo periodo es requerido',
        ];
        $this->validate($request,$rules,$message);

        $curriculo = ExtInternacionalizacionCurriculo::find($id);

        
        $curriculo->exincu_year = $request->get('exincu_year');
        $curriculo->exincu_periodo = $request->get('exincu_periodo');
        $curriculo->exincu_id_asignatura = $request->get('exincu_id_asignatura');
        $curriculo->exincu_id_docente = $request->get('exincu_id_docente');
        if($request->get('ext_uso_idioma') != ""){
            $curriculo->ext_uso_idioma = implode(';', $request->get('ext_uso_idioma'));
        }
        if($request->get('ext_uso_tic') != ""){
            $curriculo->ext_uso_tic = implode(';', $request->get('ext_uso_tic'));
        }
        if($request->get('ext_competencia_global') != ""){
            $curriculo->ext_competencia_global = implode(';', $request->get('ext_competencia_global'));
        }
        $curriculo->ext_movilidad_estudiante = $request->get('ext_movilidad_estudiante');
        $curriculo->ext_otra_actividad = $request->get('ext_otra_actividad');

        $curriculo->save();
        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrarcurriculo');
    }

    public function eliminarcurriculo($id){
        $curriculo = ExtInternacionalizacionCurriculo::find($id);
        $curriculo->delete();
        Alert::success('Exitoso', 'Los datos se han eliminado con exito');
        return redirect('/extension/mostrarcurriculo');
    }


}
