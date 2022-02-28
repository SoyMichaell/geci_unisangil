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