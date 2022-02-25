<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Docente;
use App\Models\DocenteAsignatura;
use App\Models\DocenteContrato;
use App\Models\DocenteEvaluacion;
use App\Models\Municipio;
use App\Models\ProgramaAsignatura;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DocenteController extends Controller
{

    public function index(){
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tiposusuario = TipoUsuario::all();

        $personas = DB::table('persona')
            ->select('persona.id','per_tipo_documento','per_numero_documento','per_nombre','per_apellido','per_correo','tip_nombre','per_id_estado')
            ->join('tipo_usuario', 'persona.per_tipo_usuario', '=', 'tipo_usuario.id')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('docente.index')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposusuario', $tiposusuario)
            ->with('personas', $personas);
    }

    public function mostrardocente(){
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('docente.create')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios);
    }

    public function registrodocente(Request $request){   
        //Validación campos
        $rules = [
            'per_tipo_documento' => 'required|in:Tarjeta de identidad,Cédula de ciudadania,Cédula de extranjeria',
            'per_numero_documento' => 'required',
            'per_nombre' => 'required',
            'per_apellido' => 'required',
            'per_telefono' => 'required|max:10',
            'per_correo' => 'required|email|',
            'per_departamento' => 'required|not_in:0',
            'per_ciudad' => 'required|not_in:0'
        ];

        $message = [
            'per_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'per_numero_documento.required' => 'El campo número de documento es requerido',
            'per_nombre.required' => 'El campo nombre es requerido',
            'per_apellido.required' => 'El campo apellido es requerido',
            'per_telefono.required' => 'El campo telefono es requerido',
            'per_correo.required' => 'El campo correo es requerido',
            'per_departamento.required' => 'El campo departamento es requerido',
            'per_ciudad.required' => 'El campo ciudad es requerido',
        ];

        $this->validate($request,$rules,$message);

        //Validación número de documento
        $personaExiste = DB::table('persona')
            ->where('per_numero_documento', $request->get('per_numero_documento'))
            ->get();
        if($personaExiste->count()>0){
            Alert::warning('Registro existente','El número de documento que intenta registrar ya existe');
            return back()->withInput();
        }
        //Validación correo
        $correoExiste = DB::table('persona')
            ->where('per_correo', $request->get('per_correo'))
            ->get();
        if($correoExiste->count()>0){
            Alert::warning('Correo encontrado','El correo electronico que intenta registrar ya existe');
            return back()->withInput();
        }

        DB::table('persona')->insert(
            [
                'per_tipo_documento' => $request->get('per_tipo_documento'),
                'per_numero_documento' =>  $request->get('per_numero_documento'),
                'per_nombre' => $request->get('per_nombre'),
                'per_apellido' => $request->get('per_apellido'),
                'per_telefono' => $request->get('per_telefono'),
                'per_correo' => $request->get('per_correo'),
                'per_departamento' => $request->get('per_departamento'),
                'per_ciudad' => $request->get('per_ciudad'),
                'per_tipo_usuario' => $request->get('per_tipo_usuario'),
                'per_id_estado' => $request->get('per_id_estado'),
            ]
        );

        $id = DB::getPdo()->lastInsertId();

        DB::table('docente')->insert(
            [
                'id_persona_docente' => $id,
                'id_proceso' => 1,
            ]
        );

        Alert::success('Registro exitoso','Recuerde completar la información del docente desde la tabla principal');
        return redirect('/docente');
    }

    public function directorcompletar($id){
        $persona = DB::table('persona')->select('persona.id')
            ->where('per_tipo_usuario',2)
            ->where('persona.id',$id)
            ->orWhere('per_tipo_usuario',5)
            ->where('persona.id', $id)
            ->first();

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

    public function actualizarinformacion(Request $request, $id){

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
                'id_proceso' => 2,
            ]
        );

        Alert::success('Registro Actualizado');
        return redirect('docente/' . $id . '/directorcompletar');
    }

    public function directorestudios(Request $request, $id){

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

    public function zip(Request $request, $id){

        $rules = ['documentos_compl' => 'required'];

        $message = ['documentos_compl.required' => 'El campo documentos .zip es requerido'];

        $this->validate($request,$rules,$message);

        $persona = User::find($id);

        $docente = DB::table('docente')->select('documentos_compl')->where('id_persona_docente', $id)->first();

        if ($request->file('documentos_compl')) {
            $file = $request->file('documentos_compl');
            $name_documentos_compl = $persona->id . '_' . $persona->per_nombre . '_comprimido' . '.' . $file->extension();

            $ruta = public_path('datos/zip/' . $name_documentos_compl);

            if ($file->extension() == 'zip') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .ZIP');
                return back()->withInput();
            }
        } else {
            $name_documentos_compl = $docente->documentos_compl;
        }

        DB::table('docente')->where('id_persona_docente', $id)->update(
            [
                'documentos_compl' => $name_documentos_compl,
                'id_proceso' => 3,
            ]

        );

        Alert::success('Registro Actualizado');
        return redirect('docente/' . $id . '/directorcompletar');
    }

    public function show($id){
        $persona = DB::table('persona')->select('persona.id')
            ->where('per_tipo_usuario',2)
            ->where('persona.id',$id)
            ->orWhere('per_tipo_usuario',5)
            ->where('persona.id', $id)
            ->first();

        $modalidadprograma = collect(['Presencial', 'Virtual']);
        $modalidadprograma->all();

        $docente = DB::table('docente')->where('id_persona_docente', $id)->first();

        $d = Docente::all();
        $cuenta = $d->count();

        return view('docente.show')
            ->with('docente', $docente)
            ->with('persona', $persona)
            ->with('modalidadprograma', $modalidadprograma)
            ->with('cuenta', $cuenta);
    }

    public function estado($id,$estado){
        
        if($estado == 'activo'){
            DB::table('persona')
                ->where('persona.id',$id)
                ->update([
                    'per_id_estado' => 'inactivo'
                ]);

            Alert::success('Estado','El estado ha sido actualizado');
            return redirect('/docente');
        }else if($estado == 'inactivo'){
            DB::table('persona')
                ->where('persona.id',$id)
                ->update([
                    'per_id_estado' => 'activo'
                ]);

                Alert::success('Estado','El estado ha sido actualizado');
            return redirect('/docente');
        }
    }

    public function mostrarasignatura($id){
        $persona = User::find($id);
        $asignaturas = DB::table('persona')
            ->select('docente_asignatura.id','doa_year','doa_semestre','pas_nombre','doa_grupo','mun_nombre','doa_unidad','doa_horas_semana_doc',
                'doa_horas_semana_inv','doa_horas_extension','doa_horas_admin')
            ->join('docente_asignatura','persona.id','=','docente_asignatura.doa_id_docente')
            ->join('programa_asignatura', 'docente_asignatura.doa_id_asignatura','=','programa_asignatura.id')
            ->join('municipio','programa_asignatura.pas_id_municipio','=','municipio.id')
            ->where('persona.id', $id)
            ->where('docente_asignatura.doa_id_docente', $id)
            ->get();
        $municipios = Municipio::all();
        return view('docente/asignacion.index')
            ->with('asignaturas', $asignaturas)
            ->with('municipios', $municipios)
            ->with('persona', $persona);
    }

    public function crearasignatura($id){
        $persona = User::find($id);
        $asignaturas = DB::table('persona')
            ->join('docente_asignatura','persona.id','=','docente_asignatura.doa_id_docente')
            ->join('programa_asignatura', 'docente_asignatura.doa_id_asignatura','=','programa_asignatura.id')
            ->join('municipio','programa_asignatura.pas_id_municipio','=','municipio.id')
            ->where('persona.id', $id)
            ->where('docente_asignatura.doa_id_docente', $id)
            ->get();
        $municipios = Municipio::all();
        return view('docente/asignacion.create')
            ->with('asignaturas', $asignaturas)
            ->with('municipios', $municipios)
            ->with('persona', $persona);
    }

    public function registroasignatura(Request $request){
        $rules = [
            'doa_year' => 'required',
            'doa_semestre' => 'required',
            'doa_id_asignatura' => 'required',
            'doa_grupo' => 'required',
            'doa_id_municipio' => 'required',
            'doa_unidad' => 'required',
            'doa_horas_semana_doc' => 'required',
            'doa_horas_semana_inv' => 'required',
            'doa_horas_extension' => 'required',
            'doa_horas_admin' => 'required',
        ];

        $message = [
            'doa_year.required' => 'El campo año es requerido',
            'doa_semestre.required' => 'El campo semestre es requerido',
            'doa_id_asignatura.required' => 'El campo asignatura es requerido',
            'doa_grupo.required' => 'El campo grupo es requerido',
            'doa_id_municipio.required' => 'El campo sede es requerido',
            'doa_unidad.required' => 'El campo unidad es requerido',
            'doa_horas_semana_doc.required' => 'El campo horas semana docencia es requerido',
            'doa_horas_semana_inv.required' => 'El campo horas semana investigación es requerido',
            'doa_horas_extension.required' => 'El campo horas semana extensión es requerido',
            'doa_horas_admin.required' => 'El campo horas semana labores administrativas es requerido',
        ];

        $this->validate($request,$rules,$message);

        /*Validación asignatura docente*/
        $asignaturaExiste = DB::table('docente_asignatura')
            ->where('doa_id_asignatura', $request->get('doa_id_asignatura'))
            ->where('doa_id_docente', $request->get('doa_id_docente'))
            ->where('doa_year', $request->get('doa_year'));
        if($asignaturaExiste->count()>0){
            Alert::warning('El docente ya registra la asignatura', 'Revisar historial');
            return back()->withInput();
        }

        $docenteasignatura = new DocenteAsignatura();
        $docenteasignatura->doa_id_docente = $request->get('doa_id_docente');
        $docenteasignatura->doa_year = $request->get('doa_year');
        $docenteasignatura->doa_semestre = $request->get('doa_semestre');
        $docenteasignatura->doa_id_asignatura = $request->get('doa_id_asignatura');
        $docenteasignatura->doa_grupo = $request->get('doa_grupo');
        $docenteasignatura->doa_id_municipio = $request->get('doa_id_municipio');
        $docenteasignatura->doa_unidad = $request->get('doa_unidad');
        $docenteasignatura->doa_horas_semana_doc = $request->get('doa_horas_semana_doc');
        $docenteasignatura->doa_horas_semana_inv = $request->get('doa_horas_semana_inv');
        $docenteasignatura->doa_horas_extension = $request->get('doa_horas_extension');
        $docenteasignatura->doa_horas_admin = $request->get('doa_horas_admin');

        $docenteasignatura->save();

        Alert::success('Registro Exitoso');
        return redirect('/docente'.'/'.$request->get('doa_id_docente').'/mostrarasignatura');
    }

    public function editarasignatura($id,$asignatura){
        $persona = User::find($id);
        $asignaturas = ProgramaAsignatura::all();
        $asignatura = DB::table('docente_asignatura')
            ->where('id', $asignatura)
            ->first();
        $municipios = Municipio::all();
        return view('docente/asignacion.edit')
            ->with('asignatura', $asignatura)
            ->with('municipios', $municipios)
            ->with('persona', $persona)
            ->with('asignaturas', $asignaturas);
    }

    public function actualizarasignatura(Request $request,$asignatura){
        $rules = [
            'doa_year' => 'required',
            'doa_semestre' => 'required',
            'doa_id_asignatura' => 'required',
            'doa_grupo' => 'required',
            'doa_id_municipio' => 'required',
            'doa_unidad' => 'required',
            'doa_horas_semana_doc' => 'required',
            'doa_horas_semana_inv' => 'required',
            'doa_horas_extension' => 'required',
            'doa_horas_admin' => 'required',
        ];

        $message = [
            'doa_year.required' => 'El campo año es requerido',
            'doa_semestre.required' => 'El campo semestre es requerido',
            'doa_id_asignatura.required' => 'El campo asignatura es requerido',
            'doa_grupo.required' => 'El campo grupo es requerido',
            'doa_id_municipio.required' => 'El campo sede es requerido',
            'doa_unidad.required' => 'El campo unidad es requerido',
            'doa_horas_semana_doc.required' => 'El campo horas semana docencia es requerido',
            'doa_horas_semana_inv.required' => 'El campo horas semana investigación es requerido',
            'doa_horas_extension.required' => 'El campo horas semana extensión es requerido',
            'doa_horas_admin.required' => 'El campo horas semana labores administrativas es requerido',
        ];

        $this->validate($request,$rules,$message);

        $docenteasignatura = DocenteAsignatura::find($asignatura);
        $docenteasignatura->doa_id_docente = $request->get('doa_id_docente');
        $docenteasignatura->doa_year = $request->get('doa_year');
        $docenteasignatura->doa_semestre = $request->get('doa_semestre');
        $docenteasignatura->doa_id_asignatura = $request->get('doa_id_asignatura');
        $docenteasignatura->doa_grupo = $request->get('doa_grupo');
        $docenteasignatura->doa_id_municipio = $request->get('doa_id_municipio');
        $docenteasignatura->doa_unidad = $request->get('doa_unidad');
        $docenteasignatura->doa_horas_semana_doc = $request->get('doa_horas_semana_doc');
        $docenteasignatura->doa_horas_semana_inv = $request->get('doa_horas_semana_inv');
        $docenteasignatura->doa_horas_extension = $request->get('doa_horas_extension');
        $docenteasignatura->doa_horas_admin = $request->get('doa_horas_admin');

        $docenteasignatura->save();

        Alert::success('Registro Actualizado');
        return redirect('/docente'.'/'.$request->get('doa_id_docente').'/mostrarasignatura');
    }
    
    public function mostrarevaluacion($id){
        $persona = User::find($id);
        $evaluacions = DocenteEvaluacion::all();
        return view('docente/evaluacion.index')
            ->with('persona', $persona)
            ->with('evaluacions', $evaluacions);
    }

    public function crearevaluacion($id){
        $persona = User::find($id);
        return view('docente/evaluacion.create')
            ->with('persona', $persona);
    }

    public function registroevaluacion(Request $request){
        $rules = [
            'doe_year' => 'required|max:4',
            'doe_semestre' => 'required',
            'doe_cal_auto' => 'required',
            'doe_cal_hete' => 'required',
            'doe_cal_coe' => 'required',
            'doe_total_pro' => 'required',
            'doe_observacion' => 'required',
            'doe_url_evaluacion' => 'required',
        ];

        $message = [
            'doe_year.required' => 'El campo año es requerido',
            'doe_semestre.required' => 'El campo semestre es requerido',
            'doe_cal_auto.required' => 'El campo calificación autoevaluacón es requerido',
            'doe_cal_hete.required' => 'El campo calificación heteroevaluación es requerido',
            'doe_cal_coe.required' => 'El campo calificación coevaluación es requerido',
            'doe_total_pro.required' => 'El campo total promedio es requerido',
            'doe_observacion.required' => 'El campo observación es requerido',
            'doe_url_evaluacion.required' => 'El campo soporte evaluación docente es requerido',
        ];

        $this->validate($request,$rules,$message);

        $EvaluacionExiste = DB::table('docente_evaluacion')
            ->where('doe_persona_docente', $request->get('doe_persona_docente'))
            ->where('doe_year', $request->get('doe_year'))
            ->where('doe_semestre', $request->get('doe_semestre'))
            ->get();

        if($EvaluacionExiste->count()>0){
            Alert::warning('Advertencia','El docente ya registra evaluación para el periodo que intenta registrar');
            return back()->withInput();
        }

        /*Tomar id docente*/
        $persona = DB::table('persona')
            ->where('id', $request->get('doe_persona_docente'))
            ->first();

        if ($request->file('doe_url_evaluacion')) {
            $file = $request->file('doe_url_evaluacion');
            $name_evaluacion = $request->get('doe_year').'_'.$request->get('doe_semestre').'_'.$persona->per_nombre.'_'.$persona->per_apellido.'_evaluacion'. '.'.$file->extension();

            $ruta = public_path('datos/evaluacion/'.$name_evaluacion);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }

        $evaluacion = new DocenteEvaluacion();
        $evaluacion->doe_persona_docente = $request->get('doe_persona_docente');
        $evaluacion->doe_year = $request->get('doe_year');
        $evaluacion->doe_semestre = $request->get('doe_semestre');
        $evaluacion->doe_cal_auto = $request->get('doe_cal_auto');
        $evaluacion->doe_cal_hete = $request->get('doe_cal_hete');
        $evaluacion->doe_cal_coe = $request->get('doe_cal_coe');
        $evaluacion->doe_total_pro = $request->get('doe_total_pro');
        $evaluacion->doe_observacion = $request->get('doe_observacion');
        $evaluacion->doe_url_evaluacion = $name_evaluacion;

        $evaluacion->save();

        Alert::success('Registro Exitoso','La evaluación ha sido registrada');
        return redirect('/docente'.'/'.$request->get('doe_persona_docente').'/mostrarevaluacion');
    }

    public function editarevaluacion($persona,$evaluacionid){
        $persona = User::find($persona);
        $evaluacion = DocenteEvaluacion::find($evaluacionid);
        return view('docente/evaluacion.edit')
            ->with('persona', $persona)
            ->with('evaluacion', $evaluacion);
    }

    public function actualizarevaluacion(Request $request, $evaluacion){
        $rules = [
            'doe_year' => 'required|max:4',
            'doe_semestre' => 'required',
            'doe_cal_auto' => 'required',
            'doe_cal_hete' => 'required',
            'doe_cal_coe' => 'required',
            'doe_total_pro' => 'required',
            'doe_observacion' => 'required',
        ];

        $message = [
            'doe_year.required' => 'El campo año es requerido',
            'doe_semestre.required' => 'El campo semestre es requerido',
            'doe_cal_auto.required' => 'El campo calificación autoevaluacón es requerido',
            'doe_cal_hete.required' => 'El campo calificación heteroevaluación es requerido',
            'doe_cal_coe.required' => 'El campo calificación coevaluación es requerido',
            'doe_total_pro.required' => 'El campo total promedio es requerido',
            'doe_observacion.required' => 'El campo observación es requerido',
        ];

        $this->validate($request,$rules,$message);

        /*Tomar id docente*/
        $personax = DB::table('persona')
            ->where('id', $request->get('doe_persona_docente'))
            ->first();
        
        $nombreEvaluacion = DB::table('docente_evaluacion')
            ->where('id', $evaluacion)
            ->first();

        if ($request->file('doe_url_evaluacion')) {
            $file = $request->file('doe_url_evaluacion');
            $name_evaluacion = $request->get('doe_year').'_'.$request->get('doe_semestre').'_'.$personax->per_nombre.'_'.$personax->per_apellido.'_evaluacion'. '.'.$file->extension();

            $ruta = public_path('datos/evaluacion/'.$name_evaluacion);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }else{
            $name_evaluacion = $nombreEvaluacion->doe_url_evaluacion; 
        }

        $evaluacion = DocenteEvaluacion::find($evaluacion);
        $evaluacion->doe_year = $request->get('doe_year');
        $evaluacion->doe_semestre = $request->get('doe_semestre');
        $evaluacion->doe_cal_auto = $request->get('doe_cal_auto');
        $evaluacion->doe_cal_hete = $request->get('doe_cal_hete');
        $evaluacion->doe_cal_coe = $request->get('doe_cal_coe');
        $evaluacion->doe_total_pro = $request->get('doe_total_pro');
        $evaluacion->doe_observacion = $request->get('doe_observacion');
        $evaluacion->doe_url_evaluacion = $name_evaluacion;

        $evaluacion->save();

        Alert::success('Registro Actualizado','La evaluación ha sido actualizada');
        return redirect('/docente'.'/'.$request->get('doe_persona_docente').'/mostrarevaluacion');
    }

    public function eliminarevaluacion($evaluacion){
        $evaluacion = DocenteEvaluacion::find($evaluacion);
        $evaluacion->delete();
        Alert::success('Exito','La evaluación se elimino con exito');
        return redirect('/docente');
    }

    public function mostrarcontrato($id){
        $persona = User::find($id);
        $contratos = DocenteContrato::all();

        $contratos = DB::table('docente_contrato')
            ->where('doco_persona_docente', $id)
            ->get();

        return view('docente/contrato.index')
            ->with('persona', $persona)
            ->with('contratos', $contratos);
    }

    public function crearcontrato($id){
        $persona = User::find($id);
        return view('docente/contrato.create')
            ->with('persona', $persona);
    }

    public function registrocontrato(Request $request){
        $rules = [
            'doco_numero_contrato' => 'required',
            'doco_objeto_contrato' => 'required',
            'doco_tipo_contrato' => 'required',
            'doco_fecha_inicio' => 'required',
            'doco_fecha_fin' => 'required',
            'doco_rol' => 'required',
            'doco_url_soporte' => 'required',
        ];

        $message = [
            'doco_numero_contrato.required' => 'El campo número de contrato es requerido',
            'doco_objeto_contrato.required' => 'El campo objeto contrato es requerido',
            'doco_tipo_contrato.required' => 'El campo tipo de contrato es requerido',
            'doco_fecha_inicio.required' => 'El campo fecha de inicio de contrato es requerido',
            'doco_fecha_fin.required' => 'El campo fecha fin contrato es requerido',
            'doco_rol.required' => 'El campo rol es requerido',
            'doco_url_soporte.required' => 'El campo cargue contrato es requerido',
        ];

        $this->validate($request,$rules,$message);

        /*Docente*/
        $persona = DB::table('persona')
            ->where('id', $request->get('doe_persona_docente'))
            ->first();

        if ($request->file('doco_url_soporte')) {
            $file = $request->file('doco_url_soporte');
            $name_contrato = $request->get('doco_fecha_inicio').'_'.$request->get('doco_numero_contrato'). '_' . $persona->per_nombre.'_'.$persona->per_apellido.'_contrato' . '.' . $file->extension();

            $ruta = public_path('datos/contrato/' . $name_contrato);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }

        $contrato = new DocenteContrato();
        $contrato->doco_persona_docente = $request->get('doe_persona_docente');
        $contrato->doco_numero_contrato = $request->get('doco_numero_contrato');
        $contrato->doco_objeto_contrato = $request->get('doco_objeto_contrato');
        $contrato->doco_tipo_contrato = $request->get('doco_tipo_contrato');
        $contrato->doco_fecha_inicio = $request->get('doco_fecha_inicio');
        $contrato->doco_fecha_fin = $request->get('doco_fecha_fin');
        $contrato->doco_rol = $request->get('doco_rol');
        $contrato->doco_url_soporte = $name_contrato;

        $contrato->save();

        Alert::success('Registro Exitoso','Contrato registrado');
        return redirect('/docente'.'/'.$request->get('doe_persona_docente').'/mostrarcontrato');

    }

    public function editarcontrato($persona, $contratoid){
        $persona = User::find($persona);
        $contrato = DocenteContrato::find($contratoid);
        return view('docente/contrato.edit')
            ->with('persona', $persona)
            ->with('contrato', $contrato);
    }

    public function actualizarcontrato(Request $request, $contrato){
        $rules = [
            'doco_numero_contrato' => 'required',
            'doco_objeto_contrato' => 'required',
            'doco_tipo_contrato' => 'required',
            'doco_fecha_inicio' => 'required',
            'doco_fecha_fin' => 'required',
            'doco_rol' => 'required',
        ];

        $message = [
            'doco_numero_contrato.required' => 'El campo número de contrato es requerido',
            'doco_objeto_contrato.required' => 'El campo objeto contrato es requerido',
            'doco_tipo_contrato.required' => 'El campo tipo de contrato es requerido',
            'doco_fecha_inicio.required' => 'El campo fecha de inicio de contrato es requerido',
            'doco_fecha_fin.required' => 'El campo fecha fin contrato es requerido',
            'doco_rol.required' => 'El campo rol es requerido',
        ];

        $this->validate($request,$rules,$message);

        //Name contrato
        $contratox = DB::table('docente_contrato')
            ->where('id', $contrato)
            ->first();

        //Persona contrato
        $persona = DB::table('persona')
            ->where('id', $request->get('doe_persona_docente'))
            ->first();            

        if ($request->file('doco_url_soporte')) {
            $file = $request->file('doco_url_soporte');
            $name_contrato = $request->get('doco_fecha_inicio').'_'.$request->get('doco_numero_contrato'). '_' . $persona->per_nombre.'_'.$persona->per_apellido.'contrato' . '.' . $file->extension();

            $ruta = public_path('datos/contrato/' . $name_contrato);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }else{
            $name_contrato = $contratox->doco_url_soporte;
        }

        $contrato = DocenteContrato::find($contrato);
        $contrato->doco_numero_contrato = $request->get('doco_numero_contrato');
        $contrato->doco_objeto_contrato = $request->get('doco_objeto_contrato');
        $contrato->doco_tipo_contrato = $request->get('doco_tipo_contrato');
        $contrato->doco_fecha_inicio = $request->get('doco_fecha_inicio');
        $contrato->doco_fecha_fin = $request->get('doco_fecha_fin');
        $contrato->doco_rol = $request->get('doco_rol');
        $contrato->doco_url_soporte = $name_contrato;

        $contrato->save();

        Alert::success('Registro Actualizado','Contrato actualizado');
        return redirect('/docente'.'/'.$request->get('doe_persona_docente').'/mostrarcontrato');
    }

    public function eliminarcontrato($contrato){
        $contratof = DocenteContrato::find($contrato);
        $contratof->delete();
        Alert::success('Registro Eliminado');
        return redirect('/docente');
    }

    public function exportPDF()
    {
    }
}
