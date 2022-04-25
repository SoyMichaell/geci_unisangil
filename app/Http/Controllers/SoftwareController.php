<?php

namespace App\Http\Controllers;

use App\Exports\SoftwareExport;
use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\Software;
use App\Models\SoftwareRecurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        $software->sof_asignatura = implode(';',$request->get('sof_asignatura'));
        $software->sof_cantidad = $request->get('sof_cantidad');
        $software->sof_id_programa = implode(';',$request->get('sof_id_programa'));
        $software->sof_valor_unitario = $request->get('sof_valor_unitario');
        $valor_total = $request->get('sof_valor_unitario') * $request->get('sof_cantidad');
        $software->sof_valor_total = $valor_total;
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
        $software->sof_asignatura = implode(';',$request->get('sof_asignatura'));
        $software->sof_cantidad = $request->get('sof_cantidad');
        $software->sof_id_programa = implode(';',$request->get('sof_id_programa'));
        $software->sof_valor_unitario = $request->get('sof_valor_unitario');
        $valor_total = $request->get('sof_valor_unitario') * $request->get('sof_cantidad');
        $software->sof_valor_total = $valor_total;
        $software->sof_fecha_actualizar = $request->get('sof_fecha_actualizar');
        $software->sof_fecha_instalacion = $request->get('sof_fecha_instalacion');

        $software->save();
        Alert::success('Exitoso', 'El software se ha actualizado con exito');
        return redirect('/software');
    }

    public function destroy($id)
    {
        try{
            $software = Software::find($id);
            $software->delete();
            Alert::success('Exitoso','El software se elimino de manera exitosa');
            return redirect('/software');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }  
    }

    public function mostrarrecurso(){
        $recursos = SoftwareRecurso::all();
        return view('software/recurso.index')
            ->with('recursos', $recursos);
    }

    public function crearrecurso(){
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 10)
            ->get();
        $asignaturas = ProgramaAsignatura::all();
        return view('software/recurso.create')
            ->with('docentes', $docentes)
            ->with('asignaturas', $asignaturas);
    }

    public function registrorecurso(Request $request){
        $rules = [
            'sofrete_year' => 'required',
            'sofrete_periodo' => 'required',
            'sofrete_tipo_recurso' => 'required|not_in:0',
            'sofrete_id_docente' => 'required|not_in:0',
            'sofrete_id_asignatura' => 'required|not_in:0',
        ];
        $message = [
            'sofrete_year.required' => 'El campo año es requerido',
            'sofrete_periodo.required' => 'El campo periodo es requerido',
            'sofrete_tipo_recurso.required' => 'El campo tipo recurso es requerido',
            'sofrete_id_docente.required' => 'El campo docente es requerido',
            'sofrete_id_asignatura.required' => 'El campo asginatura es requerido',
        ];
        $this->validate($request,$rules,$message);

        $recurso = new SoftwareRecurso();
        $recurso->sofrete_year = $request->get('sofrete_year');
        $recurso->sofrete_periodo = $request->get('sofrete_periodo');
        $recurso->sofrete_tipo_recurso = $request->get('sofrete_tipo_recurso');
        $recurso->sofrete_id_docente = $request->get('sofrete_id_docente');
        $recurso->sofrete_id_asignatura = $request->get('sofrete_id_asignatura');

        $recurso->save();

        Alert::success('Exitoso', 'El recurso se ha registrado con exito');
        return redirect('/software/mostrarrecurso');
    }

    public function editarrecurso($id){
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 10)
            ->get();
        $asignaturas = ProgramaAsignatura::all();
        $recurso = SoftwareRecurso::find($id);
        return view('software/recurso.edit')
            ->with('docentes', $docentes)
            ->with('asignaturas', $asignaturas)
            ->with('recurso', $recurso);
    }

    public function verrecurso($id){
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 10)
            ->get();
        $asignaturas = ProgramaAsignatura::all();
        $recurso = SoftwareRecurso::find($id);
        return view('software/recurso.show')
            ->with('docentes', $docentes)
            ->with('asignaturas', $asignaturas)
            ->with('recurso', $recurso);
    }

    public function actualizarrecurso(Request $request, $id){
        $rules = [
            'sofrete_year' => 'required',
            'sofrete_periodo' => 'required',
            'sofrete_tipo_recurso' => 'required|not_in:0',
            'sofrete_id_docente' => 'required|not_in:0',
            'sofrete_id_asignatura' => 'required|not_in:0',
        ];
        $message = [
            'sofrete_year.required' => 'El campo año es requerido',
            'sofrete_periodo.required' => 'El campo periodo es requerido',
            'sofrete_tipo_recurso.required' => 'El campo tipo recurso es requerido',
            'sofrete_id_docente.required' => 'El campo docente es requerido',
            'sofrete_id_asignatura.required' => 'El campo asginatura es requerido',
        ];
        $this->validate($request,$rules,$message);

        $recurso = SoftwareRecurso::find($id);
        $recurso->sofrete_year = $request->get('sofrete_year');
        $recurso->sofrete_periodo = $request->get('sofrete_periodo');
        $recurso->sofrete_tipo_recurso = $request->get('sofrete_tipo_recurso');
        $recurso->sofrete_id_docente = $request->get('sofrete_id_docente');
        $recurso->sofrete_id_asignatura = $request->get('sofrete_id_asignatura');

        $recurso->save();

        Alert::success('Exitoso', 'El recurso se ha actualizado con exito');
        return redirect('/software/mostrarrecurso');
    }

    public function eliminarrecurso($id){
        try{
            $recurso = SoftwareRecurso::find($id);
            $recurso->delete();
            Alert::success('Exitoso', 'El recurso se ha eliminado con exito');
            return redirect('/software/mostrarrecurso');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
    }

    public function exportpdf()
    {
        $datos = DB::table('software')->get();
        $valor = 'software';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de software en uso');
            return redirect('/software');
        } else {
            $view = \view('reporte.software', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $softwares = Software::all();
        if ($softwares->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de software en uso');
            return redirect('/software');
        } else {
            return Excel::download(new SoftwareExport('software'), 'software.xlsx');
        }
    }

    public function exportrecursopdf()
    {
        $datos = DB::table('software_recurso_tecnologico')
        ->join('persona','software_recurso_tecnologico.sofrete_id_docente','=','persona.id')
        ->join('programa_plan_estudio_asignatura','software_recurso_tecnologico.sofrete_id_asignatura','=','programa_plan_estudio_asignatura.id')
        ->get();
        $valor = 'recurso';
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de recursos tecnológicos');
            return redirect('/software');
        } else {
            $view = \view('reporte.software', compact('datos','valor'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportrecursoexcel()
    {
        $softwares = Software::all();
        if ($softwares->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de recursos tecnológicos');
            return redirect('/software');
        } else {
            return Excel::download(new SoftwareExport('recurso'), 'recurso-tecnologico.xlsx');
        }
    }

}
