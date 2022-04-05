<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
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
        $tiposdocumento = collect(['Tarjeta de identidad', 'Cédula de ciudadanía', 'Cédula de extranjeria']);
        $tiposdocumento->all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        if(Auth::check()){
            $tiposusuario = DB::table('tipo_usuario')
            ->Where('id', 2)
            ->orWhere('id', 4)
            ->get();
        }else if(!Auth::check()){
            $tiposusuario = DB::table('tipo_usuario')
            ->Where('id', 1)
            ->orWhere('id', 2)
            ->orWhere('id', 4)
            ->get();
        }
        return view('auth.register')
            ->with('tiposdocumento', $tiposdocumento)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('tiposusuario', $tiposusuario);
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
                'per_tipo_usuario' => implode(';',$request->get('per_tipo_usuario')),
                'per_id_estado' => 'activo',
            ]
        );

        $id = DB::getPdo()->lastInsertId();

        $tipoDocente = DB::table('persona')
            ->where('id', $id)
            ->first();

        $rol = explode(';',$tipoDocente->per_tipo_usuario);

        foreach($rol as $r){
            if($r == '2' || $r == '3'){
                DB::table('docente')->insert(
                    [
                        'id_persona_docente' => $id,
                        'id_proceso' => 1,
                    ]
                );
            }
        }

        
        if(Auth::check()){
            Alert::success('Exitoso', 'La persona ha sido registrada con exito');
            return redirect('/home');
        }else{
            Alert::success('Exitoso', 'La persona ha sido registrada con exito');
            return redirect('/login');
        }
        
    }

    public function profile(){
        return view('auth.profile');
    }

    public function update(Request $request, $id){
        $rules = [
            'per_tipo_documento' => 'required|not_in:0',
            'per_numero_documento' => 'required',
            'per_nombre' => 'required',
            'per_apellido' => 'required',
            'per_telefono' => 'required',
            'per_correo' => 'required'
        ];
        $message = [
            'per_tipo_documento.required' => 'El campo tipo documento es requerido',
            'per_numero_documento.required' => 'El campo número documento es requerido',
            'per_nombre.required' => 'El campo nombre (s) es requerido',
            'per_apellido.required' => 'El campo apellido (s) es requerido',
            'per_telefono.required' => 'El campo telefono es requerido',
            'per_correo.required' => 'El campo correo es requerido'
        ];
        $this->validate($request,$rules,$message);

        $user = User::find($id);
        $user->per_tipo_documento = $request->get('per_tipo_documento');
        $user->per_numero_documento = $request->get('per_numero_documento');
        $user->per_nombre = $request->get('per_nombre');
        $user->per_apellido = $request->get('per_apellido');
        $user->per_telefono = $request->get('per_telefono');
        $user->per_correo = $request->get('per_correo');
        $user->save();

        Alert::success('Exitoso', 'La información se actulizo con exito');
        return redirect('/usuario/profile');

    }

    public function actualizar_password(Request $request, $id){
        $rules = [
            'password' => 'required',
            'password_confirm' => 'required',
        ];
        $message = [
            'password.required' => 'El campo contraseña es requerido',
            'password_confirm.required' => 'El campo confirmar contraseña es requerido'
        ];
        $this->validate($request,$rules,$message);

        if($request->get('password') != $request->get('password_confirm')){
            Alert::success('Advetencia', 'Las contraseña no coinciden');
            return redirect('/usuario/profile');
        }

        $user = User::find($id);
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Alert::success('Exitoso', 'La información se actulizo con exito');
        return redirect('/usuario/profile');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Exitoso', 'El usuario se ha eliminado con exito');
        return redirect('/home');
    }
}
