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
        try{
            $facultad = Facultad::find($id);
            $facultad->delete();

            Alert::success('Registro Eliminado');

            return redirect('/facultad');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta facultad, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }     
    }
}
