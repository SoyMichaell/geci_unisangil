<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Docente;
use App\Models\Facultad;
use App\Models\Metodologia;
use App\Models\Municipio;
use App\Models\NivelFormacion;
use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\ProgramaHorario;
use App\Models\ProgramaPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramaController extends Controller
{
    public function index(){
        $programas = Programa::all();
        $facultades = Facultad::all();
        $municipios = Municipio::all();
        $plans = ProgramaPlan::all();
        $users = DB::table('users')->where('per_tipo_usuario', 2);
        return view('programa.index')
            ->with('programas', $programas)
            ->with('facultades', $facultades)
            ->with('municipios', $municipios)
            ->with('plans', $plans)
            ->with('users', $users);
    }

    public function create(){
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();

        $docentes = DB::table('persona')
            ->where('per_tipo_usuario',2)
            ->where('per_id_estado', '=', 'activo')
            ->orWhere('per_tipo_usuario',5)
            ->where('per_id_estado', '=', 'activo')
            ->get();

        /*collect*/
        $estadoprogramas = collect(['Activo','Inactivo']);
        $estadoprogramas->all();
        $programasCiclo = collect(['Si','No']);
        $programasCiclo->all();
        $duraccions = collect([1,2,3,4,5,6,7,8,9,10]);
        $duraccions->all();
        $periodoAdmision = collect(['Trimestral','Semestral','Anual']);
        $periodoAdmision->all();

        return view('programa.create')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('docentes', $docentes)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('programasCiclo', $programasCiclo)
            ->with('duraccions', $duraccions)
            ->with('periodoAdmision', $periodoAdmision);
    }

    public function store(Request $request){

        $rules = [
            'pro_nombre' => 'required',
            'pro_titulo' => 'required',
            'pro_codigosnies' => 'required',
            'pro_resolucion' => 'required',
            'pro_fecha_ult' => 'required',
            'pro_fecha_prox' => 'required',
            'pro_norma' => 'required'
        ];

        $messages = [
            'pro_nombre.required' => 'El campo programa es requerido',
            'pro_titulo.required' => 'El campo titulo es requerido',
            'pro_codigosnies.required' => 'El campo codigo snies es requerido',
            'pro_resolucion.required' => 'El campo resolución es requerido',
            'pro_fecha_ult.required' => 'El campo fecha ultimo registro es requerido',
            'pro_fecha_prox.required' => 'El campo fecha próximo registro es requerido',
            'pro_norma.required' => 'El campo norma de creación programa es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $programas = new Programa();
        $programas->pro_estado = $request->get('pro_estado_programa');
        $programas->pro_departamento = $request->get('pro_departamento');
        $programas->pro_municipio = $request->get('pro_municipio');
        $programas->pro_facultad = $request->get('pro_facultad');
        $programas->pro_nombre = $request->get('pro_nombre');
        $programas->pro_titulo = $request->get('pro_titulo');
        $programas->pro_codigosnies = $request->get('pro_codigosnies');
        $programas->pro_resolucion = $request->get('pro_resolucion');
        $programas->pro_fecha_ult = $request->get('pro_fecha_ult');
        $programas->pro_fecha_prox = $request->get('pro_fecha_prox');
        $programas->pro_nivel_formacion = $request->get('pro_nivel_formacion');
        $programas->pro_programa_ciclo = $request->get('pro_programa_ciclos');
        $programas->pro_metodologia = $request->get('pro_metodologia');
        $programas->pro_duraccion = $request->get('pro_duraccion');
        $programas->pro_periodo_admision = $request->get('pro_periodo');
        $programas->pro_tipo_norma = $request->get('pro_norma');
        $programas->pro_id_director = $request->get('pro_director_programa');

        /*$valiDi = DB::table('programas')->where('pro_director_programa', $request->get('pro_director_programa'));
        $sniesDi = DB::table('programas')->where('pro_codigosnies', $request->get('pro_codigosnies'));

        if ($valiDi->count() > 0) {
            Alert::warning('El docente elegido como director de programa, ya esta asociado a un programa');
            return back()->withInput();
        } else if ($sniesDi->count() > 0) {
            Alert::warning('El programa que esta intentando inscribir, ya se encuentra registrado');
            return back()->withInput();
        } else {*/
        $programas->save();


        Alert::success('Registro Exitoso');

        return redirect('/programa');
    }

    public function show($id){
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = Docente::all();
        $programa = Programa::find($id);
        return view('programa.show')->with('programa', $programa)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('docentes', $docentes);
    }

    public function edit($id){
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = Docente::all();
        $programa = Programa::find($id);
        return view('programa.show')->with('programa', $programa)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('docentes', $docentes);
    }

    public function update(Request $request, $id){
        $programa = Programa::find($id);
        $programa->pro_estado = $request->get('pro_estado_programa');
        $programa->pro_departamento = $request->get('pro_departamento');
        $programa->pro_municipio = $request->get('pro_municipio');
        $programa->pro_facultad = $request->get('pro_facultad');
        $programa->pro_nombre = $request->get('pro_nombre');
        $programa->pro_titulo = $request->get('pro_titulo');
        $programa->pro_codigosnies = $request->get('pro_codigosnies');
        $programa->pro_resolucion = $request->get('pro_resolucion');
        $programa->pro_fecha_ult = $request->get('pro_fecha_ult');
        $programa->pro_fecha_prox = $request->get('pro_fecha_prox');
        $programa->pro_nivel_formacion = $request->get('pro_nivel_formacion');
        $programa->pro_programa_ciclos = $request->get('pro_programa_ciclos');
        $programa->pro_metodologia = $request->get('pro_metodologia');
        $programa->pro_duraccion = $request->get('pro_duraccion');
        $programa->pro_periodo = $request->get('pro_periodo');
        $programa->pro_norma = $request->get('pro_norma');
        $programa->pro_director_programa = $request->get('pro_director_programa');

        $programa->save();

        Alert::success('Registro Actualizado');

        return redirect('/programa');
    }

    public function destroy($id){
        $programa = Programa::find($id);

        /*$veriEstu = DB::table('estudiantes')->where('estu_programa', $id);
        $veriInve = DB::table('investigacion')->where('inv_programa', $id);
        $veriPrue = DB::table('pruebas_saber')->where('pr_id_programa', $id);
        $veriLab = DB::table('uso_laboratorio')->where('lab_id_programa', $id);

        if ($veriEstu->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriInve->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriPrue->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriLab->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else {*/
        $programa->delete();



        Alert::success('Registro Eliminado');

        return redirect('/programa');
    }

    public function mostrarplan(){
        $plans = ProgramaPlan::all();
        return view('programa/plan.index')
        ->with('plans', $plans);
    }

    public function crearplan(){
        $programas = Programa::all();
        $municipios = Municipio::all();
        return view('programa/plan.create')
        ->with('programas', $programas)
        ->with('municipios', $municipios);
    }

    public function registroplan(Request $request){
        $rules = [
            'pp_id_sede' => 'required|not_in:0',
            'pp_id_programa' => 'required|not_in:0',
            'pp_plan' => 'required',
            'pp_creditos' => 'required',
            'pp_no_asignaturas' => 'required',
            'pp_estado' => 'required',
        ];

        $messages = [
            'pp_id_sede.required' => 'El campo sede es requiredo',
            'pp_id_programa.required' => 'El campo programa es requerido',
            'pp_plan.required' => 'El campo nombre plan es requerido',
            'pp_creditos.required' => 'El campo no. creditos es requiredo',
            'pp_no_asignaturas.required' => 'El campo no. asignaturas es requerido',
            'pp_estado.required' => 'El campo estado es requerido'
        ];

        $this->validate($request,$rules,$messages);

        $plan = new ProgramaPlan();
        $plan->pp_id_sede = $request->get('pp_id_sede');
        $plan->pp_id_programa = $request->get('pp_id_programa');
        $plan->pp_plan = $request->get('pp_plan');
        $plan->pp_creditos = $request->get('pp_creditos');
        $plan->pp_no_asignaturas = $request->get('pp_no_asignaturas');
        $plan->pp_estado = $request->get('pp_estado');
        
        $plan->save();
        
        Alert::success('Exitoso','El plan de estudio se creo');
        return redirect('programa/mostrarplan');
    }

    public function editarplan($id){
        $programas = Programa::all();
        $municipios = Municipio::all();
        $plan = ProgramaPlan::find($id);
        return view('programa/plan.edit')
        ->with('programas', $programas)
        ->with('municipios', $municipios)
        ->with('plan', $plan);
    }

    public function actualizarplan(Request $request, $id){
        $rules = [
            'pp_id_sede' => 'required|not_in:0',
            'pp_id_programa' => 'required|not_in:0',
            'pp_plan' => 'required',
            'pp_creditos' => 'required',
            'pp_no_asignaturas' => 'required',
            'pp_estado' => 'required',
        ];

        $messages = [
            'pp_id_sede.required' => 'El campo sede es requiredo',
            'pp_id_programa.required' => 'El campo programa es requerido',
            'pp_plan.required' => 'El campo nombre plan es requerido',
            'pp_creditos.required' => 'El campo no. creditos es requiredo',
            'pp_no_asignaturas.required' => 'El campo no. asignaturas es requerido',
            'pp_estado.required' => 'El campo estado es requerido'
        ];

        $this->validate($request,$rules,$messages);

        $plan = ProgramaPlan::find($id);
        $plan->pp_id_sede = $request->get('pp_id_sede');
        $plan->pp_id_programa = $request->get('pp_id_programa');
        $plan->pp_plan = $request->get('pp_plan');
        $plan->pp_creditos = $request->get('pp_creditos');
        $plan->pp_no_asignaturas = $request->get('pp_no_asignaturas');
        $plan->pp_estado = $request->get('pp_estado');
        
        $plan->save();
        
        Alert::success('Exitoso','El plan de estudio se ha actualizado');
        return redirect('programa/mostrarplan');
    }

    public function estado($id){
        
        $estado = DB::table('programa_plan_estudio')
            ->where('id', $id)
            ->first();

        if($estado->pp_estado == 'activo'){
            DB::table('programa_plan_estudio')
                ->where('programa_plan_estudio.id',$id)
                ->update([
                    'pp_estado' => 'inactivo'
                ]);

            Alert::success('Estado','El estado ha sido actualizado');
            return redirect('programa/mostrarplan');
        }else if($estado->pp_estado == 'inactivo'){
            DB::table('programa_plan_estudio')
                ->where('programa_plan_estudio.id',$id)
                ->update([
                    'pp_estado' => 'activo'
                ]);

                Alert::success('Estado','El estado ha sido actualizado');
            return redirect('programa/mostrarplan');
        }
    }

    public function mostrarasignatura(){
        $asignaturas = ProgramaAsignatura::all();
        $plans = ProgramaPlan::all();
        $programas = Programa::all();
        $municipios = Municipio::all();
        return view('programa/asignatura.index')
            ->with('asignaturas', $asignaturas)
            ->with('plans', $plans)
            ->with('programas', $programas)
            ->with('municipios', $municipios);
    }

    public function crearasignatura(){
        $municipios = Municipio::all();
        $programas = Programa::all();
        $plans = ProgramaPlan::all();
        return view('programa/asignatura.create')
            ->with('municipios', $municipios)
            ->with('programas', $programas)
            ->with('plans', $plans);
    }

    public function registroasignatura (Request $request){
        $rules = [
            'asig_id_sede' => 'required|not_in:0',
            'asig_id_programa' => 'required|not_in:0',
            'asig_id_plan_estudio' => 'required|not_in:0',
            'asig_codigo' => 'required',
            'asig_nombre' => 'required',
            'asig_no_creditos' => 'required',
            'asig_no_semanales' => 'required',
            'asig_no_semestre' => 'required',
            'asig_estado' => 'required',
        ];

        $message = [
            'asig_id_sede.required' => 'El campo sede es requerido',
            'asig_id_programa.required' => 'El campo programa es requerido',
            'asig_id_plan_estudio.required' => 'El campo plan de estudio es requerido',
            'asig_codigo.required' => 'El campo código asignatura es requerido',
            'asig_nombre.required' => 'El campo nombre asignatura es requerido',
            'asig_no_creditos.required' => 'El campo número creditos es requerido',
            'asig_no_semanales.required' => 'El campo horas semanales es requerido',
            'asig_no_semestre.required' => 'El campo horas semestre es requerido',
            'asig_estado.required' => 'El campo estado es requerido',
        ];

        $this->validate($request,$rules,$message);

        $asignatura = new ProgramaAsignatura();
        $asignatura->asig_id_sede = $request->get('asig_id_sede');
        $asignatura->asig_id_programa = $request->get('asig_id_programa');
        $asignatura->asig_id_plan_estudio = $request->get('asig_id_plan_estudio');
        $asignatura->asig_codigo = $request->get('asig_codigo');
        $asignatura->asig_nombre = $request->get('asig_nombre');
        $asignatura->asig_no_creditos = $request->get('asig_no_creditos');
        $asignatura->asig_no_semanales = $request->get('asig_no_semanales');
        $asignatura->asig_no_semestre = $request->get('asig_no_semestre');
        $asignatura->asig_estado = $request->get('asig_estado');

        $asignatura->save();

        Alert::success('Exitoso', 'La asignatura se ha creado con exito');
        return redirect('/programa/mostrarasignatura');
    }

    public function editarasignatura($id,){
        $municipios = Municipio::all();
        $programas = Programa::all();
        $plans = ProgramaPlan::all();
        $asignatura = ProgramaAsignatura::find($id);
        return view('programa/asignatura.edit')
            ->with('municipios', $municipios)
            ->with('programas', $programas)
            ->with('plans', $plans)
            ->with('asignatura', $asignatura);
    }

    public function actualizarasignatura(Request $request, $id){
        $rules = [
            'asig_id_sede' => 'required|not_in:0',
            'asig_id_programa' => 'required|not_in:0',
            'asig_id_plan_estudio' => 'required|not_in:0',
            'asig_codigo' => 'required',
            'asig_nombre' => 'required',
            'asig_no_creditos' => 'required',
            'asig_no_semanales' => 'required',
            'asig_no_semestre' => 'required',
            'asig_estado' => 'required',
        ];

        $message = [
            'asig_id_sede.required' => 'El campo sede es requerido',
            'asig_id_programa.required' => 'El campo programa es requerido',
            'asig_id_plan_estudio.required' => 'El campo plan de estudio es requerido',
            'asig_codigo.required' => 'El campo código asignatura es requerido',
            'asig_nombre.required' => 'El campo nombre asignatura es requerido',
            'asig_no_creditos.required' => 'El campo número creditos es requerido',
            'asig_no_semanales.required' => 'El campo horas semanales es requerido',
            'asig_no_semestre.required' => 'El campo horas semestre es requerido',
            'asig_estado.required' => 'El campo estado es requerido',
        ];

        $this->validate($request,$rules,$message);

        $asignatura = ProgramaAsignatura::find($id);
        $asignatura->asig_id_sede = $request->get('asig_id_sede');
        $asignatura->asig_id_programa = $request->get('asig_id_programa');
        $asignatura->asig_id_plan_estudio = $request->get('asig_id_plan_estudio');
        $asignatura->asig_codigo = $request->get('asig_codigo');
        $asignatura->asig_nombre = $request->get('asig_nombre');
        $asignatura->asig_no_creditos = $request->get('asig_no_creditos');
        $asignatura->asig_no_semanales = $request->get('asig_no_semanales');
        $asignatura->asig_no_semestre = $request->get('asig_no_semestre');
        $asignatura->asig_estado = $request->get('asig_estado');

        $asignatura->save();

        Alert::success('Exitoso', 'La asignatura se actualizo con exito');
        return redirect('/programa/mostrarasignatura');
    }

    public function eliminarasignatura($id){
        $asignatura = ProgramaAsignatura::find($id);
        $asignatura->delete();
        Alert::success('Exitoso','La asignatura se elimino correctamente');
        return redirect('programa/mostrarasignatura');
    }

    public function mostrarhorario(){
        $horarios = ProgramaHorario::all();
        return view('programa/horario.index')
            ->with('horarios', $horarios);
    }

    public function crearhorario(){
        $horarios = ProgramaHorario::all();
        $asignaturas = ProgramaAsignatura::all();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('programa/horario.create')
            ->with('asignaturas', $asignaturas)
            ->with('personas', $personas)
            ->with('horarios', $horarios);
    }

    public function registrohorario(Request $request){
        $rules = [
            'pph_year' => 'required',
            'pph_semestre' => 'required|not_in:0',
            'pph_id_asignatura' => 'required|not_in:0',
            'pph_grupo' => 'required',
            'pph_id_docente' => 'required|not_in:0',
        ];
        $message = [
            'pph_year.required' => 'El campo año es requerido',
            'pph_semestre.required' => 'El campo semestre es requerido',
            'pph_id_asignatura.required' => 'El campo asignatura es requerido',
            'pph_grupo.required' => 'El campo grupo es requerido',
            'pph_id_docente.required' => 'El campo docente es requerido',
        ];
        $this->validate($request,$rules,$message);

        $horario = new ProgramaHorario();
        $horario->pph_year = $request->get('pph_year');
        $horario->pph_semestre = $request->get('pph_semestre');
        $horario->pph_id_asignatura = $request->get('pph_id_asignatura');
        $horario->pph_grupo = $request->get('pph_grupo');
        $horario->pph_id_docente = $request->get('pph_id_docente');
        $horario->pph_horario = $request->get('pph_horario');
        $horario->pph_aula = $request->get('pph_aula');

        $horario->save();

        Alert::success('Exitoso','Materia asignada a docente y horario');
        return redirect('programa/mostrarhorario');
    }

    public function editarhorario($id){
        $horario = ProgramaHorario::find($id);
        $asignaturas = ProgramaAsignatura::all();
        $personas = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->orWhere('per_tipo_usuario', 5)
            ->get();
        return view('programa/horario.edit')
            ->with('asignaturas', $asignaturas)
            ->with('personas', $personas)
            ->with('horario', $horario);
    }

    public function actualizarhorario(Request $request, $id){
        $rules = [
            'pph_year' => 'required',
            'pph_semestre' => 'required|not_in:0',
            'pph_id_asignatura' => 'required|not_in:0',
            'pph_grupo' => 'required',
            'pph_id_docente' => 'required|not_in:0',
        ];
        $message = [
            'pph_year.required' => 'El campo año es requerido',
            'pph_semestre.required' => 'El campo semestre es requerido',
            'pph_id_asignatura.required' => 'El campo asignatura es requerido',
            'pph_grupo.required' => 'El campo grupo es requerido',
            'pph_id_docente.required' => 'El campo docente es requerido',
        ];
        $this->validate($request,$rules,$message);

        $horario = ProgramaHorario::find($id);
        $horario->pph_year = $request->get('pph_year');
        $horario->pph_semestre = $request->get('pph_semestre');
        $horario->pph_id_asignatura = $request->get('pph_id_asignatura');
        $horario->pph_grupo = $request->get('pph_grupo');
        $horario->pph_id_docente = $request->get('pph_id_docente');
        $horario->pph_horario = $request->get('pph_horario');
        $horario->pph_aula = $request->get('pph_aula');

        $horario->save();

        Alert::success('Exitoso','Asignación a docente y horario actualizada');
        return redirect('programa/mostrarhorario');
    }

    public function eliminarhorario($id){
        $horario = ProgramaHorario::find($id);
        $horario->delete();
        Alert::success('Exitoso','Asignación docente y horario eliminada');
        return redirect('programa/mostrarhorario');
    }

    public function selectivoplan($id){
        return DB::table('programa_plan_estudio')->where('pp_id_programa', $id)->get();
    }

    public function selectivomunicipio($id){
        return DB::table('municipio')->where('mun_departamento', $id)->get();
    }  
}
