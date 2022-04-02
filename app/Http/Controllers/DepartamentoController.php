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
        if(Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2'){
        return view('configuracion/departamento.create');
        }else{
            return redirect('/home');
        }
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
        if(Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2'){
        $departamento = Departamento::find($id);
        return view('configuracion/departamento.edit')->with('departamento', $departamento);
        }else{
            return redirect('/home');
        }
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

        try{
            Departamento::find($id)->delete();
            Alert::success('Registro Eliminado');
    
            return redirect('/departamento');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }

       

    }

}
