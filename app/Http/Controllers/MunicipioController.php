<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MunicipioController extends Controller
{

    public function index()
    {
        $municipios = Municipio::all();
        return view('configuracion/municipio.index')->with('municipios', $municipios);

    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('configuracion/municipio.create')->with("departamentos",$departamentos);
    }

    public function store(Request $request)
    {
        $rules = ['mun_nombre' => 'required'];

        $message = ['mun_nombre.required' => 'El campo municipio es requerido'];

        $this->validate($request,$rules,$message);

        if($request->get('mun_departamento') == ""){
            Alert::warning('El valor seleccionado es incorrecto');
            return redirect('/municipio');
        }

        $municipio = new Municipio();
        $municipio->mun_nombre = $request->get('mun_nombre');
        $municipio->mun_departamento = $request->get('mun_departamento');

        $municipio->save();

        Alert::success('Registro exitoso');
        return redirect('/municipio');
    }

    public function show($id)
    {
        $municipio = Municipio::find($id);
        $departamentos = Departamento::all();
        return view('configuracion/municipio.show')
            ->with('municipio', $municipio)
            ->with('departamentos', $departamentos);
    }

    public function edit($id)
    {
        $municipio = Municipio::find($id);
        $departamentos = Departamento::all();
        return view('configuracion/municipio.edit')
            ->with('municipio', $municipio)
            ->with('departamentos', $departamentos);
    }

    public function update(Request $request, $id)
    {
        $rules = ['mun_nombre' => 'required'];

        $message = ['mun_nombre.required' => 'El campo municipio es requerido'];

        $this->validate($request,$rules,$message);

        $municipio = Municipio::find($id);
        $municipio->mun_nombre = $request->get('mun_nombre');

        $municipio->save();

        Alert::success('Registro Actualizado');
        return redirect('/municipio');
    }

    public function destroy($id)
    {
        try{
            $municipio = Municipio::find($id);
            $municipio->delete();
    
            Alert::success('Registro Eliminado');
            return redirect('/municipio');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esté municipio, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }
}
