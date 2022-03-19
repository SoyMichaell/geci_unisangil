<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Programa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ConvenioController extends Controller
{

    public function index()
    {
        $convenios = Convenio::all();
        return view('convenio.index')
            ->with('convenios', $convenios);
    }

    public function create()
    {
        $programas = Programa::all();
        return view('convenio.create')
            ->with('programas', $programas);
    }

    public function store(Request $request)
    {
        $rules = [
            'con_numero' => 'required',
            'con_tipo' => 'required',
            'con_institucion' => 'required',
            'con_nit' => 'required',
            'con_direccion' => 'required',
            'con_ciudad' => 'required',
            'con_pais' => 'required',
            'con_contacto' => 'required',
            'con_correo' => 'required',
            'con_telefono' => 'required',
            'con_objeto' => 'required',
            'con_logro_resultado' => 'required',
            'con_vigencia' => 'required',
            'con_programa_beneficiado' => 'required|not_in:0',
            'con_actividad_year_programa' => 'required',
            'con_fecha_inicio' => 'required',
            'con_fecha_final' => 'required'
        ];
        $message = [
            'con_numero.required' => 'El campo no. contrato es requerido',
            'con_tipo.required' => 'El campo tipo es requerido',
            'con_institucion.required' => 'El campo institución es requerido',
            'con_nit.required' => 'El campo nit es requerido',
            'con_direccion.required' => 'El campo dirección es requerido',
            'con_ciudad.required' => 'El campo ciudad es requerido',
            'con_pais.required' => 'El campo país es requerido',
            'con_contacto.required' => 'El campo contacto es requerido',
            'con_correo.required' => 'El campo correo es requerido',
            'con_telefono.required' => 'El campo telefono es requerido',
            'con_objeto.required' => 'El campo objeto es requerido',
            'con_logro_resultado.required' => 'El campo logro o resultado es requerido',
            'con_vigencia.required' => 'El campo vigencia es requerido',
            'con_programa_beneficiado.required' => 'El campo programa beneficiario es requerido',
            'con_actividad_year_programa.required' => 'El campo actividad o actividades es requerido',
            'con_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'con_fecha_final.required' => 'El campo fecha final es requerido',
        ];
        $this->validate($request,$rules,$message);

        $convenio = new Convenio();
        $convenio->con_numero = $request->get('con_numero');
        $convenio->con_alcance = $request->get('con_alcance');
        $convenio->con_tipo = $request->get('con_tipo');
        $convenio->con_institucion = $request->get('con_institucion');
        $convenio->con_nit = $request->get('con_nit');
        $convenio->con_direccion = $request->get('con_direccion');
        $convenio->con_pais = $request->get('con_pais');
        $convenio->con_ciudad = $request->get('con_ciudad');
        $convenio->con_contacto = $request->get('con_contacto');
        $convenio->con_correo = $request->get('con_correo');
        $convenio->con_telefono = $request->get('con_telefono');
        $convenio->con_objeto = $request->get('con_objeto');
        $convenio->con_logro_resultado = $request->get('con_logro_resultado');
        $convenio->con_vigencia = $request->get('con_vigencia');
        $convenio->con_programa_beneficiado = implode(';',$request->get('con_programa_beneficiado'));
        $convenio->con_actividad_year_programa = $request->get('con_actividad_year_programa');
        $convenio->con_fecha_inicio = $request->get('con_fecha_inicio');
        $convenio->con_fecha_final = $request->get('con_fecha_final');
        $convenio->con_observacion = $request->get('con_observacion');
        $convenio->save();
        Alert::success('Exitoso','Los datos se han registrado con exito');
        return redirect('/convenio');
    }

    public function show($id)
    {
        $programas = Programa::all();
        $convenio = Convenio::find($id);
        return view('convenio.show')
            ->with('programas', $programas)
            ->with('convenio', $convenio);
    }

    public function edit($id)
    {
        $programas = Programa::all();
        $convenio = Convenio::find($id);
        return view('convenio.edit')
            ->with('programas', $programas)
            ->with('convenio', $convenio);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'con_numero' => 'required',
            'con_tipo' => 'required',
            'con_institucion' => 'required',
            'con_nit' => 'required',
            'con_direccion' => 'required',
            'con_ciudad' => 'required',
            'con_pais' => 'required',
            'con_contacto' => 'required',
            'con_correo' => 'required',
            'con_telefono' => 'required',
            'con_objeto' => 'required',
            'con_logro_resultado' => 'required',
            'con_vigencia' => 'required',
            'con_programa_beneficiado' => 'required|not_in:0',
            'con_actividad_year_programa' => 'required',
            'con_fecha_inicio' => 'required',
            'con_fecha_final' => 'required'
        ];
        $message = [
            'con_numero.required' => 'El campo no. contrato es requerido',
            'con_tipo.required' => 'El campo tipo es requerido',
            'con_institucion.required' => 'El campo institución es requerido',
            'con_nit.required' => 'El campo nit es requerido',
            'con_direccion.required' => 'El campo dirección es requerido',
            'con_ciudad.required' => 'El campo ciudad es requerido',
            'con_pais.required' => 'El campo país es requerido',
            'con_contacto.required' => 'El campo contacto es requerido',
            'con_correo.required' => 'El campo correo es requerido',
            'con_telefono.required' => 'El campo telefono es requerido',
            'con_objeto.required' => 'El campo objeto es requerido',
            'con_logro_resultado.required' => 'El campo logro o resultado es requerido',
            'con_vigencia.required' => 'El campo vigencia es requerido',
            'con_programa_beneficiado.required' => 'El campo programa beneficiario es requerido',
            'con_actividad_year_programa.required' => 'El campo actividad o actividades es requerido',
            'con_fecha_inicio.required' => 'El campo fecha inicio es requerido',
            'con_fecha_final.required' => 'El campo fecha final es requerido',
        ];
        $this->validate($request,$rules,$message);

        $convenio = Convenio::find($id);
        $convenio->con_numero = $request->get('con_numero');
        $convenio->con_alcance = $request->get('con_alcance');
        $convenio->con_tipo = $request->get('con_tipo');
        $convenio->con_institucion = $request->get('con_institucion');
        $convenio->con_nit = $request->get('con_nit');
        $convenio->con_direccion = $request->get('con_direccion');
        $convenio->con_pais = $request->get('con_pais');
        $convenio->con_ciudad = $request->get('con_ciudad');
        $convenio->con_contacto = $request->get('con_contacto');
        $convenio->con_correo = $request->get('con_correo');
        $convenio->con_telefono = $request->get('con_telefono');
        $convenio->con_objeto = $request->get('con_objeto');
        $convenio->con_logro_resultado = $request->get('con_logro_resultado');
        $convenio->con_vigencia = $request->get('con_vigencia');
        $convenio->con_programa_beneficiado = implode(';',$request->get('con_programa_beneficiado'));
        $convenio->con_actividad_year_programa = $request->get('con_actividad_year_programa');
        $convenio->con_fecha_inicio = $request->get('con_fecha_inicio');
        $convenio->con_fecha_final = $request->get('con_fecha_final');
        $convenio->con_observacion = $request->get('con_observacion');
        $convenio->save();
        Alert::success('Exitoso','Los datos se han actualizado con exito');
        return redirect('/convenio');
    }

    public function destroy($id)
    {
        $convenio = Convenio::find($id);
        $convenio->delete();
        Alert::success('Exitoso','Los datos se han eliminado con exito');
        return redirect('/convenio');
    }
}
