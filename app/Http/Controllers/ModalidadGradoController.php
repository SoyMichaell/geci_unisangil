<?php

namespace App\Http\Controllers;

use App\Models\ModalidadGrado;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ModalidadGradoController extends Controller
{
    public function index()
    {
        $modalidades = ModalidadGrado::all();
        return view('trabajo/modalidad.index')->with('modalidades', $modalidades);
    }

    public function create()
    {
        return view('trabajo/modalidad.create');
    }

    public function store(Request $request)
    {
        $modalidad = new ModalidadGrado();

        $modalidad->mod_nombre = $request->get('mod_nombre');

        $rules = [
            'mod_nombre' => 'required'
        ];

        $message = [
            'mod_nombre.required' => 'El campo modalidad de grado es requerido'
        ];

        $this->validate($request,$rules,$message);

        $modalidad->save();

        Alert::success('Registro Exitoso');
        return redirect('/modalidad');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $modalidad = ModalidadGrado::find($id);
        return view('trabajo/modalidad.edit')->with('modalidad', $modalidad);
    }

    public function update(Request $request, $id)
    {
        $modalidad = ModalidadGrado::find($id);

        $modalidad->mod_nombre = $request->get('mod_nombre');

        $rules = [
            'mod_nombre' => 'required'
        ];

        $message = [
            'mod_nombre.required' => 'El campo modalidad de grado es requerido'
        ];

        $this->validate($request,$rules,$message);

        $modalidad->save();

        Alert::success('Registro Actualizado');
        return redirect('/modalidad');

    }

    public function destroy($id)
    {
        try{
            $modalidad = ModalidadGrado::find($id);
            $modalidad->delete();
            Alert::success('Registro Eliminado');
            return redirect('/modalidad');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
    }
}