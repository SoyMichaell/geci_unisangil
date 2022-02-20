<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'per_numero_documento' => 'required',
            'per_nombre' => 'required',
            'per_apellido' => 'required',
            'per_telefono' => 'required',
            'per_correo' => ['required','unique:persona'],
            'per_contrasena' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'per_tipo_documento' => $data['per_tipo_documento'],
            'per_numero_documento' => $data['per_numero_documento'],
            'per_nombre' => $data['per_nombre'],
            'per_apellido' => $data['per_apellido'],
            'per_telefono' => $data['per_telefono'],
            'per_correo' => $data['per_correo'],
            'password' => Hash::make($data['per_contrasena']),
            'per_departamento' => $data['per_departamento'],
            'per_ciudad' => $data['per_ciudad'],
            'per_tipo_usuario' => $data['per_tipo_usuario'],
            'per_id_estado' => $data['per_id_estado'],
        ]);
    }
}
