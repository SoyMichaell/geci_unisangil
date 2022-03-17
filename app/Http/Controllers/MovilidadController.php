<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Movilidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MovilidadController extends Controller
{
    public function index()
    {
        $movilidades = Movilidad::all();
        $estudiantes = DB::table('estudiante')->get();
        return view('movilidad.index')
            ->with('movilidades', $movilidades)
            ->with('estudiantes', $estudiantes);
    }

    public function create()
    {
        $personas = DB::table('persona')->get();
        $estudiantes = Estudiante::all();

        return view('movilidad.create')
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes);
    }

    public function store(Request $request)
    {
        $rules = [
            'movi_year' => 'required|max:4',
            'movi_periodo' => 'required',
            'tipo_persona_movilidad' => 'required|not_in:0',
            'movi_tipo_movilidad' => 'required',
            'movi_evento' => 'required',
            'movi_pais' => 'required',
            'movi_ciudad' => 'required',
            'movi_observacion' => 'required',
        ];
        $message = [
            'movi_year.requried' => 'El campo año es requerido',
            'movi_periodo.requried' => 'El campo periodo es requerido',
            'tipo_persona_movilidad.requried' => 'El campo tipo persona es requerido',
            'movi_tipo_movilidad.requried' => 'El campo tipo movilidad es requerido',
            'movi_evento.requried' => 'El campo evento es requerido',
            'movi_pais.requried' => 'El campo país es requerido',
            'movi_ciudad.requried' => 'El campo ciudad es requerido',
            'movi_observacion.requried' => 'El campo observación es requerido',
        ];
        $this->validate($request,$rules,$message);
        
        $movilidad = new Movilidad();
        $movilidad->movi_year = $request->get('movi_year');
        $movilidad->movi_periodo = $request->get('movi_periodo');
        if($request->get('tipo_persona_movilidad') == 'administrativo' || $request->get('tipo_persona_movilidad') == 'docente'){
            $movilidad->movi_id_persona = $request->get('prac_id_docente');
        }else{
            $movilidad->movi_id_persona = $request->get('prac_id_estudiante');
        }
        $movilidad->movi_tipo_persona = $request->get('tipo_persona_movilidad');
        $movilidad->movi_tipo_movilidad = $request->get('movi_tipo_movilidad');
        $movilidad->movi_evento = $request->get('movi_evento');
        $movilidad->movi_pais = $request->get('movi_pais');
        $movilidad->movi_ciudad = $request->get('movi_ciudad');
        $movilidad->movi_observacion = $request->get('movi_observacion');

        $movilidad->save();

        Alert::success('Exitoso','Información registrada');
        return redirect('/movilidad');

    }

    public function show($id)
    {
        $personas = DB::table('persona')->get();
        $estudiantes = Estudiante::all();
        $movilidad = Movilidad::find($id);
        return view('movilidad.show')
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('movilidad', $movilidad);
    }

    public function edit($id)
    {
        $personas = DB::table('persona')->get();
        $estudiantes = Estudiante::all();
        $movilidad = Movilidad::find($id);
        return view('movilidad.edit')
            ->with('personas', $personas)
            ->with('estudiantes', $estudiantes)
            ->with('movilidad', $movilidad);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'movi_year' => 'required|max:4',
            'movi_periodo' => 'required',
            'tipo_persona_movilidad' => 'required|not_in:0',
            'movi_tipo_movilidad' => 'required',
            'movi_evento' => 'required',
            'movi_pais' => 'required',
            'movi_ciudad' => 'required',
            'movi_observacion' => 'required',
        ];
        $message = [
            'movi_year.requried' => 'El campo año es requerido',
            'movi_periodo.requried' => 'El campo periodo es requerido',
            'tipo_persona_movilidad.requried' => 'El campo tipo persona es requerido',
            'movi_tipo_movilidad.requried' => 'El campo tipo movilidad es requerido',
            'movi_evento.requried' => 'El campo evento es requerido',
            'movi_pais.requried' => 'El campo país es requerido',
            'movi_ciudad.requried' => 'El campo ciudad es requerido',
            'movi_observacion.requried' => 'El campo observación es requerido',
        ];
        $this->validate($request,$rules,$message);
        
        $movilidad = Movilidad::find($id);
        $movilidad->movi_year = $request->get('movi_year');
        $movilidad->movi_periodo = $request->get('movi_periodo');
        if($request->get('tipo_persona_movilidad') == 'administrativo' || $request->get('tipo_persona_movilidad') == 'docente'){
            $movilidad->movi_id_persona = $request->get('prac_id_docente');
        }else if($request->get('tipo_persona_movilidad') == 'estudiante'){
            $movilidad->movi_id_persona = $request->get('prac_id_estudiante');
        }
        $movilidad->movi_tipo_persona = $request->get('tipo_persona_movilidad');
        $movilidad->movi_tipo_movilidad = $request->get('movi_tipo_movilidad');
        $movilidad->movi_evento = $request->get('movi_evento');
        $movilidad->movi_pais = $request->get('movi_pais');
        $movilidad->movi_ciudad = $request->get('movi_ciudad');
        $movilidad->movi_observacion = $request->get('movi_observacion');

        $movilidad->save();

        Alert::success('Exitoso','Información actualizada');
        return redirect('/movilidad');
    }

    public function destroy($id)
    {
        $movilidad = Movilidad::find($id);
        $movilidad->delete();
        Alert::success('Exitoso','Registro eliminado');
        return redirect('/movilidad');
    }
}
