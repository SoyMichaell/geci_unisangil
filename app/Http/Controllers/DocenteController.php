<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Docente;
use App\Models\Municipio;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DocenteController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tiposusuario = TipoUsuario::all();

        $personas = DB::table('persona')
            ->join('docente', 'persona.id', '=', 'docente.id_persona_docente')
            ->join('tipo_usuario', 'persona.per_tipo_usuario', '=', 'tipo_usuario.id')
            ->where('per_tipo_usuario','=',2,'or','per_tipo_usuario','=',5)
            ->get();
        return view('docente.index')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposusuario', $tiposusuario)
            ->with('personas', $personas);
    }

    public function mostrardocente()
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tiposusuario = TipoUsuario::all();

        return view('docente.create')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposusuario', $tiposusuario);
    }

    public function registrodocente(Request $request){
        $persona = new User();
        $persona->per_tipo_documento = $request->get('per_tipo_documento');
        $persona->per_numero_documento = $request->get('per_numero_documento');
        $persona->per_nombre = $request->get('per_nombre');
        $persona->per_apellido = $request->get('per_apellido');
        $persona->per_telefono = $request->get('per_telefono');
        $persona->per_correo = $request->get('per_correo');
        $persona->per_departamento = $request->get('per_departamento');
        $persona->per_ciudad = $request->get('per_ciudad');
        $persona->per_tipo_usuario = $request->get('per_tipo_usuario');
        $persona->per_id_estado = $request->get('per_id_estado');

        $persona->save();

        Alert::success('Registro fase 1 exitoso');
        return redirect('/docente/mostrardocente');


    }   

    public function directorcompletar($id)
    {
        if (auth()->user()->per_tipo_usuario == 2) {

            /*$dedicacions = collect(['Tiempo completo', 'Tiempo catedra', 'Medio tiempo']);
            $dedicacions = $dedicacions->all();
            $tiposcontratacions = collect(['Contrato indefinido', 'Contrato a término fijo']);
            $tiposcontratacions = $tiposcontratacions->all();
            $estados = collect(['Activo', 'Inactivo']);
            $estados->all();*/

            $persona = DB::table('persona')->select('id')->where('per_tipo_usuario', '=', 2, 'and', 'id', '=', $id)->first();

            $modalidadprograma = collect(['Presencial', 'Virtual']);
            $modalidadprograma->all();

            $docente = DB::table('docente')->where('id_persona_docente', $id)->first();

            $d = Docente::all();
            $cuenta = $d->count();

            return view('docente.created')
                ->with('docente', $docente)
                ->with('persona', $persona)
                ->with('modalidadprograma', $modalidadprograma)
                ->with('cuenta', $cuenta);
        }
    }

    public function directorinformacion(Request $request)
    {

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

        $this->validate($request, $rules, $message);

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
        return redirect('docente/' . $request->get('id') . '/directorcompletar');
    }

    public function actualizarinformacion(Request $request, $id)
    {

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

        $this->validate($request, $rules, $message);

        DB::table('docente')->update(
            [
                'ciudad_procedencia' => $request->get('ciudad_procedencia'),
                'correo_personal' => $request->get('correo_personal'),
                'dedicacion' => $request->get('dedicacion'),
                'tipo_contratacion' => $request->get('tipo_contratacion'),
                'fecha_vinculacion' => $request->get('fecha_vinculacion'),
                'eps' => $request->get('eps'),
                'riesgo' => $request->get('riesgo'),
                'caja_compensacion' => $request->get('cajacompensacion'),
                'banco' => $request->get('banco'),
                'no_cuenta' => $request->get('no_cuenta'),
                'pension' => $request->get('pension'),
                'estado' => $request->get('estado'),
            ]
        );

        Alert::success('Registro Actualizado');
        return redirect('docente/' . $id . '/directorcompletar');
    }

    public function directorestudios(Request $request, $id)
    {

        $persona = User::find($id);

        $docente = DB::table('docente')->select('certificado_esp', 'certificado_dip', 'soporte_hoja_vida')->where('id_persona_docente', $id)->first();

        if ($request->file('certificado_esp')) {
            $file = $request->file('certificado_esp');
            $name_certificado_esp = $persona->id . '_' . $persona->per_nombre . '_especializacion' . '.' . $file->extension();

            $ruta = public_path('estudios/' . $name_certificado_esp);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        } else {
            $name_certificado_esp = $docente->certificado_esp;
        }

        if ($request->file('certificado_dip')) {
            $file = $request->file('certificado_dip');
            $name_certificado_dip = $persona->id . '_' . $persona->per_nombre . '_diplomado' . '.' . $file->extension();

            $ruta = public_path('estudios/' . $name_certificado_dip);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        } else {
            $name_certificado_dip = $docente->certificado_dip;
        }

        if ($request->file('soporte_hoja_vida')) {
            $file = $request->file('soporte_hoja_vida');
            $name_certificado_sop = $persona->id . '_' . $persona->per_nombre . '_soporte_hoja_vida' . '.' . $file->extension();

            $ruta = public_path('estudios/' . $name_certificado_sop);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        } else {
            $name_certificado_sop = $docente->soporte_hoja_vida;
        }


        DB::table('docente')->where('id_persona_docente', $id)->update(
            [
                'institucion_esp' => $request->get('institucion_esp'),
                'certificado_esp' => $name_certificado_esp,
                'institucion_dip' => $request->get('institucion_dip'),
                'certificado_dip' => $name_certificado_dip,
                'titulo_pregrado' => $request->get('titulo_pregrado'),
                'institucion_pre' => $request->get('institucion_pre'),
                'titulo_especializacion' => $request->get('titulo_especializacion'),
                'institucion_espe' => $request->get('institucion_espe'),
                'titulo_maestria' => $request->get('titulo_maestria'),
                'institucion_mae' => $request->get('institucion_mae'),
                'titulo_doctorado' => $request->get('titulo_doctorado'),
                'institucion_doc' => $request->get('institucion_doc'),
                'area_conocimiento' => $request->get('area_conocimiento'),
                'maximo_nivel_formacion' => $request->get('maximo_nivel_formacion'),
                'titulo_maximo_nivel' => $request->get('titulo_maximo_nivel'),
                'institucion_maximo_nivel' => $request->get('institucion_maximo_nivel'),
                'modalidad_programa' => $request->get('modalidad_programa'),
                'soporte_hoja_vida' => $name_certificado_sop
            ]

        );

        Alert::success('Registro Actualizado');
        return redirect('docente/' . $id . '/directorcompletar');
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

    public function exportPDF()
    {
    }
}
