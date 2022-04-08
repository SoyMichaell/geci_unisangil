@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa//{{$asignatura->id}}verasignatura">Vista</a> / <a href="/programa/mostrarasignatura">Asignaturas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-question-circle-o"></i> Vista registro</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pas_id_municipio">{{ __('Sede *') }}</label>
                    <select class="form-control @error('pas_id_municipio') is-invalid @enderror" name="pas_id_municipio"
                        id="pas_id_municipio" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($municipios as $municipios)
                            <option value="{{ $municipios->id }}"
                                {{ $municipios->id == $asignatura->pas_id_municipio ? 'selected' : '' }}>
                                {{ $municipios->mun_nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('pas_id_municipio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pas_id_facultad">{{ __('Facultad *') }}</label>
                    <select class="form-control @error('pas_id_facultad') is-invalid @enderror" name="pas_id_facultad"
                        id="pas_id_facultad" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->id }}"
                                {{ $facultad->id == $asignatura->pas_id_facultad ? 'selected' : '' }}>
                                {{ $facultad->fac_nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('pas_id_facultad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pas_id_programa">{{ __('Programa *') }}</label>
                    <select class="form-control @error('pas_id_programa') is-invalid @enderror" name="pas_id_programa"
                        id="pas_id_programa" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($programas as $programa)
                            <option value="{{ $programa->id }}"
                                {{ $programa->id == $asignatura->pas_id_programa ? 'selected' : '' }}>
                                {{ $programa->pro_nombre }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        <small><strong>{{ $programas->count() <= 0 ? 'No hay programas' : '' }}</strong></small>
                    </span>
                    @error('pas_id_programa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pas_id_programa_plan">{{ __('Plan estudio programa *') }}</label>
                    <select class="form-control @error('pas_id_programa_plan') is-invalid @enderror"
                        name="pas_id_programa_plan" id="pas_id_programa_plan" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}"
                                {{ $plan->id == $asignatura->pas_id_programa_plan ? 'selected' : '' }}>
                                {{ $plan->pp_nombre }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        <small><strong>{{ $plans->count() <= 0 ? 'No hay planes de estudio' : '' }}</strong></small>
                    </span>
                    @error('pas_id_programa_plan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pas_nombre">{{ __('Nombre asignatura *') }}</label>
                    <input id="pas_nombre" type="text" class="form-control @error('pas_nombre') is-invalid @enderror"
                        name="pas_nombre" value="{{ $asignatura->pas_nombre }}" autocomplete="pas_nombre" autofocus disabled>
                    @error('pas_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pas_creditos">{{ __('Número de creditos *') }}</label>
                    <input id="pas_creditos" type="number"
                        class="form-control @error('pas_creditos') is-invalid @enderror" name="pas_creditos"
                        value="{{ $asignatura->pas_creditos }}" autocomplete="pas_creditos" autofocus disabled>
                    @error('pas_creditos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pas_horas_semana">{{ __('Número de horas a la semana *') }}</label>
                    <input id="pas_horas_semana" type="number"
                        class="form-control @error('pas_horas_semana') is-invalid @enderror" name="pas_horas_semana"
                        value="{{ $asignatura->pas_horas_semana }}" autocomplete="pas_horas_semana" autofocus disabled>
                    @error('pas_horas_semana')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pas_horas_semestre">{{ __('Número de horas semestre *') }}</label>
                    <input id="pas_horas_semestre" type="number"
                        class="form-control @error('pas_horas_semestre') is-invalid @enderror" name="pas_horas_semestre"
                        value="{{ $asignatura->pas_horas_semestre }}" autocomplete="pas_horas_semestre" autofocus disabled>
                    @error('pas_horas_semestre')
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
