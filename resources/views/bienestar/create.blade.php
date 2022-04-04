@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/bienestar/create">Crear</a> / <a href="/bienestar">Bienestar institucional</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Registro de eventos bienestar</h1>
    @section('message')
        <p>Diligencie los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro evento o actividad</h4><hr>
            <form action="/bienestar/" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="bie_fecha">{{ __('Fecha *') }}</label>
                        <input id="bie_fecha" type="date" class="form-control @error('bie_fecha') is-invalid @enderror"
                            name="bie_fecha" value="{{ old('bie_fecha') }}" autocomplete="bie_fecha" autofocus>
                        @error('bie_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="bie_nombre_actividad">{{ __('Nombre actividad *') }}</label>
                        <input id="bie_nombre_actividad" type="text" class="form-control @error('bie_nombre_actividad') is-invalid @enderror"
                            name="bie_nombre_actividad" value="{{ old('bie_nombre_actividad') }}" autocomplete="bie_nombre_actividad" autofocus>
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
                        <input id="bie_total_participantes" type="number" class="form-control @error('bie_total_participantes') is-invalid @enderror"
                            name="bie_total_participantes" value="{{ old('bie_total_participantes') }}" autocomplete="bie_total_participantes" autofocus>
                        @error('bie_total_participantes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bie_estudiantes">{{ __('# Estudiantes *') }}</label>
                        <input id="bie_estudiantes" type="number" class="form-control @error('bie_estudiantes') is-invalid @enderror"
                            name="bie_estudiantes" value="{{ old('bie_estudiantes') }}" autocomplete="bie_estudiantes" autofocus>
                        @error('bie_estudiantes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bie_docentes">{{ __('# Docentes *') }}</label>
                        <input id="bie_docentes" type="number" class="form-control @error('bie_docentes') is-invalid @enderror"
                            name="bie_docentes" value="{{ old('bie_docentes') }}" autocomplete="bie_docentes" autofocus>
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
                        <input id="bie_administrativos" type="number" class="form-control @error('bie_administrativos') is-invalid @enderror"
                            name="bie_administrativos" value="{{ old('bie_administrativos') }}" autocomplete="bie_administrativos" autofocus>
                        @error('bie_administrativos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bie_egresados">{{ __('# Egresados *') }}</label>
                        <input id="bie_egresados" type="number" class="form-control @error('bie_egresados') is-invalid @enderror"
                            name="bie_egresados" value="{{ old('bie_egresados') }}" autocomplete="bie_egresados" autofocus>
                        @error('bie_egresados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bie_particulares">{{ __('# Particulares *') }}</label>
                        <input id="bie_particulares" type="number" class="form-control @error('bie_particulares') is-invalid @enderror"
                            name="bie_particulares" value="{{ old('bie_particulares') }}" autocomplete="bie_particulares" autofocus>
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
                        <input id="bie_codigo_snies" type="number" class="form-control @error('bie_codigo_snies') is-invalid @enderror"
                            name="bie_codigo_snies" value="{{ old('bie_codigo_snies') }}" autocomplete="bie_codigo_snies" autofocus>
                        @error('bie_codigo_snies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="bie_soporte">{{ __('Cargar soporte * (Si es una sola evidencia cargar en formato .pdf, si son más cargar en .zip o .rar)') }}</label>
                        <input id="bie_soporte" type="file" class="form-control @error('bie_soporte') is-invalid @enderror"
                            name="bie_soporte" value="{{ old('bie_soporte') }}" autocomplete="bie_soporte" autofocus>
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
                        <textarea class="form-control @error('bie_observacion') is-invalid @enderror" name="bie_observacion" id="bie_observacion" cols="30" rows="10">{{ old('bie_observacion') }}</textarea>
                        @error('bie_observacion')
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
