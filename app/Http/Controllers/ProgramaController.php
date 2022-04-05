<?php

namespace App\Http\Controllers;

use App\Exports\ProgramaExport;
use App\Models\Departamento;
use App\Models\Facultad;
use App\Models\Metodologia;
use App\Models\Municipio;
use App\Models\NivelFormacion;
use App\Models\Programa;
use App\Models\ProgramaAsignatura;
use App\Models\ProgramaHorario;
use App\Models\ProgramaPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramaController extends Controller
{
    public function index()
    {
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

    public function create()
    {

        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();

        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->where('per_id_estado', '=', 'activo')
            ->orWhere('per_tipo_usuario', 5)
            ->where('per_id_estado', '=', 'activo')
            ->get();

        /*collect*/
        $estadoprogramas = collect(['Activo', 'Inactivo']);
        $estadoprogramas->all();
        $programasCiclo = collect(['Si', 'No']);
        $programasCiclo->all();
        $duraccions = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $duraccions->all();
        $periodoAdmision = collect(['Trimestral', 'Semestral', 'Anual']);
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

    public function store(Request $request)
    {

        $rules = [
            'pro_nombre' => 'required',
            'pro_titulo' => 'required',
            'pro_codigosnies' => 'required',
            'pro_resolucion' => 'required',
            'pro_fecha_ult' => 'required',
            'pro_fecha_prox' => 'required',
            'pro_norma' => 'required',
            'pro_grupo_referencia' => 'required',
            'pro_grupo_referencia_nbc' => 'required',
        ];

        $messages = [
            'pro_nombre.required' => 'El campo programa es requerido',
            'pro_titulo.required' => 'El campo titulo es requerido',
            'pro_codigosnies.required' => 'El campo codigo snies es requerido',
            'pro_resolucion.required' => 'El campo resolución es requerido',
            'pro_fecha_ult.required' => 'El campo fecha ultimo registro es requerido',
            'pro_fecha_prox.required' => 'El campo fecha próximo registro es requerido',
            'pro_norma.required' => 'El campo norma de creación programa es requerido',
            'pro_grupo_referencia.required' => 'El campo grupo de referencia es requerido',
            'pro_grupo_referencia_nbc.required' => 'El campo grupo de referencia (NBC) es requerido'
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
        $programas->pro_grupo_referencia = $request->get('pro_grupo_referencia');
        $programas->pro_grupo_referencia_nbc = $request->get('pro_grupo_referencia_nbc');
        $programas->pro_tipo_norma = $request->get('pro_norma');
        $programas->pro_id_director = $request->get('pro_director_programa');

        $ExisteDirector = DB::table('programa')->where('pro_id_director', $request->get('pro_director_programa'))->get();

        if ($ExisteDirector->count() > 0) {
            Alert::warning('Advertencia', 'El docente elegido como director de programa, ya esta asociado a un programa');
            return back()->withInput();
        } else {
            $programas->save();
            Alert::success('Exitoso', 'El programa se ha registrado con exito');
            return redirect('/programa');
        }
    }

    public function show($id)
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario', 2)
            ->where('per_id_estado', '=', 'activo')
            ->orWhere('per_tipo_usuario', 5)
            ->where('per_id_estado', '=', 'activo')
            ->get();
        $programa = DB::table('programa')
            ->select(
                'programa.id',
                'pro_nombre',
                'per_nombre',
                'per_apellido',
                'pro_grupo_referencia',
                'fac_nombre',
                'niv_nombre',
                'met_nombre',
                'mun_nombre',
                'pro_duraccion',
                'pro_codigosnies',
                'pro_resolucion',
                'pro_fecha_ult',
                'pro_fecha_prox',
                'pro_programa_ciclo',
                'pro_periodo_admision',
                'pro_grupo_referencia_nbc'
            )
            ->join('facultad', 'programa.pro_facultad', '=', 'facultad.id')
            ->join('municipio', 'programa.pro_municipio', '=', 'municipio.id')
            ->join('nivel_formacion', 'programa.pro_nivel_formacion', '=', 'nivel_formacion.id')
            ->join('metodologia', 'programa.pro_metodologia', '=', 'metodologia.id')
            ->join('persona', 'programa.pro_id_director', '=', 'persona.id')
            ->where('programa.id', $id)
            ->first();
        $planes = DB::table('programa_plan_estudio')
            ->where('pp_id_programa', $id)
            ->get();
        $estadoprogramas = collect(['Activo', 'Inactivo']);
        $estadoprogramas->all();
        $programasCiclo = collect(['Si', 'No']);
        $programasCiclo->all();
        $duraccions = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $duraccions->all();
        $periodoAdmision = collect(['Trimestral', 'Semestral', 'Anual']);
        $periodoAdmision->all();
        return view('programa.show')
            ->with('programa', $programa)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('docentes', $docentes)
            ->with('programasCiclo', $programasCiclo)
            ->with('duraccions', $duraccions)
            ->with('periodoAdmision', $periodoAdmision)
            ->with('planes', $planes);
    }

    public function edit($id)
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
            $departamentos = Departamento::all();
            $municipios = Municipio::all();
            $facultades = Facultad::all();
            $niveles = NivelFormacion::all();
            $metodologias = Metodologia::all();
            $docentes = DB::table('persona')
                ->where('per_tipo_usuario', 2)
                ->where('per_id_estado', '=', 'activo')
                ->orWhere('per_tipo_usuario', 5)
                ->where('per_id_estado', '=', 'activo')
                ->get();
            $programa = Programa::find($id);
            $estadoprogramas = collect(['Activo', 'Inactivo']);
            $estadoprogramas->all();
            $programasCiclo = collect(['Si', 'No']);
            $programasCiclo->all();
            $duraccions = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            $duraccions->all();
            $periodoAdmision = collect(['Trimestral', 'Semestral', 'Anual']);
            $periodoAdmision->all();
            return view('programa.edit')->with('programa', $programa)
                ->with('departamentos', $departamentos)
                ->with('municipios', $municipios)
                ->with('facultades', $facultades)
                ->with('estadoprogramas', $estadoprogramas)
                ->with('niveles', $niveles)
                ->with('metodologias', $metodologias)
                ->with('docentes', $docentes)
                ->with('programasCiclo', $programasCiclo)
                ->with('duraccions', $duraccions)
                ->with('periodoAdmision', $periodoAdmision);
        } else {
            return redirect('/home');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'pro_nombre' => 'required',
            'pro_titulo' => 'required',
            'pro_codigosnies' => 'required',
            'pro_resolucion' => 'required',
            'pro_fecha_ult' => 'required',
            'pro_fecha_prox' => 'required',
            'pro_norma' => 'required',
            'pro_grupo_referencia' => 'required',
            'pro_grupo_referencia_nbc' => 'required',
        ];

        $messages = [
            'pro_nombre.required' => 'El campo programa es requerido',
            'pro_titulo.required' => 'El campo titulo es requerido',
            'pro_codigosnies.required' => 'El campo codigo snies es requerido',
            'pro_resolucion.required' => 'El campo resolución es requerido',
            'pro_fecha_ult.required' => 'El campo fecha ultimo registro es requerido',
            'pro_fecha_prox.required' => 'El campo fecha próximo registro es requerido',
            'pro_norma.required' => 'El campo norma de creación programa es requerido',
            'pro_grupo_referencia.required' => 'El campo grupo de referencia es requerido',
            'pro_grupo_referencia_nbc.required' => 'El campo grupo de referencia (NBC) es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $programas = Programa::find($id);
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
        $programas->pro_grupo_referencia = $request->get('pro_grupo_referencia');
        $programas->pro_grupo_referencia_nbc = $request->get('pro_grupo_referencia_nbc');
        $programas->pro_tipo_norma = $request->get('pro_norma');
        $programas->pro_id_director = $request->get('pro_director_programa');

        $programas->save();
        Alert::success('Exitoso', 'El programa se ha actulizado con exito');
        return redirect('/programa');
    }

    public function destroy($id)
    {
        try {
            $programa = Programa::find($id);
            $programa->delete();

            Alert::success('Exitoso', 'El programa se ha eliminado con exito');

            return redirect('/programa');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar este programa, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarplan()
    {
        $plans = ProgramaPlan::all();
        return view('programa/plan.index')
            ->with('plans', $plans);
    }

    public function crearplan()
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
            $programas = Programa::all();
            $municipios = Municipio::all();
            return view('programa/plan.create')
                ->with('programas', $programas)
                ->with('municipios', $municipios);
        } else {
            return redirect('/home');
        }
    }

    public function registroplan(Request $request)
    {
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

        $this->validate($request, $rules, $messages);

        $plan = new ProgramaPlan();
        $plan->pp_id_sede = $request->get('pp_id_sede');
        $plan->pp_id_programa = $request->get('pp_id_programa');
        $plan->pp_plan = $request->get('pp_plan');
        $plan->pp_creditos = $request->get('pp_creditos');
        $plan->pp_no_asignaturas = $request->get('pp_no_asignaturas');
        $plan->pp_estado = $request->get('pp_estado');

        $plan->save();

        Alert::success('Exitoso', 'El plan de estudio se creo');
        return redirect('programa/mostrarplan');
    }

    public function editarplan($id)
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
            $programas = Programa::all();
            $municipios = Municipio::all();
            $plan = ProgramaPlan::find($id);
            return view('programa/plan.edit')
                ->with('programas', $programas)
                ->with('municipios', $municipios)
                ->with('plan', $plan);
        } else {
            return redirect('/home');
        }
    }

    public function actualizarplan(Request $request, $id)
    {
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

        $this->validate($request, $rules, $messages);

        $plan = ProgramaPlan::find($id);
        $plan->pp_id_sede = $request->get('pp_id_sede');
        $plan->pp_id_programa = $request->get('pp_id_programa');
        $plan->pp_plan = $request->get('pp_plan');
        $plan->pp_creditos = $request->get('pp_creditos');
        $plan->pp_no_asignaturas = $request->get('pp_no_asignaturas');
        $plan->pp_estado = $request->get('pp_estado');

        $plan->save();

        Alert::success('Exitoso', 'El plan de estudio se ha actualizado');
        return redirect('programa/mostrarplan');
    }

    public function estado($id)
    {

        $estado = DB::table('programa_plan_estudio')
            ->where('id', $id)
            ->first();

        if ($estado->pp_estado == 'activo') {
            DB::table('programa_plan_estudio')
                ->where('programa_plan_estudio.id', $id)
                ->update([
                    'pp_estado' => 'inactivo'
                ]);

            Alert::success('Estado', 'El estado ha sido actualizado');
            return redirect('programa/mostrarplan');
        } else if ($estado->pp_estado == 'inactivo') {
            DB::table('programa_plan_estudio')
                ->where('programa_plan_estudio.id', $id)
                ->update([
                    'pp_estado' => 'activo'
                ]);

            Alert::success('Estado', 'El estado ha sido actualizado');
            return redirect('programa/mostrarplan');
        }
    }

    public function mostrarasignatura()
    {
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

    public function crearasignatura()
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
            $municipios = Municipio::all();
            $programas = Programa::all();
            $plans = ProgramaPlan::all();
            return view('programa/asignatura.create')
                ->with('municipios', $municipios)
                ->with('programas', $programas)
                ->with('plans', $plans);
        } else {
            return redirect('/home');
        }
    }

    public function registroasignatura(Request $request)
    {
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

        $this->validate($request, $rules, $message);

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

    public function editarasignatura($id,)
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
            $municipios = Municipio::all();
            $programas = Programa::all();
            $plans = ProgramaPlan::all();
            $asignatura = ProgramaAsignatura::find($id);
            return view('programa/asignatura.edit')
                ->with('municipios', $municipios)
                ->with('programas', $programas)
                ->with('plans', $plans)
                ->with('asignatura', $asignatura);
        } else {
            return redirect('/home');
        }
    }

    public function actualizarasignatura(Request $request, $id)
    {
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

        $this->validate($request, $rules, $message);

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

    public function eliminarasignatura($id)
    {
        try {
            $asignatura = ProgramaAsignatura::find($id);
            $asignatura->delete();
            Alert::success('Exitoso', 'La asignatura se elimino correctamente');
            return redirect('programa/mostrarasignatura');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar esta asignatura, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function mostrarhorario()
    {
        $horarios = ProgramaHorario::all();
        return view('programa/horario.index')
            ->with('horarios', $horarios);
    }

    public function crearhorario()
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
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
        } else {
            return redirect('/home');
        }
    }

    public function registrohorario(Request $request)
    {
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
        $this->validate($request, $rules, $message);

        $horario = new ProgramaHorario();
        $horario->pph_year = $request->get('pph_year');
        $horario->pph_semestre = $request->get('pph_semestre');
        $horario->pph_id_asignatura = $request->get('pph_id_asignatura');
        $horario->pph_grupo = $request->get('pph_grupo');
        $horario->pph_id_docente = $request->get('pph_id_docente');
        $horario->pph_horario = $request->get('pph_horario');
        $horario->pph_aula = $request->get('pph_aula');
        $horario->pph_nro_horas_semana_docencia = $request->get('pph_nro_horas_semana_docencia');
        $horario->pph_nro_horas_semana_investigacion = $request->get('pph_nro_horas_semana_investigacion');
        $horario->pph_nro_horas_semana_extension = $request->get('pph_nro_horas_semana_extension');
        $horario->pph_nro_horas_semana_administrativas = $request->get('pph_nro_horas_semana_administrativas');
        $horario->save();

        Alert::success('Exitoso', 'Materia asignada al docente');
        return redirect('programa/mostrarhorario');
    }

    public function editarhorario($id)
    {
        if (Auth::user()->per_tipo_usuario == '1' || Auth::user()->per_tipo_usuario == '2') {
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
        } else {
            return redirect('/home');
        }
    }

    public function actualizarhorario(Request $request, $id)
    {
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
        $this->validate($request, $rules, $message);

        $horario = ProgramaHorario::find($id);
        $horario->pph_year = $request->get('pph_year');
        $horario->pph_semestre = $request->get('pph_semestre');
        $horario->pph_id_asignatura = $request->get('pph_id_asignatura');
        $horario->pph_grupo = $request->get('pph_grupo');
        $horario->pph_id_docente = $request->get('pph_id_docente');
        $horario->pph_horario = $request->get('pph_horario');
        $horario->pph_aula = $request->get('pph_aula');
        $horario->pph_nro_horas_semana_docencia = $request->get('pph_nro_horas_semana_docencia');
        $horario->pph_nro_horas_semana_investigacion = $request->get('pph_nro_horas_semana_investigacion');
        $horario->pph_nro_horas_semana_extension = $request->get('pph_nro_horas_semana_extension');
        $horario->pph_nro_horas_semana_administrativas = $request->get('pph_nro_horas_semana_administrativas');

        $horario->save();

        Alert::success('Exitoso', 'Materia actualizada');
        return redirect('programa/mostrarhorario');
    }

    public function eliminarhorario($id)
    {
        try {
            $horario = ProgramaHorario::find($id);
            $horario->delete();
            Alert::success('Exitoso', 'Asignación docente y horario eliminada');
            return redirect('programa/mostrarhorario');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar este horario, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function selectivoplan($id)
    {
        return DB::table('programa_plan_estudio')->where('pp_id_programa', $id)->get();
    }

    public function editplan($id)
    {
        return DB::table('programa_plan_estudio')->where('pp_id_programa', $id)->first();
    }

    public function selectivomunicipio($id)
    {
        return DB::table('municipio')->where('mun_departamento', $id)->get();
    }

    public function exportpdf()
    {
        $datos = DB::table('programa')
            ->get();
        if ($datos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/programa');
        } else {
            $view = \view('reporte.reporte', compact('datos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            return $pdf->stream('reporte.pdf');
        }
    }

    public function exportexcel()
    {
        $programas = Programa::all();
        if ($programas->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/programa');
        } else {
            return Excel::download(new ProgramaExport, 'programas.xlsx');
        }
    }
}
