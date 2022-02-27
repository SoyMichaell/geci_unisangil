<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\Software;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::all();
        return view('software.index')
            ->with('softwares', $softwares);
    }

    public function create()
    {
        $asignaturas = ProgramaAsignatura::all();
        $programas = Programa::all();
        return view('software.create')
            ->with('asignaturas', $asignaturas)
            ->with('programas', $programas);
    }

    public function store(Request $request)
    {
        $rules = [
            'sof_tipo' => 'required',
            'sof_nombre' => 'required',
            'sof_desarrollador' => 'required',
            'sof_version' => 'required',
            'sof_no_licencia' => 'required',
            'sof_year_ad_licencia' => 'required',
            'sof_year_ve_licencia' => 'required',
            'sof_asignatura' => 'required|not_in:0',
            'sof_cantidad' => 'required',
            'sof_id_programa' => 'required|not_in:0',
            'sof_valor_unitario' => 'required',
            'sof_valor_total' => 'required',
            'sof_fecha_actualizar' => 'required',
            'sof_fecha_instalacion' => 'required',
        ];
        $message = [
            'sof_tipo.required' => 'El campo tipo de software es requerido',
            'sof_nombre.required' => 'El campo nombre de software es requerido',
            'sof_desarrollador.required' => 'El campo nombre desarrollador es requerido',
            'sof_version.required' => 'El campo versión es requerido',
            'sof_no_licencia.required' => 'El campo número de licencia es requerido',
            'sof_year_ad_licencia.required' => 'El campo año adquisición de licencia es requerido',
            'sof_year_ve_licencia.required' => 'El campo año vencimiento de licencia es requerido',
            'sof_asignatura.required' => 'El campo asignatura (s) es requerido',
            'sof_cantidad.required' => 'El campo cantidad licencia es requerido',
            'sof_id_programa.required' => 'El campo programa es requerido',
            'sof_valor_unitario.required' => 'El campo valor unitario es requerido',
            'sof_valor_total.required' => 'El campo valor total es requerido',
            'sof_fecha_actualizar.required' => 'El campo fecha ultima actualización es requerido',
            'sof_fecha_instalacion.required' => 'El campo fecha instalación es requerido',
        ];
        $this->validate($request,$rules,$message);

        $software = new Software();
        $software->sof_tipo = $request->get('sof_tipo');
        $software->sof_nombre = $request->get('sof_nombre');
        $software->sof_desarrollador = $request->get('sof_desarrollador');
        $software->sof_version = $request->get('sof_version');
        $software->sof_no_licencia = $request->get('sof_no_licencia');
        $software->sof_year_ad_licencia = $request->get('sof_year_ad_licencia');
        $software->sof_year_ve_licencia = $request->get('sof_year_ve_licencia');
        $software->sof_asignatura = $request->get('sof_asignatura');
        $software->sof_cantidad = $request->get('sof_cantidad');
        $software->sof_id_programa = $request->get('sof_id_programa');
        $software->sof_valor_unitario = $request->get('sof_valor_unitario');
        $software->sof_valor_total = $request->get('sof_valor_total');
        $software->sof_fecha_actualizar = $request->get('sof_fecha_actualizar');
        $software->sof_fecha_instalacion = $request->get('sof_fecha_instalacion');

        $software->save();
        Alert::success('Exitoso', 'El software se ha registrado con exito');
        return redirect('/software');
    }

    public function show($id)
    {
        $asignaturas = ProgramaAsignatura::all();
        $programas = Programa::all();
        $software = Software::find($id);
        return view('software.show')
            ->with('asignaturas', $asignaturas)
            ->with('programas', $programas)
            ->with('software', $software);
    }

    public function edit($id)
    {
        $asignaturas = ProgramaAsignatura::all();
        $programas = Programa::all();
        $software = Software::find($id);
        return view('software.edit')
            ->with('asignaturas', $asignaturas)
            ->with('programas', $programas)
            ->with('software', $software);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'sof_tipo' => 'required',
            'sof_nombre' => 'required',
            'sof_desarrollador' => 'required',
            'sof_version' => 'required',
            'sof_no_licencia' => 'required',
            'sof_year_ad_licencia' => 'required',
            'sof_year_ve_licencia' => 'required',
            'sof_asignatura' => 'required|not_in:0',
            'sof_cantidad' => 'required',
            'sof_id_programa' => 'required|not_in:0',
            'sof_valor_unitario' => 'required',
            'sof_valor_total' => 'required',
            'sof_fecha_actualizar' => 'required',
            'sof_fecha_instalacion' => 'required',
        ];
        $message = [
            'sof_tipo.required' => 'El campo tipo de software es requerido',
            'sof_nombre.required' => 'El campo nombre de software es requerido',
            'sof_desarrollador.required' => 'El campo nombre desarrollador es requerido',
            'sof_version.required' => 'El campo versión es requerido',
            'sof_no_licencia.required' => 'El campo número de licencia es requerido',
            'sof_year_ad_licencia.required' => 'El campo año adquisición de licencia es requerido',
            'sof_year_ve_licencia.required' => 'El campo año vencimiento de licencia es requerido',
            'sof_asignatura.required' => 'El campo asignatura (s) es requerido',
            'sof_cantidad.required' => 'El campo cantidad licencia es requerido',
            'sof_id_programa.required' => 'El campo programa es requerido',
            'sof_valor_unitario.required' => 'El campo valor unitario es requerido',
            'sof_valor_total.required' => 'El campo valor total es requerido',
            'sof_fecha_actualizar.required' => 'El campo fecha ultima actualización es requerido',
            'sof_fecha_instalacion.required' => 'El campo fecha instalación es requerido',
        ];
        $this->validate($request,$rules,$message);

        $software = Software::find($id);
        $software->sof_tipo = $request->get('sof_tipo');
        $software->sof_nombre = $request->get('sof_nombre');
        $software->sof_desarrollador = $request->get('sof_desarrollador');
        $software->sof_version = $request->get('sof_version');
        $software->sof_no_licencia = $request->get('sof_no_licencia');
        $software->sof_year_ad_licencia = $request->get('sof_year_ad_licencia');
        $software->sof_year_ve_licencia = $request->get('sof_year_ve_licencia');
        $software->sof_asignatura = $request->get('sof_asignatura');
        $software->sof_cantidad = $request->get('sof_cantidad');
        $software->sof_id_programa = $request->get('sof_id_programa');
        $software->sof_valor_unitario = $request->get('sof_valor_unitario');
        $software->sof_valor_total = $request->get('sof_valor_total');
        $software->sof_fecha_actualizar = $request->get('sof_fecha_actualizar');
        $software->sof_fecha_instalacion = $request->get('sof_fecha_instalacion');

        $software->save();
        Alert::success('Exitoso', 'El software se ha actualizado con exito');
        return redirect('/software');
    }

    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();
        Alert::success('Exitoso','El software se elimino de manera exitosa');
        return redirect('/software');
    }
}
