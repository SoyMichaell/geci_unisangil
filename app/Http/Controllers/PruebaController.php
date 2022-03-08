<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Programa;
use App\Models\PruebaSaber;
use App\Models\PruebaSaberPro;
use App\Models\TipoModulo;
use App\Models\TipoPrueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PruebaController extends Controller
{
    
    public function index()
    {
        $tipopruebas = TipoPrueba::all();
        $tipomodulos = TipoModulo::all();
        return view('prueba.index')
            ->with('tipopruebas', $tipopruebas)
            ->with('tipomodulos', $tipomodulos);
    }

    public function mostrarpruebasaber(){
        $pruebasabers = PruebaSaber::all();
        return view('prueba/saber.index')
            ->with('pruebasabers', $pruebasabers);
    }

    public function mostratipoprueba(){
        $tipopruebas = TipoPrueba::all();
        return view('prueba/tipoprueba.index')
            ->with('tipopruebas', $tipopruebas);
    }

    public function registrotipoprueba(Request $request){
        $rules = [
            'tipo_prueba_nombre' => 'required'
        ];
        $message = [
            'tipo_prueba_nombre.required' => 'El campo tipo prueba es requerido'
        ];
        $this->validate($request,$rules,$message);

        $tipoprueba = new TipoPrueba();
        $tipoprueba->tipo_prueba_nombre = $request->get('tipo_prueba_nombre');
        $tipoprueba->save();

        Alert::success('Exitoso', 'Tipo prueba registrado con exito');
        return redirect('/prueba/mostratipoprueba');

    }

    public function eliminartipoprueba($id){
        $tipoprueba = TipoPrueba::find($id);
        $tipoprueba->delete();
        Alert::success('Exitoso', 'Tipo prueba eliminado con exito');
        return redirect('/prueba/mostratipoprueba');
    }

    public function mostrartipomodulo(){
        $tipomodulos = TipoModulo::all();
        $tipospruebas = TipoPrueba::all();
        return view('prueba/tipomodulo.index')
            ->with('tipomodulos', $tipomodulos)
            ->with('tipospruebas', $tipospruebas);
    }

    public function registrotipomodulo(Request $request){
        $rules = [
            'tipo_modulo_nombre' => 'required',
            'tipo_modulo_id_prueba' => 'required|not_in:0'
        ];
        $message = [
            'tipo_modulo_nombre.required' => 'El campo nombre módulo es requerido',
            'tipo_modulo_id_prueba.required' => 'El campo tipo prueba es requerido'
        ];
        $this->validate($request,$rules,$message);

        $tipomodulo = new TipoModulo();
        $tipomodulo->tipo_modulo_nombre = $request->get('tipo_modulo_nombre');
        $tipomodulo->tipo_modulo_id_prueba = $request->get('tipo_modulo_id_prueba');
        $tipomodulo->save();

        Alert::success('Exitoso', 'Tipo módulo registrado con exito');
        return redirect('/prueba/mostrartipomodulo');

    }

    public function eliminartipomodulo($id){
        $tipomodulo = TipoModulo::find($id);
        $tipomodulo->delete();
        Alert::success('Exitoso', 'Tipo módulo eliminado con exito');
        return redirect('/prueba/mostrartipomodulo');
    }

    public function mostrarsaber(){
        $saberes = PruebaSaber::all();
        return view('prueba/saber.index')
            ->with('saberes', $saberes);
    }

    public function crearsaber(){
        $estudiantes = Estudiante::all();
        $tiposmodulos = DB::table('tipo_modulo')
            ->where('tipo_modulo_id_prueba', 1)
            ->get();
        return view('prueba/saber.create')
            ->with('estudiantes', $estudiantes)
            ->with('tiposmodulos', $tiposmodulos);
    }

    public function registrosaber(Request $request){
        $rules = [
            'prueba_saber_year' => 'required',
            'prueba_saber_periodo' => 'required',
            'prueba_saber_id_estudiante' => 'required|not_in:0'
        ];
        $message = [
            'prueba_saber_year.required' => 'El campo año es requerido',
            'prueba_saber_periodo.required' => 'El campo periodo es requerido',
            'prueba_saber_id_estudiante.required' => 'El campo estudiante es requerido'
        ];
        $this->validate($request,$rules,$message);
        $puntaje_global = 0;
        for ($i=0; $i <count($request->get('prsamo_id_modulo')) ; $i++) { 
            DB::table('prueba_saber_modulo')->insert([
                'prsamo_id_estudiante' => $request->get('prueba_saber_id_estudiante'),
                'prsamo_id_modulo' => $request->get('prsamo_id_modulo')[$i],
                'prsamo_puntaje' => $request->get('prsamo_puntaje')[$i],
            ]);
            
            $puntaje_global += $request->get('prsamo_puntaje')[$i];
        }

        $final = $puntaje_global/count($request->get('prsamo_id_modulo'));
            

        DB::table('prueba_saber')->insert(
            [
                'prueba_saber_year' => $request->get('prueba_saber_year'),
                'prueba_saber_periodo' => $request->get('prueba_saber_periodo'),
                'prueba_saber_id_estudiante' => $request->get('prueba_saber_id_estudiante'),
                'prueba_saber_puntaje_global' => $final,
            ]
        );

        Alert::success('Exitoso', 'Prueba saber registrada con exito');
        return redirect('/prueba/mostrarsaber');
    }

    public function versaber($id){
        $saberes = DB::table('prueba_saber_modulo')
            ->join('tipo_modulo','prueba_saber_modulo.prsamo_id_modulo','=','tipo_modulo.id')
            ->where('prsamo_id_estudiante', $id)
            ->get();
            $saber = DB::table('prueba_saber')
            ->join('prueba_saber_modulo','prueba_saber.prueba_saber_id_estudiante','=','prueba_saber_modulo.prsamo_id_estudiante')
            ->where('prueba_saber_id_estudiante', $id)
            ->first();
        $estudiantes = Estudiante::all();
        return view('prueba/saber.show')
            ->with('estudiantes', $estudiantes)
            ->with('saberes', $saberes)
            ->with('saber', $saber);
    }

    public function editarsaber($id){
        $saberes = DB::table('prueba_saber_modulo')
            ->join('tipo_modulo','prueba_saber_modulo.prsamo_id_modulo','=','tipo_modulo.id')
            ->where('prsamo_id_estudiante', $id)
            ->get();
            $saber = DB::table('prueba_saber')
            ->join('prueba_saber_modulo','prueba_saber.prueba_saber_id_estudiante','=','prueba_saber_modulo.prsamo_id_estudiante')
            ->where('prueba_saber_id_estudiante', $id)
            ->first();
        $estudiantes = Estudiante::all();
        return view('prueba/saber.edit')
            ->with('estudiantes', $estudiantes)
            ->with('saberes', $saberes)
            ->with('saber', $saber);
    }

    public function actualizarsaber(Request $request, $id){
        $rules = [
            'prueba_saber_year' => 'required',
            'prueba_saber_periodo' => 'required',
        ];
        $message = [
            'prueba_saber_year.required' => 'El campo año es requerido',
            'prueba_saber_periodo.required' => 'El campo periodo es requerido',
        ];
        $this->validate($request,$rules,$message);
        $puntaje_global = 0;
        for ($i=0; $i <count($request->get('prsamo_id_modulo')) ; $i++) { 
            DB::table('prueba_saber_modulo')
            ->where('prsamo_id_estudiante',$id)
            ->where('prsamo_id_modulo', $request->get('prsamo_id_modulo')[$i])
            ->update(
                [
                    'prsamo_id_modulo' => $request->get('prsamo_id_modulo')[$i],
                    'prsamo_puntaje' => $request->get('prsamo_puntaje')[$i],
                ]
            );
            
            $puntaje_global += $request->get('prsamo_puntaje')[$i];
        }

        $final = $puntaje_global/count($request->get('prsamo_id_modulo'));
            

        DB::table('prueba_saber')->where('prueba_saber_id_estudiante', $id)->update(
            [
                'prueba_saber_year' => $request->get('prueba_saber_year'),
                'prueba_saber_periodo' => $request->get('prueba_saber_periodo'),
                'prueba_saber_puntaje_global' => $final,
            ]
        );

        Alert::success('Exitoso', 'Prueba saber registrada con exito');
        return redirect('/prueba/mostrarsaber');
    }

    public function eliminarsaber($id){
        DB::table('prueba_saber_modulo')->where('prsamo_id_estudiante', $id)->delete();
        DB::table('prueba_saber')->where('prueba_saber_id_estudiante', $id)->delete();
        Alert::success('Exitoso', 'Prueba saber eliminada con exito');
        return redirect('/prueba/mostrarsaber');
    }

    public function mostrarsaberpro(){
        $pros = PruebaSaberPro::all();
        return view('prueba/saberpro.index')
            ->with('pros', $pros);
    }

    public function crearsaberpro(){
        $estudiantes = Estudiante::all();
        $tiposmodulos = DB::table('tipo_modulo')
            ->where('tipo_modulo_id_prueba', 3)
            ->get();
        return view('prueba/saberpro.create')
            ->with('estudiantes', $estudiantes)
            ->with('tiposmodulos', $tiposmodulos);
    }

    public function registrosaberpro(Request $request){
        /*$rules = [
            'prsapr_year' => 'required',
            'prsapr_periodo' => 'required',
            'prsapr_id_estudiante' => 'required|not_in:0',
            'prsapr_numero_registro' => 'required',
            'prsapr_grupo_referencia' => 'required',
            'prsapr_percentil_nacional' => 'required',
            'prsapr_percentil_grupo' => 'required',
            'prsapr_novedad' => 'required',
        ];
        $message = [
            'prsapr_year.required' => 'El campo año es requerido',
            'prsapr_periodo.required' => 'El campo periodo es requerido',
            'prsapr_id_estudiante.required' => 'El campo estudiante es requerido',
            'prsapr_numero_registro.required' => 'El campo número de registro es requerido',
            'prsapr_grupo_referencia.required' => 'El campo grupo de referencia es requerido',
            'prsapr_percentil_nacional.required' => 'El campo percentil nacional es requerido',
            'prsapr_percentil_grupo.required' => 'El campo percentil grupo es requerido',
            'prsapr_novedad.required' => 'El campo novedad es requerido',
        ];
        
        $this->validate($request,$rules,$message);*/

        $puntaje_global = 0;
        for ($i=0; $i <count($request->get('prsaprmo_id_modulo')) ; $i++) { 
            DB::table('prueba_saber_pro_modulo')->insert([
                'prsaprmo_id_estudiante' => $request->get('prsapr_id_estudiante'),
                'prsaprmo_id_modulo' => $request->get('prsaprmo_id_modulo')[$i],
                'prsaprmo_puntaje' => $request->get('prsaprmo_puntaje')[$i],
                'prsaprmo_nivel_desempeno' => $request->get('prsaprmo_nivel_desempeno')[$i],
                'prsaprmo_percentil_nacional' => $request->get('prsaprmo_percentil_nacional')[$i],
                'prsaprmo_percentil_grupo' => $request->get('prsaprmo_percentil_grupo')[$i],
            ]);
            
            $puntaje_global += $request->get('prsaprmo_puntaje')[$i];
        }

        $final = $puntaje_global/count($request->get('prsaprmo_id_modulo'));
            

        DB::table('prueba_saber_pro')->insert(
            [
                'prsapr_year' => $request->get('prsapr_year'),
                'prsapr_periodo' => $request->get('prsapr_periodo'),
                'prsapr_id_estudiante' => $request->get('prsapr_id_estudiante'),
                'prsapr_numero_registro' => $request->get('prsapr_numero_registro'),
                'prsapr_grupo_referencia' => $request->get('prsapr_grupo_referencia'),
                'prsapr_puntaje_global' => $final,
                'prsapr_percentil_nacional' => $request->get('prsapr_percentil_nacional'),
                'prsapr_percentil_grupo' => $request->get('prsapr_percentil_grupo'),
                'prsapr_novedad' => $request->get('prsapr_novedad'),
            ]
        );

        Alert::success('Exitoso', 'Prueba saber pro registrada con exito');
        return redirect('/prueba/mostrarsaberpro');
    }

    public function editarsaberpro($id){
        $saberes = DB::table('prueba_saber_pro_modulo')
        ->join('tipo_modulo','prueba_saber_pro_modulo.prsaprmo_id_modulo','=','tipo_modulo.id')
        ->where('prsaprmo_id_estudiante', $id)
        ->get();
        $saber = DB::table('prueba_saber_pro')
        ->join('prueba_saber_pro_modulo','prueba_saber_pro.prsapr_id_estudiante','=','prueba_saber_pro_modulo.prsaprmo_id_estudiante')
        ->where('prsapr_id_estudiante', $id)
        ->first();
    $estudiantes = Estudiante::all();
    return view('prueba/saberpro.edit')
        ->with('estudiantes', $estudiantes)
        ->with('saberes', $saberes)
        ->with('saber', $saber);
    }

    public function versaberpro($id){
        $saberes = DB::table('prueba_saber_pro_modulo')
        ->join('tipo_modulo','prueba_saber_pro_modulo.prsaprmo_id_modulo','=','tipo_modulo.id')
        ->where('prsaprmo_id_estudiante', $id)
        ->get();
        $saber = DB::table('prueba_saber_pro')
        ->join('prueba_saber_pro_modulo','prueba_saber_pro.prsapr_id_estudiante','=','prueba_saber_pro_modulo.prsaprmo_id_estudiante')
        ->where('prsapr_id_estudiante', $id)
        ->first();
    $estudiantes = Estudiante::all();
    return view('prueba/saberpro.show')
        ->with('estudiantes', $estudiantes)
        ->with('saberes', $saberes)
        ->with('saber', $saber);
    }

    public function actualizarsaberpro(Request $request, $id){

        $puntaje_global = 0;
        for ($i=0; $i <count($request->get('prsaprmo_id_modulo')) ; $i++) { 
            DB::table('prueba_saber_pro_modulo')
            ->where('prsaprmo_id_estudiante', $id)
            ->where('prsaprmo_id_modulo', $request->get('prsaprmo_id_modulo')[$i])
            ->update(
                [
                    'prsaprmo_id_modulo' => $request->get('prsaprmo_id_modulo')[$i],
                    'prsaprmo_puntaje' => $request->get('prsaprmo_puntaje')[$i],
                    'prsaprmo_nivel_desempeno' => $request->get('prsaprmo_nivel_desempeno')[$i],
                    'prsaprmo_percentil_nacional' => $request->get('prsaprmo_percentil_nacional')[$i],
                    'prsaprmo_percentil_grupo' => $request->get('prsaprmo_percentil_grupo')[$i],
                ]
            );
            
            $puntaje_global += $request->get('prsaprmo_puntaje')[$i];
        }

        $final = $puntaje_global/count($request->get('prsaprmo_id_modulo'));
            

        DB::table('prueba_saber_pro')->where('prsapr_id_estudiante', $id)->update(
            [
                'prsapr_year' => $request->get('prsapr_year'),
                'prsapr_periodo' => $request->get('prsapr_periodo'),
                'prsapr_numero_registro' => $request->get('prsapr_numero_registro'),
                'prsapr_grupo_referencia' => $request->get('prsapr_grupo_referencia'),
                'prsapr_puntaje_global' => $final,
                'prsapr_percentil_nacional' => $request->get('prsapr_percentil_nacional'),
                'prsapr_percentil_grupo' => $request->get('prsapr_percentil_grupo'),
                'prsapr_novedad' => $request->get('prsapr_novedad'),
            ]
        );

        Alert::success('Exitoso', 'Prueba saber pro ha sido actualizada con exito');
        return redirect('/prueba/mostrarsaberpro');
    }

    public function eliminarsaberpro($id){
        DB::table('prueba_saber_pro_modulo')->where('prsaprmo_id_estudiante', $id)->delete();
        DB::table('prueba_saber_pro')->where('prsapr_id_estudiante', $id)->delete();
        Alert::success('Exitoso', 'Prueba saber pro eliminada con exito');
        return redirect('/prueba/mostrarsaberpro');
    }

    public function mostrarresultado(){
        $resultados = DB::table('prueba_resultado_programa')
            ->join('programa','prueba_resultado_programa.prurepro_id_programa','=','programa.id')
            ->get();
        return view('prueba/general.index')
            ->with('resultados', $resultados);
    }

    public function crearresultado(){
        $programas = Programa::all();
        $tiposmodulos = DB::table('tipo_modulo')
            ->where('tipo_modulo_id_prueba', 3)
            ->get();
        return view('prueba/general.create')
            ->with('programas', $programas)
            ->with('tiposmodulos', $tiposmodulos);
    }

    public function registroresultado(Request $request){
        /*$rules = [
            'prurepro_year' => 'required',
            'prurepro_global_programa' => 'required',
            'prurepro_global_institucion' => 'required',
            'prurepro_global_sede' => 'required',
            'prurepro_global_grupo_referencia' => 'required'
        ];
        $message = [
            'prurepro_year.required' => 'El campo año es requerido',
            'prurepro_global_programa.required' => 'El campo resultado global programa es requerido',
            'prurepro_global_institucion.required' => 'El campo resultado global institución es requerido',
            'prurepro_global_sede.required' => 'El campo resultado global sede es requerido',
            'prurepro_global_grupo_referencia.required' => 'El campo resultado global grupo de referencia es requerido'
        ];
        $this->validate($request,$rules,$message);*/

        for ($i=0; $i <count($request->get('prureprono_id_modulo')) ; $i++) { 
            DB::table('prueba_resultado_programa_modulo')->insert([
                'prurepromo_id_prueba_programa' => $request->get('prurepromo_id_prueba_programa'),
                'prureprono_id_modulo' => $request->get('prureprono_id_modulo')[$i],
                'prureprono_puntaje_programa' => $request->get('prureprono_puntaje_programa')[$i],
                'prureprono_puntaje_institucion' => $request->get('prureprono_puntaje_institucion')[$i],
                'prureprono_puntaje_sede' => $request->get('prureprono_puntaje_sede')[$i],
                'prureprono_puntaje_grupo_referencia' => $request->get('prureprono_puntaje_grupo_referencia')[$i],
            ]);
        }

        DB::table('prueba_resultado_programa')->insert(
            [
                'prurepro_year' => $request->get('prurepro_year'),
                'prurepro_id_programa' => $request->get('prurepromo_id_prueba_programa'),
                'prurepro_global_programa' => $request->get('prurepro_global_programa'),
                'prurepro_global_institucion' => $request->get('prurepro_global_institucion'),
                'prurepro_global_sede' => $request->get('prurepro_global_sede'),
                'prurepro_global_grupo_referencia' => $request->get('prurepro_global_grupo_referencia'),
            ]
        );

        Alert::success('Exitoso', 'Resultado general del programa registrado con exito');
        return redirect('/prueba/mostrarresultado');
    }

    public function editarresultado($id){
        $resultados = DB::table('prueba_resultado_programa_modulo')
        ->join('tipo_modulo','prueba_resultado_programa_modulo.prureprono_id_modulo','=','tipo_modulo.id')
        ->where('prurepromo_id_prueba_programa', $id)
        ->get();
        $resultado = DB::table('prueba_resultado_programa')
        ->join('prueba_resultado_programa_modulo','prueba_resultado_programa.prurepro_id_programa','=','prueba_resultado_programa_modulo.prurepromo_id_prueba_programa')
        ->where('prurepromo_id_prueba_programa', $id)
        ->first();
    $programas = Programa::all();
    return view('prueba/general.edit')
        ->with('programas', $programas)
        ->with('resultados', $resultados)
        ->with('resultado', $resultado);
    }

    public function verresultado($id){
        $resultados = DB::table('prueba_resultado_programa_modulo')
        ->join('tipo_modulo','prueba_resultado_programa_modulo.prureprono_id_modulo','=','tipo_modulo.id')
        ->where('prurepromo_id_prueba_programa', $id)
        ->get();
        $resultado = DB::table('prueba_resultado_programa')
        ->join('programa','prueba_resultado_programa.prurepro_id_programa','=','programa.id')
        ->join('prueba_resultado_programa_modulo','prueba_resultado_programa.prurepro_id_programa','=','prueba_resultado_programa_modulo.prurepromo_id_prueba_programa')
        ->where('prurepromo_id_prueba_programa', $id)
        ->first();
    return view('prueba/general.show')
        ->with('resultados', $resultados)
        ->with('resultado', $resultado);
    }

    public function actualizarresultado(Request $request, $id){
        /*$rules = [
            'prurepro_year' => 'required',
            'prurepro_global_programa' => 'required',
            'prurepro_global_institucion' => 'required',
            'prurepro_global_sede' => 'required',
            'prurepro_global_grupo_referencia' => 'required'
        ];
        $message = [
            'prurepro_year.required' => 'El campo año es requerido',
            'prurepro_global_programa.required' => 'El campo resultado global programa es requerido',
            'prurepro_global_institucion.required' => 'El campo resultado global institución es requerido',
            'prurepro_global_sede.required' => 'El campo resultado global sede es requerido',
            'prurepro_global_grupo_referencia.required' => 'El campo resultado global grupo de referencia es requerido'
        ];
        $this->validate($request,$rules,$message);*/

        for ($i=0; $i <count($request->get('prureprono_id_modulo')) ; $i++) { 
            DB::table('prueba_resultado_programa_modulo')
            ->where('prurepromo_id_prueba_programa', $id)
            ->where('prureprono_id_modulo', $request->get('prureprono_id_modulo')[$i])
            ->update(
                [
                    'prureprono_id_modulo' => $request->get('prureprono_id_modulo')[$i],
                    'prureprono_puntaje_programa' => $request->get('prureprono_puntaje_programa')[$i],
                    'prureprono_puntaje_institucion' => $request->get('prureprono_puntaje_institucion')[$i],
                    'prureprono_puntaje_sede' => $request->get('prureprono_puntaje_sede')[$i],
                    'prureprono_puntaje_grupo_referencia' => $request->get('prureprono_puntaje_grupo_referencia')[$i],
                ]
            );
        }

        DB::table('prueba_resultado_programa')
        ->where('prurepro_id_programa', $id)
        ->update(
            [
                'prurepro_year' => $request->get('prurepro_year'),
                'prurepro_id_programa' => $request->get('prurepromo_id_prueba_programa'),
                'prurepro_global_programa' => $request->get('prurepro_global_programa'),
                'prurepro_global_institucion' => $request->get('prurepro_global_institucion'),
                'prurepro_global_sede' => $request->get('prurepro_global_sede'),
                'prurepro_global_grupo_referencia' => $request->get('prurepro_global_grupo_referencia'),
            ]
        );

        Alert::success('Exitoso', 'Resultado general del programa actualizado con exito');
        return redirect('/prueba/mostrarresultado');
    }

    public function eliminaresultado($id){
        DB::table('prueba_resultado_programa')->where('prurepro_id_programa', $id)->delete();
        DB::table('prueba_resultado_programa_modulo')->where('prurepromo_id_prueba_programa', $id)->delete();
        Alert::success('Exitoso', 'Resultado general del programa eliminado con exito');
        return redirect('/prueba/mostrarsaberpro');
    }

}
