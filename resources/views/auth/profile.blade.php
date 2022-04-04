@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
          <a href="/usuario/profile">Perfil</a>
    @endsection
    @section('content')
        <div class="container">
            <div class="row">
                <div class="tile col-md-8">
                    <h3><i class="fa fa-cube"></i> Información básica</h3>
                    <hr>
                    <form action="/usuario/{{Auth::user()->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_tipo_documento">{{ __('Tipo de documento *') }}</label>
                                <select class="form-control @error('per_tipo_documento') is-invalid @enderror" name="per_tipo_documento"
                                    id="per_tipo_documento">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="Tarjeta de identidad" {{Auth::user()->per_tipo_documento == 'Tarjeta de identidad' ? 'selected' : ''}}>Tarjeta de identidad</option>
                                    <option value="Cédula de ciudadanía" {{Auth::user()->per_tipo_documento == 'Cédula de ciudadanía' ? 'selected' : ''}}>Cédula de ciudadanía</option>
                                    <option value="Cédula de extranjeria" {{Auth::user()->per_tipo_documento == 'Cédula de extranjeria' ? 'selected' : ''}}>Cédula de extranjeria</option>
                                </select>
                                @error('lab_id_docente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="per_numero_documento">{{ __('Número de documento *') }}</label>
                                <input id="per_numero_documento" type="number"
                                    class="form-control @error('per_numero_documento') is-invalid @enderror" name="per_numero_documento"
                                    value="{{Auth::user()->per_numero_documento}}" autocomplete="per_numero_documento" autofocus>
                                @error('per_numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_nombre">{{ __('Nombre (s) *') }}</label>
                                <input id="per_nombre" type="text"
                                    class="form-control @error('per_nombre') is-invalid @enderror" name="per_nombre"
                                    value="{{Auth::user()->per_nombre}}" autocomplete="per_nombre" autofocus>
                                @error('per_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="per_apellido">{{ __('Apellido (s) *') }}</label>
                                <input id="per_apellido" type="text"
                                    class="form-control @error('per_apellido') is-invalid @enderror" name="per_apellido"
                                    value="{{Auth::user()->per_apellido}}" autocomplete="per_apellido" autofocus>
                                @error('per_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="per_telefono">{{ __('Telefono *') }}</label>
                                <input id="per_telefono" type="number"
                                    class="form-control @error('per_telefono') is-invalid @enderror" name="per_telefono"
                                    value="{{Auth::user()->per_telefono}}" autocomplete="per_telefono" autofocus>
                                @error('per_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="per_correo">{{ __('Correo electronico *') }}</label>
                                <input id="per_correo" type="text"
                                    class="form-control @error('per_correo') is-invalid @enderror" name="per_correo"
                                    value="{{Auth::user()->per_correo}}" autocomplete="per_correo" autofocus>
                                @error('per_correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tile col-md-4">
                    <h3><i class="fa fa-close"></i> Actualizar contraseña</h3> <hr>
                    <form action="/usuario/{{Auth::user()->id}}/actualizar_password" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password">{{ __('Contraseña nueva *') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"autocomplete="password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password_confirm">{{ __('Confirmar contraseña *') }}</label>
                                <input id="password_confirm" type="password"
                                    class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" autocomplete="password_confirm" autofocus>
                                @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endif
