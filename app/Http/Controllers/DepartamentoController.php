<?php

namespace App\Http\Controllers;

use App\Exports\DepartamentoExports;
use App\Models\Departamento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('configuracion/departamento.index')->with('departamentos', $departamentos);
    }

    public function create()
    {
        return view('configuracion/departamento.create');
    }

    public function store(Request $request)
    {

        $rules = ['dep_nombre' => 'required'];

        $message = ['dep_nombre.required' => 'El campo departamento es requerido'];

        $this->validate($request,$rules,$message);

        $departamento = new Departamento();
        $departamento->dep_nombre = $request->get('dep_nombre');

        $departamento->save();

        Alert::success('Registro exitoso');


        return redirect('/departamento');

    }

    public function show($id)
    {
        $departamento = Departamento::find($id);
        return view('configuracion/departamento.show')->with('departamento', $departamento);
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        return view('configuracion/departamento.edit')->with('departamento', $departamento);
    }

    public function update(Request $request, $id)
    {
        $rules = ['dep_nombre' => 'required'];

        $message = ['dep_nombre.required' => 'El campo departamento es requerido'];

        $this->validate($request,$rules,$message);

        $departamento = Departamento::find($id);
        $departamento->dep_nombre = $request->get('dep_nombre');

        $departamento->save();

        Alert::success('Registro Actualizado');


        return redirect('/departamento');
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);
        $departamento->delete();

        Alert::success('Registro Eliminado');

        return redirect('/departamento');

    }

    public function pdf(Request $request)
    {
        $departamentos = Departamento::all();
        if ($departamentos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/departamento');
        } else {
            $view = \view('configuracion/departamento.pdf', compact('departamentos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            /*DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'departamentos'
            ]);*/

            return $pdf->stream('departamentos.pdf');
        }
    }

    public function export(){
        $departamentos = Departamento::all();
        if($departamentos->count()<=0){
            Alert::warning('No hay registros');
            return redirect('/departamento');
        }else{

           /* DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'departamentos'
            ]);*/

            return Excel::download(new DepartamentoExports, 'departamentos.xlsx');
        }
    }
}
