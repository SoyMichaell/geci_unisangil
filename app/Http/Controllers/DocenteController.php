<?php

namespace App\Http\Controllers;

use App\Models\Docente;
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
        $rules = [
            'ciudad_procedencia'=>'required',
            'correo_personal'=>'required',
            'fecha_vinculacion'=>'required',
            'eps'=>'required',
            'riesgo'=>'required',
            'banco'=>'required',
            'no_banco'=>'required',
            'pension'=>'required'
        ];

        $message = [
            'ciudad_procedencia.required' => 'El campo ciudad de procedencia es requerido',
            'correo_personal.required' => 'El campo correo personal es requerido',
            'fecha_vinculacion.required' => 'El campo fecha vinculación es requerido',
            'eps.required' => 'El campo eps es requerido',
            'riesgo.required' => 'El campo riesgo es requerido',
            'banco.required' => 'El campo banco es requerido',
            'no_banco.required' => 'El campo no. banco es requerido',
            'pension.required' => 'El campo pensión es requerido'
        ];

        $this->validate($request,$rules,$message);

        $directord = Docente::find($id);


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

    public function exportPDF(){

    }

}
