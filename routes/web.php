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


Route::get('/departamento/pdf',[App\Http\Controllers\DepartamentoController::class, 'pdf']);
Route::get('/departamento/export',[App\Http\Controllers\DepartamentoController::class, 'export']);

Route::get('/municipio/pdf',[App\Http\Controllers\MunicipioController::class, 'pdf']);
Route::get('/municipio/export',[App\Http\Controllers\MunicipioController::class, 'export']);

Route::get('/facultad/pdf',[App\Http\Controllers\FacultadController::class, 'pdf']);
Route::get('/facultad/export',[App\Http\Controllers\FacultadController::class, 'export']);

Route::get('/nivelformacion/pdf',[App\Http\Controllers\NivelformacionController::class, 'pdf']);
Route::get('/nivelformacion/export',[App\Http\Controllers\NivelformacionController::class, 'export']);

Route::resource('/departamento', App\Http\Controllers\DepartamentoController::class);


Route::get('/docente/{docente}/directorcompletar', [App\Http\Controllers\DocenteController::class, 'directorcompletar']);
Route::put('/docente/{docente}/directordocente', [App\Http\Controllers\DocenteController::class, 'directordocente']);
Route::resource('/docente', App\Http\Controllers\DocenteController::class);

Route::resource('/municipio', App\Http\Controllers\MunicipioController::class);
Route::resource('/facultad', App\Http\Controllers\FacultadController::class);
Route::resource('/nivelformacion', App\Http\Controllers\NivelFormacionController::class);
Route::resource('/metodologia', App\Http\Controllers\MetodologiaController::class);

