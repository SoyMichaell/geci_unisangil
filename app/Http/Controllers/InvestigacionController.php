<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\InvGrupoInvestigacion;
use App\Models\InvInvestigador;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $grupo = InvGrupoInvestigacion::find($id);
        $grupo->delete();
        Alert::success('Exitoso', 'Los datos se han eliminado');
        return redirect('investigacion/mostrargrupo');
    }

    public function mostrarintegrante(){
        $investigadores = DB::table('inv_investigador')
        ->select('inv_nombre_grupo','per_nombre','per_apellido','inves_enlace_cvlac','inves_categoria','per_tipo_usuario','inv_investigador.id')
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
        $personas = DB::table('persona')
        ->where('per_tipo_usuario', 2)
        ->orWhere('per_tipo_usuario', 3)
        ->orWhere('per_tipo_usuario', 6)
        ->get();
        $grupos = InvGrupoInvestigacion::all();
        $investigador = InvInvestigador::find($id);
        return view('investigacion/investigador.show')
            ->with('personas', $personas)
            ->with('grupos', $grupos)
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

}