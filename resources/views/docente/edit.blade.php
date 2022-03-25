@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de actualización</h1>
    @section('message')
        <p>Diligenciar los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active"
                    id="informacion-tab" data-bs-toggle="tab" data-bs-target="#fase1" type="button" role="tab"
                    aria-controls="fase1" aria-selected="true">Fase 1 registro</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link"
                    id="informacion-tab" data-bs-toggle="tab" data-bs-target="#fase2" type="button" role="tab"
                    aria-controls="home" aria-selected="true">Fase 2 registro</button>
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
                                <select class="form-select @error('per_tipo_documento') is-invalid @enderror"
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
                                class="col-md-12 col-form-label">{{ __('Correo electronico *') }}</label>
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
                                <select class="form-select @error('per_departamento') is-invalid @enderror"
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
                                <select class="form-select @error('per_ciudad') is-invalid @enderror"
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
                                <select class="form-select @error('per_tipo_usuario') is-invalid @enderror"
                                    name="per_tipo_usuario" id="per_tipo_usuario">
                                    <option value="">---- SELECCIONE</option>
                                    @foreach ($tiposusuario as $tipousuario)
                                        <option value="{{$tipousuario->id}}">{{$tipousuario->tip_nombre}}</option>
                                    @endforeach
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
                                <select class="form-select @error('per_id_estado') is-invalid @enderror"
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
                                {{ __('Siguiente') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane tile p-3"
                id="fase2" role="tabpanel" aria-labelledby="fase2-tab">
                <form
                    action="/docente/"
                    method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ciudad_procedencia">{{ __('Ciudad de procedencia *') }}</label>
                            <input id="ciudad_procedencia" type="text"
                                class="form-control @error('ciudad_procedencia') is-invalid @enderror"
                                name="ciudad_procedencia"
                                value="{{old('ciudad_procedencia')}}"
                                autocomplete="ciudad_procedencia" autofocus>
                            @error('ciudad_procedencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="correo_personal">{{ __('Correo personal *') }}</label>
                            <input id="correo_personal" type="email"
                                class="form-control @error('correo_personal') is-invalid @enderror"
                                name="correo_personal"
                                value="{{old('correo_personal')}}"
                                autocomplete="correo_personal" autofocus>
                            @error('correo_personal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dedicacion">{{ __('Dedicación *') }}</label>
                            <select class="form-select" name="dedicacion" id="dedicacion">
                                <option value="">---- SELECCIONE ----</option>
                                <option value="medio-tiempo">Medio tiempo</option>
                                <option value="tiemplo-completo">Tiempo completo</option>
                                <option value="tiempo-catedra">Tiempo catedra</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_contratacion">{{ __('Tipo de contratación *') }}</label>
                            <select class="form-select" name="tipo_contratacion" id="tipo_contratacion">
                                <option value="">---- SELECCIONE ----</option>
                                <option value="contrato-indefinido">Contrato indefinido</option>
                                <option value="contrato-a-termino-fijo"> Contrato a término fijo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_vinculacion">{{ __('Fecha vinculación *') }}</label>
                            <input id="fecha_vinculacion" type="date"
                                class="form-control @error('fecha_vinculacion') is-invalid @enderror"
                                name="fecha_vinculacion"
                                value="{{old('fecha_vinculacion')}}"
                                autocomplete="fecha_vinculacion" autofocus>
                            @error('fecha_vinculacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="eps">{{ __('EPS afiliado *') }}</label>
                            <input id="eps" type="text" class="form-control @error('eps') is-invalid @enderror"
                                name="eps" value="{{old('eps')}}"
                                autocomplete="eps" autofocus>
                            @error('eps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="riesgo">{{ __('Riesgo *') }}</label>
                            <input id="riesgo" type="text" class="form-control @error('riesgo') is-invalid @enderror"
                                name="riesgo" value="{{old('riesgo')}}"
                                autocomplete="riesgo" autofocus>
                            @error('riesgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cajacompensacion">{{ __('Caja de compensación *') }}</label>
                            <input id="cajacompensacion" type="text"
                                class="form-control @error('cajacompensacion') is-invalid @enderror"
                                name="cajacompensacion"
                                value="{{old('cajacompensacion')}}"
                                autocomplete="cajacompensacion" autofocus>
                            @error('cajacompensacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="banco">{{ __('Banco *') }}</label>
                            <input id="banco" type="text" class="form-control @error('banco') is-invalid @enderror"
                                name="banco" value="{{old('banco')}}"
                                autocomplete="banco" autofocus>
                            @error('banco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="no_cuenta">{{ __('Número de cuenta *') }}</label>
                            <input id="no_cuenta" type="text"
                                class="form-control @error('no_cuenta') is-invalid @enderror" name="no_cuenta"
                                value="{{old('no_cuenta')}}"
                                autocomplete="no_cuenta" autofocus>
                            @error('no_cuenta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pension">{{ __('Pension *') }}</label>
                            <input id="pension" type="text" class="form-control @error('pension') is-invalid @enderror"
                                name="pension"
                                value="{{old('pension')}}"
                                autocomplete="pension" autofocus>
                            @error('pension')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="estado">{{ __('Estado *') }}</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="">---- SELECCIONE ----</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('Siguiente') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endif
