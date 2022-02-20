<?php

namespace App\Http\Controllers;

use App\Exports\NivelFormacionExports;
use Illuminate\Http\Request;
use App\Models\NivelFormacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class NivelFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelformacion = NivelFormacion::all();
        return view('configuracion/nivelformacion.index')->with('nivelformacion', $nivelformacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion/nivelformacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['niv_nombre' => 'required'];

        $message = ['niv_nombre.required' => 'El campo Nivel de Formación es requerido'];

        $this->validate($request,$rules,$message);

        $nivelformacion = new NivelFormacion();
        $nivelformacion->niv_nombre = $request->get('niv_nombre');

        $nivelformacion->save();

        Alert::success('Registro exitoso');


        return redirect('/nivelformacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelformacion = NivelFormacion::find($id);
        return view('configuracion/nivelformacion.show')->with('nivelformacion', $nivelformacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivelformacion = NivelFormacion::find($id);
        return view('configuracion/nivelformacion.edit')->with('nivelformacion', $nivelformacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = ['niv_nombre' => 'required'];

        $message = ['niv_nombre.required' => 'El campo Nivel de formación es requerido'];

        $this->validate($request,$rules,$message);

        $nivelformacion = NivelFormacion::find($id);
        $nivelformacion->niv_nombre = $request->get('niv_nombre');

        $nivelformacion->save();

        Alert::success('Registro Actualizado');


        return redirect('/nivelformacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivelformacion = NivelFormacion::find($id);
        $nivelformacion->delete();

        Alert::success('Registro Eliminado');

        return redirect('/nivelformacion');
    }
    public function pdf(Request $request)
    {
        $nivelformacions = NivelFormacion::all();
        if ($nivelformacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/nivelformacion');
        } else {
            $view = \view('configuracion/nivelformacion.pdf', compact('nivelformacions'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            /*DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'nivelformacion'
            ]);*/

            return $pdf->stream('nivelformacion-reporte.pdf');
        }
    }

    public function export()
    {
        $nivelformacions = NivelFormacion::all();
        if ($nivelformacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/nivelformacion');
        } else {

            /*DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'nivelformacion'
            ]);*/

            return Excel::download(new NivelFormacionExports, 'nivelformacion.xlsx');
        }
    }
}
