<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/x-icon">
    <title>{{ 'GECI | Registrarse' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .card-register{
            width: 550px;
            margin: auto;
            margin-top: 10%;
            padding: 15px;
        }
        .footer {
            text-align: center;
            width: 100%;
            bottom: 10px;
            position: fixed;
        }

    </style>

</head>

<body>
    <div class="container">
        @include('sweetalert::alert')
        <div class="row mx-auto">
            <div class="card-register">
                <h4><i class="fa fa-cube"></i> Registro nuevos usuarios</h4><hr>
                <form action="/usuario/" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="per_tipo_documento"
                                class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control < @error('per_tipo_documento') is-invalid @enderror"
                                    name="per_tipo_documento" id="per_tipo_documento">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($tiposdocumento as $tipodocumento)
                                        <option value="{{ $tipodocumento }}">{{ $tipodocumento }}</option>
                                    @endforeach
                                </select>
                                @error('per_tipo_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_numero_documento"
                                class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                            <div class="col-md-12">
                                <input id="per_numero_documento" type="number"
                                    class="form-control @error('per_numero_documento') is-invalid @enderror"
                                    name="per_numero_documento" value="{{ old('per_numero_documento') }}"
                                    autocomplete="per_numero_documento" autofocus>
                                @error('per_numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="per_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="per_nombre" type="text"
                                    class="form-control @error('per_nombre') is-invalid @enderror" name="per_nombre"
                                    value="{{ old('per_nombre') }}" autocomplete="per_nombre" autofocus>
                                @error('per_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_apellido"
                                class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="per_apellido" type="text"
                                    class="form-control @error('per_apellido') is-invalid @enderror" name="per_apellido"
                                    value="{{ old('per_apellido') }}" autocomplete="per_apellido" autofocus>
                                @error('per_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="per_telefono" class="col-md-12 col-form-label">{{ __('Telefono *') }}</label>
                            <div class="col-md-12">
                                <input id="per_telefono" type="number"
                                    class="form-control @error('per_telefono') is-invalid @enderror" name="per_telefono"
                                    value="{{ old('per_telefono') }}" autocomplete="per_telefono" autofocus>
                                @error('per_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_correo"
                                class="col-md-12 col-form-label">{{ __('Correo electronico institucional *') }}</label>
                            <div class="col-md-12">
                                <input id="per_correo" type="email"
                                    class="form-control @error('per_correo') is-invalid @enderror" name="per_correo"
                                    value="{{ old('per_correo') }}" autocomplete="per_correo" autofocus>
                                @error('per_correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña *') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" autocomplete="password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label">{{ __('Confirmar contraseña *') }}</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="per_departamento"
                                class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_departamento') is-invalid @enderror"
                                    name="per_departamento" id="per_departamento">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}">
                                            {{ $departamento->dep_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('per_departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_ciudad" class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_ciudad') is-invalid @enderror" name="per_ciudad"
                                    id="per_ciudad">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}">{{ $municipio->mun_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('per_ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class=" ml-3" for="per_tipo_usuario">Tipo de usuario</label>
                            @foreach ($tiposusuario as $tipousuario)
                                <div class="form-check ml-3">
                                    <input class="form-check-input" name="per_tipo_usuario[]" type="radio"
                                        value="{{ $tipousuario->id }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tipousuario->tip_nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-0 mx-auto">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-success w-100">
                                {{ __('Registrarme') }}
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <a href="/login">Ya tengo una cuenta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <p class="footer">Copyright &copy 2022. Todos los derechos reservados</p>
    <script src="https://use.fontawesome.com/6c8ac1ea46.js"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

</body>

</html>
