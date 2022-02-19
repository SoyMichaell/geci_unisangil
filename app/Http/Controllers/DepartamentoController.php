<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
}
