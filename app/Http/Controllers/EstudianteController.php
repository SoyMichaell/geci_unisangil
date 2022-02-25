<?php

namespace App\Http\Controllers;

use App\Models\Departamento;

use App\Models\Municipio;
use App\Models\Programa;
use App\Models\Estudiante;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class EstudianteController extends Controller
{
    public function index(){
        $estudiantes = Estudiante::all();
        $programas = Programa::all();

        $ingresos = DB::table('estudiante')->select('estu_ingreso')->get();

        $programas = DB::table('programa')
        ->select('pro_nombre','pp_nombre')
        ->join('programa_plan_estudio','programa.id','=','programa_plan_estudio.pp_id_programa')
        ->get();

        if (Auth::user()->per_tipo_usuario == '3') {
            return view('estudiante.index', compact('estudiantes','ingresos'));
        } else {
            if ($programas->count() > 0) {
                return view('estudiante.index', compact('estudiantes','ingresos'));
            } else {
                Alert::warning('Requisitos', 'Primero registre un programa acádemico');
                return redirect('/home');
            }
        }
    }

    public function create(){
        $programasPlan = DB::table('programa')
        ->select('programa_plan_estudio.id','pro_nombre','pp_nombre')
        ->join('programa_plan_estudio','programa.id','=','programa_plan_estudio.pp_id_programa')
        ->get();

        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();

        $programas = Programa::all();
        $departamentos = Departamento::all();
        
        return view('estudiante.create')
            ->with('tiposdocumento', $tiposdocumento)
            ->with('programas', $programas)
            ->with('programasPlan', $programasPlan)
            ->with('departamentos', $departamentos);
    }

    public function store(Request $request){

        $rules = [
            'estu_programa' => 'required',
            'estu_programa_plan' => 'required',
            'estu_tipo_documento' => 'required',
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
            'estu_ult_matricula' => 'required',
            'estu_semestre' => 'required',
            'estu_financiamiento' => 'required',
            'estu_entidad' => 'required',
            'estu_estado' => 'required',
            'estu_matricula' => 'required'
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
            'estu_ult_matricula.required' => 'El campo ultimo periodo matriculado es requerido',
            'estu_semestre.required' => 'El campo semestre es requerido',
            'estu_financiamiento.required' => 'El campo tipo de financiamiento es requerido',
            'estu_entidad.required' => 'El campo entidad es requerido',
            'estu_estado.required' => 'El campo estado es requerido',
            'estu_matricula.required' => 'El campo matricula es requerido'
        ];

        $this->validate($request, $rules, $messages);


        $estudiantes = new Estudiante();
        $estudiantes->estu_programa = $request->get('estu_programa');
        $estudiantes->estu_programa_plan = $request->get('estu_programa_plan');
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
        $estudiantes->estu_ciudad = $request->get('estu_ciudad');
        $estudiantes->estu_fecha_nacimiento = $request->get('estu_fecha_nacimiento');
        $estudiantes->estu_ingreso = $request->get('estu_ingreso');
        $estudiantes->estu_ult_matricula = $request->get('estu_ult_matricula');
        $estudiantes->estu_semestre = $request->get('estu_semestre');
        $estudiantes->estu_financiamiento = $request->get('estu_financiamiento');
        $estudiantes->estu_entidad = $request->get('estu_entidad');
        $estudiantes->estu_estado = $request->get('estu_estado');
        $estudiantes->estu_matricula = $request->get('estu_matricula');
        $estudiantes->estu_pga = $request->get('estu_pga');
        $estudiantes->estu_reconocimiento = $request->get('estu_reconocimiento');
        $estudiantes->estu_egresado = $request->get('estu_egresado');
        $estudiantes->estu_grado = $request->get('estu_grado');
        
        $ExistEstu = DB::table('estudiante')->where('estu_numero_documento', $request->get('estu_numero_documento'));

        if ($ExistEstu->count() > 0) {
            Alert::warning('El estudiante que intenta registrar ya existe en el sistema');
            return back()->withInput();
        } else {
            $estudiantes->save();

            Alert::success('Registro Exitoso');

            return redirect('/estudiante');
        }
    }

    public function show($id){
        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();

        $programas = Programa::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $estudiante = Estudiante::find($id);
        return view('estudiante.show')->with('estudiante', $estudiante)
            ->with('programas', $programas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposdocumento', $tiposdocumento);
    }

    public function edit($id){

        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();

        $programas = Programa::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $estudiante = Estudiante::find($id);
        return view('estudiante.edit')->with('estudiante', $estudiante)
            ->with('programas', $programas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposdocumento', $tiposdocumento);
    }

    public function update(Request $request, $id){
        $rules = [
            'estu_programa' => 'required',
            //'estu_programa_plan' => 'required',
            'estu_tipo_documento' => 'required',
            'estu_numero_documento' => 'required',
            'estu_nombre' => 'required',
            'estu_apellido' => 'required',
            'estu_telefono1' => 'required',
            'estu_direccion' => 'required',
            'estu_correo' => 'required',
            'estu_estrato' => 'required',
            'estu_departamento' => 'required',
            //'estu_ciudad' => 'required',
            'estu_fecha_nacimiento' => 'required',
            'estu_ingreso' => 'required',
            'estu_ult_matricula' => 'required',
            'estu_semestre' => 'required',
            'estu_financiamiento' => 'required',
            'estu_entidad' => 'required',
            'estu_estado' => 'required',
            'estu_matricula' => 'required'
        ];

        $messages = [
            'estu_programa.required' => 'El campo programa es requerido',
            //'estu_programa_plan.required' => 'El campo plan de estudio es requerido',
            'estu_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'estu_numero_documento.required' => 'El campo número de documento es requerido',
            'estu_nombre.required' => 'El campo nombre es requerido',
            'estu_apellido.required' => 'El campo apellido es requerido',
            'estu_telefono1.required' => 'El campo telefono 1 es requerido',
            'estu_direccion.required' => 'El campo dirección es requerido',
            'estu_correo.required' => 'El campo correo es requerido',
            'estu_estrato.required' => 'El campo estrato es requerido',
            'estu_departamento.required' => 'El campo departamento es requerido',
            //'estu_ciudad.required' => 'El campo sede es requerido',
            'estu_fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
            'estu_ingreso.required' => 'El campo año de ingreso es requerido',
            'estu_ult_matricula.required' => 'El campo ultimo periodo matriculado es requerido',
            'estu_semestre.required' => 'El campo semestre es requerido',
            'estu_financiamiento.required' => 'El campo tipo de financiamiento es requerido',
            'estu_entidad.required' => 'El campo entidad es requerido',
            'estu_estado.required' => 'El campo estado es requerido',
            'estu_matricula.required' => 'El campo matricula es requerido'
        ];

        $this->validate($request, $rules, $messages);


        $estudiantes = Estudiante::find($id);
        $estudiantes->estu_programa = $request->get('estu_programa');
        $estudiantes->estu_programa_plan = $request->get('estu_programa_plan');
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
        $estudiantes->estu_ciudad = $request->get('estu_ciudad');
        $estudiantes->estu_fecha_nacimiento = $request->get('estu_fecha_nacimiento');
        $estudiantes->estu_ingreso = $request->get('estu_ingreso');
        $estudiantes->estu_ult_matricula = $request->get('estu_ult_matricula');
        $estudiantes->estu_semestre = $request->get('estu_semestre');
        $estudiantes->estu_financiamiento = $request->get('estu_financiamiento');
        $estudiantes->estu_entidad = $request->get('estu_entidad');
        $estudiantes->estu_estado = $request->get('estu_estado');
        $estudiantes->estu_matricula = $request->get('estu_matricula');
        $estudiantes->estu_pga = $request->get('estu_pga');
        $estudiantes->estu_reconocimiento = $request->get('estu_reconocimiento');
        $estudiantes->estu_egresado = $request->get('estu_egresado');
        $estudiantes->estu_grado = $request->get('estu_grado');

        $estudiantes->save();
        
        Alert::success('Registro Actualizado');

        return redirect('/estudiante');
    }

    public function destroy($id){
        $estudiante = Estudiante::find($id);

        //$veriMovi = DB::table('movilidad')->where('mov_id_estudiante', $id);
        //$veriPru = DB::table('pruebas_saber')->where('pr_id_estudiante', $id);
        /*$veriPra = DB::table('practicas')->where('pra_id_estudiante', $id);

        if ($veriMovi->count() > 0) {
            Alert::warning('No se pude eliminar el estudiante, debido a que esta asociado a otra entidad');
            return redirect('/estudiante');
        } else if ($veriPru->count() > 0) {
            Alert::warning('No se pude eliminar el estudiante, debido a que esta asociado a otra entidad');
            return redirect('/estudiante');
        } else if ($veriPra->count() > 0) {
            Alert::warning('No se pude eliminar el estudiante, debido a que esta asociado a otra entidad');
            return redirect('/estudiante');
        } else {*/
            $estudiante->delete();


            Alert::success('Registro Eliminado');

            return redirect('/estudiante');
        //}
    }

    /*public function pdf(){
        $estudiantes = DB::table('estudiantes')
        ->join('tipo_documento', 'estudiantes.estu_tipo_documento','=','tipo_documento.id')
        ->join('programas', 'estudiantes.estu_programa','=','programas.id')
        ->get();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {
            $view = \view('estudiante.pdf', compact('estudiantes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'estudiantes'
            ]);

            return $pdf->stream('estudiantes-reporte.pdf');
        }
    }

    public function export()
    {
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else { 

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'estudiantes'
            ]);

            return Excel::download(new EstudiantesExport, 'estudiantes.xlsx');
        }
    }

    public function listadobeca(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel.beca',
                'modulo' => 'estudiantes'
            ]);

            return Excel::download(new BecasExport, 'estudiantes-becas.xlsx');
        }
    }

    public function listadocontado(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel.contado',
                'modulo' => 'estudiantes'
            ]);

            return Excel::download(new ContadosExport, 'estudiantes-contado.xlsx');
        }
    }*/

    /*public function listadoprestamo(){
        $estudiantes = Estudiante::all();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/estudiante');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel.prestamo',
                'modulo' => 'estudiantes'
            ]);

            return Excel::download(new PrestamosExport, 'estudiantes-prestamo.xlsx');
        }
    }

    public function listadoingreso(Request $request){
        $ingreso = $request->get('estu_ingreso');
        $estudiantes = DB::table('estudiantes')
        ->join('tipo_documento', 'estudiantes.estu_tipo_documento','=','tipo_documento.id')
        ->join('programas', 'estudiantes.estu_programa','=','programas.id')
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

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf.ingreso',
                'modulo' => 'estudiantes'
            ]);

            return $pdf->stream('estudiantes-ingreso.pdf');
        }
    }*/

}