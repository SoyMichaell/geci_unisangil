<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function directorcompletar(){
        $dedicacions = collect(['Tiempo completo', 'Tiempo catedra', 'Medio tiempo']);
        $dedicacions = $dedicacions->all();

        $tiposcontratacions = collect(['Contrato indefinido','Contrato a término fijo']);
        $tiposcontratacions = $tiposcontratacions->all();

        $estados = collect(['Activo','Inactivo']);
        $estados->all();

        return view('docente.created')
            ->with('dedicacions', $dedicacions)
            ->with('tiposcontratacions', $tiposcontratacions)
            ->with('estados', $estados);
    }

    public function directordocente(Request $request, $id){


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
