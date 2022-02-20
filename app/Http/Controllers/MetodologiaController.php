<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metodologia;
use RealRashid\SweetAlert\Facades\Alert;

class MetodologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodologia = Metodologia::all();
        return view('configuracion/metodologia.index')->with('metodologia', $metodologia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion/metodologia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['met_nombre' => 'required'];

        $message = ['met_nombre.required' => 'El campo Metodologia es requerido'];

        $this->validate($request,$rules,$message);

        $metodologia = new Metodologia();
        $metodologia->met_nombre = $request->get('met_nombre');

        $metodologia->save();

        Alert::success('Registro exitoso');


        return redirect('/metodologia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodologia = Metodologia::find($id);
        return view('configuracion/metodologia.show')->with('metodologia', $metodologia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodologia = Metodologia::find($id);
        return view('configuracion/metodologia.edit')->with('metodologia', $metodologia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = ['met_nombre' => 'required'];

        $message = ['met_nombre.required' => 'El campo Metodologia es requerido'];

        $this->validate($request,$rules,$message);

        $metodologia = Metodologia::find($id);
        $metodologia->met_nombre = $request->get('met_nombre');

        $metodologia->save();

        Alert::success('Registro Actualizado');


        return redirect('/metodologia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metodologia = Metodologia::find($id);
        $metodologia->delete();

        Alert::success('Registro Eliminado');

        return redirect('/metodologia');
    }
}
