<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PracticaController extends Controller
{
    public function index()
    {
        $practicas = Practica::all();
        return view('practica.index')
            ->with('practicas', $practicas);
    }

    public function create()
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $estudiantes = Estudiante::all();
        return view('practica.create')
            ->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes);
    }

    public function store(Request $request)
    {
        $rules = [
            'prac_year' => 'required',
            'prac_razon_social' => 'required',
            'prac_nit_empresa' => 'required',
            'prac_pais' => 'required',
            'prac_departamento' => 'required',
            'prac_ciudad' => 'required',
            'prac_direccion' => 'required',
            'prac_telefono' => 'required',
            'prac_correo' => 'required',
            'prac_area_practica' => 'required',
            'prac_cargo' => 'required',
        ];
        $message = [
            'prac_year.required' => 'El campo año es requerido',
            'prac_razon_social.required' => 'El campo razón social es requerido',
            'prac_nit_empresa.required' => 'El campo nit empresa es requerido',
            'prac_pais.required' => 'El campo país es requerido',
            'prac_departamento.required' => 'El campo departamento es requerido',
            'prac_ciudad.required' => 'El campo ciudad es requerido',
            'prac_direccion.required' => 'El campo dirección es requerido',
            'prac_telefono.required' => 'El campo telefono es requerido',
            'prac_correo.required' => 'El campo correo electronico es requerido',
            'prac_area_practica.required' => 'El campo area de practica es requerido',
            'prac_cargo.required' => 'El campo cargo es requerido',
        ];
        $this->validate($request, $rules, $message);

        $practica = new Practica();
        $practica->prac_year = $request->get('prac_year');
        $practica->prac_razon_social = $request->get('prac_razon_social');
        $practica->prac_nit_empresa = $request->get('prac_nit_empresa');
        $practica->prac_pais = $request->get('prac_pais');
        $practica->prac_departamento = $request->get('prac_departamento');
        $practica->prac_ciudad = $request->get('prac_ciudad');
        $practica->prac_direccion = $request->get('prac_direccion');
        $practica->prac_telefono = $request->get('prac_telefono');
        $practica->prac_correo = $request->get('prac_correo');
        $practica->prac_area_practica = $request->get('prac_area_practica');
        if ($request->get('tipo_persona') == '1') {
            $practica->prac_id_docente = $request->get('prac_id_docente');
        } else if ($request->get('tipo_persona') == '2') {
            $practica->prac_id_estudiante = $request->get('prac_id_estudiante');
        }
        $practica->prac_cargo = $request->get('prac_cargo');


        $practica->save();

        Alert::success('Exitoso', 'La practica se ha registrado con exito');
        return redirect('/practica');
    }

    public function show($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $estudiantes = Estudiante::all();
        $practica = Practica::find($id);
        return view('practica.show')
            ->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('practica', $practica);
    }

    public function edit($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $estudiantes = Estudiante::all();
        $practica = Practica::find($id);
        return view('practica.edit')
            ->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('practica', $practica);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'prac_year' => 'required',
            'prac_razon_social' => 'required',
            'prac_nit_empresa' => 'required',
            'prac_pais' => 'required',
            'prac_departamento' => 'required',
            'prac_ciudad' => 'required',
            'prac_direccion' => 'required',
            'prac_telefono' => 'required',
            'prac_correo' => 'required',
            'prac_area_practica' => 'required',
            'prac_cargo' => 'required',
        ];
        $message = [
            'prac_year.required' => 'El campo año es requerido',
            'prac_razon_social.required' => 'El campo razón social es requerido',
            'prac_nit_empresa.required' => 'El campo nit empresa es requerido',
            'prac_pais.required' => 'El campo país es requerido',
            'prac_departamento.required' => 'El campo departamento es requerido',
            'prac_ciudad.required' => 'El campo ciudad es requerido',
            'prac_direccion.required' => 'El campo dirección es requerido',
            'prac_telefono.required' => 'El campo telefono es requerido',
            'prac_correo.required' => 'El campo correo electronico es requerido',
            'prac_area_practica.required' => 'El campo area de practica es requerido',
            'prac_cargo.required' => 'El campo cargo es requerido',
        ];
        $this->validate($request, $rules, $message);

        $practica = Practica::find($id);
        $practica->prac_year = $request->get('prac_year');
        $practica->prac_razon_social = $request->get('prac_razon_social');
        $practica->prac_nit_empresa = $request->get('prac_nit_empresa');
        $practica->prac_pais = $request->get('prac_pais');
        $practica->prac_departamento = $request->get('prac_departamento');
        $practica->prac_ciudad = $request->get('prac_ciudad');
        $practica->prac_direccion = $request->get('prac_direccion');
        $practica->prac_telefono = $request->get('prac_telefono');
        $practica->prac_correo = $request->get('prac_correo');
        $practica->prac_area_practica = $request->get('prac_area_practica');
        if ($request->get('tipo_persona') == '1') {
            $practica->prac_id_docente = $request->get('prac_id_docente');
            $practica->prac_id_estudiante = null;
        } else if ($request->get('tipo_persona') == '2') {
            $practica->prac_id_estudiante = $request->get('prac_id_estudiante');
            $practica->prac_id_docente = null;
        }
        $practica->prac_cargo = $request->get('prac_cargo');


        $practica->save();

        Alert::success('Exitoso', 'La practica se ha registrado con exito');
        return redirect('/practica');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
