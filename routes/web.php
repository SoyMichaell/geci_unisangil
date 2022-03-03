<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $personas = User::all();
        return view('home')->with('personas', $personas);
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
Route::get('/estudiante/pdf', [App\Http\Controllers\EstudianteController::class, 'pdf']);
Route::get('/estudiante/export', [App\Http\Controllers\EstudianteController::class, 'export']);
Route::get('/estudiante/listadobeca', [App\Http\Controllers\EstudianteController::class, 'listadobeca']);
Route::get('/estudiante/listadocontado', [App\Http\Controllers\EstudianteController::class, 'listadocontado']);
Route::get('/estudiante/listadoprestamo', [App\Http\Controllers\EstudianteController::class, 'listadoprestamo']);
Route::post('/estudiante/listadoingreso', [App\Http\Controllers\EstudianteController::class, 'listadoingreso']);
Route::resource('estudiante', App\Http\Controllers\EstudianteController::class);

/*Rutas docentes*/
Route::get('docente/mostrardocente', [App\Http\Controllers\DocenteController::class, 'mostrardocente']);
Route::post('docente/registrodocente', [App\Http\Controllers\DocenteController::class, 'registrodocente']);
Route::get('docente/{docente}/directorcompletar', [App\Http\Controllers\DocenteController::class, 'directorcompletar']);
Route::post('docente/directorinformacion', [App\Http\Controllers\DocenteController::class, 'directorinformacion']);
Route::put('docente/{docente}/actualizarinformacion', [App\Http\Controllers\DocenteController::class, 'actualizarinformacion']);
Route::put('docente/{docente}/directorestudios', [App\Http\Controllers\DocenteController::class, 'directorestudios']);
Route::put('docente/{docente}/zip', [App\Http\Controllers\DocenteController::class, 'zip']);
Route::put('docente/{docente}/{estado}/estado', [App\Http\Controllers\DocenteController::class, 'estado']);
Route::get('docente/{docente}/mostrarcontrato', [App\Http\Controllers\DocenteController::class, 'mostrarcontrato']);
Route::get('docente/{docente}/crearcontrato', [App\Http\Controllers\DocenteController::class, 'crearcontrato']);
Route::post('docente/registrocontrato', [App\Http\Controllers\DocenteController::class, 'registrocontrato']);
Route::get('docente/{docente}/{contrato}/editarcontrato', [App\Http\Controllers\DocenteController::class, 'editarcontrato']);
Route::put('docente/{contrato}/actualizarcontrato', [App\Http\Controllers\DocenteController::class, 'actualizarcontrato']);
Route::delete('docente/{contrato}/eliminarcontrato', [App\Http\Controllers\DocenteController::class, 'eliminarcontrato']);
Route::get('docente/{docente}/mostrarevaluacion', [App\Http\Controllers\DocenteController::class, 'mostrarevaluacion']);
Route::get('docente/{docente}/crearevaluacion', [App\Http\Controllers\DocenteController::class, 'crearevaluacion']);
Route::post('docente/registroevaluacion', [App\Http\Controllers\DocenteController::class, 'registroevaluacion']);
Route::get('docente/{docente}/{evaluacion}/editarevaluacion', [App\Http\Controllers\DocenteController::class, 'editarevaluacion']);
Route::put('docente/{evaluacion}/actualizarevaluacion', [App\Http\Controllers\DocenteController::class, 'actualizarevaluacion']);
Route::delete('docente/{evaluacion}/eliminarevaluacion', [App\Http\Controllers\DocenteController::class, 'eliminarevaluacion']);
Route::get('docente/{docente}/mostrarasignatura', [App\Http\Controllers\DocenteController::class, 'mostrarasignatura']);
Route::resource('docente', App\Http\Controllers\DocenteController::class);

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
Route::resource('programa', App\Http\Controllers\ProgramaController::class);

/*Rutas asignatura*/
Route::resource('asignatura', App\Http\Controllers\AsignaturaController::class);

/*Rutas trabajo de grado*/
Route::put('trabajo/{trabajo}/faseestado', [App\Http\Controllers\TrabajoController::class, 'faseestado']);
Route::put('trabajo/{trabajo}/fasejurado', [App\Http\Controllers\TrabajoController::class, 'fasejurado']);
Route::put('trabajo/{trabajo}/faseacta', [App\Http\Controllers\TrabajoController::class, 'faseacta']);
Route::put('trabajo/{trabajo}/registroobservacion', [App\Http\Controllers\TrabajoController::class, 'registroobservacion']);
Route::resource('trabajo', App\Http\Controllers\TrabajoController::class);
Route::resource('modalidad', App\Http\Controllers\ModalidadGradoController::class);

/*Rutas software tic's*/
Route::resource('software', App\Http\Controllers\SoftwareController::class);


/*Rutas usuario*/
Route::resource('usuario', App\Http\Controllers\UserController::class);


