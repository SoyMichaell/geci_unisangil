<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = DB::table('compl_empresa')->get();
        return view('configuracion/empresa.index')->with('empresas', $empresas);
    }

    public function create()
    {
        return view('configuracion/empresa.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'razon_social' => 'required',
            'nit' => 'required',
            'pais' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'area' => 'required'
        ];
        $message = [
            'razon_social.required' => 'El campo razón social es requerido',
            'nit.required' => 'El campo nit es requerido',
            'pais.required' => 'El campo país es requerido',
            'departamento.required' => 'El campo departamento es requerido',
            'ciudad.required' => 'El campo ciudad es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'telefono.required' => 'El campo telefono es requerido',
            'correo.required' => 'El campo correo electronico es requerido',
            'area.required' => 'El campo área es requerido',
        ];

        $this->validate($request,$rules,$message);

        $empresa = new Empresa();
        $empresa->razon_social = $request->get('razon_social');
        $empresa->nit = $request->get('nit');
        $empresa->pais = $request->get('pais');
        $empresa->departamento = $request->get('departamento');
        $empresa->ciudad = $request->get('ciudad');
        $empresa->direccion = $request->get('direccion');
        $empresa->telefono = $request->get('telefono');
        $empresa->url = $request->get('url');
        $empresa->correo = $request->get('correo');
        $empresa->area = $request->get('area');

        $empresa->save();

        Alert::success('Exitoso', 'La empresa se ha registrado');
        return redirect('/empresa');
    }

    public function show($id)
    {
        $empresa = DB::table('compl_empresa')->where('id', $id)->first();
        return view('configuracion/empresa.show')->with('empresa', $empresa);
    }

    public function edit($id)
    {
        $empresa = DB::table('compl_empresa')->where('id', $id)->first();
        return view('configuracion/empresa.edit')->with('empresa', $empresa);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'razon_social' => 'required',
            'nit' => 'required',
            'pais' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'area' => 'required'
        ];
        $message = [
            'razon_social.required' => 'El campo razón social es requerido',
            'nit.required' => 'El campo nit es requerido',
            'pais.required' => 'El campo país es requerido',
            'departamento.required' => 'El campo departamento es requerido',
            'ciudad.required' => 'El campo ciudad es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'telefono.required' => 'El campo telefono es requerido',
            'correo.required' => 'El campo correo electronico es requerido',
            'area.required' => 'El campo área es requerido',
        ];

        $this->validate($request,$rules,$message);

        $empresa = Empresa::find($id);
        $empresa->razon_social = $request->get('razon_social');
        $empresa->nit = $request->get('nit');
        $empresa->pais = $request->get('pais');
        $empresa->departamento = $request->get('departamento');
        $empresa->ciudad = $request->get('ciudad');
        $empresa->direccion = $request->get('direccion');
        $empresa->telefono = $request->get('telefono');
        $empresa->url = $request->get('url');
        $empresa->correo = $request->get('correo');
        $empresa->area = $request->get('area');

        $empresa->save();

        Alert::success('Exitoso', 'La empresa se ha actualizado');
        return redirect('/empresa');
    }

    public function destroy($id)
    {
        //
    }
}
