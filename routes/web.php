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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/departamento', App\Http\Controllers\DepartamentoController::class);

/*Rutas docentes*/
Route::get('/docente/{docente}/directorcompletar', [App\Http\Controllers\DocenteController::class, 'directorcompletar']);
Route::post('/docente/directorinformacion', [App\Http\Controllers\DocenteController::class, 'directorinformacion']);
Route::put('/docente/{docente}/directordocente', [App\Http\Controllers\DocenteController::class, 'directordocente']);
Route::resource('/docente', App\Http\Controllers\DocenteController::class);


/*Rutas programa*/
Route::resource('/programa', App\Http\Controllers\ProgramaController::class);

Route::resource('/municipio', App\Http\Controllers\MunicipioController::class);
Route::resource('/facultad', App\Http\Controllers\FacultadController::class);
Route::resource('/nivelformacion', App\Http\Controllers\NivelFormacionController::class);
Route::resource('/metodologia', App\Http\Controllers\MetodologiaController::class);