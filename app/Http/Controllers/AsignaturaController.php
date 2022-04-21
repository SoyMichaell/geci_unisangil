<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\ProgramaPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AsignaturaController extends Controller
{
    public function index()
    {
       
        $asignaturas = ProgramaAsignatura::all();
        $programas = Programa::all();
        $facultades = Facultad::all();
        $municipios = Municipio::all();
        $plans = ProgramaPlan::all();
        return view('programa/asignatura.index')
        ->with('municipios', $municipios)
        ->with('facultades', $facultades)
        ->with('programas', $programas)
        ->with('plans', $plans)
        ->with('asignaturas', $asignaturas);
    }

    public function store(Request $request)
    {
        $asignatura = new ProgramaAsignatura();
        $asignatura->pas_id_municipio = $request->get('pas_id_municipio');
        $asignatura->pas_id_facultad = $request->get('pas_id_facultad');
        $asignatura->pas_id_programa = $request->get('pas_id_programa');
        $asignatura->pas_id_programa_plan = $request->get('pas_id_programa_plan');
        $asignatura->pas_nombre = $request->get('pas_nombre');
        $asignatura->pas_creditos = $request->get('pas_creditos');
        $asignatura->pas_horas_semana = $request->get('pas_horas_semana');
        $asignatura->pas_horas_semestre = $request->get('pas_horas_semestre');

        $asignatura->save();

        Alert::success('Registro exitoso');
        return redirect('/asignatura');
    }


    public function show($id)
    {
        $asignatura = ProgramaAsignatura::find($id);
        $programas = Programa::all();
        $facultades = Facultad::all();
        $municipios = Municipio::all();
        $plans = ProgramaPlan::all();
        return view('programa/asignatura.show')
            ->with('asignatura', $asignatura)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('plans', $plans);
    }

    public function edit($id)
    {
        $asignatura = ProgramaAsignatura::find($id);
        $programas = Programa::all();
        $facultades = Facultad::all();
        $municipios = Municipio::all();
        $plans = ProgramaPlan::all();
        return view('programa/asignatura.edit')
            ->with('asignatura', $asignatura)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('plans', $plans);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'pas_id_municipio' => 'required',
            'pas_id_facultad' => 'required',
            'pas_id_programa' => 'required',
            'pas_id_programa_plan' => 'required',
            'pas_nombre' => 'required',
            'pas_creditos' => 'required',
            'pas_horas_semana' => 'required',
            'pas_horas_semestre' => 'required',
        ];

        $message = [
            'pas_id_municipio.required' => 'El campo sede es requerido',
            'pas_id_facultad.required' => 'El campo facultad es requerido',
            'pas_id_programa.required' => 'El campo programa es requerido',
            'pas_id_programa_plan.required' => 'El campo plan de estudio es requerido',
            'pas_nombre.required' => 'El campo nombre asignatura es requerido',
            'pas_creditos.required' => 'El campo número de creditos es requerido',
            'pas_horas_semana.required' => 'El campo horas a la semana es requerido',
            'pas_horas_semestre.required' => 'El campo horas al semestre es requerido', 
        ];

        $this->validate($request,$rules,$message);

        $asignatura = ProgramaAsignatura::find($id);
        $asignatura->pas_id_municipio = $request->get('pas_id_municipio');
        $asignatura->pas_id_facultad = $request->get('pas_id_facultad');
        $asignatura->pas_id_programa = $request->get('pas_id_programa');
        $asignatura->pas_id_programa_plan = $request->get('pas_id_programa_plan');
        $asignatura->pas_nombre = $request->get('pas_nombre');
        $asignatura->pas_creditos = $request->get('pas_creditos');
        $asignatura->pas_horas_semana = $request->get('pas_horas_semana');
        $asignatura->pas_horas_semestre = $request->get('pas_horas_semestre');

        $asignatura->save();

        Alert::success('Registro exitoso');
        return redirect('/asignatura');
    }

    public function destroy($id)
    {
        //
    }
}
