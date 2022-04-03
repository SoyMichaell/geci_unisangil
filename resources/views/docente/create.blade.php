@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/create">Crear</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active"
                    id="informacion-tab" data-bs-toggle="tab" data-bs-target="#fase1" type="button" role="tab"
                    aria-controls="fase1" aria-selected="true">Registro basico docente</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active tile p-3"
                id="fase1" role="tabpanel" aria-labelledby="fase1-tab">
                <form action="/docente/registrodocente" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="per_tipo_documento"
                                class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_tipo_documento') is-invalid @enderror"
                                    name="per_tipo_documento" id="per_tipo_documento">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                                    <option value="Cédula de extranjeria">Cédula de extranjeria</option>
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
                            <label for="per_nombre"
                                class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="per_nombre" type="text"
                                    class="form-control @error('per_nombre') is-invalid @enderror"
                                    name="per_nombre" value="{{ old('per_nombre') }}" autocomplete="per_nombre"
                                    autofocus>
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
                                    class="form-control @error('per_apellido') is-invalid @enderror"
                                    name="per_apellido" value="{{ old('per_apellido') }}"
                                    autocomplete="per_apellido" autofocus>
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
                            <label for="per_telefono"
                                class="col-md-12 col-form-label">{{ __('Telefono *') }}</label>
                            <div class="col-md-12">
                                <input id="per_telefono" type="number"
                                    class="form-control @error('per_telefono') is-invalid @enderror"
                                    name="per_telefono" value="{{ old('per_telefono') }}"
                                    autocomplete="per_telefono" autofocus>
                                @error('per_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_correo"
                                class="col-md-12 col-form-label">{{ __('Correo electronico institucional*') }}</label>
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
                            <label for="per_departamento"
                                class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_departamento') is-invalid @enderror"
                                    name="per_departamento" id="per_departamento">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{$departamento->id}}">{{$departamento->dep_nombre}}</option>
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
                            <label for="per_ciudad"
                                class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_ciudad') is-invalid @enderror"
                                    name="per_ciudad" id="per_ciudad">
                                    <option value="">---- SELECCIONE ----</option> 
                                    @foreach ($municipios as $municipio)
                                        <option value="{{$municipio->id}}">{{$municipio->mun_nombre}}</option>
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
                        <div class="col-md-6">
                            <label for="per_tipo_usuario"
                                class="col-md-12 col-form-label">{{ __('Tipo de usuario *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_tipo_usuario') is-invalid @enderror"
                                    name="per_tipo_usuario" id="per_tipo_usuario">
                                    <option value="3">Docente</option>
                                </select>
                                @error('per_tipo_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="per_id_estado"
                                class="col-md-12 col-form-label">{{ __('Estado *') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('per_id_estado') is-invalid @enderror"
                                    name="per_id_estado" id="per_id_estado">
                                    <option value="activo">Activo</option> 
                                </select>
                                @error('per_tipo_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0 mx-auto">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('Registar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endif
