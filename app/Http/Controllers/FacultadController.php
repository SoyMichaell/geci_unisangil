<?php

namespace App\Http\Controllers;

use App\Exports\FacultadExports;
use Illuminate\Http\Request;
use App\Models\Facultad;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class FacultadController extends Controller
{
    public function index(){
        $facultad=Facultad::all();
        return view('configuracion/facultad.index')->with('facultad',$facultad);
    }

    public function create(){
        $facultad=Facultad::all();
        return view('configuracion/facultad.create')->with("facultad",$facultad);
    }
 
    public function store(Request $request){
        $rules =['fac_nombre'=>'required'];

        $message=['fac_nombre'.'required'=> 'El campo Facultad es requerido'];
        $this->validate($request,$rules,$message);

        $facultad=new Facultad();
        $facultad-> fac_nombre=$request->get('fac_nombre');

        $facultad->save();
        Alert::success('Registro exitoso');
        return redirect('/facultad');
    }

    public function show($id){
        $facultad = Facultad::find($id);
        return view('configuracion/facultad.show')->with('facultad', $facultad);
    }

    public function edit($id){
        $facultad = Facultad::find($id);
        return view('configuracion/facultad.edit')->with('facultad', $facultad);
    }

    public function update(Request $request, $id){
        $rules =['fac_nombre'=>'required'];
        $message=['fac_nombre.required'=>"El campo Facultad es requerido"];
        $this->validate($request,$rules,$message);
        $facultad=Facultad::find($id);
        $facultad->fac_nombre=$request->get("fac_nombre");
        $facultad->save();
        Alert::success("Registro Actualizado");
        return redirect("/facultad");
    }

    public function destroy($id){
        $facultad = Facultad::find($id);
        $facultad->delete();

        Alert::success('Registro Eliminado');

        return redirect('/facultad');
    }

    public function pdf(Request $request){
        $facultades = Facultad::all();
        if ($facultades->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/facultad');
        } else {
            $view = \view('configuracion/facultad.pdf', compact('facultades'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('facultades.pdf');
        }
    }

    public function export(){
        $facultades = Facultad::all();
        if ($facultades->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/facultad');
        } else {

            return Excel::download(new FacultadExports, 'facultades.xlsx');
        }
    }
}
