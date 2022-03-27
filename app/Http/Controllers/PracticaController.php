<?php

namespace App\Http\Controllers;

use App\Exports\PracticaExport;
use App\Models\Estudiante;
use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PracticaController extends Controller
{
    public function index()
    {
        $practicas = DB::table('practica_laboral')->get();
        $docentes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 2)
            ->orWhere('persona.per_tipo_usuario', 3)
            ->get();
        $estudiantes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 6)
            ->get();
        return view('practica.index')
            ->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('practicas', $practicas);
    }

    public function create()
    {
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->get();
            $estudiantes = DB::table('persona')
            ->where('per_tipo_usuario', 6)
            ->get();
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
            $practica->prac_id_persona = $request->get('prac_id_docente');
            $practica->prac_id_rol = 'Docente';
        } else if ($request->get('tipo_persona') == '2') {
            $practica->prac_id_persona = $request->get('prac_id_estudiante');
            $practica->prac_id_rol = 'Estudiante';
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
        ->orWhere('per_tipo_usuario', 3)
        ->get();
        $estudiantes = DB::table('persona')
        ->where('per_tipo_usuario', 6)
        ->get();
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
        ->orWhere('per_tipo_usuario', 3)
        ->get();
        $estudiantes = DB::table('persona')
        ->where('per_tipo_usuario', 6)
        ->get();
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

    public function exportpdf()
    {
        $datos = DB::table('practica_laboral')->get();
        $docentes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 2)
            ->orWhere('persona.per_tipo_usuario', 3)
            ->get();
        $estudiantes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 6)
            ->get();
        $valor = 'general';
        if ($datos->count() <= 0) {
            Alert::warning('Adevertencia','No hay registros de practicas laborales');
            return redirect('/practica');
        } else {
            $view = \view('reporte.practica', compact('datos','docentes','estudiantes','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportdocentepdf()
    {
        $datos = DB::table('practica_laboral')->get();
        $docentes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 2)
            ->orWhere('persona.per_tipo_usuario', 3)
            ->get();
        $estudiantes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 6)
            ->get();
        $valor = 'docente';
        if ($docentes->count() <= 0) {
            Alert::warning('Adevertencia','No hay registros de practicas laborales');
            return redirect('/practica');
        } else {
            $view = \view('reporte.practica', compact('datos','docentes','estudiantes','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportestudiantepdf()
    {
        $datos = DB::table('practica_laboral')->get();
        $docentes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 2)
            ->orWhere('persona.per_tipo_usuario', 3)
            ->get();
        $estudiantes = DB::table('practica_laboral')
            ->join('persona','practica_laboral.prac_id_persona','=','persona.id')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('persona.per_tipo_usuario', 6)
            ->get();
        $valor = 'estudiante';
        if ($estudiantes->count() <= 0) {
            Alert::warning('Adevertencia','No hay registros de practicas laborales');
            return redirect('/practica');
        } else {
            $view = \view('reporte.practica', compact('datos','docentes','estudiantes','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $practica = Practica::all();
        if ($practica->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de practicas laborales');
            return redirect('/practica');
        } else {
            return Excel::download(new PracticaExport('general'), 'practicas-laborales.xlsx');
        }
    }

    public function exportdocenteexcel()
    {
        $practica = DB::table('practica_laboral')->where('prac_rol', 'Docente')->get();
        if ($practica->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de practicas laborales docentes');
            return redirect('/practica');
        } else {
            return Excel::download(new PracticaExport('docente'), 'practicas-laborales-docentes.xlsx');
        }
    }

    public function exportestudianteexcel()
    {
        $practica = DB::table('practica_laboral')->where('prac_rol', 'Estudiante')->get();
        if ($practica->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de practicas laborales estudiantes');
            return redirect('/practica');
        } else {
            return Excel::download(new PracticaExport('estudiante'), 'practicas-laborales-estudiantes.xlsx');
        }
    }


    public function destroy($id)
    {
        $practica = Practica::find($id);
        $practica->delete();
        Alert::success('Exitoso', 'La practica se ha eliminado con exito');
        return redirect('/practica');
    }
}
