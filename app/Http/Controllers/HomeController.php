<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\TipoUsuario;
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
            ->select('persona.id','per_tipo_documento','per_numero_documento','per_nombre','per_apellido','per_correo','per_telefono','tip_nombre','per_id_estado','per_tipo_usuario')
            ->join('tipo_usuario','persona.per_tipo_usuario','=','tipo_usuario.id')
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
        ->with('tipousuarios', $tipousuarios)
        ->with('administrativos', $administrativos)
        ->with('directores', $directores);
    }
}
