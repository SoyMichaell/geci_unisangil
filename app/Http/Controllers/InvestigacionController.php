<?php

namespace App\Http\Controllers;

use App\Exports\InvestigacionExport;
use App\Models\Facultad;
use App\Models\InvGrupoInvestigacion;
use App\Models\InvInvestigador;
use App\Models\InvProyecto;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class InvestigacionController extends Controller
{

    public function index()
    {
        return view('investigacion.index');
    }

    public function mostrargrupo(){
        $grupos = InvGrupoInvestigacion::all();
        return view('investigacion/grupo.index')
            ->with('grupos', $grupos);
    }

    public function creargrupo(){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->get();
        $sedes = Municipio::all();
        $facultades = Facultad::all();
        return view('investigacion/grupo.create')
            ->with('personas', $personas)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades);
    }

    public function registrogrupo(Request $request){
        $rules = [
            'inv_id_coordinador' => 'required|not_in:0',
            'inv_nombre_grupo' => 'required',
            'inv_correo_institucional_grupo' => 'required',
            'inv_codigo_minciencias' => 'required',
            'inv_mision' => 'required',
            'inv_vision' => 'required',
            'inv_url_gruplac' => 'required',
            'inv_area_conocimiento_principal' => 'required',
            'inv_nucleo_conocimiento_nbc' => 'required',
            'inv_sede' => 'required|not_in:0',
            'inv_facultad' => 'required|not_in:0',
            'inv_lineas_investigacion' => 'required'
        ];
        $message = [
            'inv_id_coordinador.required' => 'El campo coordinador es requerido',
            'inv_nombre_grupo.required' => 'El campo nombre grupo es requerido',
            'inv_correo_institucional_grupo.required' => 'El campo correo institucional es requerido',
            'inv_codigo_minciencias.required' => 'El campo código minciencias es requerido',
            'inv_mision.required' => 'El campo misión es requerido',
            'inv_vision.required' => 'El campo visión es requerido',
            'inv_url_gruplac.required' => 'El campo enlace gruplac es requerido',
            'inv_area_conocimiento_principal.required' => 'El campo area de conocimiento (principal) es requerido',
            'inv_nucleo_conocimiento_nbc.required' => 'El campo nucleo de conocimiento (nbc) es requerido',
            'inv_sede.required' => 'El campo sede es requerido',
            'inv_facultad.required' => 'El campo facultad es requerido',
            'inv_lineas_investigacion.required' => 'El campo linas de investigación es requerido'
        ];
        $this->validate($request,$rules,$message);

        $grupo = new InvGrupoInvestigacion();
        $grupo->inv_id_coordinador = $request->get('inv_id_coordinador');
        $grupo->inv_nombre_grupo = $request->get('inv_nombre_grupo');
        $grupo->inv_correo_institucional_grupo = $request->get('inv_correo_institucional_grupo');
        $grupo->inv_codigo_minciencias = $request->get('inv_codigo_minciencias');
        $grupo->inv_mision = $request->get('inv_mision');
        $grupo->inv_vision = $request->get('inv_vision');
        $grupo->inv_url_grupo = $request->get('inv_url_grupo');
        $grupo->inv_url_gruplac = $request->get('inv_url_gruplac');
        $grupo->inv_area_conocimiento_principal = $request->get('inv_area_conocimiento_principal');
        $grupo->inv_nucleo_conocimiento_nbc = $request->get('inv_nucleo_conocimiento_nbc');
        $grupo->inv_sede = $request->get('inv_sede');
        $grupo->inv_facultad = $request->get('inv_facultad');
        $grupo->inv_categoria_grupo = $request->get('inv_categoria_grupo');
        $grupo->inv_aval_minciencias = $request->get('inv_aval_minciencias');
        $grupo->inv_lineas_investigacion = $request->get('inv_lineas_investigacion');
        $grupo->save();

        Alert::success('Exitoso', 'Los datos se han registrado');
        return redirect('investigacion/mostrargrupo');
    }

    public function vergrupo($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->get();
        $grupo = InvGrupoInvestigacion::find($id);
        $integrantes = DB::table('inv_investigador')
            ->select('persona.id','per_nombre','per_apellido','tip_nombre','inves_id_persona')
            ->join('persona','inv_investigador.inves_id_persona','=','persona.id')
            ->join('tipo_usuario', 'persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('inves_id_grupo', $id)
            ->get();
        return view('investigacion/grupo.show')
            ->with('personas', $personas)
            ->with('grupo', $grupo)
            ->with('integrantes', $integrantes);
    }

    public function editargrupo($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->get();
            $sedes = Municipio::all();
            $facultades = Facultad::all();
        $grupo = InvGrupoInvestigacion::find($id);
        return view('investigacion/grupo.edit')
            ->with('personas', $personas)
            ->with('sedes', $sedes)
            ->with('facultades', $facultades)
            ->with('grupo', $grupo);
    }

    public function actualizargrupo(Request $request, $id){
        $rules = [
            'inv_id_coordinador' => 'required|not_in:0',
            'inv_nombre_grupo' => 'required',
            'inv_correo_institucional_grupo' => 'required',
            'inv_codigo_minciencias' => 'required',
            'inv_mision' => 'required',
            'inv_vision' => 'required',
            'inv_url_gruplac' => 'required',
            'inv_area_conocimiento_principal' => 'required',
            'inv_nucleo_conocimiento_nbc' => 'required',
            'inv_sede' => 'required|not_in:0',
            'inv_facultad' => 'required|not_in:0',
            'inv_lineas_investigacion' => 'required'
        ];
        $message = [
            'inv_id_coordinador.required' => 'El campo coordinador es requerido',
            'inv_nombre_grupo.required' => 'El campo nombre grupo es requerido',
            'inv_correo_institucional_grupo.required' => 'El campo correo institucional es requerido',
            'inv_codigo_minciencias.required' => 'El campo código minciencias es requerido',
            'inv_mision.required' => 'El campo misión es requerido',
            'inv_vision.required' => 'El campo visión es requerido',
            'inv_url_gruplac.required' => 'El campo enlace gruplac es requerido',
            'inv_area_conocimiento_principal.required' => 'El campo area de conocimiento (principal) es requerido',
            'inv_nucleo_conocimiento_nbc.required' => 'El campo nucleo de conocimiento (nbc) es requerido',
            'inv_sede.required' => 'El campo sede es requerido',
            'inv_facultad.required' => 'El campo facultad es requerido',
            'inv_lineas_investigacion.required' => 'El campo linas de investigación es requerido'
        ];
        $this->validate($request,$rules,$message);

        $grupo = InvGrupoInvestigacion::find($id);
        $grupo->inv_id_coordinador = $request->get('inv_id_coordinador');
        $grupo->inv_nombre_grupo = $request->get('inv_nombre_grupo');
        $grupo->inv_correo_institucional_grupo = $request->get('inv_correo_institucional_grupo');
        $grupo->inv_codigo_minciencias = $request->get('inv_codigo_minciencias');
        $grupo->inv_mision = $request->get('inv_mision');
        $grupo->inv_vision = $request->get('inv_vision');
        $grupo->inv_url_grupo = $request->get('inv_url_grupo');
        $grupo->inv_url_gruplac = $request->get('inv_url_gruplac');
        $grupo->inv_area_conocimiento_principal = $request->get('inv_area_conocimiento_principal');
        $grupo->inv_nucleo_conocimiento_nbc = $request->get('inv_nucleo_conocimiento_nbc');
        $grupo->inv_sede = $request->get('inv_sede');
        $grupo->inv_facultad = $request->get('inv_facultad');
        $grupo->inv_categoria_grupo = $request->get('inv_categoria_grupo');
        $grupo->inv_aval_minciencias = $request->get('inv_aval_minciencias');
        $grupo->inv_lineas_investigacion = $request->get('inv_lineas_investigacion');
        $grupo->save();

        Alert::success('Exitoso', 'Los datos se han actualizado');
        return redirect('investigacion/mostrargrupo');
    }

    public function eliminargrupo($id){
        try{
            $grupo = InvGrupoInvestigacion::find($id);
            $grupo->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado');
            return redirect('investigacion/mostrargrupo');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarintegrante(){
        $investigadores = DB::table('inv_investigador')
        ->select('inv_nombre_grupo','per_nombre','per_apellido','inves_enlace_cvlac','inves_categoria','per_tipo_usuario','inves_id_persona','inv_investigador.id')
        ->join('persona','persona.id','=','inv_investigador.inves_id_persona')
        ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
        ->join('inv_grupo_investigacion','inv_grupo_investigacion.id','=','inv_investigador.inves_id_grupo')
        ->where('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 3)
        ->orWhere('per_tipo_usuario', 6)
        ->orderBy('inv_nombre_grupo', 'DESC')
        ->get();
        return view('investigacion/investigador.index')
            ->with('investigadores', $investigadores);
    }

    public function crearintegrante(){
        $personas = DB::table('persona')
        ->where('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 3)
        ->orWhere('per_tipo_usuario', 6)
        ->get();
        $grupos = InvGrupoInvestigacion::all();
        return view('investigacion/investigador.create')
            ->with('personas', $personas)
            ->with('grupos', $grupos);
    }

    public function registrointegrante(Request $request){
        $rules = [
            'inves_id_persona' => 'required|not_in:0',
            'inves_tipo_vinculacion' => 'required',
            'inves_id_grupo' => 'required|not_in:0'
        ];
        $message = [
            'inves_id_persona.required' => 'El campo integrante es requerido',
            'inves_tipo_vinculacion.required' => 'El campo vinculación es requerido',
            'inves_id_grupo.required' => 'El campo grupo de investigación es requerido'
        ];
        $this->validate($request,$rules,$message);

        $consultaInvestigador = DB::table('inv_investigador')
            ->where('inves_id_persona', $request->get('inves_id_persona'))
            ->get();

        if($consultaInvestigador->count()>=1){
            Alert::warning('Advertencia', 'El investigador que intenta registrar, ya se encuetra registrado');
            return back()->withInput();
        }else{

            $investigador = new InvInvestigador();
            $investigador->inves_id_persona = $request->get('inves_id_persona');
            $investigador->inves_enlace_cvlac = $request->get('inves_enlace_cvlac');
            $investigador->inves_tipo_vinculacion = $request->get('inves_tipo_vinculacion');
            $investigador->inves_categoria = $request->get('inves_categoria');
            $investigador->inves_id_grupo = $request->get('inves_id_grupo');

            $investigador->save();

            Alert::success('Exitoso', 'Los datos se han registrado');
            return redirect('investigacion/mostrarintegrante');
        }
    }

    public function verintegrante($id){
        $investigador = DB::table('inv_investigador')
        ->select(
            'persona.id','per_nombre','per_apellido','per_tipo_documento','per_numero_documento',
            'inves_enlace_cvlac','inves_tipo_vinculacion','tip_nombre','inves_categoria','titulo_pregrado',
            'institucion_pre','titulo_especializacion','institucion_espe','titulo_maestria','institucion_mae',
            'titulo_doctorado','institucion_doc','inv_nombre_grupo','inv_id_coordinador','inves_id_persona'
        )
        ->join('persona','inv_investigador.inves_id_persona','=','persona.id')
        ->join('inv_grupo_investigacion','inv_investigador.inves_id_grupo','=','inv_grupo_investigacion.id')
        ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
        ->join('docente','persona.id','=','docente.id_persona_docente')
        ->where('persona.id', $id)
        ->first();
        return view('investigacion/investigador.show')
            ->with('investigador', $investigador);     
    }

    public function editarintegrante($id){
        $personas = DB::table('persona')
        ->where('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 3)
        ->orWhere('per_tipo_usuario', 6)
        ->get();
        $grupos = InvGrupoInvestigacion::all();
        $investigador = InvInvestigador::find($id);
        return view('investigacion/investigador.edit')
            ->with('personas', $personas)
            ->with('grupos', $grupos)
            ->with('investigador', $investigador);     
    }

    public function actualizarintegrante(Request $request, $id){
        $rules = [
            'inves_id_persona' => 'required|not_in:0',
            'inves_tipo_vinculacion' => 'required',
            'inves_id_grupo' => 'required|not_in:0'
        ];
        $message = [
            'inves_id_persona.required' => 'El campo integrante es requerido',
            'inves_tipo_vinculacion.required' => 'El campo vinculación es requerido',
            'inves_id_grupo.required' => 'El campo grupo de investigación es requerido'
        ];
        $this->validate($request,$rules,$message);

        $investigador = InvInvestigador::find($id);
        $investigador->inves_id_persona = $request->get('inves_id_persona');
        $investigador->inves_enlace_cvlac = $request->get('inves_enlace_cvlac');
        $investigador->inves_tipo_vinculacion = $request->get('inves_tipo_vinculacion');
        $investigador->inves_categoria = $request->get('inves_categoria');
        $investigador->inves_id_grupo = $request->get('inves_id_grupo');

        $investigador->save();

        Alert::success('Exitoso', 'Los datos se han actualizado');
        return redirect('investigacion/mostrarintegrante');
    }

    public function eliminarintegrante($id){
        try{
            $integrante = InvInvestigador::find($id);
            $integrante->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado');
            return redirect('investigacion/mostrarintegrante');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarproyecto(){
        $proyectos = DB::table('inv_proyecto')
        ->select('inv_proyecto.id','invpro_titulo','invpro_estado','inv_nombre_grupo')
            ->join('inv_grupo_investigacion','inv_proyecto.invpro_id_grupo','=','inv_grupo_investigacion.id')
            ->get();
        return view('investigacion/proyecto.index')
            ->with('proyectos', $proyectos);
    }

    public function crearproyecto(){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        $grupos = InvGrupoInvestigacion::all();
        return view('investigacion/proyecto.create')
            ->with('grupos', $grupos)
            ->with('personas', $personas);
    }

    public function registroproyecto(Request $request){
        $rules = [
            'invpro_id_grupo' => 'required|not_in:0',
            'invpro_titulo' => 'required',
            'invpro_resumen' => 'required',
            'invpro_impacto' => 'required',
            'invpro_lugar' => 'required',
            'invpro_resultados' => 'required',
            'invpro_fecha_inicio' => 'required',
            'invpro_palabras_clave' => 'required',
            'invpro_estado' => 'required|not_in:0'
        ];
        $message = [
            'invpro_id_grupo' => 'El campo grupo de investigación es requerido',
            'invpro_titulo' => 'El campo titulo proyecto es requerido',
            'invpro_resumen' => 'El campo resumen es requerido',
            'invpro_impacto' => 'El campo impacto es requerido',
            'invpro_lugar' => 'El campo lugar es requerido',
            'invpro_resultados' => 'El campo resultado (s) es requerido',
            'invpro_fecha_inicio' => 'El campo fecha inicio es requerido',
            'invpro_palabras_clave' => 'El campo palabras claves es requerido',
            'invpro_estado' => 'El campo estado proyecto es requerido'
        ];
        $this->validate($request,$rules,$message);

        $proyecto = new InvProyecto();
        $proyecto->invpro_id_grupo = $request->get('invpro_id_grupo');
        $proyecto->invpro_titulo = $request->get('invpro_titulo');
        $proyecto->invpro_resumen = $request->get('invpro_resumen');
        $proyecto->invpro_impacto = $request->get('invpro_impacto');
        $proyecto->invpro_lugar = $request->get('invpro_lugar');
        $proyecto->invpro_resultados = $request->get('invpro_resultados');
        $proyecto->invpro_fecha_inicio = $request->get('invpro_fecha_inicio');
        $proyecto->invpro_id_integrantes = implode(';',$request->get('invpro_id_integrantes'));
        $proyecto->invpro_palabras_clave = $request->get('invpro_palabras_clave');
        $proyecto->invpro_estado = $request->get('invpro_estado');

        $proyecto->save();

        Alert::success('Exitoso', 'Los datos se han registrado');
        return redirect('investigacion/mostrarproyecto');
    }

    public function verproyecto($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        $grupos = InvGrupoInvestigacion::all();
        $proyecto = DB::table('inv_proyecto')
        ->select('inv_nombre_grupo','invpro_titulo','invpro_resumen','invpro_impacto','invpro_lugar',
            'invpro_resultados','invpro_fecha_inicio','invpro_estado','inv_proyecto.id','invpro_id_integrantes','invpro_palabras_clave')
            ->join('inv_grupo_investigacion','inv_proyecto.invpro_id_grupo','=','inv_grupo_investigacion.id')
            ->where('inv_proyecto.id', $id)
            ->first();
        return view('investigacion/proyecto.show')
            ->with('grupos', $grupos)
            ->with('personas', $personas)
            ->with('proyecto', $proyecto);
    }

    public function editarproyecto($id){
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 6)
            ->get();
        $grupos = InvGrupoInvestigacion::all();
        $proyecto = InvProyecto::find($id);
        return view('investigacion/proyecto.edit')
            ->with('grupos', $grupos)
            ->with('personas', $personas)
            ->with('proyecto', $proyecto);
    }

    public function actualizarproyecto(Request $request, $id){
        $rules = [
            'invpro_id_grupo' => 'required|not_in:0',
            'invpro_titulo' => 'required',
            'invpro_resumen' => 'required',
            'invpro_impacto' => 'required',
            'invpro_lugar' => 'required',
            'invpro_resultados' => 'required',
            'invpro_fecha_inicio' => 'required',
            'invpro_palabras_clave' => 'required',
            'invpro_estado' => 'required|not_in:0'
        ];
        $message = [
            'invpro_id_grupo' => 'El campo grupo de investigación es requerido',
            'invpro_titulo' => 'El campo titulo proyecto es requerido',
            'invpro_resumen' => 'El campo resumen es requerido',
            'invpro_impacto' => 'El campo impacto es requerido',
            'invpro_lugar' => 'El campo lugar es requerido',
            'invpro_resultados' => 'El campo resultado (s) es requerido',
            'invpro_fecha_inicio' => 'El campo fecha inicio es requerido',
            'invpro_palabras_clave' => 'El campo palabras claves es requerido',
            'invpro_estado' => 'El campo estado proyecto es requerido'
        ];
        $this->validate($request,$rules,$message);

        $proyecto = InvProyecto::find($id);
        $proyecto->invpro_id_grupo = $request->get('invpro_id_grupo');
        $proyecto->invpro_titulo = $request->get('invpro_titulo');
        $proyecto->invpro_resumen = $request->get('invpro_resumen');
        $proyecto->invpro_impacto = $request->get('invpro_impacto');
        $proyecto->invpro_lugar = $request->get('invpro_lugar');
        $proyecto->invpro_resultados = $request->get('invpro_resultados');
        $proyecto->invpro_fecha_inicio = $request->get('invpro_fecha_inicio');
        $proyecto->invpro_id_integrantes = implode(';',$request->get('invpro_id_integrantes'));
        $proyecto->invpro_palabras_clave = $request->get('invpro_palabras_clave');
        $proyecto->invpro_estado = $request->get('invpro_estado');

        $proyecto->save();

        Alert::success('Exitoso', 'Los datos se han actualizado');
        return redirect('investigacion/mostrarproyecto');
    }

    public function eliminarproyecto($id){
        try{
            $proyecto = InvProyecto::find($id);
            $proyecto->delete();
            Alert::success('Exitoso', 'Los datos se han eliminado');
            return redirect('investigacion/mostrarproyecto');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function exportpdfinvestigacion()
    {
        $datos = InvGrupoInvestigacion::all();
        $valor = 'grupo';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de grupos de investigación');
            return redirect('/investigacion/mostrargrupo');
        } else {
            $view = \view('reporte.investigacion', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcelinvestigacion()
    {
        $grupos = InvGrupoInvestigacion::all();
        if ($grupos->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de grupos de investigación');
            return redirect('/investigacion/mostrargrupo');
        } else {
            return Excel::download(new InvestigacionExport('grupo'), 'grupos-investigación.xlsx');
        }
    }

    public function exportpdfintegrante()
    {
        $datos = InvInvestigador::all();
        $valor = 'investigadores';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de investigadores');
            return redirect('/investigacion/mostrarintegrante');
        } else {
            $view = \view('reporte.investigacion', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcelintegrante()
    {
        $integrantes = InvInvestigador::all();
        if ($integrantes->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de investigadores');
            return redirect('/investigacion/mostrarintegrante');
        } else {
            return Excel::download(new InvestigacionExport('integrante'), 'integrantes.xlsx');
        }
    }

    public function exportpdfproyecto()
    {
        $datos = InvProyecto::all();
        $valor = 'proyectos';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de proyectos');
            return redirect('/investigacion/mostrarproyecto');
        } else {
            $view = \view('reporte.investigacion', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcelproyecto()
    {
        $proyectos = InvProyecto::all();
        if ($proyectos->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de proyectos');
            return redirect('/investigacion/mostrarproyecto');
        } else {
            return Excel::download(new InvestigacionExport('proyecto'), 'proyectos.xlsx');
        }
    }

}
