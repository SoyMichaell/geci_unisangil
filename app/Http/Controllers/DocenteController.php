<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DocenteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function directorcompletar($id)
    {
        if (auth()->user()->per_tipo_usuario == 2) {

            $dedicacions = collect(['Tiempo completo', 'Tiempo catedra', 'Medio tiempo']);
            $dedicacions = $dedicacions->all();

            $tiposcontratacions = collect(['Contrato indefinido', 'Contrato a término fijo']);
            $tiposcontratacions = $tiposcontratacions->all();

            $estados = collect(['Activo', 'Inactivo']);
            $estados->all();

            $persona = DB::table('persona')->select('id')->where('per_tipo_usuario','=',2,'and','id','=',$id)->first();

            $modalidadprograma = collect(['Presencial','Virtual']);
            $modalidadprograma->all();

            return view('docente.created')
                ->with('dedicacions', $dedicacions)
                ->with('tiposcontratacions', $tiposcontratacions)
                ->with('estados', $estados)
                ->with('persona', $persona)
                ->with('modalidadprograma', $modalidadprograma);
        }
    }

    public function directorinformacion(Request $request){
        
        $rules = [
            'ciudad_procedencia' => 'required',
            'correo_personal' => 'required',
            'fecha_vinculacion' => 'required',
            'eps' => 'required',
            'riesgo' => 'required',
            'cajacompensacion' => 'required',
            'banco' => 'required',
            'no_cuenta' => 'required',
            'pension' => 'required'
        ];

        $message = [
            'ciudad_procedencia.required' => 'El campo ciudad de procedencia es requerido',
            'correo_personal.required' => 'El campo correo personal es requerido',
            'fecha_vinculacion.required' => 'El campo fecha vinculación es requerido',
            'eps.required' => 'El campo eps es requerido',
            'riesgo.required' => 'El campo riesgo es requerido',
            'cajacompensacion.required' => 'El campo caja de compensacion es requerido',
            'banco.required' => 'El campo banco es requerido',
            'no_cuenta.required' => 'El campo no. banco es requerido',
            'pension.required' => 'El campo pensión es requerido'
        ];

        $this->validate($request,$rules,$message);

        $directord = new Docente();
        $directord->id_persona_docente = $request->get('id');
        $directord->ciudad_procedencia = $request->get('ciudad_procedencia');
        $directord->correo_personal = $request->get('correo_personal');
        $directord->dedicacion = $request->get('dedicacion');
        $directord->tipo_contratacion = $request->get('tipo_contratacion');
        $directord->fecha_vinculacion = $request->get('fecha_vinculacion');
        $directord->eps = $request->get('eps');
        $directord->riesgo = $request->get('riesgo');
        $directord->caja_compensacion = $request->get('cajacompensacion');
        $directord->pension = $request->get('pension');
        $directord->banco = $request->get('banco');
        $directord->no_cuenta = $request->get('no_cuenta');
        $directord->estado = $request->get('estado');
        $directord->id_proceso = 2;

        $directord->save();

        Alert::success('Registro exitos');
        return redirect('docente/'.$request->get('id').'/directorcompletar');

    }

    public function directordocente(Request $request, $id)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function exportPDF(){
        
    }

}
