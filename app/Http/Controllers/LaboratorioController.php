<?php

namespace App\Http\Controllers;

use App\Exports\LaboratorioExport;
use App\Models\Facultad;
use App\Models\Laboratorio;
use App\Models\Programa;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
            ->orWhere('per_tipo_usuario', 3)
            ->get();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
        ->select('persona.id','per_nombre','per_apellido')
        ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
        ->where('per_tipo_usuario', 6)
        ->where('estudiante.estu_administrativo', 'Si')
        ->get();
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
            'lab_id_docente' => 'required|not_in:0',
            'lab_finalidad' => 'required',
            'lab_id_facultad' => 'required|not_in:0',
            'lab_id_programa' => 'required|not_in:0',
            'lab_id_practicante' => 'required|not_in:0',
            'lab_nombre_practica' => 'required',
            'lab_cantidad_estudiante' => 'required',
            'lab_id_software' => 'required|not_in:0',
            'lab_material' => 'required',
            'lab_observaciones' => 'required',
        ];
        $message = [
            'lab_fecha.required' => 'El campo fecha es requerido',
            'lab_nombre.required' => 'El campo nombre laboratorio es requerido',
            'lab_ubicacion.required' => 'El campo ubicación es requerido',
            'lab_id_docente.required' => 'El campo docente responsable es requerido',
            'lab_finalidad.required' => 'El campo finalidad es requerido',
            'lab_id_facultad.required' => 'El campo facultad es requerido',
            'lab_id_programa.required' => 'El campo programa es requerido',
            'lab_id_practicante.required' => 'El campo practicante responsable es requerido',
            'lab_nombre_practica.required' => 'El campo nombre practicante es requerido',
            'lab_cantidad_estudiante.required' => 'El campo cantidad estudiantes es requerido',
            'lab_id_software.required' => 'El campo software es requerido',
            'lab_material.required' => 'El campo materiales es requerido',
            'lab_observaciones.required' => 'El campo observaciónes es requerido',
        ];
        $this->validate($request, $rules, $message);

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
            ->orWhere('per_tipo_usuario', 3)
            ->get();
        $facultades = Facultad::all();
        $programas = Programa::all();
        $estudiantes = DB::table('persona')
        ->select('persona.id','per_nombre','per_apellido')
        ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
        ->where('per_tipo_usuario', 6)
        ->where('estudiante.estu_administrativo', 'Si')
        ->get();
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
        $estudiantes = DB::table('persona')
        ->select('persona.id','per_nombre','per_apellido')
        ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
        ->where('per_tipo_usuario', 6)
        ->where('estudiante.estu_administrativo', 'Si')
        ->get();
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
            'lab_id_docente' => 'required|not_in:0',
            'lab_finalidad' => 'required',
            'lab_id_facultad' => 'required|not_in:0',
            'lab_id_programa' => 'required|not_in:0',
            'lab_id_practicante' => 'required|not_in:0',
            'lab_nombre_practica' => 'required',
            'lab_cantidad_estudiante' => 'required',
            'lab_id_software' => 'required|not_in:0',
            'lab_material' => 'required',
            'lab_observaciones' => 'required',
        ];
        $message = [
            'lab_fecha.required' => 'El campo fecha es requerido',
            'lab_nombre.required' => 'El campo nombre laboratorio es requerido',
            'lab_ubicacion.required' => 'El campo ubicación es requerido',
            'lab_id_docente.required' => 'El campo docente responsable es requerido',
            'lab_finalidad.required' => 'El campo finalidad es requerido',
            'lab_id_facultad.required' => 'El campo facultad es requerido',
            'lab_id_programa.required' => 'El campo programa es requerido',
            'lab_id_practicante.required' => 'El campo practicante responsable es requerido',
            'lab_nombre_practica.required' => 'El campo nombre practicante es requerido',
            'lab_cantidad_estudiante.required' => 'El campo cantidad estudiantes es requerido',
            'lab_id_software.required' => 'El campo software es requerido',
            'lab_material.required' => 'El campo materiales es requerido',
            'lab_observaciones.required' => 'El campo observaciónes es requerido',
        ];
        $this->validate($request, $rules, $message);
        
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
        try{
            $laboratorio = Laboratorio::find($id);
            $laboratorio->delete();
            Alert::success('Exitoso', 'El laboratorio se ha eliminado con exito');
            return redirect('/laboratorio');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function exportpdf()
    {
        $datos = Laboratorio::all();
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de laboratorios');
            return redirect('/laboratorio');
        } else {
            $view = \view('reporte.laboratorio', compact('datos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $laboratorios = Laboratorio::all();
        if ($laboratorios->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de laboratorios');
            return redirect('/laboratorio');
        } else {
            return Excel::download(new LaboratorioExport, 'laboratorios.xlsx');
        }
    }

}
