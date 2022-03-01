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
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function mostrarconsultoria(){
        $consultorias = ExtConsultoria::all();
        return view('extension/consultoria.index')
            ->with('consultorias', $consultorias);
    }

    public function crearconsultoria(){
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

    public function registroconsultoria(Request $request){
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
        $this->validate($request,$rules,$message);

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

        Alert::success('Exitoso','La consultoria se ha registrado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    public function editarconsultoria($id){
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

    public function verconsultoria($id){
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

    public function actualizarconsultoria(Request $request, $id){
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
        $this->validate($request,$rules,$message);

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

        Alert::success('Exitoso','La consultoria se ha actualizado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    //falta eliminar consultoria

    public function mostrarconsurecurso(){
        $consulrecursos  = ExtConsultoriaRecursoHumano::all();
        return view('extension/consultoriarecurso.index')
            ->with('consulrecursos', $consulrecursos);
    }

    public function crearconsurecurso(){
        $nivelestudios = NivelEstudio::all();
        return view('extension/consultoriarecurso.create')
            ->with('nivelestudios', $nivelestudios);
    }

    public function registroconsurecurso(Request $request){
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
        $this->validate($request,$rules,$message);
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

    public function verconsurecurso($id){
        $nivelestudios = NivelEstudio::all();
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        return view('extension/consultoriarecurso.show')
            ->with('nivelestudios', $nivelestudios)
            ->with('consurecurso', $consurecurso);
    }

    public function editarconsurecurso($id){
        $nivelestudios = NivelEstudio::all();
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        return view('extension/consultoriarecurso.edit')
            ->with('nivelestudios', $nivelestudios)
            ->with('consurecurso', $consurecurso);
    }

    public function actualizarconsurecurso(Request $request, $id){
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
        $this->validate($request,$rules,$message);
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

    public function eliminarconsurecurso($id){
        $consurecurso = ExtConsultoriaRecursoHumano::find($id);
        $consurecurso->delete();
        Alert::success('Exitoso', 'La consultoria de recurso humano ha sido eliminada con exito');
        return redirect('extension/mostrarconsurecurso');
    }

}
