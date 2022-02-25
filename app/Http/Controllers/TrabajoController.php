<?php
namespace App\Http\Controllers;

use App\Exports\TrabajosExport;
use App\Models\Trabajo;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\ModalidadGrado;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TrabajoController extends Controller
{
    public function index(){
        $trabajos = Trabajo::all();
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();

        return view('trabajo.index')->with('trabajos', $trabajos);

    }

    public function create(){
        $estudiantes = Estudiante::all();

        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();

        $modalidades = ModalidadGrado::all();
        
        return view('trabajo.create')
            ->with('estudiantes', $estudiantes)
            ->with('personas', $personas)
            ->with('modalidades', $modalidades);
    }

    public function store(Request $request){

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

        $trabajos = new Trabajo();
        $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
        $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
        $estudiantes = $request->get('tra_id_estudiante');
        foreach ($estudiantes as $estudiante) {
            $trabajos->tra_id_estudiante = $estudiante;
        }
        $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
        $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');
        $trabajos->tra_id_director = $request->get('tra_id_director');
        $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
        $trabajos->tra_id_proceso = 1;

        $trabajos->save();

        Alert::success('Registro Exitoso');

        return redirect('/trabajo');
    }

    public function show($id){
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $trabajo = Trabajo::find($id);
        return view('trabajo.show')->with('estudiantes', $estudiantes)
            ->with('docentes', $docentes)
            ->with('trabajo', $trabajo);
    }

    public function edit($id){
        $estudiantes = Estudiante::all();
        
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 4)
            ->orWhere('per_tipo_usuario', 5)
            ->get();

        $trabajo = Trabajo::find($id);
        $modalidades = ModalidadGrado::all();
        return view('trabajo.edit')->with('estudiantes', $estudiantes)
            ->with('personas', $personas)
            ->with('trabajo', $trabajo)
            ->with('modalidades', $modalidades);
    }

    public function update(Request $request, $id){
        
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

        $trabajos = Trabajo::find($id);
        $trabajos->tra_codigo_proyecto = $request->get('tra_codigo_proyecto');
        $trabajos->tra_titulo_proyecto = $request->get('tra_titulo_proyecto');
        $estudiantes = $request->get('tra_id_estudiante');
        foreach ($estudiantes as $estudiante) {
            $trabajos->tra_id_estudiante = $estudiante;
        }
        $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
        $trabajos->tra_modalidad_grado = $request->get('tra_modalidad_grado');
        $trabajos->tra_id_director = $request->get('tra_id_director');
        $trabajos->tra_id_codirector = $request->get('tra_id_codirector');
        $trabajos->tra_id_proceso = 1;

        $trabajos->save();

        Alert::success('Registro Actualizado');

        return redirect('/trabajo');

    }

    public function faseestado(Request $request, $id){
        
        $rules = 
        [
            'tra_estado_propuesta' => 'required',
            'tra_estado_proyecto' => 'required',
        ];

        $message = [
            'tra_estado_propuesta.required' => 'El campo estado propuesta es requerido',
            'tra_estado_proyecto.required' => 'El campo estado proyecto es requerido'
        ];

        $this->validate($request,$rules,$message);

        $trabajos = Trabajo::find($id);
        $trabajos->tra_estado_propuesta = $request->get('tra_estado_propuesta');
        $trabajos->tra_estado_proyecto = $request->get('tra_estado_proyecto');
        $trabajos->tra_id_proceso = 2;
        $trabajos->save();

        Alert::success('Exitoso', 'Se ha registrado la información con exito');
        return redirect('/trabajo');
    }

    public function fasejurado(Request $request, $id){
        $rules = [
            'tra_id_jurado1' => 'required',
            'tra_id_jurado2' => 'required',
        ];
        
        $message = [
            'tra_id_jurado1.required' => 'El campo jurado 1 es requerido',
            'tra_id_jurado2.required' => 'El campo jurado 2 es requerido',
        ];

        $this->validate($request,$rules,$message);

        $trabajos = Trabajo::find($id);
        $trabajos->tra_id_jurado1 = $request->get('tra_id_jurado1');
        $trabajos->tra_id_jurado2 = $request->get('tra_id_jurado2');
        $trabajos->tra_id_proceso = 3;
        $trabajos->save();

        Alert::success('Exitoso', 'Se ha registrado la información con exito');
        return redirect('/trabajo');
    }

    public function destroy($id){
        $trabajo = Trabajo::find($id);
        $trabajo->delete();

        Alert::success('Registro Eliminado');
        return redirect('/trabajo');
    }

    /*public function pdf(Request $request)
    {
        $trabajos = Trabajo::all();
        if ($trabajos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/trabajo');
        } else {
            $view = \view('trabajo.pdf', compact('trabajos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'trabajo_grado'
            ]);

            return $pdf->stream('trabajos-grado-reporte.pdf');
        }
    }

    public function export()
    {
        $trabajos = Trabajo::all();
        if ($trabajos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/trabajo');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'trabajo_grado'
            ]);

            return Excel::download(new TrabajosExport, 'trabajos_grado.xlsx');
        }
    }*/
}