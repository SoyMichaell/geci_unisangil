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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extculre_year">Año</label>
                    <input class="form-control @error('extculre_year') is-invalid @enderror" name="extculre_year"
                        id="extculre_year" value="{{ $actrecurso->extculre_year }}" type="number"
                        autocomplete="extculre_year" autofocus disabled>
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
                        value="{{ $actrecurso->extculre_codigo_organizacional }}" type="text"
                        autocomplete="extculre_codigo_organizacional" autofocus disabled>
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
                        value="{{ $actrecurso->extculre_codigo_actividad }}" type="text"
                        autocomplete="extculre_codigo_actividad" autofocus disabled>
                    @error('extculre_codigo_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extculre_tipo_documento">Tipo de documento</label>
                    <select class="form-select" name="extculre_tipo_documento" id="extculre_tipo_documento" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="CC" {{ $actrecurso->extculre_tipo_documento == 'CC' ? 'selected' : '' }}>
                            Cédula de ciudadanía</option>
                        <option value="DE" {{ $actrecurso->extculre_tipo_documento == 'DE' ? 'selected' : '' }}>
                            Documento de identidad extranjera</option>
                        <option value="CE" {{ $actrecurso->extculre_tipo_documento == 'CE' ? 'selected' : '' }}>
                            Cédula de extranjería</option>
                        <option value="TI" {{ $actrecurso->extculre_tipo_documento == 'TI' ? 'selected' : '' }}>
                            Tarjeta de identidad</option>
                        <option value="PS" {{ $actrecurso->extculre_tipo_documento == 'PS' ? 'selected' : '' }}>
                            Pasaporte</option>
                        <option value="CA" {{ $actrecurso->extculre_tipo_documento == 'CA' ? 'selected' : '' }}>
                            Certificado cabildo</option>
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
                        value="{{ $actrecurso->extculre_numero_documento }}" type="number"
                        autocomplete="extculre_numero_documento" autofocus disabled>
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
                        value="{{ $actrecurso->extculre_dedicacion }}" type="text" autocomplete="extculre_dedicacion"
                        autofocus disabled>
                    @error('extculre_dedicacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
