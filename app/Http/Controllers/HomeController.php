<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $personas = DB::table('persona')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
            ->where('per_tipo_usuario',1)
            ->orWhere('per_tipo_usuario',2)
            ->orWhere('per_tipo_usuario',4)
            ->get();
        $docentes = DB::table('persona')
            ->where('per_tipo_usuario',2)
            ->orWhere('per_tipo_usuario',3)
            ->get();
            $estudiantes = DB::table('persona')
            ->join('estudiante','persona.id','=','estudiante.estu_id_estudiante')
            ->where('per_tipo_usuario',6)
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
        return view('home')
        ->with('personas', $personas)
        ->with('docentes', $docentes)
        ->with('estudiantes', $estudiantes)
        ->with('egresados', $egresados)
        ->with('administrativos', $administrativos);
    }
}
