<?php

namespace App\Http\Controllers;

use App\Exports\TrabajoGradoExport;
use App\Models\Empresa;
use App\Models\Trabajo;
use App\Models\ModalidadGrado;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TrabajoController extends Controller
{
    public function index()
    {

        $trabajos = Trabajo::all();
        return view('trabajo.index')
            ->with('trabajos', $trabajos);
    }

    public function create()
    {
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 1)
            ->orWhere('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 10)
            ->get();

        $estudiantes = DB::table('persona')
        ->Where('per_tipo_usuario', 6)
        ->orWhere('per_tipo_usuario', 9)
        ->get();

        $modalidades = ModalidadGrado::all();

        $empresas = Empresa::all();

        return view('trabajo.create')
            ->with('estudiantes', $estudiantes)
            ->with('personas', $personas)
            ->with('modalidades', $modalidades)
            ->with('empresas', $empresas);
    }

    public function store(Request $request)
    {

        $rules = [
            'tra_codigo_proyecto' => 'required',
            'tra_titulo_proyecto' => 'required',
            'tra_id_estudiante' => 'required',
            'tra_fecha_inicio' => 'required',
            'tra_modalidad_grado' => 'required',
        ];

        $message = [
            'tra_codigo_proyecto.required' => 'El campo código proyecto es requerido',
            'tra_titulo_proyecto.required' => 'El campo titulo proyecto es requerido',
            'tra_id_estudiante.required' => 'El campo estudiante (s) es requerido',
            'tra_fecha_inicio.required' => 'El campo fecha de inicio es requerido',
            'tra_modalidad_grado.required' => 'El campo modalidad de grado es requerido',
        ];

        $this->validate($request, $rules, $message);

        if($request->get('tra_modalidad_grado') == '10'){
            $trabajos = new Trabajo();
            $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
            $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
            $trabajos->tra_id_estudiante = implode(';',$request->get('tra_id_estudiante'));
            $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
            $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');
            $trabajos->tra_id_empresa = $request->get('tra_id_empresa');
            $trabajos->tra_cargo = $request->get('tra_cargo');
            if ($request->get('tra_id_director') == $request->get('tra_id_codirector')) {
                Alert::warning('Advertencia', 'El director y codirector no puede ser el mismo docente');
                return back()->withInput();
            }
    
            $trabajos->tra_id_director = $request->get('tra_id_director');
            $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
            $trabajos->tra_id_proceso = 1;
            $trabajos->save();
            Alert::success('Registro Exitoso');
            return redirect('/trabajo');
        }else{
            $trabajos = new Trabajo();
            $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
            $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
            $trabajos->tra_id_estudiante = implode(';',$request->get('tra_id_estudiante'));
            $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
            $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');


        if ($request->get('tra_id_director') == $request->get('tra_id_codirector')) {
            Alert::warning('Advertencia', 'El director y codirector no puede ser el mismo docente');
            return back()->withInput();
        }

        $trabajos->tra_id_director = $request->get('tra_id_director');
        $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
        $trabajos->tra_id_proceso = 2;
        $trabajos->save();
        Alert::success('Registro Exitoso');
        return redirect('/trabajo');
        }
    }


    public function show($id)
    {

        $trabajon = DB::table('trabajo_grado')->get();

        foreach ($trabajon as $t) {
            $contratos = DB::table('persona')
                ->join('docente_contrato', 'persona.id', '=', 'docente_contrato.doco_persona_docente')
                ->where('docente_contrato.doco_rol', 'jurado-tesis')
                ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado1)
                ->orWhere('docente_contrato.doco_persona_docente', $t->tra_id_jurado2)
                ->get();

                $director = DB::table('persona')
                ->join('trabajo_grado','persona.id','=','trabajo_grado.tra_id_director')
                    ->where('persona.id', $t->tra_id_director)
                    ->first();

                    $codirector = DB::table('persona')
                    ->join('trabajo_grado','persona.id','=','trabajo_grado.tra_id_codirector')
                        ->where('persona.id', $t->tra_id_codirector)
                        ->first();

                $jurado1 = DB::table('persona')
                ->join('docente_contrato','persona.id','=','docente_contrato.doco_persona_docente')
                ->where('docente_contrato.doco_rol', 'jurado-tesis')
                    ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado1)
                    ->first();

                    $jurado2 = DB::table('persona')
                    ->join('docente_contrato','persona.id','=','docente_contrato.doco_persona_docente')
                    ->where('docente_contrato.doco_rol', 'jurado-tesis')
                        ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado2)
                        ->first();
        }

        $trabajo = DB::table('trabajo_grado')
            ->select('trabajo_grado.id','tra_codigo_proyecto','tra_titulo_proyecto','tra_id_estudiante','tra_modalidad_grado',
            'tra_fecha_inicio','mod_nombre','razon_social','nit','pais','departamento','ciudad','direccion','telefono',
            'url','correo','area','tra_cargo','tra_estado_propuesta','tra_estado_proyecto','tra_numero_acta_sustentacion','tra_acta_sustentacion_soporte',
            'tra_numero_acta_grado','tra_acta_grado_soporte','tra_fecha_finalizacion','tra_observacion')
            ->join('modalidad_grado','trabajo_grado.tra_modalidad_grado','=','modalidad_grado.id')
            ->leftJoin('compl_empresa','trabajo_grado.tra_id_empresa','=','compl_empresa.id')
            ->where('trabajo_grado.id', $id)
            ->first();
        

        return view('trabajo.show')
            ->with('trabajo', $trabajo)
            ->with('contratos', $contratos)
            ->with('director', $director)
            ->with('codirector', $codirector)
            ->with('jurado1', $jurado1)
            ->with('jurado2', $jurado2);
    }

    public function edit($id)
    {

        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 3)
            ->orWhere('per_tipo_usuario', 7)
            ->get();

        $estudiantes = DB::table('persona')
        ->Where('per_tipo_usuario', 6)
        ->orWhere('per_tipo_usuario', 9)
        ->get();

        $trabajon = DB::table('trabajo_grado')->get();

        foreach ($trabajon as $t) {
            $contratos = DB::table('persona')
                ->join('docente_contrato', 'persona.id', '=', 'docente_contrato.doco_persona_docente')
                ->where('docente_contrato.doco_rol', 'jurado-tesis')
                ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado1)
                ->orWhere('docente_contrato.doco_persona_docente', $t->tra_id_jurado2)
                ->get();

                $jurado1 = DB::table('persona')
                ->join('docente_contrato','persona.id','=','docente_contrato.doco_persona_docente')
                ->where('docente_contrato.doco_rol', 'jurado-tesis')
                    ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado1)
                    ->first();

                    $jurado2 = DB::table('persona')
                    ->join('docente_contrato','persona.id','=','docente_contrato.doco_persona_docente')
                    ->where('docente_contrato.doco_rol', 'jurado-tesis')
                        ->where('docente_contrato.doco_persona_docente', $t->tra_id_jurado2)
                        ->first();
        }

        

        $trabajo = Trabajo::find($id);
        $modalidades = ModalidadGrado::all();
        $empresas = Empresa::all();
        return view('trabajo.edit')
            ->with('estudiantes', $estudiantes)
            ->with('personas', $personas)
            ->with('trabajo', $trabajo)
            ->with('modalidades', $modalidades)
            ->with('contratos', $contratos)
            ->with('jurado1', $jurado1)
            ->with('jurado2', $jurado2)
            ->with('empresas', $empresas);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'tra_codigo_proyecto' => 'required',
            'tra_titulo_proyecto' => 'required',
            'tra_id_estudiante' => 'required',
            'tra_fecha_inicio' => 'required',
            'tra_modalidad_grado' => 'required',
            'tra_id_director' => 'required',
            'tra_id_codirector' => 'required',
        ];

        $message = [
            'tra_codigo_proyecto.required' => 'El campo código proyecto es requerido',
            'tra_titulo_proyecto.required' => 'El campo titulo proyecto es requerido',
            'tra_id_estudiante.required' => 'El campo estudiante (s) es requerido',
            'tra_fecha_inicio.required' => 'El campo fecha de inicio es requerido',
            'tra_modalidad_grado.required' => 'El campo modalidad de grado es requerido',
            'tra_id_director.required' => 'El campo director es requerido',
            'tra_id_codirector.required' => 'El campo codirector es requerido',
        ];

        $this->validate($request, $rules, $message);

        if($request->get('tra_modalidad_grado') == '10'){
            $trabajos = Trabajo::find($id);
            $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
            $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
            $trabajos->tra_id_estudiante = implode(';',$request->get('tra_id_estudiante'));
            $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
            $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');
            $trabajos->tra_id_empresa = $request->get('tra_id_empresa');
            $trabajos->tra_cargo = $request->get('tra_cargo');
            if ($request->get('tra_id_director') == $request->get('tra_id_codirector')) {
                Alert::warning('Advertencia', 'El director y codirector no puede ser el mismo docente');
                return back()->withInput();
            }
            $trabajos->tra_id_director = $request->get('tra_id_director');
            $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
            $trabajos->tra_id_proceso = 1;
            $trabajos->save();
            Alert::success('Registro Exitoso');
            return redirect('/trabajo');
        }else{
            $trabajos = Trabajo::find($id);
            $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
            $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
            $trabajos->tra_id_estudiante = implode(';',$request->get('tra_id_estudiante'));
            $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
            $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');
            $trabajos->tra_id_empresa = null;
            $trabajos->tra_cargo = null;

        if ($request->get('tra_id_director') == $request->get('tra_id_codirector')) {
            Alert::warning('Advertencia', 'El director y codirector no puede ser el mismo docente');
            return back()->withInput();
        }

        $trabajos->tra_id_director = $request->get('tra_id_director');
        $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
        $trabajos->tra_id_proceso = 2;
        $trabajos->save();
        Alert::success('Registro Exitoso');
        return redirect('/trabajo');
        }
    }

    public function faseestado(Request $request, $id)
    {

        $rules =
            [
                'tra_estado_propuesta' => 'required',
                'tra_estado_proyecto' => 'required',
            ];

        $message = [
            'tra_estado_propuesta.required' => 'El campo estado propuesta es requerido',
            'tra_estado_proyecto.required' => 'El campo estado proyecto es requerido'
        ];

        $this->validate($request, $rules, $message);

        $ValiProceso = DB::table('trabajo_grado')
            ->where('trabajo_grado.id', $id)
            ->first();

        if ($ValiProceso->tra_id_proceso == 2) {
            $trabajos = Trabajo::find($id);
            $trabajos->tra_estado_propuesta = $request->get('tra_estado_propuesta');
            $trabajos->tra_estado_proyecto = $request->get('tra_estado_proyecto');
            $trabajos->tra_id_proceso = 3;
            $trabajos->save();

            Alert::success('Exitoso', 'Se ha registrado la información con exito');
            return redirect('trabajo/' . $id . '/edit');
        } else {
            Alert::warning('Advertencia', 'Por favor completar las fases anteriores antes de finalizar la observación');
            return redirect('trabajo/' . $id . '/edit');
        }
    }

    public function fasejurado(Request $request, $id)
    {
        $rules = [
            'tra_id_jurado1' => 'required',
            'tra_id_jurado2' => 'required',
        ];

        $message = [
            'tra_id_jurado1.required' => 'El campo jurado 1 es requerido',
            'tra_id_jurado2.required' => 'El campo jurado 2 es requerido',
        ];

        $this->validate($request, $rules, $message);

        $ValiProceso = DB::table('trabajo_grado')
            ->where('trabajo_grado.id', $id)
            ->first();

        if ($ValiProceso->tra_id_proceso == 3) {
            if ($request->get('tra_id_jurado1') == $request->get('tra_id_jurado2')) {
                Alert::warning('Advertencia', 'El jurado 1 y Jurado 2 no puede ser el mismo docente');
                return back()->withInput();
            }


            $trabajos = Trabajo::find($id);

            if (($trabajos->tra_id_director == $request->get('tra_id_jurado1') ||
                    $trabajos->tra_id_director == $request->get('tra_id_jurado2')) &&
                ($trabajos->tra_id_codirector == $request->get('tra_id_jurado1') ||
                    $trabajos->tra_id_codirector == $request->get('tra_id_jurado2'))
            ) {
                Alert::warning('Advertencia', 'Los jurados no pueden ser su director y codirector');
                return back()->withInput();
            }

            $trabajos->tra_id_jurado1 = $request->get('tra_id_jurado1');
            $trabajos->tra_id_jurado2 = $request->get('tra_id_jurado2');
            $trabajos->tra_id_proceso = 4;
            $trabajos->save();

            Alert::success('Exitoso', 'Se ha registrado la información con exito');
            return redirect('trabajo/' . $id . '/edit');
        } else {
            Alert::warning('Advertencia', 'Por favor completar las fases anteriores antes de finalizar la observación');
            return redirect('trabajo/' . $id . '/edit');
        }
    }

    public function faseacta(Request $request, $id)
    {
        $rules = [
            'tra_acta_sustentacion' => 'required',
            'tra_acta_sustentacion_soporte' => 'required',
            'tra_acta_grado' => 'required',
            'tra_acta_grado_soporte' => 'required',
            'tra_fecha_finalizacion' => 'required',
        ];

        $message = [
            'tra_acta_sustentacion.required' => 'El campo acta de sustentación es requerido',
            'tra_acta_sustentacion_soporte.required' => 'El campo soporte acta es requerido',
            'tra_acta_grado.required' => 'El campo acta de grado es requerido',
            'tra_acta_grado_soporte.required' => 'El campo soporte grado es requerido',
            'tra_fecha_finalizacion.required' => 'El campo fecha finalización es requerido',
        ];

        $this->validate($request, $rules, $message);

        $ValiProceso = DB::table('trabajo_grado')
            ->where('trabajo_grado.id', $id)
            ->first();

        if ($ValiProceso->tra_id_proceso == 4) {
            $trabajos = Trabajo::find($id);

            //Soporte sustentación
            if ($request->file('tra_acta_sustentacion_soporte')) {
                $file1 = $request->file('tra_acta_sustentacion_soporte');
                $cont1 = 0;
                foreach ($file1 as $file) {
                    $cont1++;
                    $soporte_acta_sustentacion = $trabajos->tra_codigo_proyecto . '_' . $trabajos->tra_fecha_inicio . '_acta_grado' . $cont1 . '.' . $file->extension();

                    $ruta = public_path('datos/acta/' . $soporte_acta_sustentacion);

                    if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                        copy($file, $ruta);
                        $trabajos->tra_acta_sustentacion_soporte = $soporte_acta_sustentacion;
                    } else {
                        Alert::warning('Advertencia', 'Los formatos admitidos son .zip o .rar');
                        return back()->withInput();
                    }
                }
            }
            //Soporte grado
            if ($request->file('tra_acta_grado_soporte')) {
                $file2 = $request->file('tra_acta_grado_soporte');
                $cont2 = 0;
                foreach ($file2 as $file) {
                    $cont2++;
                    $soporte_acta_grado = $trabajos->tra_codigo_proyecto . '_' . $trabajos->tra_fecha_inicio . '_acta_sustentacion' . $cont2 . '.' . $file->extension();

                    $ruta = public_path('datos/acta/' . $soporte_acta_sustentacion);

                    if ($file->extension() == 'zip' || $file->extension() == 'rar') {
                        copy($file, $ruta);
                        $trabajos->tra_acta_grado_soporte = $soporte_acta_grado;
                    } else {
                        Alert::warning('Advertencia', 'Los formatos admitidos son .zip o .rar');
                        return back()->withInput();
                    }
                }
            }

            $trabajos->tra_numero_acta_sustentacion = $request->get('tra_acta_sustentacion');
            $trabajos->tra_numero_acta_grado = $request->get('tra_acta_grado');
            $trabajos->tra_fecha_finalizacion = $request->get('tra_fecha_finalizacion');
            $trabajos->tra_id_proceso = 6;
            $trabajos->save();

            Alert::success('Exitoso', 'Se ha registrado la información con exito');
            return redirect('trabajo/' . $id . '/edit');
        } else {
            Alert::warning('Advertencia', 'Por favor completar las fases anteriores antes de finalizar la observación');
            return redirect('trabajo/' . $id . '/edit');
        }
    }

    public function registroobservacion(Request $request, $id)
    {
        $rules = ['tra_observacion' => 'required'];
        $message = ['tra_observacion.required' => 'El campo observación es requerido'];
        $this->validate($request, $rules, $message);

        $ValiProceso = DB::table('trabajo_grado')
            ->where('trabajo_grado.id', $id)
            ->first();

        if ($ValiProceso->tra_id_proceso != 6) {
            Alert::warning('Advertencia', 'Por favor completar las fases anteriores antes de finalizar la observación');
            return redirect('trabajo/' . $id . '/edit');
        }
    }

    public function destroy($id)
    {
        try{
            $trabajo = Trabajo::find($id);
            $trabajo->delete();

            Alert::success('Registro Eliminado');
            return redirect('/trabajo');
        }catch(\Illuminate\Database\QueryException $e){
            Alert::error('No se puede eliminar esta categoría, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function exportpdf()
    {
        $datos = DB::table('trabajo_grado')->orderByDesc('tra_fecha_inicio')->get();
        $director = DB::table('persona')
            ->join('trabajo_grado','persona.id','=','trabajo_grado.tra_id_director')
            ->get();
            $codirector = DB::table('persona')
            ->join('trabajo_grado','persona.id','=','trabajo_grado.tra_id_codirector')
            ->get();
        if ($datos->count() <= 0) {
            Alert::warning('Advertencia','No hay registros de trabajos de grado');
            return redirect('/trabajo');
        } else {
            $view = \view('reporte.trabajogrado', compact('datos','director','codirector'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $trabajos = Trabajo::all();
        if ($trabajos->count() <= 0) {
            Alert::warning('Advertencia', 'No hay registros de trabajos de grado');
            return redirect('/trabajo');
        } else {
            return Excel::download(new TrabajoGradoExport, 'trabajo-grados.xlsx');
        }
    }
}
