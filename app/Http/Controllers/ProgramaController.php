<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Docente;
use App\Models\Facultad;
use App\Models\Metodologia;
use App\Models\Municipio;
use App\Models\NivelFormacion;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        $facultades = Facultad::all();
        $nivels = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = Docente::all();
        $users = DB::table('users')->where('per_tipo_usuario', 2);

        return view('programa.index', compact('programas'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = DB::table('persona')->where('per_tipo_usuario','=',2,'or','per_tipo_usuario','=',5)->get();

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

    public function store(Request $request)
    {

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

    public function show($id)
    {
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

    public function edit($id)
    {
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

    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
}