/*Rutas extensión*/
//Rutas actividad
Route::get('extension/mostraractividad', [App\Http\Controllers\ExtensionController::class, 'mostraractividad']);
Route::get('extension/crearactividad', [App\Http\Controllers\ExtensionController::class, 'crearactividad']);
Route::post('extension/registroactividad', [App\Http\Controllers\ExtensionController::class, 'registroactividad']);
Route::get('extension/{actividad}/editaractividad', [App\Http\Controllers\ExtensionController::class, 'editaractividad']);
Route::get('extension/{actividad}/veractividad', [App\Http\Controllers\ExtensionController::class, 'veractividad']);
Route::put('extension/{actividad}/actualizaractividad', [App\Http\Controllers\ExtensionController::class, 'actualizaractividad']);
Route::delete('extension/{actividad}/eliminaractividad', [App\Http\Controllers\ExtensionController::class, 'eliminaractividad']);
//Rutas actividad recurso
Route::get('extension/mostraractrecurso', [App\Http\Controllers\ExtensionController::class, 'mostraractrecurso']);
Route::get('extension/crearactrecurso', [App\Http\Controllers\ExtensionController::class, 'crearactrecurso']);
Route::post('extension/registroactrecurso', [App\Http\Controllers\ExtensionController::class, 'registroactrecurso']);
Route::get('extension/{recurso}/editaractrecurso', [App\Http\Controllers\ExtensionController::class, 'editaractrecurso']);
Route::get('extension/{recurso}/veractrecurso', [App\Http\Controllers\ExtensionController::class, 'veractrecurso']);
Route::put('extension/{recurso}/actualizaractrecurso', [App\Http\Controllers\ExtensionController::class, 'actualizaractrecurso']);
Route::delete('extension/{recurso}/eliminaractrecurso', [App\Http\Controllers\ExtensionController::class, 'eliminaractrecurso']);
//Rutas consultoria
Route::get('extension/mostrarconsultoria', [App\Http\Controllers\ExtensionController::class, 'mostrarconsultoria']);
Route::get('extension/crearconsultoria', [App\Http\Controllers\ExtensionController::class, 'crearconsultoria']);
Route::post('extension/registroconsultoria', [App\Http\Controllers\ExtensionController::class, 'registroconsultoria']);
Route::get('extension/{consultoria}/editarconsultoria', [App\Http\Controllers\ExtensionController::class, 'editarconsultoria']);
Route::get('extension/{consultoria}/verconsultoria', [App\Http\Controllers\ExtensionController::class, 'verconsultoria']);
Route::put('extension/{consultoria}/actualizarconsultoria', [App\Http\Controllers\ExtensionController::class, 'actualizarconsultoria']);
Route::delete('extension/{consultoria}/eliminarconsultoria', [App\Http\Controllers\ExtensionController::class, 'eliminarconsultoria']);
//Rutas consultoria recurso
Route::get('extension/mostrarconsurecurso', [App\Http\Controllers\ExtensionController::class, 'mostrarconsurecurso']);
Route::get('extension/crearconsurecurso', [App\Http\Controllers\ExtensionController::class, 'crearconsurecurso']);
Route::post('extension/registroconsurecurso', [App\Http\Controllers\ExtensionController::class, 'registroconsurecurso']);
Route::get('extension/{recurso}/editarconsurecurso', [App\Http\Controllers\ExtensionController::class, 'editarconsurecurso']);
Route::get('extension/{recurso}/verconsurecurso', [App\Http\Controllers\ExtensionController::class, 'verconsurecurso']);
Route::put('extension/{recurso}/actualizarconsurecurso', [App\Http\Controllers\ExtensionController::class, 'actualizarconsurecurso']);
Route::delete('extension/{recurso}/eliminarconsurecurso', [App\Http\Controllers\ExtensionController::class, 'eliminarconsurecurso']);
//Rutas curso
Route::get('extension/mostrarcurso', [App\Http\Controllers\ExtensionController::class, 'mostrarcurso']);
Route::get('extension/crearcurso', [App\Http\Controllers\ExtensionController::class, 'crearcurso']);
Route::post('extension/registrocurso', [App\Http\Controllers\ExtensionController::class, 'registrocurso']);
Route::get('extension/{curso}/editarcurso', [App\Http\Controllers\ExtensionController::class, 'editarcurso']);
Route::get('extension/{curso}/vercurso', [App\Http\Controllers\ExtensionController::class, 'vercurso']);
Route::put('extension/{curso}/actualizarcurso', [App\Http\Controllers\ExtensionController::class, 'actualizarcurso']);
Route::delete('extension/{curso}/eliminarcurso', [App\Http\Controllers\ExtensionController::class, 'eliminarcurso']);
//Rutas educación continua
Route::get('extension/mostrareducacion', [App\Http\Controllers\ExtensionController::class, 'mostrareducacion']);
Route::get('extension/creareducacion', [App\Http\Controllers\ExtensionController::class, 'creareducacion']);
Route::post('extension/registroeducacion', [App\Http\Controllers\ExtensionController::class, 'registroeducacion']);
Route::get('extension/{educacion}/editareducacion', [App\Http\Controllers\ExtensionController::class, 'editareducacion']);
Route::get('extension/{educacion}/vereducacion', [App\Http\Controllers\ExtensionController::class, 'vereducacion']);
Route::put('extension/{educacion}/actualizareducacion', [App\Http\Controllers\ExtensionController::class, 'actualizareducacion']);
Route::delete('extension/{educacion}/eliminareducacion', [App\Http\Controllers\ExtensionController::class, 'eliminareducacion']);
//Rutas participantes
Route::get('extension/mostrarparticipante', [App\Http\Controllers\ExtensionController::class, 'mostrarparticipante']);
Route::get('extension/crearparticipante', [App\Http\Controllers\ExtensionController::class, 'crearparticipante']);
Route::post('extension/registroparticipante', [App\Http\Controllers\ExtensionController::class, 'registroparticipante']);
Route::get('extension/{participante}/editarparticipante', [App\Http\Controllers\ExtensionController::class, 'editarparticipante']);
Route::get('extension/{participante}/verparticipante', [App\Http\Controllers\ExtensionController::class, 'verparticipante']);
Route::put('extension/{participante}/actualizarparticipante', [App\Http\Controllers\ExtensionController::class, 'actualizarparticipante']);
Route::delete('extension/{participante}/eliminarparticipante', [App\Http\Controllers\ExtensionController::class, 'eliminarparticipante']);
Route::resource('extension', App\Http\Controllers\ExtensionController::class);



//Rutas Redes Acádemicas
Route::resource('red', App\Http\Controllers\RedAcademicaController::class);