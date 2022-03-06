@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/create">Crear</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="informacion-tab" data-bs-toggle="tab" data-bs-target="#fase1"
                    type="button" role="tab" aria-controls="fase1" aria-selected="true">Registro basico docente</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active tile p-3" id="fase1" role="tabpanel" aria-labelledby="fase1-tab">
                <form action="/docente/registrodocentevisitante" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_tipo_documento"
                                class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                            <div class="col-md-12">
                                <select class="form-select @error('docvi_tipo_documento') is-invalid @enderror"
                                    name="docvi_tipo_documento" id="docvi_tipo_documento">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                                    <option value="Cédula de extranjeria">Cédula de extranjeria</option>
                                </select>
                                @error('docvi_tipo_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_numero_documento"
                                class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_numero_documento" type="number"
                                    class="form-control @error('docvi_numero_documento') is-invalid @enderror"
                                    name="docvi_numero_documento" value="{{ old('docvi_numero_documento') }}"
                                    autocomplete="docvi_numero_documento" autofocus>
                                @error('docvi_numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_nombre"
                                class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_nombre" type="text"
                                    class="form-control @error('docvi_nombre') is-invalid @enderror" name="docvi_nombre"
                                    value="{{ old('docvi_nombre') }}" autocomplete="docvi_nombre" autofocus>
                                @error('docvi_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_apellido"
                                class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_apellido" type="text"
                                    class="form-control @error('docvi_apellido') is-invalid @enderror"
                                    name="docvi_apellido" value="{{ old('docvi_apellido') }}"
                                    autocomplete="docvi_apellido" autofocus>
                                @error('docvi_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_telefono"
                                class="col-md-12 col-form-label">{{ __('Telefono *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_telefono" type="number"
                                    class="form-control @error('docvi_telefono') is-invalid @enderror"
                                    name="docvi_telefono" value="{{ old('docvi_telefono') }}"
                                    autocomplete="docvi_telefono" autofocus>
                                @error('docvi_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_correo"
                                class="col-md-12 col-form-label">{{ __('Correo electronico personal*') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_correo" type="email"
                                    class="form-control @error('docvi_correo') is-invalid @enderror" name="docvi_correo"
                                    value="{{ old('docvi_correo') }}" autocomplete="docvi_correo" autofocus>
                                @error('docvi_correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_entidad_origen"
                                class="col-md-12 col-form-label">{{ __('Entidad *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_entidad_origen" type="text"
                                    class="form-control @error('docvi_entidad_origen') is-invalid @enderror"
                                    name="docvi_entidad_origen" value="{{ old('docvi_entidad_origen') }}"
                                    autocomplete="docvi_entidad_origen" autofocus>
                                @error('docvi_entidad_origen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_pais" class="col-md-12 col-form-label">{{ __('País *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_pais" type="text"
                                    class="form-control @error('docvi_pais') is-invalid @enderror" name="docvi_pais"
                                    value="{{ old('docvi_pais') }}" autocomplete="docvi_pais" autofocus>
                                @error('docvi_pais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_ciudad" class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_ciudad" type="text"
                                    class="form-control @error('docvi_ciudad') is-invalid @enderror" name="docvi_ciudad"
                                    value="{{ old('docvi_ciudad') }}" autocomplete="docvi_ciudad" autofocus>
                                @error('docvi_ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_fecha_estadia"
                                class="col-md-12 col-form-label">{{ __('Fecha estadía *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_fecha_estadia" type="date"
                                    class="form-control @error('docvi_fecha_estadia') is-invalid @enderror"
                                    name="docvi_fecha_estadia" value="{{ old('docvi_fecha_estadia') }}"
                                    autocomplete="docvi_fecha_estadia" autofocus>
                                @error('docvi_fecha_estadia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="docvi_cantidad_hora"
                                class="col-md-12 col-form-label">{{ __('Cantidad en horas *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_cantidad_hora" type="text"
                                    class="form-control @error('docvi_cantidad_hora') is-invalid @enderror"
                                    name="docvi_cantidad_hora" value="{{ old('docvi_cantidad_hora') }}"
                                    autocomplete="docvi_cantidad_hora" autofocus>
                                @error('docvi_cantidad_hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="docvi_cantidad_dia"
                                class="col-md-12 col-form-label">{{ __('Cantidad en días *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_cantidad_dia" type="text"
                                    class="form-control @error('docvi_cantidad_dia') is-invalid @enderror"
                                    name="docvi_cantidad_dia" value="{{ old('docvi_cantidad_dia') }}"
                                    autocomplete="docvi_cantidad_dia" autofocus>
                                @error('docvi_cantidad_dia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="docvi_cantidad_semana"
                                class="col-md-12 col-form-label">{{ __('Cantidad en semanas *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_cantidad_semana" type="text"
                                    class="form-control @error('docvi_cantidad_semana') is-invalid @enderror"
                                    name="docvi_cantidad_semana" value="{{ old('docvi_cantidad_semana') }}"
                                    autocomplete="docvi_cantidad_semana" autofocus>
                                @error('docvi_cantidad_semana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_cantidad_mes"
                                class="col-md-12 col-form-label">{{ __('Cantidad en meses *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_cantidad_mes" type="text"
                                    class="form-control @error('docvi_cantidad_mes') is-invalid @enderror"
                                    name="docvi_cantidad_mes" value="{{ old('docvi_cantidad_mes') }}"
                                    autocomplete="docvi_cantidad_mes" autofocus>
                                @error('docvi_cantidad_mes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_cantidad_year"
                                class="col-md-12 col-form-label">{{ __('Cantidad en años *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_cantidad_year" type="text"
                                    class="form-control @error('docvi_cantidad_year') is-invalid @enderror"
                                    name="docvi_cantidad_year" value="{{ old('docvi_cantidad_year') }}"
                                    autocomplete="docvi_cantidad_year" autofocus>
                                @error('docvi_cantidad_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="docvi_objeto" class="col-md-12 col-form-label">{{ __('Objeto *') }}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="docvi_objeto" id="docvi_objeto" cols="30"
                                    rows="10"></textarea>
                                @error('docvi_objeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="docvi_actividad_desarrolladas"
                                class="col-md-12 col-form-label">{{ __('Actividades desarrolladas *') }}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="docvi_actividad_desarrolladas"
                                    id="docvi_actividad_desarrolladas" cols="30" rows="10"></textarea>
                                @error('docvi_actividad_desarrolladas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="docvi_year"
                                class="col-md-12 col-form-label">{{ __('Año *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_year" type="number"
                                    class="form-control @error('docvi_year') is-invalid @enderror"
                                    name="docvi_year" value="{{ old('docvi_year') }}"
                                    autocomplete="docvi_year" autofocus>
                                @error('docvi_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="docvi_periodo"
                                class="col-md-12 col-form-label">{{ __('Periodo *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_periodo" type="text"
                                    class="form-control @error('docvi_periodo') is-invalid @enderror"
                                    name="docvi_periodo" value="{{ old('docvi_periodo') }}"
                                    autocomplete="docvi_periodo" autofocus>
                                @error('docvi_periodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="docvi_url_soporte"
                                class="col-md-12 col-form-label">{{ __('Soporte en formato .zip *') }}</label>
                            <div class="col-md-12">
                                <input id="docvi_url_soporte" type="file"
                                    class="form-control @error('docvi_url_soporte') is-invalid @enderror"
                                    name="docvi_url_soporte" value="{{ old('docvi_url_soporte') }}"
                                    autocomplete="docvi_url_soporte" autofocus>
                                @error('docvi_url_soporte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="docvi_tipo_usuario"
                                class="col-md-12 col-form-label">{{ __('Tipo de usuario *') }}</label>
                            <div class="col-md-12">
                                <select class="form-select @error('docvi_tipo_usuario') is-invalid @enderror"
                                    name="docvi_tipo_usuario" id="docvi_tipo_usuario">
                                    <option value="7">Docente visitante</option>
                                </select>
                                @error('docvi_tipo_usuario')
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
