<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\InvGrupoInvestigacion;
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
        return view('investigacion/grupo.show')
            ->with('personas', $personas)
            ->with('grupo', $grupo);
    }

}
