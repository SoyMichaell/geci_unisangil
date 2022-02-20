<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultad;
use RealRashid\SweetAlert\Facades\Alert;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultad=Facultad::all();
        return view('configuracion/facultad.index')->with('facultad',$facultad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultad=Facultad::all();
        return view('configuracion/facultad.create')->with("facultad",$facultad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =['fac_nombre'=>'required'];

        $message=['fac_nombre'.'required'=> 'El campo Facultad es requerido'];
        $this->validate($request,$rules,$message);

        $facultad=new Facultad();
        $facultad-> fac_nombre=$request->get('fac_nombre');

        $facultad->save();
        Alert::success('Registro exitoso');
        return redirect('/facultad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultad = Facultad::find($id);
        return view('configuracion/facultad.show')->with('facultad', $facultad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facultad = Facultad::find($id);
        return view('configuracion/facultad.edit')->with('facultad', $facultad);
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
        $rules =['fac_nombre'=>'required'];
        $message=['fac_nombre.required'=>"El campo Facultad es requerido"];
        $this->validate($request,$rules,$message);
        $facultad=Facultad::find($id);
        $facultad->fac_nombre=$request->get("fac_nombre");
        $facultad->save();
        Alert::success("Registro Actualizado");
        return redirect("/facultad");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultad::find($id);
        $facultad->delete();

        Alert::success('Registro Eliminado');

        return redirect('/facultad');
    }
}
