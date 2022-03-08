<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Facultad;
use App\Models\Laboratorio;
use App\Models\Programa;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LaboratorioController extends Controller
{
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return view('laboratorio.index')
            ->with('laboratorios', $laboratorios);
    }

    public function create()
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = Estudiante::all();
        $softwares = Software::all();

        return view('laboratorio.create')
            ->with('docentes', $docentes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('estudiantes', $estudiantes)
            ->with('softwares', $softwares);
    }

    public function store(Request $request)
    {
        $rules = [
            'lab_fecha' => 'required',
            'lab_nombre' => 'required',
            'lab_ubicacion' => 'required',
            'lab_finalidad' => 'required',
            'lab_nombre_practica' => 'required',
            'lab_cantidad_estudiante' => 'required',
        ];
        $message = [
            'lab_fecha.required' => 'El campo fecha es requerido',
            'lab_nombre.required' => 'El campo nombre laboratorio es requerido',
            'lab_ubicacion.required' => 'El campo ubicación es requerido',
            'lab_finalidad.required' => 'El campo finalidad es requerido',
            'lab_nombre_practica.required' => 'El campo nombre practicante es requerido',
            'lab_cantidad_estudiante.required' => 'El campo cantidad estudiantes es requerido',
        ];
        $this->validate($request, $rules, $message);

        if ($request->get('lab_id_docente') == "" || $request->get('lab_id_facultad') == "" || $request->get('lab_id_programa') == "" || $request->get('lab_id_practicante') == "" || $request->get('lab_id_software') == "") {
            Alert::warning('Advertencia', 'Diligenciar todos los campos');
            return back()->withInput();
        }

        $laboratorio = new Laboratorio();
        $laboratorio->lab_fecha = $request->get('lab_fecha');
        $laboratorio->lab_nombre = $request->get('lab_nombre');
        $laboratorio->lab_ubicacion = $request->get('lab_ubicacion');
        $laboratorio->lab_id_docente = $request->get('lab_id_docente');
        $laboratorio->lab_finalidad = $request->get('lab_finalidad');
        $laboratorio->lab_id_facultad = $request->get('lab_id_facultad');
        $laboratorio->lab_id_programa = $request->get('lab_id_programa');
        $laboratorio->lab_id_practicante = $request->get('lab_id_practicante');
        $laboratorio->lab_nombre_practica = $request->get('lab_nombre_practica');
        $laboratorio->lab_cantidad_estudiante = $request->get('lab_cantidad_estudiante');
        $laboratorio->lab_id_software = $request->get('lab_id_software');
        $laboratorio->lab_material = $request->get('lab_material');
        $laboratorio->lab_observaciones = $request->get('lab_observaciones');

        $laboratorio->save();
        Alert::success('Exitoso', 'El laboratorio se registro con exito');
        return redirect('/laboratorio');
    }

    public function show($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = Estudiante::all();
        $softwares = Software::all();
        $laboratorio = Laboratorio::find($id);
        return view('laboratorio.show')
            ->with('docentes', $docentes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('estudiantes', $estudiantes)
            ->with('softwares', $softwares)
            ->with('laboratorio', $laboratorio);
    }

    public function edit($id)
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = Estudiante::all();
        $softwares = Software::all();
        $laboratorio = Laboratorio::find($id);
        return view('laboratorio.edit')
            ->with('docentes', $docentes)
            ->with('facultades', $facultades)
            ->with('programas', $programas)
            ->with('estudiantes', $estudiantes)
            ->with('softwares', $softwares)
            ->with('laboratorio', $laboratorio);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'lab_fecha' => 'required',
            'lab_nombre' => 'required',
            'lab_ubicacion' => 'required',
            'lab_finalidad' => 'required',
            'lab_nombre_practica' => 'required',
            'lab_cantidad_estudiante' => 'required',
        ];
        $message = [
            'lab_fecha.required' => 'El campo fecha es requerido',
            'lab_nombre.required' => 'El campo nombre laboratorio es requerido',
            'lab_ubicacion.required' => 'El campo ubicación es requerido',
            'lab_finalidad.required' => 'El campo finalidad es requerido',
            'lab_nombre_practica.required' => 'El campo nombre practicante es requerido',
            'lab_cantidad_estudiante.required' => 'El campo cantidad estudiantes es requerido',
        ];
        $this->validate($request, $rules, $message);

        if ($request->get('lab_id_docente') == "" || $request->get('lab_id_facultad') == "" || $request->get('lab_id_programa') == "" || $request->get('lab_id_practicante') == "" || $request->get('lab_id_software') == "") {
            Alert::warning('Advertencia', 'Diligenciar todos los campos');
            return back()->withInput();
        }

        $laboratorio = Laboratorio::find($id);
        $laboratorio->lab_fecha = $request->get('lab_fecha');
        $laboratorio->lab_nombre = $request->get('lab_nombre');
        $laboratorio->lab_ubicacion = $request->get('lab_ubicacion');
        $laboratorio->lab_id_docente = $request->get('lab_id_docente');
        $laboratorio->lab_finalidad = $request->get('lab_finalidad');
        $laboratorio->lab_id_facultad = $request->get('lab_id_facultad');
        $laboratorio->lab_id_programa = $request->get('lab_id_programa');
        $laboratorio->lab_id_practicante = $request->get('lab_id_practicante');
        $laboratorio->lab_nombre_practica = $request->get('lab_nombre_practica');
        $laboratorio->lab_cantidad_estudiante = $request->get('lab_cantidad_estudiante');
        $laboratorio->lab_id_software = $request->get('lab_id_software');
        $laboratorio->lab_material = $request->get('lab_material');
        $laboratorio->lab_observaciones = $request->get('lab_observaciones');

        $laboratorio->save();
        Alert::success('Exitoso', 'El laboratorio se actualizado con exito');
        return redirect('/laboratorio');
    }

    public function destroy($id)
    {
        $laboratorio = Laboratorio::find($id);
        $laboratorio->delete();
        Alert::success('Exitoso', 'El laboratorio se ha eliminado con exito');
        return redirect('/laboratorio');
    }
}
