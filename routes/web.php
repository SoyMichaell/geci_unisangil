<?php

use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        $personas = DB::table('persona')
            ->select('persona.id','per_tipo_documento','per_numero_documento','per_nombre','per_apellido','per_correo','per_telefono','tip_nombre','per_id_estado','per_tipo_usuario')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('per_tipo_usuario',1)
            ->orWhere('per_tipo_usuario',10)
            ->orWhere('per_tipo_usuario',9)
            ->orWhere('per_tipo_usuario',2)
            ->orWhere('per_tipo_usuario',4)
            ->get();
        $directores = DB::table('persona')
            ->where('per_tipo_usuario',2)
            ->get();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario',2)
            ->orWhere('per_tipo_usuario',3)
            ->get();
            $estudiantes = DB::table('persona')
            ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
            ->where('per_tipo_usuario',6)
            ->orWhere('per_tipo_usuario',9)
            ->get();
            $egresados = DB::table('persona')
            ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
            ->where('per_tipo_usuario',6)
            ->where('estu_egresado', 'Si')
            ->get();
            $administrativos = DB::table('persona')
            ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
            ->where('per_tipo_usuario',6)
            ->where('estu_administrativo', 'Si')
            ->get();
            $tipousuarios = TipoUsuario::all();
        return view('home')
        ->with('personas', $personas)
        ->with('docentes', $docentes)
        ->with('estudiantes', $estudiantes)
        ->with('egresados', $egresados)
        ->with('administrativos', $administrativos)
        ->with('tipousuarios', $tipousuarios)
        ->with('directores', $directores);
    } else {
        return view('auth/login');
    }
});

Auth::routes();


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('departamento/pdf',[App\Http\Controllers\DepartamentoController::class, 'pdf']);
Route::get('departamento/export',[App\Http\Controllers\DepartamentoController::class, 'export']);
Route::resource('departamento', App\Http\Controllers\DepartamentoController::class);

Route::get('municipio/pdf',[App\Http\Controllers\MunicipioController::class, 'pdf']);
Route::get('municipio/export',[App\Http\Controllers\MunicipioController::class, 'export']);
Route::resource('/municipio', App\Http\Controllers\MunicipioController::class);

Route::get('facultad/pdf',[App\Http\Controllers\FacultadController::class, 'pdf']);
Route::get('facultad/export',[App\Http\Controllers\FacultadController::class, 'export']);
Route::resource('/facultad', App\Http\Controllers\FacultadController::class);


Route::get('nivelformacion/pdf',[App\Http\Controllers\NivelformacionController::class, 'pdf']);
Route::get('nivelformacion/export',[App\Http\Controllers\NivelformacionController::class, 'export']);
Route::resource('/nivelformacion', App\Http\Controllers\NivelFormacionController::class);

Route::get('metodologia/pdf',[App\Http\Controllers\MetodologiaController::class, 'pdf']);
Route::get('metodologia/export',[App\Http\Controllers\MetodologiaController::class, 'export']);
Route::resource('/metodologia', App\Http\Controllers\MetodologiaController::class);

/*Rutas Estudiantes*/
Route::get('/estudiante/{programa}/verestudiantes', [App\Http\Controllers\EstudianteController::class, 'verestudiantes']);
Route::get('/estudiante/exportpdfgeneral', [App\Http\Controllers\EstudianteController::class, 'exportpdfgeneral']);
Route::get('/estudiante/exportexcelgeneral', [App\Http\Controllers\EstudianteController::class, 'exportexcelgeneral']);
Route::get('/estudiante/{programa}/exportpdf', [App\Http\Controllers\EstudianteController::class, 'exportpdf']);
Route::get('/estudiante/{programa}/exportexcel', [App\Http\Controllers\EstudianteController::class, 'exportexcel']);
Route::get('/estudiante/{programa}/exportbecaexcel', [App\Http\Controllers\EstudianteController::class, 'exportbecaexcel']);
Route::get('/estudiante/{programa}/exportcontadoexcel', [App\Http\Controllers\EstudianteController::class, 'exportcontadoexcel']);
Route::get('/estudiante/{programa}/exportprestamoexcel', [App\Http\Controllers\EstudianteController::class, 'exportprestamoexcel']);
Route::post('/estudiante/{programa}/listadoingreso', [App\Http\Controllers\EstudianteController::class, 'listadoingreso']);
Route::post('/estudiante/{programa}/listadoperiodoingreso', [App\Http\Controllers\EstudianteController::class, 'listadoperiodoingreso']);

//Rutas egresado
Route::get('estudiante/{estudiante}/crearegresado', [App\Http\Controllers\EstudianteController::class, 'crearegresado']);
Route::put('estudiante/{estudiante}/actualizaregresado', [App\Http\Controllers\EstudianteController::class, 'actualizaregresado']);
//Rutas estudiantes reporte
Route::get('estudiante/mostrarreporte', [App\Http\Controllers\EstudianteController::class, 'mostrarreporte']);
Route::get('estudiante/crearreporte', [App\Http\Controllers\EstudianteController::class, 'crearreporte']);
Route::post('/estudiante/registroreporte', [App\Http\Controllers\EstudianteController::class, 'registroreporte']);
Route::get('/estudiante/{general}/verreporte', [App\Http\Controllers\EstudianteController::class, 'verreporte']);
Route::get('/estudiante/{general}/editarreporte', [App\Http\Controllers\EstudianteController::class, 'editarreporte']);
Route::put('estudiante/{general}/actualizarreporte', [App\Http\Controllers\EstudianteController::class, 'actualizarreporte']);
Route::delete('estudiante/{general}/eliminarreporte', [App\Http\Controllers\EstudianteController::class, 'eliminarreporte']);
Route::resource('estudiante', App\Http\Controllers\EstudianteController::class);

