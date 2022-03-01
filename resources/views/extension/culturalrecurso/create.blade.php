@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del trabajo de grado.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <form action="/extension/registroactrecurso" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extculre_year">Año</label>
                        <input class="form-control @error('extculre_year') is-invalid @enderror" name="extculre_year"
                            id="extculre_year" value="{{ old('extculre_year') }}" type="number"
                            autocomplete="extculre_year" autofocus>
                        @error('extculre_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extculre_codigo_organizacional">Código unidad organizacional</label>
                        <input class="form-control @error('extculre_codigo_organizacional') is-invalid @enderror"
                            name="extculre_codigo_organizacional" id="extculre_codigo_organizacional"
                            value="{{ old('extculre_codigo_organizacional') }}" type="text"
                            autocomplete="extculre_codigo_organizacional" autofocus>
                        @error('extculre_codigo_organizacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extculre_codigo_actividad">Código actividad</label>
                        <input class="form-control @error('extculre_codigo_actividad') is-invalid @enderror"
                            name="extculre_codigo_actividad" id="extculre_codigo_actividad"
                            value="{{ old('extculre_codigo_actividad') }}" type="text"
                            autocomplete="extculre_codigo_actividad" autofocus>
                        @error('extculre_codigo_actividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extculre_tipo_documento">Tipo de documento</label>
                        <select class="form-select" name="extculre_tipo_documento" id="extculre_tipo_documento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="DE">Documento de identidad extranjera</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="PS">Pasaporte</option>
                            <option value="CA">Certificado cabildo</option>
                        </select>
                        @error('extculre_tipo_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extculre_numero_documento">Número de documento</label>
                        <input class="form-control @error('extculre_numero_documento') is-invalid @enderror"
                            name="extculre_numero_documento" id="extculre_numero_documento"
                            value="{{ old('extculre_numero_documento') }}" type="number"
                            autocomplete="extculre_numero_documento" autofocus>
                        @error('extculre_numero_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extculre_dedicacion">Dedicación del recurso humano</label>
                        <input class="form-control @error('extculre_dedicacion') is-invalid @enderror"
                            name="extculre_dedicacion" id="extculre_dedicacion"
                            value="{{ old('extculre_dedicacion') }}" type="text"
                            autocomplete="extculre_dedicacion" autofocus>
                        @error('extculre_dedicacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
