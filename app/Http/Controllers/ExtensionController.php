<?php

namespace App\Http\Controllers;

use App\Exports\ExtensionExport;
use App\Models\complemento\CineDetallado;
use App\Models\complemento\FuenteInternacional;
use App\Models\ExtActividadCultural;
use App\Models\complemento\FuenteNacional;
use App\Models\complemento\NivelEstudio;
use App\Models\complemento\Sector;
use App\Models\Estudiante;
use App\Models\ExtConsultoria;
use App\Models\ExtCurso;
use App\Models\ExtEducacionContinua;
use App\Models\ExtEventoInternacional;
use App\Models\ExtEventoVirtual;
use App\Models\ExtInternacionalizacionCurriculo;
use App\Models\ExtInterRedConvenio;
use App\Models\ExtInterRedConvenioParticipante;
use App\Models\ExtMovilidadInternacional;
use App\Models\ExtMovilidadIntersede;
use App\Models\ExtMovilidadNacional;
use App\Models\ExtParticipacionEvento;
use App\Models\ExtParticipante;
use App\Models\ExtProyectoExtension;
use App\Models\ExtRedOrganizacion;
use App\Models\ExtRegistroFotograficoInter;
use App\Models\ExtServicioExtension;
use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/cultural.create')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('personas', $personas);
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
        $actividad->extcul_persona = $request->get('extcul_persona');
        $actividad->extcul_dedicacion = $request->get('extcul_dedicacion');

        $actividad->save();

        Alert::success('Exitoso', 'La actividad se ha creado con exito');
        return redirect('/extension/mostraractividad');
    }

    public function editaractividad($id)
    {
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $actividad = ExtActividadCultural::find($id);
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/cultural.edit')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('actividad', $actividad)
            ->with('personas', $personas);
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
        $actividad->extcul_persona = $request->get('extcul_persona');
        $actividad->extcul_dedicacion = $request->get('extcul_dedicacion');

        $actividad->save();

        Alert::success('Exitoso', 'La actividad se actualizo con exito');
        return redirect('/extension/mostraractividad');
    }

    public function veractividad($id)
    {
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $actividad = ExtActividadCultural::find($id);
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/cultural.show')
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('actividad', $actividad)
            ->with('personas', $personas);
    }

    public function eliminaractividad($id)
    {
        try{
            $actividad = ExtActividadCultural::find($id);
            $actividad->delete();
            Alert::success('Exitoso', 'La actividad se ha eliminado con exito');
            return redirect('/extension/mostraractividad');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
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
        $nivelestudios = NivelEstudio::all();
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/consultoria.create')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('nivelestudios', $nivelestudios)
            ->with('personas', $personas);
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
            'extcon_fecha_fin' => 'required'
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
            'extcon_fecha_fin.required' => 'El campo fecha fin es requerido',
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
        $consultoria->extcon_id_persona = $request->get('extcon_id_persona');
        $consultoria->extcon_id_nivel_estudio = $request->get('extcon_id_nivel_estudio');
        $consultoria->save();

        Alert::success('Exitoso', 'La consultoria se ha registrado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    public function editarconsultoria($id)
    {
        $cinedetallados = CineDetallado::all();
        $sectores = Sector::all();
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $consultoria = ExtConsultoria::find($id);
        $nivelestudios = NivelEstudio::all();
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/consultoria.edit')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('consultoria', $consultoria)
            ->with('nivelestudios', $nivelestudios)
            ->with('personas', $personas);
    }

    public function verconsultoria($id)
    {
        $cinedetallados = CineDetallado::all();
        $sectores = Sector::all();
        $fuentenacionales = FuenteNacional::all();
        $fuenteinternacionales = FuenteInternacional::all();
        $consultoria = ExtConsultoria::find($id);
        $nivelestudios = NivelEstudio::all();
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre')
            ->orderBy('per_nombre')
            ->get();
        return view('extension/consultoria.show')
            ->with('cinedetallados', $cinedetallados)
            ->with('sectores', $sectores)
            ->with('fuentenacionales', $fuentenacionales)
            ->with('fuenteinternacionales', $fuenteinternacionales)
            ->with('consultoria', $consultoria)
            ->with('nivelestudios', $nivelestudios)
            ->with('personas', $personas);
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
        $consultoria->extcon_id_persona = $request->get('extcon_id_persona');
        $consultoria->extcon_id_nivel_estudio = $request->get('extcon_id_nivel_estudio');
        $consultoria->save();

        Alert::success('Exitoso', 'La consultoria se ha actualizado con exito');
        return redirect('/extension/mostrarconsultoria');
    }

    public function eliminarconsultoria($id)
    {
        try{
            $consultoria = ExtConsultoria::find($id);
            $consultoria->delete();
            Alert::success('Exitoso', 'La consultoria se ha eliminado con exito');
            return redirect('/extension/mostrarconsultoria');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
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
            ->orWhere('per_tipo_usuario', 3)
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
            ->orWhere('per_tipo_usuario', 3)
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
        try{
            $curso = ExtCurso::find($id);
            $curso->delete();
            Alert::success('Exitoso', 'El curso se ha eliminado con exito');
            return redirect('extension/mostrarcurso');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
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
        try{
            $educacion = ExtEducacionContinua::find($id);
            $educacion->delete();
            Alert::success('Exitoso', 'Educación continua eliminada con exito');
            return redirect('extension/mostrareducacion');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
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
        try{
            $participante = ExtParticipante::find($id);
            $participante->delete();
            Alert::success('Exitoso', 'Participante eliminado con exito');
            return redirect('extension/mostrarparticipante');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
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
            'extrefoin_tipo_actividad' => 'required|not_in:0',
            'extrefoin_ente_organizador' => 'required',
            'extrefoin_tipo_evento' => 'required|not_in:0',
            'extrefoin_tipo_modalidad' => 'required|not_in:0',
            'extrefoin_fecha' => 'required',
            'extrefoin_soporte' => 'required',
        ];
        $message = [
            'extrefoin_year.required' => 'El campo año es requerido',
            'extrefoin_periodo.required' => 'El campo periodo es requerido',
            'extrefoin_actividad.required' => 'El campo actividad es requerido',
            'extrefoin_tipo_actividad.required' => 'El campo tipo actividad es requerido',
            'extrefoin_ente_organizador.required' => 'El campo ente organizador es requerido',
            'extrefoin_tipo_evento.required' => 'El campo tipo evento es requerido',
            'extrefoin_tipo_modalidad.required' => 'El campo tipo modalidad es requerido',
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
            'extrefoin_tipo_actividad' => 'required|not_in:0',
            'extrefoin_ente_organizador' => 'required',
            'extrefoin_tipo_evento' => 'required|not_in:0',
            'extrefoin_tipo_modalidad' => 'required|not_in:0',
            'extrefoin_fecha' => 'required',
            'extrefoin_soporte' => 'required',
        ];
        $message = [
            'extrefoin_year.required' => 'El campo año es requerido',
            'extrefoin_periodo.required' => 'El campo periodo es requerido',
            'extrefoin_actividad.required' => 'El campo actividad es requerido',
            'extrefoin_tipo_actividad.required' => 'El campo tipo actividad es requerido',
            'extrefoin_ente_organizador.required' => 'El campo ente organizador es requerido',
            'extrefoin_tipo_evento.required' => 'El campo tipo evento es requerido',
            'extrefoin_tipo_modalidad.required' => 'El campo tipo modalidad es requerido',
            'extrefoin_fecha.required' => 'El campo fecha es requerido',
            'extrefoin_soporte.required' => 'El campo soporte es requerido',
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
        try{
            DB::table('ext_sector_externo_red_academia_convenio_participantes')
            ->where('exseredpar_id_red_academica', $id)
            ->delete();

            DB::table('ext_sector_externo_red_academia_convenio')
            ->where('id', $id)
            ->delete();

            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarinterredconvenio');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
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
        try{
            DB::table('ext_sector_externo_organizaciones_part')
            ->where('exseorpar_id_organizacion', $id)
            ->delete();

            DB::table('ext_sector_externo_organizaciones')
            ->where('id', $id)
            ->delete();

            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarinterorganizacion');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
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
        try{
            $curriculo = ExtInternacionalizacionCurriculo::find($id);
            $curriculo->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarcurriculo');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarmovilidadnacional(){
        $movilidadnacionals = ExtMovilidadNacional::all();
        return view('extension/movilidades/nacional.index')
            ->with('movilidadnacionals', $movilidadnacionals);
    }

    public function crearmovilidadnacional(){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        return view('extension/movilidades/nacional.create')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes);
    }

    public function registromovilidadnacional(Request $request){
        $rules = [
            'exmona_tipo' => 'required|not_in:0',
            'exmona_rol' => 'required|not_in:0',
            'exmona_id_sede' => 'required|not_in:0',
            'exmona_id_facultad' => 'required|not_in:0',
            'exmona_id_programa' => 'required|not_in:0',
            'exmona_institucion_proviene' => 'required',
            'exmona_descripcion' => 'required',
            'exmona_fecha_inicio' => 'required',
            'exmona_fecha_final' => 'required'
        ];
        $message = [
            'exmona_tipo.required' => 'El campo tipo es requerido',
            'exmona_rol.required' => 'El campo rol es requerido',
            'exmona_id_sede.required' => 'El campo sede es requerido',
            'exmona_id_facultad.required' => 'El campo facultad es requerido',
            'exmona_id_programa.required' => 'El campo programa es requerido',
            'exmona_institucion_proviene.' => 'El campo institución es requerido',
            'exmona_descripcion.required' => 'El campo descripción es requerido',
            'exmona_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmona_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadnacional = new ExtMovilidadNacional();
        $movilidadnacional->exmona_tipo = $request->get('exmona_tipo');
        $movilidadnacional->exmona_rol = $request->get('exmona_rol');
        $movilidadnacional->exmona_id_sede = $request->get('exmona_id_sede');
        $movilidadnacional->exmona_id_facultad = $request->get('exmona_id_facultad');
        $movilidadnacional->exmona_id_programa = $request->get('exmona_id_programa');
        if($request->get('exmona_rol') == 'docente' || $request->get('exmona_rol') == 'administrativo'){
            $movilidadnacional->exmona_id_persona = $request->get('exmona_id_persona');
        }else{
            $movilidadnacional->exmona_id_persona = $request->get('exmona_id_estudiante');
        }
        $movilidadnacional->exmona_institucion_proviene = $request->get('exmona_institucion_proviene');
        $movilidadnacional->exmona_tipo_movilidad = implode(';' ,$request->get('exmona_tipo_movilidad'));
        $movilidadnacional->exmona_descripcion = $request->get('exmona_descripcion');
        $movilidadnacional->exmona_fecha_inicio = $request->get('exmona_fecha_inicio');
        $movilidadnacional->exmona_fecha_final = $request->get('exmona_fecha_final');
        
        $movilidadnacional->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrarmovilidadnacional');

    }

    public function editarmovilidadnacional($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        $nacional = ExtMovilidadNacional::find($id);
        return view('extension/movilidades/nacional.edit')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('nacional', $nacional);
    }

    public function vermovilidadnacional($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
        ->where('per_tipo_usuario', 6)
        ->orWhere('per_tipo_usuario', 9)
        ->get();
    $personas = DB::table('persona')
        ->where('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 10)
        ->orWhere('per_tipo_usuario', 9)
        ->orWhere('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 3)
        ->orWhere('per_tipo_usuario', 4)
        ->get();
        $nacional = ExtMovilidadNacional::find($id);
        return view('extension/movilidades/nacional.show')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('nacional', $nacional);
    }

    public function actualizarmovilidadnacional(Request $request, $id){
        $rules = [
            'exmona_tipo' => 'required|not_in:0',
            'exmona_rol' => 'required|not_in:0',
            'exmona_id_sede' => 'required|not_in:0',
            'exmona_id_facultad' => 'required|not_in:0',
            'exmona_id_programa' => 'required|not_in:0',
            'exmona_institucion_proviene' => 'required',
            'exmona_descripcion' => 'required',
            'exmona_fecha_inicio' => 'required',
            'exmona_fecha_final' => 'required'
        ];
        $message = [
            'exmona_tipo.required' => 'El campo tipo es requerido',
            'exmona_rol.required' => 'El campo rol es requerido',
            'exmona_id_sede.required' => 'El campo sede es requerido',
            'exmona_id_facultad.required' => 'El campo facultad es requerido',
            'exmona_id_programa.required' => 'El campo programa es requerido',
            'exmona_institucion_proviene.' => 'El campo institución es requerido',
            'exmona_descripcion.required' => 'El campo descripción es requerido',
            'exmona_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmona_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadnacional = ExtMovilidadNacional::find($id);
        $movilidadnacional->exmona_tipo = $request->get('exmona_tipo');
        $movilidadnacional->exmona_rol = $request->get('exmona_rol');
        $movilidadnacional->exmona_id_sede = $request->get('exmona_id_sede');
        $movilidadnacional->exmona_id_facultad = $request->get('exmona_id_facultad');
        $movilidadnacional->exmona_id_programa = $request->get('exmona_id_programa');
        if($request->get('exmona_rol') == 'docente' || $request->get('exmona_rol') == 'administrativo'){
            $movilidadnacional->exmona_id_persona = $request->get('exmona_id_persona');
        }else{
            $movilidadnacional->exmona_id_persona = $request->get('exmona_id_estudiante');
        }
        $movilidadnacional->exmona_institucion_proviene = $request->get('exmona_institucion_proviene');
        $movilidadnacional->exmona_tipo_movilidad = implode(';' ,$request->get('exmona_tipo_movilidad'));
        $movilidadnacional->exmona_descripcion = $request->get('exmona_descripcion');
        $movilidadnacional->exmona_fecha_inicio = $request->get('exmona_fecha_inicio');
        $movilidadnacional->exmona_fecha_final = $request->get('exmona_fecha_final');
        
        $movilidadnacional->save();
        Alert::success('Exitoso', 'Los datos se han actulizado con exito');
        return redirect('/extension/mostrarmovilidadnacional');
    }

    public function eliminarmovilidadnacional($id){
        try{
            $movilidadnacional = ExtMovilidadNacional::find($id);
            $movilidadnacional->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarmovilidadintersede');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarmovilidadintersede(){
        $movilidadintersedes = ExtMovilidadIntersede::all();
        return view('extension/movilidades/intersede.index')
        ->with('movilidadintersedes', $movilidadintersedes);
    }

    public function crearmovilidadintersede(){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        return view('extension/movilidades/intersede.create')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes);
    }

    public function registromovilidadintersede(Request $request){
        $rules = [
            'exmoin_tipo' => 'required|not_in:0',
            'exmoin_rol' => 'required|not_in:0',
            'exmoin_id_sede_or' => 'required|not_in:0',
            'exmoin_id_facultad_or' => 'required|not_in:0',
            'exmoin_id_programa_or' => 'required|not_in:0',
            'exmoin_id_sede_des' => 'required|not_in:0',
            'exmoin_id_facultad_des' => 'required|not_in:0',
            'exmoin_id_programa_des' => 'required|not_in:0',
            'exmoin_tipo_movilidad' => 'required',
            'exmoin_descripcion' => 'required',
            'exmoin_fecha_inicio' => 'required',
            'exmoin_fecha_final' => 'required'
        ];
        $message = [
            'exmoin_tipo.required' => 'El campo tipo es requerido',
            'exmoin_rol.required' => 'El campo rol es requerido',
            'exmoin_id_sede_or.required' => 'El campo sede de origen es requerido',
            'exmoin_id_facultad_or.required' => 'El campo facultad de origen es requerido',
            'exmoin_id_programa_or.required' => 'El campo programa de origen es requerido',
            'exmoin_id_sede_des.required' => 'El campo sede destino es requerido',
            'exmoin_id_facultad_des.required' => 'El campo facultad destino es requerido',
            'exmoin_id_programa_des.required' => 'El campo programa destino es requerido',
            'exmoin_tipo_movilidad.required' => 'El campo tipo movilidad es requerido',
            'exmoin_descripcion.required' => 'El campo descripción es requerido',
            'exmoin_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmoin_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadintersede = new ExtMovilidadIntersede();
        $movilidadintersede->exmoin_tipo = $request->get('exmoin_tipo');
        $movilidadintersede->exmoin_rol = $request->get('exmoin_rol');
        $movilidadintersede->exmoin_id_sede_or = $request->get('exmoin_id_sede_or');
        $movilidadintersede->exmoin_id_facultad_or = $request->get('exmoin_id_facultad_or');
        $movilidadintersede->exmoin_id_programa_or = $request->get('exmoin_id_programa_or');
        $movilidadintersede->exmoin_id_sede_des = $request->get('exmoin_id_sede_des');
        $movilidadintersede->exmoin_id_facultad_des = $request->get('exmoin_id_facultad_des');
        $movilidadintersede->exmoin_id_programa_des = $request->get('exmoin_id_programa_des');
        if($request->get('exmoin_rol') == 'docente' || $request->get('exmoin_rol') == 'administrativo'){
            $movilidadintersede->exmoin_id_persona = $request->get('exmoin_id_persona');
        }else{
            $movilidadintersede->exmoin_id_persona = $request->get('exmoin_id_estudiante');
        }
        $movilidadintersede->exmoin_tipo_movilidad = implode(';' ,$request->get('exmoin_tipo_movilidad'));
        $movilidadintersede->exmoin_descripcion = $request->get('exmoin_descripcion');
        $movilidadintersede->exmoin_fecha_inicio = $request->get('exmoin_fecha_inicio');
        $movilidadintersede->exmoin_fecha_final = $request->get('exmoin_fecha_final');
        
        $movilidadintersede->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrarmovilidadintersede');
    }

    public function editarmovilidadintersede($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        $intersede = ExtMovilidadIntersede::find($id);
        return view('extension/movilidades/intersede.edit')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('intersede', $intersede);
    }

    public function vermovilidadintersede($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        $intersede = ExtMovilidadIntersede::find($id);
        return view('extension/movilidades/intersede.show')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('intersede', $intersede);
    }

    public function actualizarmovilidadintersede(Request $request, $id){
        $rules = [
            'exmoin_tipo' => 'required|not_in:0',
            'exmoin_rol' => 'required|not_in:0',
            'exmoin_id_sede_or' => 'required|not_in:0',
            'exmoin_id_facultad_or' => 'required|not_in:0',
            'exmoin_id_programa_or' => 'required|not_in:0',
            'exmoin_id_sede_des' => 'required|not_in:0',
            'exmoin_id_facultad_des' => 'required|not_in:0',
            'exmoin_id_programa_des' => 'required|not_in:0',
            'exmoin_tipo_movilidad' => 'required',
            'exmoin_descripcion' => 'required',
            'exmoin_fecha_inicio' => 'required',
            'exmoin_fecha_final' => 'required'
        ];
        $message = [
            'exmoin_tipo.required' => 'El campo tipo es requerido',
            'exmoin_rol.required' => 'El campo rol es requerido',
            'exmoin_id_sede_or.required' => 'El campo sede de origen es requerido',
            'exmoin_id_facultad_or.required' => 'El campo facultad de origen es requerido',
            'exmoin_id_programa_or.required' => 'El campo programa de origen es requerido',
            'exmoin_id_sede_des.required' => 'El campo sede destino es requerido',
            'exmoin_id_facultad_des.required' => 'El campo facultad destino es requerido',
            'exmoin_id_programa_des.required' => 'El campo programa destino es requerido',
            'exmoin_tipo_movilidad.required' => 'El campo tipo movilidad es requerido',
            'exmoin_descripcion.required' => 'El campo descripción es requerido',
            'exmoin_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmoin_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadintersede = ExtMovilidadIntersede::find($id);
        $movilidadintersede->exmoin_tipo = $request->get('exmoin_tipo');
        $movilidadintersede->exmoin_rol = $request->get('exmoin_rol');
        $movilidadintersede->exmoin_id_sede_or = $request->get('exmoin_id_sede_or');
        $movilidadintersede->exmoin_id_facultad_or = $request->get('exmoin_id_facultad_or');
        $movilidadintersede->exmoin_id_programa_or = $request->get('exmoin_id_programa_or');
        $movilidadintersede->exmoin_id_sede_des = $request->get('exmoin_id_sede_des');
        $movilidadintersede->exmoin_id_facultad_des = $request->get('exmoin_id_facultad_des');
        $movilidadintersede->exmoin_id_programa_des = $request->get('exmoin_id_programa_des');
        if($request->get('exmoin_rol') == 'docente' || $request->get('exmoin_rol') == 'administrativo'){
            $movilidadintersede->exmoin_id_persona = $request->get('exmoin_id_persona');
        }else{
            $movilidadintersede->exmoin_id_persona = $request->get('exmoin_id_estudiante');
        }
        $movilidadintersede->exmoin_tipo_movilidad = implode(';' ,$request->get('exmoin_tipo_movilidad'));
        $movilidadintersede->exmoin_descripcion = $request->get('exmoin_descripcion');
        $movilidadintersede->exmoin_fecha_inicio = $request->get('exmoin_fecha_inicio');
        $movilidadintersede->exmoin_fecha_final = $request->get('exmoin_fecha_final');
        
        $movilidadintersede->save();
        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrarmovilidadintersede');
    }

    public function eliminarmovilidadintersede($id){
        try{
            $movilidadintersede = ExtMovilidadIntersede::find($id);
            $movilidadintersede->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarmovilidadintersede');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
    }

    public function mostrarmovilidadinternacional(){
        $movilidadinternacionales = ExtMovilidadInternacional::all();
        return view('extension/movilidades/internacional.index')
            ->with('movilidadinternacionales' , $movilidadinternacionales);
    }

    public function crearmovilidadinternacional(){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        return view('extension/movilidades/internacional.create')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes);
    }

    public function registromovilidadinternacional(Request $request){
        $rules = [
            'exmointer_tipo' => 'required|not_in:0',
            'exmointer_rol' => 'required|not_in:0',
            'exmointer_id_sede_or' => 'required|not_in:0',
            'exmointer_id_facultad_or' => 'required|not_in:0',
            'exmointer_id_programa_or' => 'required|not_in:0',
            'exmointer_pais_des' => 'required',
            'exmointer_ciudad_des' => 'required',
            'exmointer_institucion_nombre' => 'required',
            'exmointer_tipo_movilidad' => 'required',
            'exmointer_descripcion' => 'required',
            'exmointer_fecha_inicio' => 'required',
            'exmointer_fecha_final' => 'required'
        ];
        $message = [
            'exmointer_tipo.required' => 'El campo tipo es requerido',
            'exmointer_rol.required' => 'El campo rol es requerido',
            'exmointer_id_sede_or.required' => 'El campo sede de origen es requerido',
            'exmointer_id_facultad_or.required' => 'El campo facultad de origen es requerido',
            'exmointer_id_programa_or.required' => 'El campo programa de origen es requerido',
            'exmointer_pais_des.required' => 'El campo país destino es requerido',
            'exmointer_ciudad_des.required' => 'El campo ciudad destino es requerido',
            'exmointer_institucion_nombre.required' => 'El campo institución educativa es requerido',
            'exmointer_tipo_movilidad.required' => 'El campo tipo movilidad es requerido',
            'exmointer_descripcion.required' => 'El campo descripción es requerido',
            'exmointer_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmointer_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadinternacional = new ExtMovilidadInternacional();
        $movilidadinternacional->exmointer_tipo = $request->get('exmointer_tipo');
        $movilidadinternacional->exmointer_rol = $request->get('exmointer_rol');
        $movilidadinternacional->exmointer_id_sede_or = $request->get('exmointer_id_sede_or');
        $movilidadinternacional->exmointer_id_facultad_or = $request->get('exmointer_id_facultad_or');
        $movilidadinternacional->exmointer_id_programa_or = $request->get('exmointer_id_programa_or');
        if($request->get('exmointer_rol') == 'docente' || $request->get('exmointer_rol') == 'administrativo'){
            $movilidadinternacional->exmointer_id_persona = $request->get('exmointer_id_persona');
        }else{
            $movilidadinternacional->exmointer_id_persona = $request->get('exmointer_id_estudiante');
        }
        $movilidadinternacional->exmointer_pais_des = $request->get('exmointer_pais_des');
        $movilidadinternacional->exmointer_ciudad_des = $request->get('exmointer_ciudad_des');
        $movilidadinternacional->exmointer_institucion_nombre = $request->get('exmointer_institucion_nombre');
        $movilidadinternacional->exmointer_tipo_movilidad = implode(';' ,$request->get('exmointer_tipo_movilidad'));
        $movilidadinternacional->exmointer_descripcion = $request->get('exmointer_descripcion');
        $movilidadinternacional->exmointer_fecha_inicio = $request->get('exmointer_fecha_inicio');
        $movilidadinternacional->exmointer_fecha_final = $request->get('exmointer_fecha_final');
        
        $movilidadinternacional->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrarmovilidadinternacional');
    }

    public function editarmovilidadinternacional($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        $internacional = ExtMovilidadInternacional::find($id);
        return view('extension/movilidades/internacional.edit')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('internacional', $internacional);
    }

    public function vermovilidadinternacional($id){
        $roles = TipoUsuario::all();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->orWhere('per_tipo_usuario', 9)
            ->get();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 10)
            ->orWhere('per_tipo_usuario', 9)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 4)
            ->get();
        $internacional = ExtMovilidadInternacional::find($id);
        return view('extension/movilidades/internacional.show')
            ->with('roles', $roles)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('internacional', $internacional);
    }

    public function actualizarmovilidadinternacional(Request $request ,$id){
        $rules = [
            'exmointer_tipo' => 'required|not_in:0',
            'exmointer_rol' => 'required|not_in:0',
            'exmointer_id_sede_or' => 'required|not_in:0',
            'exmointer_id_facultad_or' => 'required|not_in:0',
            'exmointer_id_programa_or' => 'required|not_in:0',
            'exmointer_pais_des' => 'required',
            'exmointer_ciudad_des' => 'required',
            'exmointer_institucion_nombre' => 'required',
            'exmointer_tipo_movilidad' => 'required',
            'exmointer_descripcion' => 'required',
            'exmointer_fecha_inicio' => 'required',
            'exmointer_fecha_final' => 'required'
        ];
        $message = [
            'exmointer_tipo.required' => 'El campo tipo es requerido',
            'exmointer_rol.required' => 'El campo rol es requerido',
            'exmointer_id_sede_or.required' => 'El campo sede de origen es requerido',
            'exmointer_id_facultad_or.required' => 'El campo facultad de origen es requerido',
            'exmointer_id_programa_or.required' => 'El campo programa de origen es requerido',
            'exmointer_pais_des.required' => 'El campo país destino es requerido',
            'exmointer_ciudad_des.required' => 'El campo ciudad destino es requerido',
            'exmointer_institucion_nombre.required' => 'El campo institución educativa es requerido',
            'exmointer_tipo_movilidad.required' => 'El campo tipo movilidad es requerido',
            'exmointer_descripcion.required' => 'El campo descripción es requerido',
            'exmointer_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exmointer_fecha_final.required' => 'El campo fecha final es requerido'
        ];
        $this->validate($request,$rules,$message);

        $movilidadinternacional = ExtMovilidadInternacional::find($id);
        $movilidadinternacional->exmointer_tipo = $request->get('exmointer_tipo');
        $movilidadinternacional->exmointer_rol = $request->get('exmointer_rol');
        $movilidadinternacional->exmointer_id_sede_or = $request->get('exmointer_id_sede_or');
        $movilidadinternacional->exmointer_id_facultad_or = $request->get('exmointer_id_facultad_or');
        $movilidadinternacional->exmointer_id_programa_or = $request->get('exmointer_id_programa_or');
        if($request->get('exmointer_rol') == 'docente' || $request->get('exmointer_rol') == 'administrativo'){
            $movilidadinternacional->exmointer_id_persona = $request->get('exmointer_id_persona');
        }else{
            $movilidadinternacional->exmointer_id_persona = $request->get('exmointer_id_estudiante');
        }
        $movilidadinternacional->exmointer_pais_des = $request->get('exmointer_pais_des');
        $movilidadinternacional->exmointer_ciudad_des = $request->get('exmointer_ciudad_des');
        $movilidadinternacional->exmointer_institucion_nombre = $request->get('exmointer_institucion_nombre');
        $movilidadinternacional->exmointer_tipo_movilidad = implode(';' ,$request->get('exmointer_tipo_movilidad'));
        $movilidadinternacional->exmointer_descripcion = $request->get('exmointer_descripcion');
        $movilidadinternacional->exmointer_fecha_inicio = $request->get('exmointer_fecha_inicio');
        $movilidadinternacional->exmointer_fecha_final = $request->get('exmointer_fecha_final');
        
        $movilidadinternacional->save();
        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrarmovilidadinternacional');
    }

    public function eliminarmovilidadinternacional($id){
        try{
            $movilidadinternacional = ExtMovilidadInternacional::find($id);
            $movilidadinternacional->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarmovilidadinternacional');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
    }

    public function mostrareventosvirtuales(){
        $eventosvirtuales = ExtEventoVirtual::all();
        return view('extension/eventos/virtual.index')
            ->with('eventosvirtuales', $eventosvirtuales);
    }

    public function creareventosvirtuales(){
        return view('extension/eventos/virtual.create');
    }

    public function registroeventosvirtuales(Request $request){
        $rules = [
            'exevir_nombre_evento' => 'required',
            'exevir_fecha_inicio' => 'required',
            'exevir_fecha_fin' => 'required',
            'exevir_enlace_ingreso' => 'required',
            'exevir_nombre_ponente' => 'required',
            'exevir_institucion_origen' => 'required',
            'exevir_pais' => 'required',
            'exevir_nombre_ponencia' => 'required',
        ];
        $message = [
            'exevir_nombre_evento.required' => 'El campo nombre evento es requerido',
            'exevir_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exevir_fecha_fin.required' => 'El campo fecha fin es requerido',
            'exevir_enlace_ingreso.required' => 'El campo enlace ingreso es requerido',
            'exevir_nombre_ponente.required' => 'El campo nombre ponente es requerido',
            'exevir_institucion_origen.required' => 'El campo institución origen es requerido',
            'exevir_pais.required' => 'El campo país es requerido',
            'exevir_nombre_ponencia.required' => 'El campo nombre ponencia es requerido',
        ];
        $this->validate($request,$rules,$message);

        $virtual = new ExtEventoVirtual();
        $virtual->exevir_nombre_evento = $request->get('exevir_nombre_evento');
        $virtual->exevir_fecha_inicio = $request->get('exevir_fecha_inicio');
        $virtual->exevir_fecha_fin = $request->get('exevir_fecha_fin');
        $virtual->exevir_enlace_ingreso = $request->get('exevir_enlace_ingreso');
        $virtual->exevir_enlace_imagen = $request->get('exevir_enlace_imagen');
        $virtual->exevir_nombre_ponente = implode(';',$request->get('exevir_nombre_ponente'));
        $virtual->exevir_institucion_origen = implode(';',$request->get('exevir_institucion_origen'));
        $virtual->exevir_pais = implode(';',$request->get('exevir_pais'));
        $virtual->exevir_nombre_ponencia = implode(';',$request->get('exevir_nombre_ponencia'));
        $virtual->save();

        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrareventosvirtuales');
    }

    public function vereventosvirtuales($id){
        $virtual = ExtEventoVirtual::find($id);
        return view('extension/eventos/virtual.show')
            ->with('virtual', $virtual);
    }

    public function editareventosvirtuales($id){
        $virtual = ExtEventoVirtual::find($id);
        return view('extension/eventos/virtual.edit')
            ->with('virtual', $virtual);
    }

    public function actualizareventosvirtuales(Request $request, $id){
        $rules = [
            'exevir_nombre_evento' => 'required',
            'exevir_fecha_inicio' => 'required',
            'exevir_fecha_fin' => 'required',
            'exevir_enlace_ingreso' => 'required',
            'exevir_nombre_ponente' => 'required',
            'exevir_institucion_origen' => 'required',
            'exevir_pais' => 'required',
            'exevir_nombre_ponencia' => 'required',
        ];
        $message = [
            'exevir_nombre_evento.required' => 'El campo nombre evento es requerido',
            'exevir_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exevir_fecha_fin.required' => 'El campo fecha fin es requerido',
            'exevir_enlace_ingreso.required' => 'El campo enlace ingreso es requerido',
            'exevir_nombre_ponente.required' => 'El campo nombre ponente es requerido',
            'exevir_institucion_origen.required' => 'El campo institución origen es requerido',
            'exevir_pais.required' => 'El campo país es requerido',
            'exevir_nombre_ponencia.required' => 'El campo nombre ponencia es requerido',
        ];
        $this->validate($request,$rules,$message);

        $virtual = ExtEventoVirtual::find($id);
        $virtual->exevir_nombre_evento = $request->get('exevir_nombre_evento');
        $virtual->exevir_fecha_inicio = $request->get('exevir_fecha_inicio');
        $virtual->exevir_fecha_fin = $request->get('exevir_fecha_fin');
        $virtual->exevir_enlace_ingreso = $request->get('exevir_enlace_ingreso');
        $virtual->exevir_enlace_imagen = $request->get('exevir_enlace_imagen');
        $virtual->exevir_nombre_ponente = implode(';',$request->get('exevir_nombre_ponente'));
        $virtual->exevir_institucion_origen = implode(';',$request->get('exevir_institucion_origen'));
        $virtual->exevir_pais = implode(';',$request->get('exevir_pais'));
        $virtual->exevir_nombre_ponencia = implode(';',$request->get('exevir_nombre_ponencia'));
        $virtual->save();

        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrareventosvirtuales');
    }

    public function eliminareventosvirtuales($id){
        try{
            $virtual = ExtEventoVirtual::find($id);
            $virtual->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrareventosvirtuales');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
    }

    public function mostrarparticipacioneventos(){
        $participaciones = ExtParticipacionEvento::all();
        return view('extension/eventos/participacion.index')
            ->with('participaciones', $participaciones);
    }

    public function crearparticipacioneventos(){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        return view('extension/eventos/participacion.create')
            ->with('personas', $personas);
    }

    public function registroparticipacioneventos(Request $request){
        $rules = [
            'expaev_year' => 'required',
            'expaev_periodo' => 'required',
            'expaev_tipo_evento' => 'required',
            'expaev_nombre_evento' => 'required',
            'expaev_fecha' => 'required',
            'expaev_organizador' => 'required',
            'expaev_id_persona' => 'required|not_in:0',
        ];
        $message = [
            'expaev_year.required' => 'El campo año es requerido',
            'expaev_periodo.required' => 'El campo periodo es requerido',
            'expaev_tipo_evento.required' => 'El campo tipo evento es requerido',
            'expaev_nombre_evento.required' => 'El campo nombre evento es requerido',
            'expaev_fecha.required' => 'El campo fecha es requerido',
            'expaev_organizador.required' => 'El campo organizador es requerido',
            'expaev_id_persona.required' => 'El campo nombre participante es requerido',
        ];
        $this->validate($request,$rules,$message);

        $participacion = new ExtParticipacionEvento();
        $participacion->expaev_year = $request->get('expaev_year');
        $participacion->expaev_periodo = $request->get('expaev_periodo');
        $participacion->expaev_tipo_evento = $request->get('expaev_tipo_evento');
        $participacion->expaev_nombre_evento = $request->get('expaev_nombre_evento');
        $participacion->expaev_fecha = $request->get('expaev_fecha');
        $participacion->expaev_organizador = $request->get('expaev_organizador');
        $participacion->expaev_id_persona = $request->get('expaev_id_persona');

        $participacion->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrarparticipacioneventos');
    }

    public function verparticipacioneventos($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        $participacion = ExtParticipacionEvento::find($id);
        return view('extension/eventos/participacion.show')
            ->with('personas', $personas)
            ->with('participacion', $participacion);
    }

    public function editarparticipacioneventos($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        $participacion = ExtParticipacionEvento::find($id);
        return view('extension/eventos/participacion.edit')
            ->with('personas', $personas)
            ->with('participacion', $participacion);
    }

    public function actualizarparticipacioneventos(Request $request, $id){
        $rules = [
            'expaev_year' => 'required',
            'expaev_periodo' => 'required',
            'expaev_tipo_evento' => 'required',
            'expaev_nombre_evento' => 'required',
            'expaev_fecha' => 'required',
            'expaev_organizador' => 'required',
            'expaev_id_persona' => 'required|not_in:0',
        ];
        $message = [
            'expaev_year.required' => 'El campo año es requerido',
            'expaev_periodo.required' => 'El campo periodo es requerido',
            'expaev_tipo_evento.required' => 'El campo tipo evento es requerido',
            'expaev_nombre_evento.required' => 'El campo nombre evento es requerido',
            'expaev_fecha.required' => 'El campo fecha es requerido',
            'expaev_organizador.required' => 'El campo organizador es requerido',
            'expaev_id_persona.required' => 'El campo nombre participante es requerido',
        ];
        $this->validate($request,$rules,$message);

        $participacion = ExtParticipacionEvento::find($id);
        $participacion->expaev_year = $request->get('expaev_year');
        $participacion->expaev_periodo = $request->get('expaev_periodo');
        $participacion->expaev_tipo_evento = $request->get('expaev_tipo_evento');
        $participacion->expaev_nombre_evento = $request->get('expaev_nombre_evento');
        $participacion->expaev_fecha = $request->get('expaev_fecha');
        $participacion->expaev_organizador = $request->get('expaev_organizador');
        $participacion->expaev_id_persona = $request->get('expaev_id_persona');

        $participacion->save();
        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrarparticipacioneventos');
    }

    public function eliminarparticipacioneventos($id){
        try{
            $participacion = ExtParticipacionEvento::find($id);
            $participacion->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrarparticipacioneventos');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrareventosinternacionales(){
        $internacionales = ExtEventoInternacional::all();
        return view('extension/eventos/internacional.index')
            ->with('internacionales', $internacionales);
    }

    public function creareventosinternacionales(){
        return view('extension/eventos/internacional.create');
    }

    public function registroeventosinternacionales(Request $request){
        $rules = [
            'exevin_tipo' => 'required',
            'exevin_year' => 'required',
            'exevin_periodo' => 'required',
            'exevin_nombre_evento' => 'required',
            'exevin_fecha_inicio' => 'required',
            'exevin_fecha_final' => 'required',
            'exevin_lugar' => 'required',
            'exevin_sede' => 'required',
            'exevin_ponentes' => 'required',
            'exevin_institucion' => 'required',
            'exevin_pais' => 'required',
            'exevin_nombre_ponencia' => 'required',
        ];
        $message = [
            'exevin_tipo.required' => 'El campo alcance es requerido',
            'exevin_year.required' => 'El campo año es requerido',
            'exevin_periodo.required' => 'El campo periodo es requerido',
            'exevin_nombre_evento.required' => 'El campo nombre evento es requerido',
            'exevin_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exevin_fecha_final.required' => 'El campo fecha fin es requerido',
            'exevin_lugar.required' => 'El campo lugar es requerido',
            'exevin_sede.required' => 'El campo sede es requerido',
            'exevin_ponentes.required' => 'El campo ponentes es requerido',
            'exevin_institucion.required' => 'El campo institución es requerido',
            'exevin_pais.required' => 'El campo país es requerido',
            'exevin_nombre_ponencia.required' => 'El campo nombre ponencia es requerido',
        ];
        $this->validate($request,$rules,$message);

        $internacional = new ExtEventoInternacional();
        $internacional->exevin_tipo = $request->get('exevin_tipo');
        $internacional->exevin_year = $request->get('exevin_year');
        $internacional->exevin_periodo = $request->get('exevin_periodo');
        $internacional->exevin_nombre_evento = $request->get('exevin_nombre_evento');
        $internacional->exevin_fecha_inicio = $request->get('exevin_fecha_inicio');
        $internacional->exevin_fecha_final = $request->get('exevin_fecha_final');
        $internacional->exevin_lugar = $request->get('exevin_lugar');
        $internacional->exevin_sede = $request->get('exevin_sede');
        $internacional->exevin_ponentes = implode(';',$request->get('exevin_ponentes'));
        $internacional->exevin_institucion = implode(';',$request->get('exevin_institucion'));
        $internacional->exevin_pais = implode(';',$request->get('exevin_pais'));
        $internacional->exevin_nombre_ponencia = implode(';',$request->get('exevin_nombre_ponencia'));

        $internacional->save();
        Alert::success('Exitoso', 'Los datos se han registrado con exito');
        return redirect('/extension/mostrareventosinternacionales');
    }

    public function vereventosinternacionales($id){
        $internacional = ExtEventoInternacional::find($id);
        return view('extension/eventos/internacional.show')
            ->with('internacional', $internacional);
    }

    public function editareventosinternacionales($id){
        $internacional = ExtEventoInternacional::find($id);
        return view('extension/eventos/internacional.edit')
            ->with('internacional', $internacional);
    }

    public function actualizareventosinternacionales(Request $request, $id){
        $rules = [
            'exevin_tipo' => 'required',
            'exevin_year' => 'required',
            'exevin_periodo' => 'required',
            'exevin_nombre_evento' => 'required',
            'exevin_fecha_inicio' => 'required',
            'exevin_fecha_final' => 'required',
            'exevin_lugar' => 'required',
            'exevin_sede' => 'required',
            'exevin_ponentes' => 'required',
            'exevin_institucion' => 'required',
            'exevin_pais' => 'required',
            'exevin_nombre_ponencia' => 'required',
        ];
        $message = [
            'exevin_tipo.required' => 'El campo alcance es requerido',
            'exevin_year.required' => 'El campo año es requerido',
            'exevin_periodo.required' => 'El campo periodo es requerido',
            'exevin_nombre_evento.required' => 'El campo nombre evento es requerido',
            'exevin_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'exevin_fecha_final.required' => 'El campo fecha fin es requerido',
            'exevin_lugar.required' => 'El campo lugar es requerido',
            'exevin_sede.required' => 'El campo sede es requerido',
            'exevin_ponentes.required' => 'El campo ponentes es requerido',
            'exevin_institucion.required' => 'El campo institución es requerido',
            'exevin_pais.required' => 'El campo país es requerido',
            'exevin_nombre_ponencia.required' => 'El campo nombre ponencia es requerido',
        ];
        $this->validate($request,$rules,$message);

        $internacional = ExtEventoInternacional::find($id);
        $internacional->exevin_tipo = $request->get('exevin_tipo');
        $internacional->exevin_year = $request->get('exevin_year');
        $internacional->exevin_periodo = $request->get('exevin_periodo');
        $internacional->exevin_nombre_evento = $request->get('exevin_nombre_evento');
        $internacional->exevin_fecha_inicio = $request->get('exevin_fecha_inicio');
        $internacional->exevin_fecha_final = $request->get('exevin_fecha_final');
        $internacional->exevin_lugar = $request->get('exevin_lugar');
        $internacional->exevin_sede = $request->get('exevin_sede');
        $internacional->exevin_ponentes = implode(';',$request->get('exevin_ponentes'));
        $internacional->exevin_institucion = implode(';',$request->get('exevin_institucion'));
        $internacional->exevin_pais = implode(';',$request->get('exevin_pais'));
        $internacional->exevin_nombre_ponencia = implode(';',$request->get('exevin_nombre_ponencia'));

        $internacional->save();
        Alert::success('Exitoso', 'Los datos se han actualizado con exito');
        return redirect('/extension/mostrareventosinternacionales');
    }

    public function eliminareventosinternacionales($id){
        try{
            $internacional = ExtEventoInternacional::find($id);
            $internacional->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado con exito');
            return redirect('/extension/mostrareventosinternacionales');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function exportactividadculturalpdf()
    {
        $datos = DB::table('ext_actividad_cultural')->get();
        $valor = 'actividadcultural';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de actividades culturales');
            return redirect('/extension/mostraractividad');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportactividadculturalexcel()
    {
        $actividadcultural = ExtActividadCultural::all();
        if ($actividadcultural->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de actividades culturales');
            return redirect('/extension/mostraractividad');
        } else {
            return Excel::download(new ExtensionExport('actividadcultural'), 'actividades-culturaltes.xlsx');
        }
    }

    public function exportconsultoriapdf()
    {
        $datos = DB::table('ext_consultoria')->get();
        $valor = 'consultoria';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de consultoria');
            return redirect('/extension/mostrarconsultoria');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportconsultoriaexcel()
    {
        $consultorias = ExtConsultoria::all();
        if ($consultorias->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de consultoria');
            return redirect('/extension/mostrarconsultoria');
        } else {
            return Excel::download(new ExtensionExport('consultoria'), 'consultorias.xlsx');
        }
    }

    public function exportcursopdf()
    {
        $datos = DB::table('ext_curso')
        ->join('compl_cine_detallado','ext_curso.extcurso_id_cine','=','compl_cine_detallado.id')
        ->join('persona','ext_curso.extcurso_id_docente','=','persona.id')
        ->get();
        $valor = 'curso';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de cursos');
            return redirect('/extension/mostrarcurso');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportcursoexcel()
    {
        $consultorias = ExtCurso::all();
        if ($consultorias->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de cursos');
            return redirect('/extension/mostrarcurso');
        } else {
            return Excel::download(new ExtensionExport('curso'), 'cursos.xlsx');
        }
    }

    public function exporteducacionpdf()
    {
        $datos = DB::table('ext_educacion_continua')
        ->join('persona','ext_educacion_continua.extedu_id_docente','=','persona.id')
        ->join('compl_area_extension','ext_educacion_continua.extedu_tipo_extension','=','compl_area_extension.id')
        ->get();
        $valor = 'educacioncontinua';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de educación continua');
            return redirect('/extension/mostrareducacion');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exporteducacionexcel()
    {
        $consultorias = ExtEducacionContinua::all();
        if ($consultorias->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de educación continua');
            return redirect('/extension/mostrareducacion');
        } else {
            return Excel::download(new ExtensionExport('educacioncontinua'), 'educacion-continua.xlsx');
        }
    }

    public function exportparticipantepdf()
    {
        $datos = DB::table('ext_participante')
        ->join('persona','ext_participante.dop_id_docente','=','persona.id')
        ->get();
        $valor = 'participante';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de participantes');
            return redirect('/extension/mostrarparticipante');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportparticipanteexcel()
    {
        $consultorias = ExtParticipante::all();
        if ($consultorias->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de participantes');
            return redirect('/extension/mostrarparticipante');
        } else {
            return Excel::download(new ExtensionExport('participante'), 'participantes.xlsx');
        }
    }

    public function exportproyectoextensionpdf()
    {
        $datos = DB::table('ext_proyecto_extension')
        ->leftJoin('compl_area_extension','ext_proyecto_extension.extprex_id_area_extension','=','compl_area_extension.id')
        ->leftJoin('compl_area_trabajo','ext_proyecto_extension.extprex_id_area_trabajo','=','compl_area_trabajo.id')
        ->leftJoin('compl_entidad_nacional','ext_proyecto_extension.extprex_id_entidad_nacional','=','compl_entidad_nacional.id')
        ->leftJoin('compl_fuente_nacional','ext_proyecto_extension.extprex_id_fuente_nacional','=','compl_fuente_nacional.id')
        ->leftJoin('compl_fuente_internacional','ext_proyecto_extension.extprex_id_fuente_internacional','=','compl_fuente_internacional.id')
        ->leftJoin('compl_sector','ext_proyecto_extension.extprex_id_sector_otra_entidad','=','compl_sector.id')
        ->leftJoin('compl_poblacion_condicion','ext_proyecto_extension.extprex_id_poblacion_condicion','=','compl_poblacion_condicion.id')
        ->leftJoin('compl_poblacion_grupo','ext_proyecto_extension.extprex_id_poblacion_grupo','=','compl_poblacion_grupo.id')
        ->get();
        $valor = 'proyectoextension';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de proyectos de extensión');
            return redirect('/extension/mostrarproyectoextension');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportproyectoextensionexcel()
    {
        $proyectos = ExtProyectoExtension::all();
        if ($proyectos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de proyectos extensión');
            return redirect('/extension/mostrarproyectoextension');
        } else {
            return Excel::download(new ExtensionExport('proyectoextension'), 'proyectos-extension.xlsx');
        }
    }

    public function exportservicioextensionpdf()
    {
        $datos = DB::table('ext_servicio_extension')
        ->leftJoin('compl_area_extension','ext_servicio_extension.extseex_id_area_extension','=','compl_area_extension.id')
        ->leftJoin('compl_area_trabajo','ext_servicio_extension.extseex_id_area_trabajo','=','compl_area_trabajo.id')
        ->leftJoin('compl_entidad_nacional','ext_servicio_extension.extseex_id_entidad_nacional','=','compl_entidad_nacional.id')
        ->leftJoin('compl_fuente_nacional','ext_servicio_extension.extseex_id_fuente_nacional','=','compl_fuente_nacional.id')
        ->leftJoin('compl_fuente_internacional','ext_servicio_extension.extseex_id_fuente_internacional','=','compl_fuente_internacional.id')
        ->leftJoin('compl_sector','ext_servicio_extension.extseex_id_sector_otra_entidad','=','compl_sector.id')
        ->leftJoin('compl_poblacion_condicion','ext_servicio_extension.extseex_id_poblacion_condicion','=','compl_poblacion_condicion.id')
        ->leftJoin('compl_poblacion_grupo','ext_servicio_extension.extseex_id_poblacion_grupo','=','compl_poblacion_grupo.id')
        ->get();
        $valor = 'servicioextension';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de servicios de extensión');
            return redirect('/extension/mostrarproyectoextension');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportservicioextensionexcel()
    {
        $proyectos = ExtServicioExtension::all();
        if ($proyectos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de servicios extensión');
            return redirect('/extension/mostrarproyectoextension');
        } else {
            return Excel::download(new ExtensionExport('servicioextension'), 'proyectos-extension.xlsx');
        }
    }

    public function exportfotograficopdf()
    {
        $datos = DB::table('ext_registro_fotografico_inter')->get();
        $valor = 'fotografico';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros fotograficos');
            return redirect('/extension/mostrarregistrofotografico');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportfotograficoexcel()
    {
        $fotograficos = ExtRegistroFotograficoInter::all();
        if ($fotograficos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros fotograficos');
            return redirect('/extension/mostrarregistrofotografico');
        } else {
            return Excel::download(new ExtensionExport('fotografico'), 'registros-fotograficos.xlsx');
        }
    }

    public function exportredacademiapdf()
    {
        $datos = DB::table('ext_sector_externo_red_academia_convenio')->get();
        $valor = 'redacademica';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de convenios');
            return redirect('/extension/mostrarinterredconvenio');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportredacademiaexcel()
    {
        $redacademica = ExtInterRedConvenio::all();
        if ($redacademica->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de convenios');
            return redirect('/extension/mostrarinterredconvenio');
        } else {
            return Excel::download(new ExtensionExport('redacademica'), 'redes-académicas.xlsx');
        }
    }

    public function exportredorganizacionpdf()
    {
        $datos = DB::table('ext_sector_externo_organizaciones')->get();
        $valor = 'redorganizacion';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de convenios');
            return redirect('/extension/mostrarinterorganizacion');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportredorganizacionexcel()
    {
        $redacademica = ExtRedOrganizacion::all();
        if ($redacademica->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de convenios');
            return redirect('/extension/mostrarinterorganizacion');
        } else {
            return Excel::download(new ExtensionExport('redorganizacion'), 'red-organizaciones.xlsx');
        }
    }

    public function exportcurriculopdf()
    {
        $datos = DB::table('ext_internacionalizacion_curriculo')
        ->join('persona','ext_internacionalizacion_curriculo.exincu_id_docente','=','persona.id')
        ->join('programa_plan_estudio_asignatura','ext_internacionalizacion_curriculo.exincu_id_asignatura','programa_plan_estudio_asignatura.id')
        ->get();
        $valor = 'curriculo';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de curriculos internacionales');
            return redirect('/extension/mostrarcurriculo');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportcurriculoexcel()
    {
        $curriculos = ExtInternacionalizacionCurriculo::all();
        if ($curriculos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de curriculos internacionales');
            return redirect('/extension/mostrarcurriculo');
        } else {
            return Excel::download(new ExtensionExport('curriculo'), 'curriculo-internacional.xlsx');
        }
    }

    public function exporteventopdf()
    {
        $datos = DB::table('ext_eventos_virtuales')->get();
        $valor = 'eventovirtual';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos virtuales');
            return redirect('/extension/mostrareventosvirtuales');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exporteventoexcel()
    {
        $eventos = ExtEventoVirtual::all();
        if ($eventos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos virtuales');
            return redirect('/extension/mostrareventosvirtuales');
        } else {
            return Excel::download(new ExtensionExport('eventovirtual'), 'eventos-virtuales.xlsx');
        }
    }

    public function exportparticipacionpdf()
    {
        $datos = DB::table('ext_participacion_eventos')
        ->join('persona','ext_participacion_eventos.expaev_id_persona','=','persona.id')
        ->get();
        $valor = 'participacion';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de participación eventos');
            return redirect('/extension/mostrarparticipacioneventos');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportparticipacionexcel()
    {
        $participaciones = ExtParticipacionEvento::all();
        if ($participaciones->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de participación eventos');
            return redirect('/extension/mostrarparticipacioneventos');
        } else {
            return Excel::download(new ExtensionExport('participacion'), 'participacion-eventos.xlsx');
        }
    }

    public function exportinternacionalpdf()
    {
        $datos = DB::table('ext_eventos_nac_inter')->get();
        $valor = 'einternacional';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos internacionales');
            return redirect('/extension/mostrareventosinternacionales');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportinternacionalexcel()
    {
        $participaciones = ExtEventoInternacional::all();
        if ($participaciones->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos internacionales');
            return redirect('/extension/mostrareventosinternacionales');
        } else {
            return Excel::download(new ExtensionExport('einternacional'), 'eventos-internacionales.xlsx');
        }
    }

    public function exportmovilidadnacionalpdf()
    {
        $datos = DB::table('ext_movilidad_nacional')
        ->join('municipio','ext_movilidad_nacional.exmona_id_sede','=','municipio.id')
        ->join('facultad','ext_movilidad_nacional.exmona_id_facultad','=','facultad.id')
        ->join('programa','ext_movilidad_nacional.exmona_id_programa','=','programa.id')
        ->join('persona','ext_movilidad_nacional.exmona_id_persona','=','persona.id')
        ->get();
        $valor = 'mnacional';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades nacionales');
            return redirect('/extension/mostrarmovilidadnacional');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportmovilidadnacionalexcel()
    {
        $mnacionales = ExtMovilidadNacional::all();
        if ($mnacionales->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades nacionales');
            return redirect('/extension/mostrarmovilidadnacional');
        } else {
            return Excel::download(new ExtensionExport('mnacional'), 'movilidades-nacionales.xlsx');
        }
    }

    public function exportmovilidadintersedepdf()
    {
        $datos = DB::table('ext_movilidad_intersede')
        ->join('municipio','ext_movilidad_intersede.exmoin_id_sede_or','=','municipio.id')
        ->join('facultad','ext_movilidad_intersede.exmoin_id_facultad_or','=','facultad.id')
        ->join('programa','ext_movilidad_intersede.exmoin_id_programa_or','=','programa.id')
        ->join('persona','ext_movilidad_intersede.exmoin_id_persona','=','persona.id')
        ->get();
        $valor = 'mintersede';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades intersedes');
            return redirect('/extension/mostrarmovilidadintersede');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportmovilidadintersedeexcel()
    {
        $mintersedes = ExtMovilidadIntersede::all();
        if ($mintersedes->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades intersedes');
            return redirect('/extension/mostrarmovilidadintersede');
        } else {
            return Excel::download(new ExtensionExport('mintersede'), 'movilidades-intersedes.xlsx');
        }
    }

    public function exportmovilidadinternacionalpdf()
    {
        $datos = DB::table('ext_movilidad_internacional')
        ->join('municipio','ext_movilidad_internacional.exmointer_id_sede_or','=','municipio.id')
        ->join('facultad','ext_movilidad_internacional.exmointer_id_facultad_or','=','facultad.id')
        ->join('programa','ext_movilidad_internacional.exmointer_id_programa_or','=','programa.id')
        ->join('persona','ext_movilidad_internacional.exmointer_id_persona','=','persona.id')
        ->get();
        $valor = 'minternacional';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades internacionales');
            return redirect('/extension/mostrarmovilidadinternacional');
        } else {
            $view = \view('reporte.extension', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportmovilidadinternacionalexcel()
    {
        $minternacionales = ExtMovilidadInternacional::all();
        if ($minternacionales->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de movilidades internacionales');
            return redirect('/extension/mostrarmovilidadinternacional');
        } else {
            return Excel::download(new ExtensionExport('minternacional'), 'movilidades-intersedes.xlsx');
        }
    }

}