/*Rutas docentes*/ 
Route::get('/docente/exportpdf', [App\Http\Controllers\DocenteController::class, 'exportpdf']);
Route::get('/docente/exportexcel', [App\Http\Controllers\DocenteController::class, 'exportexcel']);
Route::get('/docente/exportvisitantepdf', [App\Http\Controllers\DocenteController::class, 'exportvisitantepdf']);
Route::get('/docente/exportvisitanteexcel', [App\Http\Controllers\DocenteController::class, 'exportvisitanteexcel']);
Route::get('/docente/exportvinculacionpdf', [App\Http\Controllers\DocenteController::class, 'exportvinculacionpdf']);
Route::get('/docente/exportvinculacionexcel', [App\Http\Controllers\DocenteController::class, 'exportvinculacionexcel']);
Route::get('docente/mostrardocente', [App\Http\Controllers\DocenteController::class, 'mostrardocente']);
Route::post('docente/registrodocente', [App\Http\Controllers\DocenteController::class, 'registrodocente']);
Route::get('docente/{docente}/directorcompletar', [App\Http\Controllers\DocenteController::class, 'directorcompletar']);
Route::post('docente/directorinformacion', [App\Http\Controllers\DocenteController::class, 'directorinformacion']);
Route::put('docente/{docente}/actualizarinformacion', [App\Http\Controllers\DocenteController::class, 'actualizarinformacion']);
Route::put('docente/{docente}/directorestudios', [App\Http\Controllers\DocenteController::class, 'directorestudios']);
Route::put('docente/{docente}/zip', [App\Http\Controllers\DocenteController::class, 'zip']);
Route::put('docente/{docente}/{estado}/estado', [App\Http\Controllers\DocenteController::class, 'estado']);
//Rutas contratos
Route::get('docente/{docente}/mostrarcontrato', [App\Http\Controllers\DocenteController::class, 'mostrarcontrato']);
Route::get('docente/{docente}/crearcontrato', [App\Http\Controllers\DocenteController::class, 'crearcontrato']);
Route::post('docente/registrocontrato', [App\Http\Controllers\DocenteController::class, 'registrocontrato']);
Route::get('docente/{docente}/{contrato}/editarcontrato', [App\Http\Controllers\DocenteController::class, 'editarcontrato']);
Route::put('docente/{contrato}/actualizarcontrato', [App\Http\Controllers\DocenteController::class, 'actualizarcontrato']);
Route::delete('docente/{contrato}/eliminarcontrato', [App\Http\Controllers\DocenteController::class, 'eliminarcontrato']);
//Rutas historial asignaturas
Route::get('docente/{docente}/mostrarhistorial', [App\Http\Controllers\DocenteController::class, 'mostrarhistorial']);
//Rutas evaluación docente
Route::get('docente/{docente}/mostrarevaluacion', [App\Http\Controllers\DocenteController::class, 'mostrarevaluacion']);
Route::get('docente/{docente}/crearevaluacion', [App\Http\Controllers\DocenteController::class, 'crearevaluacion']);
Route::post('docente/registroevaluacion', [App\Http\Controllers\DocenteController::class, 'registroevaluacion']);
Route::get('docente/{docente}/{evaluacion}/editarevaluacion', [App\Http\Controllers\DocenteController::class, 'editarevaluacion']);
Route::put('docente/{evaluacion}/actualizarevaluacion', [App\Http\Controllers\DocenteController::class, 'actualizarevaluacion']);
Route::delete('docente/{evaluacion}/eliminarevaluacion', [App\Http\Controllers\DocenteController::class, 'eliminarevaluacion']);
//Rutas asignaturas
Route::get('docente/{docente}/mostrarasignatura', [App\Http\Controllers\DocenteController::class, 'mostrarasignatura']);
//Rutas vinculación
Route::get('docente/mostrarvinculacion', [App\Http\Controllers\DocenteController::class, 'mostrarvinculacion']);
//Rutas docente visitante
Route::get('docente/mostrardocentevisitante', [App\Http\Controllers\DocenteController::class, 'mostrardocentevisitante']);
Route::get('docente/creardocentevisitante', [App\Http\Controllers\DocenteController::class, 'creardocentevisitante']);
Route::post('docente/registrodocentevisitante', [App\Http\Controllers\DocenteController::class, 'registrodocentevisitante']);
Route::get('docente/{docente}/editardocentevisitante', [App\Http\Controllers\DocenteController::class, 'editardocentevisitante']);
Route::put('docente/{docente}/actualizardocentevisitante', [App\Http\Controllers\DocenteController::class, 'actualizardocentevisitante']);
Route::delete('docente/{docente}/eliminardocentevisitante', [App\Http\Controllers\DocenteController::class, 'eliminardocentevisitante']);
Route::resource('docente', App\Http\Controllers\DocenteController::class);

