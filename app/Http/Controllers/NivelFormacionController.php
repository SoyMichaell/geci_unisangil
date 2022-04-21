<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NivelFormacion;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class NivelFormacionController extends Controller
{
    public function index()
    {
        $nivelformacion = NivelFormacion::all();
        return view('configuracion/nivelformacion.index')->with('nivelformacion', $nivelformacion);
    }

    public function create()
    {
        return view('configuracion/nivelformacion.create');
    }

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

    public function show($id)
    {
        $nivelformacion = NivelFormacion::find($id);
        return view('configuracion/nivelformacion.show')->with('nivelformacion', $nivelformacion);
    }

    public function edit($id)
    {
        $nivelformacion = NivelFormacion::find($id);
        return view('configuracion/nivelformacion.edit')->with('nivelformacion', $nivelformacion);
    }

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

    public function destroy($id)
    {
        try{
            $nivelformacion = NivelFormacion::find($id);
            $nivelformacion->delete();

            Alert::success('Registro Eliminado');

            return redirect('/nivelformacion');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar este nivel de formación, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }     
    }
}
