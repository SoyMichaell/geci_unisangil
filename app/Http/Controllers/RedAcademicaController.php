<?php

namespace App\Http\Controllers;

use App\Exports\RedExport;
use App\Models\Programa;
use App\Models\RedAcademica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class RedAcademicaController extends Controller
{
    public function index()
    {
        $redes =RedAcademica::all();
        return view('red.index')
            ->with('redes', $redes);
    }

    public function create()
    {
        $programas = Programa::all();
        return view('red.create')
            ->with('programas', $programas);
    }

    public function store(Request $request)
    {
        $rules = [
            'red_nombre' => 'required',
            'red_nombre_contacto' => 'required',
            'red_telefono' => 'required',
            'red_pais' => 'required',
            'red_ciudad' => 'required',
            'red_alcance' => 'required|not_in:0',
            'red_accion' => 'required',
            'red_year' => 'required',
            'red_id_programa' => 'required|not_in:0',
            'red_observacion' => 'required',
        ];
        $message = [
            'red_nombre.required' => 'El campo nombre red es requerido',
            'red_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'red_telefono.required' => 'El campo telefono es requerido',
            'red_pais.required' => 'El campo país es requerido',
            'red_ciudad.required' => 'El campo ciudad es requerido',
            'red_alcance.required' => 'El campo alcance es requerido',
            'red_accion.required' => 'El campo acción es requerido',
            'red_year.required' => 'El campo año es requerido',
            'red_id_programa.required' => 'El campo programa es requerido',
            'red_observacion.required' => 'El campo observaciones es requerido',
        ];
        $this->validate($request,$rules,$message);

        $redes = new RedAcademica();
        $redes->red_nombre = $request->get('red_nombre');
        $redes->red_nombre_contacto = $request->get('red_nombre_contacto');
        $redes->red_telefono = $request->get('red_telefono');
        $redes->red_pais = $request->get('red_pais');
        $redes->red_ciudad = $request->get('red_ciudad');
        $redes->red_alcance = $request->get('red_alcance');
        $redes->red_accion = $request->get('red_accion');
        $redes->red_year = $request->get('red_year');
        $redes->red_id_programa = implode(';',$request->get('red_id_programa'));
        $redes->red_observacion = $request->get('red_observacion');

        $redes->save();

        Alert::success('Exitoso','El registro de la red ha sido exitoso');
        return redirect('/red');

    }

    public function show($id)
    {
        $red = RedAcademica::find($id);
        $programas = Programa::all();
        return view('red.show')
            ->with('red', $red)
            ->with('programas', $programas);
    }

    public function edit($id)
    {
        $red = RedAcademica::find($id);
        $programas = Programa::all();
        return view('red.edit')
            ->with('red', $red)
            ->with('programas', $programas);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'red_nombre' => 'required',
            'red_nombre_contacto' => 'required',
            'red_telefono' => 'required',
            'red_pais' => 'required',
            'red_ciudad' => 'required',
            'red_alcance' => 'required|not_in:0',
            'red_accion' => 'required',
            'red_year' => 'required',
            'red_id_programa' => 'required|not_in:0',
            'red_observacion' => 'required',
        ];
        $message = [
            'red_nombre.required' => 'El campo nombre red es requerido',
            'red_nombre_contacto.required' => 'El campo nombre contacto es requerido',
            'red_telefono.required' => 'El campo telefono es requerido',
            'red_pais.required' => 'El campo país es requerido',
            'red_ciudad.required' => 'El campo ciudad es requerido',
            'red_alcance.required' => 'El campo alcance es requerido',
            'red_accion.required' => 'El campo acción es requerido',
            'red_year.required' => 'El campo año es requerido',
            'red_id_programa.required' => 'El campo programa es requerido',
            'red_observacion.required' => 'El campo observaciones es requerido',
        ];
        $this->validate($request,$rules,$message);

        $redes = RedAcademica::find($id);
        $redes->red_nombre = $request->get('red_nombre');
        $redes->red_nombre_contacto = $request->get('red_nombre_contacto');
        $redes->red_telefono = $request->get('red_telefono');
        $redes->red_pais = $request->get('red_pais');
        $redes->red_ciudad = $request->get('red_ciudad');
        $redes->red_alcance = $request->get('red_alcance');
        $redes->red_accion = $request->get('red_accion');
        $redes->red_year = $request->get('red_year');
        $redes->red_id_programa = implode(';',$request->get('red_id_programa'));
        $redes->red_observacion = $request->get('red_observacion');

        $redes->save();

        Alert::success('Exitoso','La red se ha actualizado con exito');
        return redirect('/red');
    }

    public function destroy($id)
    {
        $red = RedAcademica::find($id);
        $red->delete();
        Alert::success('Exitoso','La red se ha eliminado con exito');
        return redirect('/red');
    }

    public function exportpdf()
    {
        $datos = DB::table('red_academica')
        ->select(
            'red_academica.id','red_year','red_nombre','red_nombre_contacto','red_telefono','red_pais',
            'red_ciudad','red_alcance','red_accion','red_id_programa','red_observacion'
        )
        ->get();
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de redes académicas');
            return redirect('/software');
        } else {
            $view = \view('reporte.red', compact('datos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $redes = DB::table('red_academica')
        ->select(
            'red_academica.id','red_year','red_nombre','red_nombre_contacto','red_telefono','red_pais',
            'red_ciudad','red_alcance','red_accion','red_id_programa','red_observacion'
        )
        ->get();
        if ($redes->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de redes académicas');
            return redirect('/red');
        } else {
            return Excel::download(new RedExport, 'redes-académicas.xlsx');
        }
    }
    
}