/*Rutas pruebas saber*/
Route::get('prueba/mostrarpruebasaber', [App\Http\Controllers\PruebaController::class, 'mostrarpruebasaber']);
//Rutas tipo prueba
Route::get('prueba/mostratipoprueba', [App\Http\Controllers\PruebaController::class, 'mostratipoprueba']);
Route::post('prueba/registrotipoprueba', [App\Http\Controllers\PruebaController::class, 'registrotipoprueba']);
Route::delete('prueba/{prueba}/eliminartipoprueba', [App\Http\Controllers\PruebaController::class, 'eliminartipoprueba']);
//Rutas tipo módulo
Route::get('prueba/mostrartipomodulo', [App\Http\Controllers\PruebaController::class, 'mostrartipomodulo']);
Route::post('prueba/registrotipomodulo', [App\Http\Controllers\PruebaController::class, 'registrotipomodulo']);
Route::delete('prueba/{prueba}/eliminartipomodulo', [App\Http\Controllers\PruebaController::class, 'eliminartipomodulo']);
//Rutas saber
Route::get('/prueba/exportsaberpdf', [App\Http\Controllers\PruebaController::class, 'exportsaberpdf']);
Route::get('prueba/mostrarsaber', [App\Http\Controllers\PruebaController::class, 'mostrarsaber']);
Route::get('prueba/crearsaber', [App\Http\Controllers\PruebaController::class, 'crearsaber']);
Route::post('prueba/registrosaber', [App\Http\Controllers\PruebaController::class, 'registrosaber']);
Route::get('prueba/{prueba}/editarsaber', [App\Http\Controllers\PruebaController::class, 'editarsaber']);
Route::get('prueba/{prueba}/versaber', [App\Http\Controllers\PruebaController::class, 'versaber']);
Route::put('prueba/{prueba}/actualizarsaber', [App\Http\Controllers\PruebaController::class, 'actualizarsaber']);
Route::delete('prueba/{prueba}/eliminarsaber', [App\Http\Controllers\PruebaController::class, 'eliminarsaber']);
//Rutas saber pro
Route::get('prueba/mostrarsaberpro', [App\Http\Controllers\PruebaController::class, 'mostrarsaberpro']);
Route::get('prueba/crearsaberpro', [App\Http\Controllers\PruebaController::class, 'crearsaberpro']);
Route::post('prueba/registrosaberpro', [App\Http\Controllers\PruebaController::class, 'registrosaberpro']);
Route::get('prueba/{prueba}/editarsaberpro', [App\Http\Controllers\PruebaController::class, 'editarsaberpro']);
Route::get('prueba/{prueba}/versaberpro', [App\Http\Controllers\PruebaController::class, 'versaberpro']);
Route::put('prueba/{prueba}/actualizarsaberpro', [App\Http\Controllers\PruebaController::class, 'actualizarsaberpro']);
Route::delete('prueba/{prueba}/eliminarsaberpro', [App\Http\Controllers\PruebaController::class, 'eliminarsaberpro']);
//Rutas resultados programas
Route::get('prueba/mostrarresultado', [App\Http\Controllers\PruebaController::class, 'mostrarresultado']);
Route::get('prueba/crearresultado', [App\Http\Controllers\PruebaController::class, 'crearresultado']);
Route::post('prueba/registroresultado', [App\Http\Controllers\PruebaController::class, 'registroresultado']);
Route::get('prueba/{resultado}/editarresultado', [App\Http\Controllers\PruebaController::class, 'editarresultado']);
Route::get('prueba/{resultado}/verresultado', [App\Http\Controllers\PruebaController::class, 'verresultado']);
Route::put('prueba/{resultado}/actualizarresultado', [App\Http\Controllers\PruebaController::class, 'actualizarresultado']);
Route::delete('prueba/{resultado}/eliminaresultado', [App\Http\Controllers\PruebaController::class, 'eliminaresultado']);
Route::resource('prueba', App\Http\Controllers\PruebaController::class);
/*Rutas programa*/
Route::get('programa/mostrarplan', [App\Http\Controllers\ProgramaController::class, 'mostrarplan']);
Route::get('programa/crearplan', [App\Http\Controllers\ProgramaController::class, 'crearplan']);
Route::get('programa/{plan}/editarplan', [App\Http\Controllers\ProgramaController::class, 'editarplan']);
Route::post('programa/registroplan', [App\Http\Controllers\ProgramaController::class, 'registroplan']);
Route::put('programa/{programa}/actualizarplan', [App\Http\Controllers\ProgramaController::class, 'actualizarplan']);
Route::get('/programa/{programa}/selectivoplan', [App\Http\Controllers\ProgramaController::class, 'selectivoplan']);
Route::get('/programa/{programa}/selectivomunicipio', [App\Http\Controllers\ProgramaController::class, 'selectivomunicipio']);
Route::put('programa/{programa}/estado', [App\Http\Controllers\ProgramaController::class, 'estado']);
Route::get('programa/mostrarasignatura', [App\Http\Controllers\ProgramaController::class, 'mostrarasignatura']);
Route::get('programa/crearasignatura', [App\Http\Controllers\ProgramaController::class, 'crearasignatura']);
Route::post('programa/registroasignatura', [App\Http\Controllers\ProgramaController::class, 'registroasignatura']);
Route::get('programa/{asignatura}/editarasignatura', [App\Http\Controllers\ProgramaController::class, 'editarasignatura']);
Route::put('programa/{asignatura}/actualizarasignatura', [App\Http\Controllers\ProgramaController::class, 'actualizarasignatura']);
Route::delete('programa/{asignatura}/eliminarasignatura', [App\Http\Controllers\ProgramaController::class, 'eliminarasignatura']);
Route::get('programa/mostrarhorario', [App\Http\Controllers\ProgramaController::class, 'mostrarhorario']);
Route::get('programa/crearhorario', [App\Http\Controllers\ProgramaController::class, 'crearhorario']);
Route::post('programa/registrohorario', [App\Http\Controllers\ProgramaController::class, 'registrohorario']);
Route::get('programa/{horario}/editarhorario', [App\Http\Controllers\ProgramaController::class, 'editarhorario']);
Route::put('programa/{horario}/actualizarhorario', [App\Http\Controllers\ProgramaController::class, 'actualizarhorario']);
Route::delete('programa/{horario}/eliminarhorario', [App\Http\Controllers\ProgramaController::class, 'eliminarhorario']);
Route::get('/programa/exportpdf', [App\Http\Controllers\ProgramaController::class, 'exportpdf']);
Route::get('/programa/exportexcel', [App\Http\Controllers\ProgramaController::class, 'exportexcel']);
Route::resource('programa', App\Http\Controllers\ProgramaController::class);

