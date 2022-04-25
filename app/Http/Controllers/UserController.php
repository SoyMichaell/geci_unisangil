<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Programa;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function create()
    {
        $tiposdocumento = collect(['Tarjeta de identidad', 'Cedula de ciudadania', 'Cédula de extranjeria']);
        $tiposdocumento->all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $programas = Programa::all();
        if (!Auth::check()) {
            $tiposusuario = DB::table('tipo_usuario')
                ->Where('id', 2)
                ->orWhere('id', 4)
                ->get();
        } else if (Auth::check()) {
            $tiposusuario = DB::table('tipo_usuario')
                ->where('id', 1)
                ->orWhere('id', 10)
                ->orWhere('id', 9)
                ->orWhere('id', 4)
                ->orWhere('id', 2)
                ->orderBy('tip_nombre')
                ->get();
        }
        return view('auth.register')
            ->with('tiposdocumento', $tiposdocumento)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposusuario', $tiposusuario)
            ->with('programas', $programas);
    }


    public function store(Request $request)
    {
        $rules = [
            'per_tipo_documento' => 'required',
            'per_numero_documento' => 'required',
            'per_nombre' => 'required',
            'per_apellido' => 'required',
            'per_telefono' => 'required',
            'per_correo' => 'required',
            'password' => 'required',
            'per_departamento' => 'required|not_in:0',
            'per_ciudad' => 'required|not_in:0',
            'per_tipo_usuario' => 'required',
        ];
        $message = [
            'per_tipo_documento.required' => 'El campo tipo de documento es requerido',
            'per_numero_documento.required' => 'El campo número de documento es requerido',
            'per_nombre.required' => 'El campo nombre (s) es requerido',
            'per_apellido.required' => 'El campo apellido (s) es requerido',
            'per_telefono.required' => 'El campo telefono es requerido',
            'per_correo.required' => 'El campo correo electronico es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password_confirmation.required' => 'El campo confirmar contraseña es requerido',
            'per_departamento.required' => 'El campo departamento es requerido',
            'per_ciudad.required' => 'El campo ciudad es requerido',
            'per_tipo_usuario.required' => 'El campo tipo de usuario es requerido',
        ];

        $this->validate($request, $rules, $message);

        if ($request->get('password') != $request->get('password_confirmation')) {
            Alert::warning('Advertencia', 'Las contraseñas no coinciden');
            return back()->withInput();
        }

        //Validación número de documento
        $personaExiste = DB::table('persona')
            ->where('per_numero_documento', $request->get('per_numero_documento'))
            ->get();
        if ($personaExiste->count() > 0) {
            Alert::warning('Registro existente', 'El número de documento que intenta registrar ya existe');
            return back()->withInput();
        }
        //Validación correo
        $correoExiste = DB::table('persona')
            ->where('per_correo', $request->get('per_correo'))
            ->get();
        if ($correoExiste->count() > 0) {
            Alert::warning('Correo encontrado', 'El correo electronico que intenta registrar ya existe');
            return back()->withInput();
        }

        //Validación roles 

        if ($request->get('per_tipo_usuario') == '1' || $request->get('per_tipo_usuario') == '4') {
            DB::table('persona')->insert(
                [
                    'per_tipo_documento' => $request->get('per_tipo_documento'),
                    'per_numero_documento' =>  $request->get('per_numero_documento'),
                    'per_nombre' => $request->get('per_nombre'),
                    'per_apellido' => $request->get('per_apellido'),
                    'per_telefono' => $request->get('per_telefono'),
                    'per_correo' => $request->get('per_correo'),
                    'password' => Hash::make(($request->get('password'))),
                    'per_departamento' => $request->get('per_departamento'),
                    'per_ciudad' => $request->get('per_ciudad'),
                    'per_tipo_usuario' => $request->get('per_tipo_usuario'),
                    'per_id_estado' => 'activo',
                ]
            );
        } else if ($request->get('per_tipo_usuario') == '10' || $request->get('per_tipo_usuario') == '2') {
            DB::table('persona')->insert(
                [
                    'per_tipo_documento' => $request->get('per_tipo_documento'),
                    'per_numero_documento' =>  $request->get('per_numero_documento'),
                    'per_nombre' => $request->get('per_nombre'),
                    'per_apellido' => $request->get('per_apellido'),
                    'per_telefono' => $request->get('per_telefono'),
                    'per_correo' => $request->get('per_correo'),
                    'password' => Hash::make(($request->get('password'))),
                    'per_departamento' => $request->get('per_departamento'),
                    'per_ciudad' => $request->get('per_ciudad'),
                    'per_tipo_usuario' => $request->get('per_tipo_usuario'),
                    'per_id_estado' => 'activo',
                ]
            );
            $id = DB::getPdo()->lastInsertId();
            DB::table('docente')->insert(
                [
                    'id_persona_docente' => $id,
                    'id_proceso' => 1,
                ]
            );
        } else if ($request->get('per_tipo_usuario') == '9') {
            DB::table('persona')->insert(
                [
                    'per_tipo_documento' => $request->get('per_tipo_documento'),
                    'per_numero_documento' =>  $request->get('per_numero_documento'),
                    'per_nombre' => $request->get('per_nombre'),
                    'per_apellido' => $request->get('per_apellido'),
                    'per_telefono' => $request->get('per_telefono'),
                    'per_correo' => $request->get('per_correo'),
                    'password' => Hash::make(($request->get('password'))),
                    'per_departamento' => $request->get('per_departamento'),
                    'per_ciudad' => $request->get('per_ciudad'),
                    'per_tipo_usuario' => $request->get('per_tipo_usuario'),
                    'per_id_estado' => 'activo',
                ]
            );
            $id = DB::getPdo()->lastInsertId();
            DB::table('estudiante')->insert(
                [
                    'estu_id_estudiante' => $id,
                    'estu_programa' => $request->get('estu_programa'),
                ]
            );
        }

        if (Auth::check()) {
            Alert::success('Exitoso', 'La persona ha sido registrada con exito');
            return redirect('/home');
        } else {
            Alert::success('Exitoso', 'La persona ha sido registrada con exito');
            return redirect('/login');
        }
    }

    public function actualizarestado($id)
    {
        $estado = DB::table('persona')->where('id', $id)->first();
        if ($estado->per_id_estado == 'activo') {
            DB::table('persona')->where('id', $id)->update([
                'per_id_estado' => 'inactivo'
            ]);
            Alert::success('Exitoso', 'Estado actualizado');
            return redirect('/home');
        } else {
            DB::table('persona')->where('id', $id)->update([
                'per_id_estado' => 'activo'
            ]);
            Alert::success('Exitoso', 'Estado actualizado');
            return redirect('/home');
        }
    }

    public function profile($id)
    {
        try {
            $tipousuarios = DB::table('tipo_usuario')->orderBy('tip_nombre')->get();
            $persona = DB::table('persona')->where('id', $id)->first();
            return view('auth.profile')
                ->with('persona', $persona)
                ->with('tipousuarios', $tipousuarios);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar este persona, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }

    public function actualizardato(Request $request, $id)
    {

        if($request->get('per_tipo_usuario') == '6' || $request->get('per_tipo_usuario') == '3'){
            DB::table('persona')->where('id', $id)
            ->update([
                'per_tipo_documento' => $request->get('per_tipo_documento'),
                'per_numero_documento' => $request->get('per_numero_documento'),
                'per_nombre' => $request->get('per_nombre'),
                'per_apellido' => $request->get('per_apellido'),
                'per_correo' => $request->get('per_correo'),
                'password' => "",
                'per_tipo_usuario' => $request->get('per_tipo_usuario')
            ]);
        }else{
            DB::table('persona')->where('id', $id)
            ->update([
                'per_tipo_documento' => $request->get('per_tipo_documento'),
                'per_numero_documento' => $request->get('per_numero_documento'),
                'per_nombre' => $request->get('per_nombre'),
                'per_apellido' => $request->get('per_apellido'),
                'per_correo' => $request->get('per_correo'),
                'password' => Hash::make($request->get('password')),
                'per_tipo_usuario' => $request->get('per_tipo_usuario')
            ]);
        }
        Alert::success('Exitoso', 'La información se actulizo con exito');
        return redirect('usuario/' . $id . '/profile');
    }

    public function destroy($id)
    {
        $user = DB::table('persona')->where('id', $id)->first();
        try {
            if ($user->per_tipo_usuario == 9 || $user->per_tipo_usuario == 2 || $user->per_tipo_usuario == 3) {
                DB::table('docente')->where('id_persona_docente', $id)->delete();
                DB::table('persona')->where('id', $id)->delete();
                Alert::success('Exitoso', 'El usuario se ha eliminado con exito');
                return redirect('/home');
            } else if ($user->per_tipo_usuario == '6' || $user->per_tipo_usuario == '9') {
                DB::table('persona')->where('id', $id)->delete();
                DB::table('estudiante')->where('estu_id_estudiante', $id)->delete();
                Alert::success('Exitoso', 'El usuario se ha eliminado con exito');
                return redirect('/home');
            } else {
                DB::table('persona')->where('id', $id)->delete();
                Alert::success('Exitoso', 'El usuario se ha eliminado con exito');
                return redirect('/home');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar este persona, porque está relacionada a una entidad', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        }
    }
}
