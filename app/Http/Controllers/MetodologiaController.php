<?php

namespace App\Http\Controllers;

use App\Exports\MetodologiaExports;
use Illuminate\Http\Request;
use App\Models\Metodologia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class MetodologiaController extends Controller
{
    public function index()
    {
        $metodologia = Metodologia::all();
        return view('configuracion/metodologia.index')->with('metodologia', $metodologia);
    }

    public function create()
    {
        return view('configuracion/metodologia.create');
    }

    public function store(Request $request)
    {
        $rules = ['met_nombre' => 'required'];

        $message = ['met_nombre.required' => 'El campo Metodologia es requerido'];

        $this->validate($request,$rules,$message);

        $metodologia = new Metodologia();
        $metodologia->met_nombre = $request->get('met_nombre');

        $metodologia->save();

        Alert::success('Registro exitoso');


        return redirect('/metodologia');
    }

    public function show($id)
    {
        $metodologia = Metodologia::find($id);
        return view('configuracion/metodologia.show')->with('metodologia', $metodologia);
    }

    public function edit($id)
    {
        if(Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2'){
        $metodologia = Metodologia::find($id);
        return view('configuracion/metodologia.edit')->with('metodologia', $metodologia);
        }else{
            return redirect('/home');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = ['met_nombre' => 'required'];

        $message = ['met_nombre.required' => 'El campo Metodologia es requerido'];

        $this->validate($request,$rules,$message);

        $metodologia = Metodologia::find($id);
        $metodologia->met_nombre = $request->get('met_nombre');

        $metodologia->save();

        Alert::success('Registro Actualizado');


        return redirect('/metodologia');
    }

    public function destroy($id)
    {
        try{
            $metodologia = Metodologia::find($id);
            $metodologia->delete();

            Alert::success('Registro Eliminado');

            return redirect('/metodologia');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta metodologia, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }    
    }
}