/*Rutas asignatura*/
Route::resource('asignatura', App\Http\Controllers\AsignaturaController::class);

/*Rutas trabajo de grado*/
Route::get('/trabajo/exportpdf', [App\Http\Controllers\TrabajoController::class, 'exportpdf']);
Route::get('/trabajo/exportexcel', [App\Http\Controllers\TrabajoController::class, 'exportexcel']);
Route::put('trabajo/{trabajo}/faseestado', [App\Http\Controllers\TrabajoController::class, 'faseestado']);
Route::put('trabajo/{trabajo}/fasejurado', [App\Http\Controllers\TrabajoController::class, 'fasejurado']);
Route::put('trabajo/{trabajo}/faseacta', [App\Http\Controllers\TrabajoController::class, 'faseacta']);
Route::put('trabajo/{trabajo}/registroobservacion', [App\Http\Controllers\TrabajoController::class, 'registroobservacion']);
Route::resource('trabajo', App\Http\Controllers\TrabajoController::class);
Route::resource('modalidad', App\Http\Controllers\ModalidadGradoController::class);

/*Rutas software tic's*/
Route::get('/software/exportpdf', [App\Http\Controllers\SoftwareController::class, 'exportpdf']);
Route::get('/software/exportexcel', [App\Http\Controllers\SoftwareController::class, 'exportexcel']);
Route::get('/software/exportrecursopdf', [App\Http\Controllers\SoftwareController::class, 'exportrecursopdf']);
Route::get('/software/exportrecursoexcel', [App\Http\Controllers\SoftwareController::class, 'exportrecursoexcel']);
Route::get('software/mostrarrecurso', [App\Http\Controllers\SoftwareController::class, 'mostrarrecurso']);
Route::get('software/crearrecurso', [App\Http\Controllers\SoftwareController::class, 'crearrecurso']);
Route::post('software/registrorecurso', [App\Http\Controllers\SoftwareController::class, 'registrorecurso']);
Route::get('software/{recurso}/editarrecurso', [App\Http\Controllers\SoftwareController::class, 'editarrecurso']);
Route::get('software/{recurso}/verrecurso', [App\Http\Controllers\SoftwareController::class, 'verrecurso']);
Route::put('software/{recurso}/actualizarrecurso', [App\Http\Controllers\SoftwareController::class, 'actualizarrecurso']);
Route::delete('software/{recurso}/eliminarrecurso', [App\Http\Controllers\SoftwareController::class, 'eliminarrecurso']);
Route::resource('software', App\Http\Controllers\SoftwareController::class);


/*Rutas usuario*/
Route::get('usuario/{id}/profile', [App\Http\Controllers\UserController::class, 'profile']);
Route::get('usuario/{id}/actualizarestado', [App\Http\Controllers\UserController::class, 'actualizarestado']);
Route::put('usuario/{id}/actualizar_password', [App\Http\Controllers\UserController::class, 'actualizar_password']);
Route::put('usuario/{id}/tipousuariocambio', [App\Http\Controllers\UserController::class, 'tipousuariocambio']);
Route::resource('usuario', App\Http\Controllers\UserController::class);


