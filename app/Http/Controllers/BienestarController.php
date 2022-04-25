<?php

namespace App\Http\Controllers;

use App\Exports\BienestarExport;
use App\Models\Bienestar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BienestarController extends Controller
{
    public function index()
    {
        $bienestars = Bienestar::all();
        return view('bienestar.index')->with('bienestars', $bienestars);
    }

    public function create()
    {
        return view('bienestar.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'bie_fecha' => 'required',
            'bie_nombre_actividad' => 'required',
            'bie_total_participantes' => 'required',
            'bie_estudiantes' => 'required',
            'bie_docentes' => 'required',
            'bie_administrativos' => 'required',
            'bie_egresados' => 'required',
            'bie_particulares' => 'required',
            'bie_codigo_snies' => 'required',
        ];
        $message = [
            'bie_fecha.required' => 'El campo fecha es requerido',
            'bie_nombre_actividad.required' => 'El campo nombre actividad es requerido',
            'bie_total_participantes.required' => 'El campo total participantes es requerido',
            'bie_estudiantes.required' => 'El campo # estudiantes es requerido',
            'bie_docentes.required' => 'El campo # docentes es requerido',
            'bie_administrativos.required' => 'El campo # administrativos es requerido',
            'bie_egresados.required' => 'El campo # egresados es requerido',
            'bie_particulares.required' => 'El campo # particulares es requerido',
            'bie_codigo_snies.required' => 'El campo código snies es requerido',
        ];
        $this->validate($request, $rules, $message);

        $bienestar = new Bienestar();
        $bienestar->bie_fecha = $request->get('bie_fecha');
        $bienestar->bie_nombre_actividad = $request->get('bie_nombre_actividad');
        $bienestar->bie_total_participantes = $request->get('bie_total_participantes');
        $bienestar->bie_estudiantes = $request->get('bie_estudiantes');
        $bienestar->bie_docentes = $request->get('bie_docentes');
        $bienestar->bie_administrativos = $request->get('bie_administrativos');
        $bienestar->bie_egresados = $request->get('bie_egresados');
        $bienestar->bie_particulares = $request->get('bie_particulares');
        $bienestar->bie_codigo_snies = $request->get('bie_codigo_snies');

        $sumaintegrantes = $request->get('bie_estudiantes') + $request->get('bie_docentes') + $request->get('bie_administrativos') + $request->get('bie_egresados') + $request->get('bie_particulares');

        if ($sumaintegrantes < $request->get('bie_total_participantes') || $sumaintegrantes > $request->get('bie_total_participantes')) {
            Alert::warning('Advertencia', 'La discriminación de participantes no puede ser menor o mayor al total de participantes');
            return back()->withInput();
        }

        if ($request->file('bie_soporte')) {
            $file = $request->file('bie_soporte');
            $soporte_evento = $request->get('bie_fecha') . '_' . $request->get('bie_nombre_actividad') .'.'. $file->extension();

            $ruta = public_path('datos/bienestar/' . $soporte_evento);

            if ($file->extension() == 'zip' || $file->extension() == 'rar' || $file->extension() == 'pdf') {
                copy($file, $ruta);
                $bienestar->bie_soporte = $soporte_evento;
            } else {
                Alert::warning('Advertencia', 'Los formatos admitidos son .zip - .rar o .pdf');
                return back()->withInput();
            }
        }
        $bienestar->bie_observacion = $request->get('bie_observacion');

        $bienestar->save();

        Alert::success('Exitoso', 'El evento se ha registrado');
        return redirect('/bienestar');
    }

    public function show($id)
    {
        $bienestar = Bienestar::find($id);
        return view('bienestar.show')->with('bienestar', $bienestar);
    }

    public function edit($id)
    {
        $bienestar = Bienestar::find($id);
        return view('bienestar.edit')->with('bienestar', $bienestar);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'bie_fecha' => 'required',
            'bie_nombre_actividad' => 'required',
            'bie_total_participantes' => 'required',
            'bie_estudiantes' => 'required',
            'bie_docentes' => 'required',
            'bie_administrativos' => 'required',
            'bie_egresados' => 'required',
            'bie_particulares' => 'required',
            'bie_codigo_snies' => 'required',
        ];
        $message = [
            'bie_fecha.required' => 'El campo fecha es requerido',
            'bie_nombre_actividad.required' => 'El campo nombre actividad es requerido',
            'bie_total_participantes.required' => 'El campo total participantes es requerido',
            'bie_estudiantes.required' => 'El campo # estudiantes es requerido',
            'bie_docentes.required' => 'El campo # docentes es requerido',
            'bie_administrativos.required' => 'El campo # administrativos es requerido',
            'bie_egresados.required' => 'El campo # egresados es requerido',
            'bie_particulares.required' => 'El campo # particulares es requerido',
            'bie_codigo_snies.required' => 'El campo código snies es requerido',
        ];
        $this->validate($request, $rules, $message);

        $bienestar = Bienestar::find($id);
        $bienestar->bie_fecha = $request->get('bie_fecha');
        $bienestar->bie_nombre_actividad = $request->get('bie_nombre_actividad');
        $bienestar->bie_total_participantes = $request->get('bie_total_participantes');
        $bienestar->bie_estudiantes = $request->get('bie_estudiantes');
        $bienestar->bie_docentes = $request->get('bie_docentes');
        $bienestar->bie_administrativos = $request->get('bie_administrativos');
        $bienestar->bie_egresados = $request->get('bie_egresados');
        $bienestar->bie_particulares = $request->get('bie_particulares');
        $bienestar->bie_codigo_snies = $request->get('bie_codigo_snies');

        $sumaintegrantes = $request->get('bie_estudiantes') + $request->get('bie_docentes') + $request->get('bie_administrativos') + $request->get('bie_egresados') + $request->get('bie_particulares');

        if ($sumaintegrantes < $request->get('bie_total_participantes') || $sumaintegrantes > $request->get('bie_total_participantes')) {
            Alert::warning('Advertencia', 'La discriminación de participantes no puede ser menor o mayor al total de participantes');
            return back()->withInput();
        }

        if ($request->file('bie_soporte')) {
            $file = $request->file('bie_soporte');
            $soporte_evento = $request->get('bie_fecha') . '_' . $request->get('bie_nombre_actividad') .'.'. $file->extension();

            $ruta = public_path('datos/bienestar/' . $soporte_evento);

            if ($file->extension() == 'zip' || $file->extension() == 'rar' || $file->extension() == 'pdf') {
                copy($file, $ruta);
                $bienestar->bie_soporte = $soporte_evento;
            } else {
                Alert::warning('Advertencia', 'Los formatos admitidos son .zip - .rar o .pdf');
                return back()->withInput();
            }
        }
        $bienestar->bie_observacion = $request->get('bie_observacion');

        $bienestar->save();

        Alert::success('Exitoso', 'El evento se ha actualizado');
        return redirect('/bienestar');
    }

    public function destroy($id)
    {
        try{
            $bienestar = Bienestar::find($id);
            $bienestar->delete();
            Alert::success('Exitoso', 'El evento se ha eliminado');
            return redirect('/bienestar');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function exportpdf()
    {
        $datos = DB::table('bienestar_institucional')->get();
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos o actividades');
            return redirect('/bienestar');
        } else {
            $view = \view('reporte.bienestar', compact('datos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $bienestars = Bienestar::all();
        if ($bienestars->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de eventos o actividades');
            return redirect('/bienestar');
        } else {
            return Excel::download(new BienestarExport, 'bienestar-institucional.xlsx');
        }
    }
}
