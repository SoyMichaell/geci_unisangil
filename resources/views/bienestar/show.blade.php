@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/bienestar/{{ $bienestar->id }}">Vista</a> / <a href="/bienestar">Bienestar institucional</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Informacion de registro.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-question-circle"></i> Visualizar información</h4><hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bie_fecha">{{ __('Fecha *') }}</label>
                    <input id="bie_fecha" type="date" class="form-control @error('bie_fecha') is-invalid @enderror"
                        name="bie_fecha" value="{{ $bienestar->bie_fecha }}" autocomplete="bie_fecha" autofocus
                        disabled>
                    @error('bie_fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="bie_nombre_actividad">{{ __('Nombre actividad *') }}</label>
                    <input id="bie_nombre_actividad" type="text"
                        class="form-control @error('bie_nombre_actividad') is-invalid @enderror"
                        name="bie_nombre_actividad" value="{{ $bienestar->bie_nombre_actividad }}"
                        autocomplete="bie_nombre_actividad" autofocus disabled>
                    @error('bie_nombre_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="bie_total_participantes">{{ __('Total participantes *') }}</label>
                    <input id="bie_total_participantes" type="number"
                        class="form-control @error('bie_total_participantes') is-invalid @enderror"
                        name="bie_total_participantes" value="{{ $bienestar->bie_total_participantes }}"
                        autocomplete="bie_total_participantes" autofocus disabled>
                    @error('bie_total_participantes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="bie_estudiantes">{{ __('# Estudiantes *') }}</label>
                    <input id="bie_estudiantes" type="number"
                        class="form-control @error('bie_estudiantes') is-invalid @enderror" name="bie_estudiantes"
                        value="{{ $bienestar->bie_estudiantes }}" autocomplete="bie_estudiantes" autofocus disabled>
                    @error('bie_estudiantes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="bie_docentes">{{ __('# Docentes *') }}</label>
                    <input id="bie_docentes" type="number"
                        class="form-control @error('bie_docentes') is-invalid @enderror" name="bie_docentes"
                        value="{{ $bienestar->bie_docentes }}" autocomplete="bie_docentes" autofocus disabled>
                    @error('bie_docentes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="bie_administrativos">{{ __('# Administrativos *') }}</label>
                    <input id="bie_administrativos" type="number"
                        class="form-control @error('bie_administrativos') is-invalid @enderror"
                        name="bie_administrativos" value="{{ $bienestar->bie_administrativos }}"
                        autocomplete="bie_administrativos" autofocus disabled>
                    @error('bie_administrativos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="bie_egresados">{{ __('# Egresados *') }}</label>
                    <input id="bie_egresados" type="number"
                        class="form-control @error('bie_egresados') is-invalid @enderror" name="bie_egresados"
                        value="{{ $bienestar->bie_egresados }}" autocomplete="bie_egresados" autofocus disabled>
                    @error('bie_egresados')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="bie_particulares">{{ __('# Particulares *') }}</label>
                    <input id="bie_particulares" type="number"
                        class="form-control @error('bie_particulares') is-invalid @enderror" name="bie_particulares"
                        value="{{ $bienestar->bie_particulares }}" autocomplete="bie_particulares" autofocus disabled>
                    @error('bie_particulares')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bie_codigo_snies">{{ __('Código SNIES *') }}</label>
                    <input id="bie_codigo_snies" type="number"
                        class="form-control @error('bie_codigo_snies') is-invalid @enderror" name="bie_codigo_snies"
                        value="{{ $bienestar->bie_codigo_snies }}" autocomplete="bie_codigo_snies" autofocus disabled>
                    @error('bie_codigo_snies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label
                        for="bie_soporte">{{ __('Cargar soporte * (Si es una sola evidencia cargar en formato .pdf, si son más cargar en .zip o .rar)') }}</label>
                    <a>{{ $bienestar->bie_soporte }}</a>
                    @error('bie_soporte')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="bie_observacion">{{ __('Observación *') }}</label>
                    <textarea class="form-control @error('bie_observacion') is-invalid @enderror" name="bie_observacion"
                        id="bie_observacion" cols="30" rows="10" disabled>{{ $bienestar->bie_observacion }}</textarea>
                    @error('bie_observacion')
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