/*Rutas extensión*/
//Rutas actividad
Route::get('extension/exportactividadculturalpdf', [App\Http\Controllers\ExtensionController::class, 'exportactividadculturalpdf']);
Route::get('extension/exportactividadculturalexcel', [App\Http\Controllers\ExtensionController::class, 'exportactividadculturalexcel']);
Route::get('extension/mostraractividad', [App\Http\Controllers\ExtensionController::class, 'mostraractividad']);
Route::get('extension/crearactividad', [App\Http\Controllers\ExtensionController::class, 'crearactividad']);
Route::post('extension/registroactividad', [App\Http\Controllers\ExtensionController::class, 'registroactividad']);
Route::get('extension/{actividad}/editaractividad', [App\Http\Controllers\ExtensionController::class, 'editaractividad']);
Route::get('extension/{actividad}/veractividad', [App\Http\Controllers\ExtensionController::class, 'veractividad']);
Route::put('extension/{actividad}/actualizaractividad', [App\Http\Controllers\ExtensionController::class, 'actualizaractividad']);
Route::delete('extension/{actividad}/eliminaractividad', [App\Http\Controllers\ExtensionController::class, 'eliminaractividad']);
//Rutas consultoria
Route::get('extension/exportconsultoriapdf', [App\Http\Controllers\ExtensionController::class, 'exportconsultoriapdf']);
Route::get('extension/exportconsultoriaexcel', [App\Http\Controllers\ExtensionController::class, 'exportconsultoriaexcel']);
Route::get('extension/mostrarconsultoria', [App\Http\Controllers\ExtensionController::class, 'mostrarconsultoria']);
Route::get('extension/crearconsultoria', [App\Http\Controllers\ExtensionController::class, 'crearconsultoria']);
Route::post('extension/registroconsultoria', [App\Http\Controllers\ExtensionController::class, 'registroconsultoria']);
Route::get('extension/{consultoria}/editarconsultoria', [App\Http\Controllers\ExtensionController::class, 'editarconsultoria']);
Route::get('extension/{consultoria}/verconsultoria', [App\Http\Controllers\ExtensionController::class, 'verconsultoria']);
Route::put('extension/{consultoria}/actualizarconsultoria', [App\Http\Controllers\ExtensionController::class, 'actualizarconsultoria']);
Route::delete('extension/{consultoria}/eliminarconsultoria', [App\Http\Controllers\ExtensionController::class, 'eliminarconsultoria']);
//Rutas curso
Route::get('extension/exportcursopdf', [App\Http\Controllers\ExtensionController::class, 'exportcursopdf']);
Route::get('extension/exportcursoexcel', [App\Http\Controllers\ExtensionController::class, 'exportcursoexcel']);
Route::get('extension/mostrarcurso', [App\Http\Controllers\ExtensionController::class, 'mostrarcurso']);
Route::get('extension/crearcurso', [App\Http\Controllers\ExtensionController::class, 'crearcurso']);
Route::post('extension/registrocurso', [App\Http\Controllers\ExtensionController::class, 'registrocurso']);
Route::get('extension/{curso}/editarcurso', [App\Http\Controllers\ExtensionController::class, 'editarcurso']);
Route::get('extension/{curso}/vercurso', [App\Http\Controllers\ExtensionController::class, 'vercurso']);
Route::put('extension/{curso}/actualizarcurso', [App\Http\Controllers\ExtensionController::class, 'actualizarcurso']);
Route::delete('extension/{curso}/eliminarcurso', [App\Http\Controllers\ExtensionController::class, 'eliminarcurso']);
//Rutas educación continua
Route::get('extension/exporteducacionpdf', [App\Http\Controllers\ExtensionController::class, 'exporteducacionpdf']);
Route::get('extension/exporteducacionexcel', [App\Http\Controllers\ExtensionController::class, 'exporteducacionexcel']);
Route::get('extension/mostrareducacion', [App\Http\Controllers\ExtensionController::class, 'mostrareducacion']);
Route::get('extension/creareducacion', [App\Http\Controllers\ExtensionController::class, 'creareducacion']);
Route::post('extension/registroeducacion', [App\Http\Controllers\ExtensionController::class, 'registroeducacion']);
Route::get('extension/{educacion}/editareducacion', [App\Http\Controllers\ExtensionController::class, 'editareducacion']);
Route::get('extension/{educacion}/vereducacion', [App\Http\Controllers\ExtensionController::class, 'vereducacion']);
Route::put('extension/{educacion}/actualizareducacion', [App\Http\Controllers\ExtensionController::class, 'actualizareducacion']);
Route::delete('extension/{educacion}/eliminareducacion', [App\Http\Controllers\ExtensionController::class, 'eliminareducacion']);
//Rutas participantes
Route::get('extension/exportparticipantepdf', [App\Http\Controllers\ExtensionController::class, 'exportparticipantepdf']);
Route::get('extension/exportparticipanteexcel', [App\Http\Controllers\ExtensionController::class, 'exportparticipanteexcel']);
Route::get('extension/mostrarparticipante', [App\Http\Controllers\ExtensionController::class, 'mostrarparticipante']);
Route::get('extension/crearparticipante', [App\Http\Controllers\ExtensionController::class, 'crearparticipante']);
Route::post('extension/registroparticipante', [App\Http\Controllers\ExtensionController::class, 'registroparticipante']);
Route::get('extension/{participante}/editarparticipante', [App\Http\Controllers\ExtensionController::class, 'editarparticipante']);
Route::get('extension/{participante}/verparticipante', [App\Http\Controllers\ExtensionController::class, 'verparticipante']);
Route::put('extension/{participante}/actualizarparticipante', [App\Http\Controllers\ExtensionController::class, 'actualizarparticipante']);
Route::delete('extension/{participante}/eliminarparticipante', [App\Http\Controllers\ExtensionController::class, 'eliminarparticipante']);
//Rutas proyectos extension
Route::get('extension/exportproyectoextensionpdf', [App\Http\Controllers\ExtensionController::class, 'exportproyectoextensionpdf']);
Route::get('extension/exportproyectoextensionexcel', [App\Http\Controllers\ExtensionController::class, 'exportproyectoextensionexcel']);
Route::get('extension/mostrarproyectoextension', [App\Http\Controllers\ExtensionController::class, 'mostrarproyectoextension']);
Route::get('extension/crearproyectoextension', [App\Http\Controllers\ExtensionController::class, 'crearproyectoextension']);
Route::post('extension/registroproyectoextension', [App\Http\Controllers\ExtensionController::class, 'registroproyectoextension']);
Route::get('extension/{proyecto}/editarproyectoextension', [App\Http\Controllers\ExtensionController::class, 'editarproyectoextension']);
Route::get('extension/{proyecto}/verproyectoextension', [App\Http\Controllers\ExtensionController::class, 'verproyectoextension']);
Route::put('extension/{proyecto}/actualizarproyectoextension', [App\Http\Controllers\ExtensionController::class, 'actualizarproyectoextension']);
Route::delete('extension/{proyecto}/eliminarproyectoextension', [App\Http\Controllers\ExtensionController::class, 'eliminarproyectoextension']);
//Rutas servicios extensión
Route::get('extension/exportservicioextensionpdf', [App\Http\Controllers\ExtensionController::class, 'exportservicioextensionpdf']);
Route::get('extension/exportservicioextensionexcel', [App\Http\Controllers\ExtensionController::class, 'exportservicioextensionexcel']);
Route::get('extension/mostrarservicioextension', [App\Http\Controllers\ExtensionController::class, 'mostrarservicioextension']);
Route::get('extension/crearservicioextension', [App\Http\Controllers\ExtensionController::class, 'crearservicioextension']);
Route::post('extension/registroservicioextension', [App\Http\Controllers\ExtensionController::class, 'registroservicioextension']);
Route::get('extension/{servicio}/editarservicioextension', [App\Http\Controllers\ExtensionController::class, 'editarservicioextension']);
Route::get('extension/{servicio}/verservicioextension', [App\Http\Controllers\ExtensionController::class, 'verservicioextension']);
Route::put('extension/{servicio}/actualizarservicioextension', [App\Http\Controllers\ExtensionController::class, 'actualizarservicioextension']);
Route::delete('extension/{servicio}/eliminarservicioextension', [App\Http\Controllers\ExtensionController::class, 'eliminarservicioextension']);
//Rutas internacionalización
//Rutas registro fotografico
Route::get('extension/exportfotograficopdf', [App\Http\Controllers\ExtensionController::class, 'exportfotograficopdf']);
Route::get('extension/exportfotograficoexcel', [App\Http\Controllers\ExtensionController::class, 'exportfotograficoexcel']);
Route::get('extension/mostrarregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'mostrarregistrofotografico']);
Route::get('extension/crearregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'crearregistrofotografico']);
Route::post('extension/registrofotografico', [App\Http\Controllers\ExtensionController::class, 'registrofotografico']);
Route::get('extension/{registro}/editarregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'editarregistrofotografico']);
Route::get('extension/{registro}/verregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'verregistrofotografico']);
Route::put('extension/{registro}/actualizarregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'actualizarregistrofotografico']);
Route::delete('extension/{registro}/eliminarregistrofotografico', [App\Http\Controllers\ExtensionController::class, 'eliminarregistrofotografico']);
//Rutas sector externo - redes acádemicas convenios
Route::get('extension/exportredacademiapdf', [App\Http\Controllers\ExtensionController::class, 'exportredacademiapdf']);
Route::get('extension/exportredacademiaexcel', [App\Http\Controllers\ExtensionController::class, 'exportredacademiaexcel']);
Route::get('extension/mostrarinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'mostrarinterredconvenio']);
Route::get('extension/crearinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'crearinterredconvenio']);
Route::post('extension/registrointerredconvenio', [App\Http\Controllers\ExtensionController::class, 'registrointerredconvenio']);
Route::get('extension/{convenio}/editarinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'editarinterredconvenio']);
Route::get('extension/{convenio}/verinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'verinterredconvenio']);
Route::put('extension/{convenio}/actualizarinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'actualizarinterredconvenio']);
Route::delete('extension/{convenio}/eliminarinterredconvenio', [App\Http\Controllers\ExtensionController::class, 'eliminarinterredconvenio']);
//Rutas sector externo - red/organiazciones
Route::get('extension/exportredorganizacionpdf', [App\Http\Controllers\ExtensionController::class, 'exportredorganizacionpdf']);
Route::get('extension/exportredorganizacionexcel', [App\Http\Controllers\ExtensionController::class, 'exportredorganizacionexcel']);
Route::get('extension/mostrarinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'mostrarinterorganizacion']);
Route::get('extension/crearinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'crearinterorganizacion']);
Route::post('extension/registrointerorganizacion', [App\Http\Controllers\ExtensionController::class, 'registrointerorganizacion']);
Route::get('extension/{convenio}/editarinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'editarinterorganizacion']);
Route::get('extension/{convenio}/verinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'verinterorganizacion']);
Route::put('extension/{convenio}/actualizarinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'actualizarinterorganizacion']);
Route::delete('extension/{convenio}/eliminarinterorganizacion', [App\Http\Controllers\ExtensionController::class, 'eliminarinterorganizacion']);
//Rutas internacionalizacion curriculo 
Route::get('extension/exportcurriculopdf', [App\Http\Controllers\ExtensionController::class, 'exportcurriculopdf']);
Route::get('extension/exportcurriculoexcel', [App\Http\Controllers\ExtensionController::class, 'exportcurriculoexcel']);
Route::get('extension/mostrarcurriculo', [App\Http\Controllers\ExtensionController::class, 'mostrarcurriculo']);
Route::get('extension/crearcurriculo', [App\Http\Controllers\ExtensionController::class, 'crearcurriculo']);
Route::post('extension/registrocurriculo', [App\Http\Controllers\ExtensionController::class, 'registrocurriculo']);
Route::get('extension/{curriculo}/editarcurriculo', [App\Http\Controllers\ExtensionController::class, 'editarcurriculo']);
Route::get('extension/{curriculo}/vercurriculo', [App\Http\Controllers\ExtensionController::class, 'vercurriculo']);
Route::put('extension/{curriculo}/actualizarcurriculo', [App\Http\Controllers\ExtensionController::class, 'actualizarcurriculo']);
Route::delete('extension/{curriculo}/eliminarcurriculo', [App\Http\Controllers\ExtensionController::class, 'eliminarcurriculo']);
/*Rutas movilidades*/
//Rutas movilidad nacional
Route::get('extension/exportmovilidadnacionalpdf', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadnacionalpdf']);
Route::get('extension/exportmovilidadnacionalexcel', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadnacionalexcel']);
Route::get('extension/mostrarmovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'mostrarmovilidadnacional']);
Route::get('extension/crearmovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'crearmovilidadnacional']);
Route::post('extension/registromovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'registromovilidadnacional']);
Route::get('extension/{movilidad}/editarmovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'editarmovilidadnacional']);
Route::get('extension/{movilidad}/vermovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'vermovilidadnacional']);
Route::put('extension/{movilidad}/actualizarmovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'actualizarmovilidadnacional']);
Route::delete('extension/{movilidad}/eliminarmovilidadnacional', [App\Http\Controllers\ExtensionController::class, 'eliminarmovilidadnacional']);
//Rutas movilidad intersede
Route::get('extension/exportmovilidadintersedepdf', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadintersedepdf']);
Route::get('extension/exportmovilidadintersedeexcel', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadintersedeexcel']);
Route::get('extension/mostrarmovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'mostrarmovilidadintersede']);
Route::get('extension/crearmovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'crearmovilidadintersede']);
Route::post('extension/registromovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'registromovilidadintersede']);
Route::get('extension/{movilidad}/editarmovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'editarmovilidadintersede']);
Route::get('extension/{movilidad}/vermovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'vermovilidadintersede']);
Route::put('extension/{movilidad}/actualizarmovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'actualizarmovilidadintersede']);
Route::delete('extension/{movilidad}/eliminarmovilidadintersede', [App\Http\Controllers\ExtensionController::class, 'eliminarmovilidadintersede']);
//Rutas movilidad internacional
Route::get('extension/exportmovilidadinternacionalpdf', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadinternacionalpdf']);
Route::get('extension/exportmovilidadinternacionalexcel', [App\Http\Controllers\ExtensionController::class, 'exportmovilidadinternacionalexcel']);
Route::get('extension/mostrarmovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'mostrarmovilidadinternacional']);
Route::get('extension/crearmovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'crearmovilidadinternacional']);
Route::post('extension/registromovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'registromovilidadinternacional']);
Route::get('extension/{movilidad}/editarmovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'editarmovilidadinternacional']);
Route::get('extension/{movilidad}/vermovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'vermovilidadinternacional']);
Route::put('extension/{movilidad}/actualizarmovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'actualizarmovilidadinternacional']);
Route::delete('extension/{movilidad}/eliminarmovilidadinternacional', [App\Http\Controllers\ExtensionController::class, 'eliminarmovilidadinternacional']);
//Rutas eventos virtuales
Route::get('extension/exporteventopdf', [App\Http\Controllers\ExtensionController::class, 'exporteventopdf']);
Route::get('extension/exporteventoexcel', [App\Http\Controllers\ExtensionController::class, 'exporteventoexcel']);
Route::get('extension/mostrareventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'mostrareventosvirtuales']);
Route::get('extension/creareventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'creareventosvirtuales']);
Route::post('extension/registroeventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'registroeventosvirtuales']);
Route::get('extension/{evento}/editareventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'editareventosvirtuales']);
Route::get('extension/{evento}/vereventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'vereventosvirtuales']);
Route::put('extension/{evento}/actualizareventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'actualizareventosvirtuales']);
Route::delete('extension/{evento}/eliminareventosvirtuales', [App\Http\Controllers\ExtensionController::class, 'eliminareventosvirtuales']);
//Rutas participación eventos
Route::get('extension/exportparticipacionpdf', [App\Http\Controllers\ExtensionController::class, 'exportparticipacionpdf']);
Route::get('extension/exportparticipacionexcel', [App\Http\Controllers\ExtensionController::class, 'exportparticipacionexcel']);
Route::get('extension/mostrarparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'mostrarparticipacioneventos']);
Route::get('extension/crearparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'crearparticipacioneventos']);
Route::post('extension/registroparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'registroparticipacioneventos']);
Route::get('extension/{evento}/editarparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'editarparticipacioneventos']);
Route::get('extension/{evento}/verparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'verparticipacioneventos']);
Route::put('extension/{evento}/actualizarparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'actualizarparticipacioneventos']);
Route::delete('extension/{evento}/eliminarparticipacioneventos', [App\Http\Controllers\ExtensionController::class, 'eliminarparticipacioneventos']);
//Rutas eventos internacionales
Route::get('extension/exportinternacionalpdf', [App\Http\Controllers\ExtensionController::class, 'exportinternacionalpdf']);
Route::get('extension/exportinternacionalexcel', [App\Http\Controllers\ExtensionController::class, 'exportinternacionalexcel']);
Route::get('extension/mostrareventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'mostrareventosinternacionales']);
Route::get('extension/creareventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'creareventosinternacionales']);
Route::post('extension/registroeventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'registroeventosinternacionales']);
Route::get('extension/{evento}/editareventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'editareventosinternacionales']);
Route::get('extension/{evento}/vereventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'vereventosinternacionales']);
Route::put('extension/{evento}/actualizareventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'actualizareventosinternacionales']);
Route::delete('extension/{evento}/eliminareventosinternacionales', [App\Http\Controllers\ExtensionController::class, 'eliminareventosinternacionales']);
Route::resource('extension', App\Http\Controllers\ExtensionController::class);


//Rutas Redes Acádemicas
Route::get('/red/exportpdf', [App\Http\Controllers\RedAcademicaController::class, 'exportpdf']);
Route::get('/red/exportexcel', [App\Http\Controllers\RedAcademicaController::class, 'exportexcel']);
Route::resource('red', App\Http\Controllers\RedAcademicaController::class);


//Rutas Practicas Laborales
Route::get('/practica/exportpdf', [App\Http\Controllers\PracticaController::class, 'exportpdf']);
Route::get('/practica/exportdocentepdf', [App\Http\Controllers\PracticaController::class, 'exportdocentepdf']);
Route::get('/practica/exportestudiantepdf', [App\Http\Controllers\PracticaController::class, 'exportestudiantepdf']);
Route::get('/practica/exportexcel', [App\Http\Controllers\PracticaController::class, 'exportexcel']);
Route::get('/practica/exportdocenteexcel', [App\Http\Controllers\PracticaController::class, 'exportdocenteexcel']);
Route::get('/practica/exportestudianteexcel', [App\Http\Controllers\PracticaController::class, 'exportestudianteexcel']);
Route::resource('practica', App\Http\Controllers\PracticaController::class);

//Rutas laboratorios
Route::get('/laboratorio/exportpdf', [App\Http\Controllers\LaboratorioController::class, 'exportpdf']);
Route::get('/laboratorio/exportexcel', [App\Http\Controllers\LaboratorioController::class, 'exportexcel']);
Route::resource('laboratorio',  App\Http\Controllers\LaboratorioController::class);


//Rutas módulo movilidad
Route::get('/movilidad/exportpdf', [App\Http\Controllers\MovilidadController::class, 'exportpdf']);
Route::get('/movilidad/exportexcel', [App\Http\Controllers\MovilidadController::class, 'exportexcel']);
Route::resource('movilidad', App\Http\Controllers\MovilidadController::class);


//Rutas convenios
Route::get('/convenio/exportpdf', [App\Http\Controllers\ConvenioController::class, 'exportpdf']);
Route::get('/convenio/exportexcel', [App\Http\Controllers\ConvenioController::class, 'exportexcel']);
Route::resource('convenio', App\Http\Controllers\ConvenioController::class);

//Rutas bienestar
Route::get('/bienestar/exportpdf', [App\Http\Controllers\BienestarController::class, 'exportpdf']);
Route::get('/bienestar/exportexcel', [App\Http\Controllers\BienestarController::class, 'exportexcel']);
Route::resource('bienestar', App\Http\Controllers\BienestarController::class);


//Rutas investigacion
//Rutas grupo
Route::get('/investigacion/exportpdfinvestigacion', [App\Http\Controllers\InvestigacionController::class, 'exportpdfinvestigacion']);
Route::get('/investigacion/exportexcelinvestigacion', [App\Http\Controllers\InvestigacionController::class, 'exportexcelinvestigacion']);
Route::get('investigacion/mostrargrupo', [App\Http\Controllers\InvestigacionController::class, 'mostrargrupo']);
Route::get('investigacion/creargrupo', [App\Http\Controllers\InvestigacionController::class, 'creargrupo']);
Route::post('investigacion/registrogrupo', [App\Http\Controllers\InvestigacionController::class, 'registrogrupo']);
Route::get('investigacion/{grupo}/vergrupo', [App\Http\Controllers\InvestigacionController::class, 'vergrupo']);
Route::get('investigacion/{grupo}/editargrupo', [App\Http\Controllers\InvestigacionController::class, 'editargrupo']);
Route::put('investigacion/{grupo}/actualizargrupo', [App\Http\Controllers\InvestigacionController::class, 'actualizargrupo']);
Route::delete('investigacion/{grupo}/eliminargrupo', [App\Http\Controllers\InvestigacionController::class, 'eliminargrupo']);
//Rutas investigadores
Route::get('/investigacion/exportpdfintegrante', [App\Http\Controllers\InvestigacionController::class, 'exportpdfintegrante']);
Route::get('/investigacion/exportexcelintegrante', [App\Http\Controllers\InvestigacionController::class, 'exportexcelintegrante']);
Route::get('investigacion/mostrarintegrante', [App\Http\Controllers\InvestigacionController::class, 'mostrarintegrante']);
Route::get('investigacion/crearintegrante', [App\Http\Controllers\InvestigacionController::class, 'crearintegrante']);
Route::post('investigacion/registrointegrante', [App\Http\Controllers\InvestigacionController::class, 'registrointegrante']);
Route::get('investigacion/{integrante}/verintegrante', [App\Http\Controllers\InvestigacionController::class, 'verintegrante']);
Route::get('investigacion/{integrante}/editarintegrante', [App\Http\Controllers\InvestigacionController::class, 'editarintegrante']);
Route::put('investigacion/{integrante}/actualizarintegrante', [App\Http\Controllers\InvestigacionController::class, 'actualizarintegrante']);
Route::delete('investigacion/{integrante}/eliminarintegrante', [App\Http\Controllers\InvestigacionController::class, 'eliminarintegrante']);
//Rutas proyectos
Route::get('/investigacion/exportpdfproyecto', [App\Http\Controllers\InvestigacionController::class, 'exportpdfproyecto']);
Route::get('/investigacion/exportexcelproyecto', [App\Http\Controllers\InvestigacionController::class, 'exportexcelproyecto']);
Route::get('investigacion/mostrarproyecto', [App\Http\Controllers\InvestigacionController::class, 'mostrarproyecto']);
Route::get('investigacion/crearproyecto', [App\Http\Controllers\InvestigacionController::class, 'crearproyecto']);
Route::post('investigacion/registroproyecto', [App\Http\Controllers\InvestigacionController::class, 'registroproyecto']);
Route::get('investigacion/{proyecto}/verproyecto', [App\Http\Controllers\InvestigacionController::class, 'verproyecto']);
Route::get('investigacion/{proyecto}/editarproyecto', [App\Http\Controllers\InvestigacionController::class, 'editarproyecto']);
Route::put('investigacion/{proyecto}/actualizarproyecto', [App\Http\Controllers\InvestigacionController::class, 'actualizarproyecto']);
Route::delete('investigacion/{proyecto}/eliminarproyecto', [App\Http\Controllers\InvestigacionController::class, 'eliminarproyecto']);
Route::resource('investigacion', App\Http\Controllers\InvestigacionController::class);