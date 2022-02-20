<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function directorcompletar($id)
    {
        if (auth()->user()->per_tipo_usuario == 2) {

            $dedicacions = collect(['Tiempo completo', 'Tiempo catedra', 'Medio tiempo']);
            $dedicacions = $dedicacions->all();

            $tiposcontratacions = collect(['Contrato indefinido', 'Contrato a término fijo']);
            $tiposcontratacions = $tiposcontratacions->all();

            $estados = collect(['Activo', 'Inactivo']);
            $estados->all();

            $persona = DB::table('persona')->select('id')->where('per_tipo_usuario','=',2,'and','id','=',$id)->get();

            return view('docente.created')
                ->with('dedicacions', $dedicacions)
                ->with('tiposcontratacions', $tiposcontratacions)
                ->with('estados', $estados)
                ->with('persona', $persona);
        }
    }

    public function directordocente(Request $request, $id)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
