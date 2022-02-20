<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = Municipio::find($id);
        $departamentos = Departamento::all();
        return view('configuracion/municipio.show')
            ->with('municipio', $municipio)
            ->with('departamentos', $departamentos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipio::find($id);
        $departamentos = Departamento::all();
        return view('configuracion/municipio.edit')
            ->with('municipio', $municipio)
            ->with('departamentos', $departamentos);
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
        $rules = ['mun_nombre' => 'required'];

        $message = ['mun_nombre.required' => 'El campo municipio es requerido'];

        $this->validate($request,$rules,$message);

        $municipio = Municipio::find($id);
        $municipio->mun_nombre = $request->get('mun_nombre');

        $municipio->save();

        Alert::success('Registro Actualizado');
        return redirect('/municipio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        $municipio->delete(); 

        Alert::success('Registro Eliminado');
        return redirect('/municipio');

    }
}
