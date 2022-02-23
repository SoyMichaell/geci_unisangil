@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    <!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nuevo departamento</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="tile col-md-12">
            <h4 class="titulo">Asignar nueva asignatura</h4>
            <form action="/docente/registroasignatura" method="post">
                @csrf
                <div class="row mb-3">
                    <input name="doa_id_docente" type="hidden" value="{{ $persona->id }}" readonly>
                    <div class="col-md-6 mt-1">
                        <label for="doa_year">{{ __('Año *') }}</label>
                        <input id="doa_year" type="text" class="form-control @error('doa_year') is-invalid @enderror"
                            name="doa_year" value="{{ old('doa_year') }}" autocomplete="doa_year" autofocus>
                        @error('doa_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="doa_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-select @error('doa_semestre') is-invalid @enderror" name="doa_semestre"
                            id="doa_semestre">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        @error('doa_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mt-1">
                        <label for="doa_id_asignatura">{{ __('Asignatura *') }}</label>
                        <select class="form-select @error('doa_id_asignatura') is-invalid @enderror"
                            name="doa_id_asignatura" id="doa_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}">{{ $asignatura->pas_nombre }}</option>
                            @endforeach
                        </select>
                        @error('doa_id_asignatura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="doa_grupo">{{ __('Grupo asignatura *') }}</label>
                        <input id="doa_grupo" type="text" class="form-control @error('doa_grupo') is-invalid @enderror"
                            name="doa_grupo" value="{{ old('doa_grupo') }}" autocomplete="doa_grupo" autofocus>
                        @error('doa_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mt-1">
                        <label for="doa_id_municipio">{{ __('Sede *') }}</label>
                        <select class="form-select @error('doa_id_municipio') is-invalid @enderror"
                            name="doa_id_municipio" id="doa_id_municipio">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('doa_id_municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="doa_unidad">{{ __('Unidad *') }}</label>
                        <input id="doa_unidad" type="text"
                            class="form-control @error('doa_unidad') is-invalid @enderror" name="doa_unidad"
                            value="{{ old('doa_unidad') }}" autocomplete="doa_unidad" autofocus>
                        @error('doa_unidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mt-1">
                        <label
                            for="doa_horas_semana_doc">{{ __('Número de horas dedicadas a la semana de docencia *') }}</label>
                        <input id="doa_horas_semana_doc" type="number"
                            class="form-control @error('doa_horas_semana_doc') is-invalid @enderror"
                            name="doa_horas_semana_doc" value="{{ old('doa_horas_semana_doc') }}"
                            autocomplete="doa_horas_semana_doc" autofocus>
                        @error('doa_horas_semana_doc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-1">
                        <label
                            for="doa_horas_semana_inv">{{ __('Número de horas dedicadas a la semana de investigación *') }}</label>
                        <input id="doa_horas_semana_inv" type="number"
                            class="form-control @error('doa_horas_semana_inv') is-invalid @enderror"
                            name="doa_horas_semana_inv" value="{{ old('doa_horas_semana_inv') }}"
                            autocomplete="doa_horas_semana_inv" autofocus>
                        @error('doa_horas_semana_inv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mt-1">
                        <label
                            for="doa_horas_extension">{{ __('Número de horas semanales dedicadas a extensión *') }}</label>
                        <input id="doa_horas_extension" type="text"
                            class="form-control @error('doa_horas_extension') is-invalid @enderror"
                            name="doa_horas_extension" value="{{ old('doa_horas_extension') }}"
                            autocomplete="doa_horas_extension" autofocus>
                        @error('doa_horas_extension')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-1">
                        <label
                            for="doa_horas_admin">{{ __('Número de horas semanales dedicadas a labores administrativas *') }}</label>
                        <input id="doa_horas_admin" type="text"
                            class="form-control @error('doa_horas_admin') is-invalid @enderror" name="doa_horas_admin"
                            value="{{ old('doa_horas_admin') }}" autocomplete="doa_horas_admin" autofocus>
                        @error('doa_horas_admin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0 mt-2">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
