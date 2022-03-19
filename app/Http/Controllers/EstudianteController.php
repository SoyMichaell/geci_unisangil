<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Programa;
use App\Models\Estudiante;
use App\Exports\EstudiantesExports;
use App\Exports\ListadoEstudiantes\BecasExport;
use App\Exports\ListadoEstudiantes\ContadosExport;
use App\Exports\ListadoEstudiantes\PrestamosExport;
use App\Models\EstudianteEgresado;
use App\Models\EstudianteReporte;
use App\Models\EstudianteReporteGenerals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class EstudianteController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::all();
        $programas = Programa::all();
        $estudiante_egresados = EstudianteEgresado::all();

        $ingresos = DB::table('estudiante')->select('estu_ingreso')->get();
        $programas = DB::table('programa')
            ->join('programa_plan_estudio', 'programa.id', '=', 'programa_plan_estudio.pp_id_programa')
            ->get();

        if (Auth::user()->per_tipo_usuario == '3') {
            return view('estudiante.index', compact('estudiantes', 'ingresos', 'estudiante_egresados'));
        } else {
            if ($programas->count() > 0) {
                return view('estudiante.index', compact('estudiantes', 'ingresos', 'estudiante_egresados'));
            } else {
                Alert::warning('Requisitos', 'Primero registre un programa acádemico');
                return redirect('/home');
            }
        }
    }

    public function create()
    {
        $programasPlan = DB::table('programa')
            ->join('programa_plan_estudio', 'programa.id', '=', 'programa_plan_estudio.pp_id_programa')
            ->get();

        $programas = Programa::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();

        $semestres = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $semestres->all();

        $estadoprogramas = collect(['Activo', 'Inactivo']);
        $estadoprogramas->all();

        $tipousuarios = DB::table('tipo_usuario')
            ->where('id', 4)
            ->orWhere('id', 5)
            ->orWhere('id', 6)
            ->get(); 


        return view('estudiante.create')
            ->with('programas', $programas)
            ->with('programasPlan', $programasPlan)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('semestres', $semestres)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('tiposdocumento', $tiposdocumento)
            ->with('tipousuarios', $tipousuarios);
    }

    public function store(Request $request)
    {
        $rules = [
            'estu_numero_documento' => 'required',
            'estu_nombre' => 'required',
            'estu_apellido' => 'required',
            'estu_telefono1' => 'required',
            'estu_direccion' => 'required',
            'estu_correo' => 'required',
            'estu_estrato' => 'required',
            'estu_departamento' => 'required',
            'estu_ciudad' => 'required',
            'estu_fecha_nacimiento' => 'required',
            'estu_ingreso' => 'required',
            'estu_periodo_ingreso' => 'required',
        ];

        $messages = [
            'estu_programa.required' => 'El campo programa es requerido',
            'estu_programa_plan.required' => 'El campo plan de estudio es requerido',
            'estu_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'estu_numero_documento.required' => 'El campo número de documento es requerido',
            'estu_nombre.required' => 'El campo nombre es requerido',
            'estu_apellido.required' => 'El campo apellido es requerido',
            'estu_telefono1.required' => 'El campo telefono 1 es requerido',
            'estu_direccion.required' => 'El campo dirección es requerido',
            'estu_correo.required' => 'El campo correo es requerido',
            'estu_estrato.required' => 'El campo estrato es requerido',
            'estu_departamento.required' => 'El campo departamento es requerido',
            'estu_ciudad.required' => 'El campo sede es requerido',
            'estu_fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
            'estu_ingreso.required' => 'El campo año de ingreso es requerido',
            'estu_periodo_ingreso.required' => 'El campo periodo de ingreso es requerido',
        ];

        $this->validate($request, $rules, $messages);

        $ExisteEstudiante = DB::table('estudiante')
            ->where('estu_numero_documento', $request->get('estu_numero_documento'))
            ->get();
        $ExisteCorreo = DB::table('estudiante')
            ->where('estu_correo', $request->get('estu_correo'))
            ->get();
        $ExistePersona = DB::table('persona')
            ->where('per_numero_documento', $request->get('estu_numero_documento'))
            ->get();
        $ExisteCorreoP = DB::table('persona')
            ->where('per_correo', $request->get('estu_correo'))
            ->get();
        if ($ExisteEstudiante->count() > 0) {
            Alert::warning('Advertencia', 'El documento de identidad, ya se encuentra registrado');
            return back()->withInput();
        } else if ($ExisteCorreo->count() > 0) {
            Alert::warning('Advertencia', 'El correo electronico, ya se encuentra registrado');
            return back()->withInput();
        } else if ($ExistePersona->count() > 0) {
            Alert::warning('Advertencia', 'El documento de identidad, ya se encuentra registrado');
            return back()->withInput();
        } else if ($ExisteCorreoP->count() > 0) {
            Alert::warning('Advertencia', 'El correo electronico, ya se encuentra registrado');
            return back()->withInput();
        } else {

            DB::table('persona')->insert([
                    'per_tipo_documento' => $request->get('estu_tipo_documento'),
                    'per_numero_documento' => $request->get('estu_numero_documento'),
                    'per_nombre' => $request->get('estu_nombre'),
                    'per_apellido' => $request->get('estu_apellido'),
                    'per_telefono' => $request->get('estu_telefono1'),
                    'per_telefono' => $request->get('estu_correo'),
                    'estu_departamento' => $request->get('estu_departamento'),
                    'estu_ciudad' => $request->get('estu_ciudad'),
            ]);

            DB::table('estudiante')->insert(
                [
                    'estu_programa' => $request->get('estu_programa'),
                    'estu_programa_plan' =>  $request->get('estu_programa_plan'),
                    'estu_telefono2' => $request->get('estu_telefono1'),
                    'estu_direccion' => $request->get('estu_direccion'),
                    'estu_estrato' => $request->get('estu_estrato'),
                    'estu_fecha_nacimiento' => $request->get('estu_fecha_nacimiento'),
                    'estu_fecha_expedicion' => $request->get('estu_fecha_expedicion'),
                    'estu_sexo' => $request->get('estu_sexo'),
                    'estu_estado_civil' => $request->get('estu_estado_civil'),
                    'estu_ingreso' => $request->get('estu_ingreso'),
                    'estu_periodo_ingreso' => $request->get('estu_periodo_ingreso'),
                    'estu_ult_matricula' => $request->get('estu_ult_matricula'),
                    'estu_semestre' => $request->get('estu_semestre'),
                    'estu_financiamiento' => $request->get('estu_financiamiento'),
                    'estu_entidad' => $request->get('estu_entidad'),
                    'estu_tipo_matricula' => $request->get('estu_tipo_matricula'),
                    'estu_estado' => $request->get('estu_estado'),
                    'estu_matricula' => $request->get('estu_matricula'),
                    'estu_pga' => $request->get('estu_pga'),
                    'estu_reconocimiento' => $request->get('estu_reconocimiento'),
                    'estu_egresado' => $request->get('estu_egresado'),
                ]
            );

            if ($request->get('estu_egresado') == 'Si') {
                $id = DB::getPdo()->lastInsertId();

                DB::table('estudiante_egresado')->insert(
                    [
                        'este_id_estudiante' => $id
                    ]
                );
            }

            Alert::success('Exitoso', 'El estudiante se ha registrado con exito');
            return redirect('/estudiante');
        }
    }

    public function show($id)
    {
        $programas = Programa::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $estudiante = Estudiante::find($id);
        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();
        return view('estudiante.show')->with('estudiante', $estudiante)
            ->with('programas', $programas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposdocumento', $tiposdocumento);
    }

    public function edit($id)
    {

        $estudiante = Estudiante::find($id);
        $programas = Programa::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();

        $tipos = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tipos->all();
        $semestres = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $semestres->all();
        $estadoprogramas = collect(['Activo', 'Inactivo']);
        $estadoprogramas->all();
        return view('estudiante.edit')->with('estudiante', $estudiante)
            ->with('programas', $programas)
            ->with('tipos', $tipos)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('semestres', $semestres)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('tiposdocumento', $tiposdocumento);
    }

    public function update(Request $request, $id)
    {

        $estudiante = DB::table('estudiante')->where('id', $id)->first();

        $estudiantes = Estudiante::find($id);
        $estudiantes->estu_programa = $request->get('estu_programa');
        if ($request->get('estu_programa_plan') != "") {
            $estudiantes->estu_programa_plan = $estudiante->estu_programa_plan;
        }
        $estudiantes->estu_tipo_documento = $request->get('estu_tipo_documento');
        $estudiantes->estu_numero_documento = $request->get('estu_numero_documento');
        $estudiantes->estu_nombre = $request->get('estu_nombre');
        $estudiantes->estu_apellido = $request->get('estu_apellido');
        $estudiantes->estu_telefono1 = $request->get('estu_telefono1');
        $estudiantes->estu_telefono2 = $request->get('estu_telefono2');
        $estudiantes->estu_direccion = $request->get('estu_direccion');
        $estudiantes->estu_correo = $request->get('estu_correo');
        $estudiantes->estu_estrato = $request->get('estu_estrato');
        $estudiantes->estu_departamento = $request->get('estu_departamento');
        if ($request->get('estu_ciudad') != "") {
            $estudiantes->estu_programa_plan = $estudiante->estu_ciudad;
        }
        $estudiantes->estu_fecha_nacimiento = $request->get('estu_fecha_nacimiento');
        $estudiantes->estu_ingreso = $request->get('estu_ingreso');
        $estudiantes->estu_periodo_ingreso = $request->get('estu_periodo_ingreso');
        $estudiantes->estu_ult_matricula = $request->get('estu_ult_matricula');
        $estudiantes->estu_semestre = $request->get('estu_semestre');
        $estudiantes->estu_financiamiento = $request->get('estu_financiamiento');
        $estudiantes->estu_entidad = $request->get('estu_entidad');
        $estudiantes->estu_tipo_matricula = $request->get('estu_tipo_matricula');
        $estudiantes->estu_estado = $request->get('estu_estado');
        $estudiantes->estu_matricula = $request->get('estu_matricula');
        $estudiantes->estu_pga = $request->get('estu_pga');
        $estudiantes->estu_reconocimiento = $request->get('estu_reconocimiento');

        if ($request->get('estu_egresado') == 'No') {
            $estudiante = DB::table('estudiante_egresado')
                ->where('este_id_estudiante', $id)
                ->get();
            if ($estudiante->count() > 0) {
                DB::table('estudiante_egresado')
                    ->where('este_id_estudiante', $id)
                    ->delete();
            }
        }
        $estudiantes->estu_egresado = $request->get('estu_egresado');

        if ($request->get('estu_egresado') == 'Si') {
            DB::table('estudiante_egresado')->insert(
                [
                    'este_id_estudiante' => $id
                ]
            );
        }

        $estudiantes->save();

        Alert::success('Exitoso', 'El estudiante se ha registrado con exito');
        return redirect('/estudiante');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        Alert::success('Registro Eliminado');
        return redirect('/estudiante');
    }

    public function crearegresado($id)
    {
        $estudiante = DB::table('estudiante_egresado')
            ->where('este_id_estudiante', $id)
            ->first();
        return view('estudiante.egresado')->with('estudiante', $estudiante);
    }

    public function actualizaregresado(Request $request)
    {
        $rules = [
            'este_fecha_finalizacion' => 'required',
            'este_promedio_acumulado' => 'required',
            'este_nombre_empresa' => 'required',
            'este_area' => 'required',
            'este_cargo' => 'required',
            'este_sitio_trabajo' => 'required|not_in:0',
            'este_tipo_contrato' => 'required|not_in:0',
            'este_pais_residencia' => 'required',
            'este_ciudad_residencia' => 'required',
        ];
        $message = [
            'este_fecha_finalizacion.required' => 'El campo fecha finalización es requerido',
            'este_promedio_acumulado.required' => 'El campo promedio acumulado es requerido',
            'este_nombre_empresa.required' => 'El campo nombre empresa es requerido',
            'este_area.required' => 'El campo área de trabajo es requerido',
            'este_cargo.required' => 'El campo cargo es requerido',
            'este_sitio_trabajo.required' => 'El campo ¿Labora en algo relacionado a la carrera? es requerido',
            'este_tipo_contrato.required' => 'El campo tipo contrato es requerido',
            'este_pais_residencia.required' => 'El campo país es requerido',
            'este_ciudad_residencia.required' => 'El campo ciudad es requerido',
        ];

        $this->validate($request, $rules, $message);

        DB::table('estudiante_egresado')
            ->where('este_id_estudiante', $request->get('este_id_estudiante'))
            ->update(
                [
                    'este_fecha_finalizacion' => $request->get('este_fecha_finalizacion'),
                    'este_promedio_acumulado' => $request->get('este_promedio_acumulado'),
                    'este_nombre_empresa' => $request->get('este_nombre_empresa'),
                    'este_area' => $request->get('este_area'),
                    'este_cargo' => $request->get('este_cargo'),
                    'este_sitio_trabajo' => $request->get('este_sitio_trabajo'),
                    'este_tipo_contrato' => $request->get('este_tipo_contrato'),
                    'este_pais_residencia' => $request->get('este_pais_residencia'),
                    'este_ciudad_residencia' => $request->get('este_ciudad_residencia'),
                ]
            );

        Alert::success('Exitoso', 'La información del estudiante egresado ha sido registrada');
        return redirect('/estudiante');
    }


    public function pdf()
    {
        $estudiantes = DB::table('estudiante')
            ->join('programa', 'estudiante.estu_programa', '=', 'programa.id')
            ->get();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            $view = \view('estudiante.pdf', compact('estudiantes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('estudiantes-reporte.pdf');
        }
    }

    public function mostrarreporte()
    {
        $generales = EstudianteReporte::all();
        return view('estudiante/general.index')
            ->with('generales', $generales);
    }

    public function crearreporte()
    {
        $programas = Programa::all();
        return view('estudiante/general.create')
            ->with('programas', $programas);
    }

    public function registroreporte(Request $request)
    {
        $rules = [
            'esture_id_programa' => 'required|not_in:0',
            'esture_year' => 'required',
            'esture_periodo' => 'required',
            'esture_inscritos' => 'required',
            'esture_admitidos' => 'required',
            'esture_mat_antiguos' => 'required',
            'esture_mat_primer_semestre' => 'required',
            'esture_mat_total' => 'required',
            'esture_egresado_no_graduado' => 'required',
            'esture_graduados' => 'required',
            'esture_retirados' => 'required',
            'esture_tasa_desercion' => 'required',
            'esture_tasa_desercion_pro' => 'required',
            'esture_porcentaje_termina' => 'required',
            'esture_nro_estudiante_ies_nacional' => 'required',
            'esture_nro_estudiante_ies_internacional' => 'required',
            'esture_vis_nacional' => 'required',
            'esture_vis_internacional' => 'required',
        ];
        $message = [
            'esture_id_programa.required' => 'El campo programa es requerido',
            'esture_year.required' => 'El campo año es requerido',
            'esture_periodo.required' => 'El campo periodo es requerido',
            'esture_inscritos.required' => 'El campo inscritos es requerido',
            'esture_admitidos.required' => 'El campo admitidos es requerido',
            'esture_mat_antiguos.required' => 'El campo matriculados antiguos es requerido',
            'esture_mat_primer_semestre.required' => 'El campo matriculados primer semestre es requerido',
            'esture_mat_total.required' => 'El campo matriculados total es requerido',
            'esture_egresado_no_graduado.required' => 'El campo egresados no graduados es requerido',
            'esture_graduados.required' => 'El campo graduados es requerido',
            'esture_retirados.required' => 'El campo retirados es requerido',
            'esture_tasa_desercion.required' => 'El campo tasa de deserción es requerido',
            'esture_tasa_desercion_pro.required' => 'El campo tasa de deserción del programa es requerido',
            'esture_porcentaje_termina.required' => 'El campo porcentaje que culmina el programa es requerido',
            'esture_nro_estudiante_ies_nacional.required' => 'El campo número de estudiantes en otras IES Nacional es requerido',
            'esture_nro_estudiante_ies_internacional.required' => 'El campo número de estudiante en otra IES Internacional es requerido',
            'esture_vis_nacional.required' => 'El campo número de visitantes nacional es requerido',
            'esture_vis_internacional.required' => 'El campo número de visitantes internacional es requerido',
        ];
        $this->validate($request, $rules, $message);

        $reporte = new EstudianteReporte();
        $reporte->esture_year = $request->get('esture_year');
        $reporte->esture_id_programa = $request->get('esture_id_programa');
        $reporte->esture_periodo = $request->get('esture_periodo');
        $reporte->esture_inscritos = $request->get('esture_inscritos');
        $reporte->esture_admitidos = $request->get('esture_admitidos');
        $reporte->esture_mat_antiguos = $request->get('esture_mat_antiguos');
        $reporte->esture_mat_primer_semestre = $request->get('esture_mat_primer_semestre');
        $reporte->esture_mat_total = $request->get('esture_mat_total');
        $reporte->esture_egresado_no_graduado = $request->get('esture_egresado_no_graduado');
        $reporte->esture_graduados = $request->get('esture_graduados');
        $reporte->esture_retirados = $request->get('esture_retirados');
        $reporte->esture_tasa_desercion = $request->get('esture_tasa_desercion');
        $reporte->esture_tasa_desercion_pro = $request->get('esture_tasa_desercion_pro');
        $reporte->esture_porcentaje_termina = $request->get('esture_porcentaje_termina');
        $reporte->esture_nro_estudiante_ies_nacional = $request->get('esture_nro_estudiante_ies_nacional');
        $reporte->esture_nro_estudiante_ies_internacional = $request->get('esture_nro_estudiante_ies_internacional');
        $reporte->esture_vis_nacional = $request->get('esture_vis_nacional');
        $reporte->esture_vis_internacional = $request->get('esture_vis_internacional');

        $reporte->save();

        Alert::success('Exitoso', 'El reporte ha sido registrado con exito');
        return redirect('/estudiante/mostrarreporte');
    }

    public function verreporte($id)
    {
        $programas = Programa::all();
        $general = EstudianteReporte::find($id);
        return view('estudiante/general.show')
            ->with('programas', $programas)
            ->with('general', $general);
    }

    public function editarreporte($id)
    {
        $programas = Programa::all();
        $general = EstudianteReporte::find($id);
        return view('estudiante/general.edit')
            ->with('programas', $programas)
            ->with('general', $general);
    }

    public function actualizarreporte(Request $request, $id)
    {
        $rules = [
            'esture_id_programa' => 'required|not_in:0',
            'esture_year' => 'required',
            'esture_periodo' => 'required',
            'esture_inscritos' => 'required',
            'esture_admitidos' => 'required',
            'esture_mat_antiguos' => 'required',
            'esture_mat_primer_semestre' => 'required',
            'esture_mat_total' => 'required',
            'esture_egresado_no_graduado' => 'required',
            'esture_graduados' => 'required',
            'esture_retirados' => 'required',
            'esture_tasa_desercion' => 'required',
            'esture_tasa_desercion_pro' => 'required',
            'esture_porcentaje_termina' => 'required',
            'esture_nro_estudiante_ies_nacional' => 'required',
            'esture_nro_estudiante_ies_internacional' => 'required',
            'esture_vis_nacional' => 'required',
            'esture_vis_internacional' => 'required',
        ];
        $message = [
            'esture_id_programa.required' => 'El campo programa es requerido',
            'esture_year.required' => 'El campo año es requerido',
            'esture_periodo.required' => 'El campo periodo es requerido',
            'esture_inscritos.required' => 'El campo inscritos es requerido',
            'esture_admitidos.required' => 'El campo admitidos es requerido',
            'esture_mat_antiguos.required' => 'El campo matriculados antiguos es requerido',
            'esture_mat_primer_semestre.required' => 'El campo matriculados primer semestre es requerido',
            'esture_mat_total.required' => 'El campo matriculados total es requerido',
            'esture_egresado_no_graduado.required' => 'El campo egresados no graduados es requerido',
            'esture_graduados.required' => 'El campo graduados es requerido',
            'esture_retirados.required' => 'El campo retirados es requerido',
            'esture_tasa_desercion.required' => 'El campo tasa de deserción es requerido',
            'esture_tasa_desercion_pro.required' => 'El campo tasa de deserción del programa es requerido',
            'esture_porcentaje_termina.required' => 'El campo porcentaje que culmina el programa es requerido',
            'esture_nro_estudiante_ies_nacional.required' => 'El campo número de estudiantes en otras IES Nacional es requerido',
            'esture_nro_estudiante_ies_internacional.required' => 'El campo número de estudiante en otra IES Internacional es requerido',
            'esture_vis_nacional.required' => 'El campo número de visitantes nacional es requerido',
            'esture_vis_internacional.required' => 'El campo número de visitantes internacional es requerido',
        ];
        $this->validate($request, $rules, $message);

        $reporte = EstudianteReporte::find($id);
        $reporte->esture_year = $request->get('esture_year');
        $reporte->esture_id_programa = $request->get('esture_id_programa');
        $reporte->esture_periodo = $request->get('esture_periodo');
        $reporte->esture_inscritos = $request->get('esture_inscritos');
        $reporte->esture_admitidos = $request->get('esture_admitidos');
        $reporte->esture_mat_antiguos = $request->get('esture_mat_antiguos');
        $reporte->esture_mat_primer_semestre = $request->get('esture_mat_primer_semestre');
        $reporte->esture_mat_total = $request->get('esture_mat_total');
        $reporte->esture_egresado_no_graduado = $request->get('esture_egresado_no_graduado');
        $reporte->esture_graduados = $request->get('esture_graduados');
        $reporte->esture_retirados = $request->get('esture_retirados');
        $reporte->esture_tasa_desercion = $request->get('esture_tasa_desercion');
        $reporte->esture_tasa_desercion_pro = $request->get('esture_tasa_desercion_pro');
        $reporte->esture_porcentaje_termina = $request->get('esture_porcentaje_termina');
        $reporte->esture_nro_estudiante_ies_nacional = $request->get('esture_nro_estudiante_ies_nacional');
        $reporte->esture_nro_estudiante_ies_internacional = $request->get('esture_nro_estudiante_ies_internacional');
        $reporte->esture_vis_nacional = $request->get('esture_vis_nacional');
        $reporte->esture_vis_internacional = $request->get('esture_vis_internacional');

        $reporte->save();

        Alert::success('Exitoso', 'El reporte ha sido actualizado con exito');
        return redirect('/estudiante/mostrarreporte');
    }

    public function eliminarreporte($id)
    {
        $reporte = EstudianteReporte::find($id);
        $reporte->delete();
        Alert::success('Exitoso', 'El reporte ha sido eliminado con exito');
        return redirect('/estudiante/mostrarreporte');
    }

    /*public function export(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else { 
            return Excel::download(new EstudiantesExports, 'estudiantes.xlsx');
        }
    }

    public function listadobeca(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            return Excel::download(new BecasExport, 'estudiantes-becas.xlsx');
        }
    }

    public function listadocontado(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            return Excel::download(new ContadosExport, 'estudiantes-contado.xlsx');
        }
    }

    public function listadoprestamo(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            return Excel::download(new PrestamosExport, 'estudiantes-prestamo.xlsx');
        }
    }

    public function listadoingreso(Request $request){
        $ingreso = $request->get('estu_ingreso');
        $estudiantes = DB::table('estudiante')
        ->join('programa', 'estudiante.estu_programa','=','programa.id')
        ->where('estu_ingreso', $ingreso)
        ->get();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            $view = \view('estudiante.pdf', compact('estudiantes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('estudiantes-ingreso.pdf');
        }
    }*/
}
