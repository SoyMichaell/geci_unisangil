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
                    <label for="sofrete_year">Año</label>
                    <input class="form-control @error('sofrete_year') is-invalid @enderror" name="sofrete_year"
                        id="sofrete_year" value="{{ $recurso->sofrete_year }}" type="number"
                        autocomplete="sofrete_year" autofocus disabled>
                    @error('sofrete_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="sofrete_periodo">Periodo</label>
                    <input class="form-control @error('sofrete_periodo') is-invalid @enderror" name="sofrete_periodo"
                        id="sofrete_periodo" value="{{ $recurso->sofrete_periodo }}" type="text"
                        autocomplete="sofrete_periodo" autofocus disabled>
                    @error('sofrete_periodo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="sofrete_tipo_recurso">Tipo recurso</label>
                    <select class="form-select" name="sofrete_tipo_recurso" id="sofrete_tipo_recurso" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="software" {{ $recurso->sofrete_tipo_recurso == 'software' ? 'selected' : '' }}>
                            Software</option>
                        <option value="plataforma-agora"
                            {{ $recurso->sofrete_tipo_recurso == 'plataforma-agora' ? 'selected' : '' }}>Plataforma
                            Agora</option>
                        <option value="app" {{ $recurso->sofrete_tipo_recurso == 'app' ? 'selected' : '' }}>App
                        </option>
                        <option value="laboratorio"
                            {{ $recurso->sofrete_tipo_recurso == 'laboratorio' ? 'selected' : '' }}>Laboratorio
                        </option>
                    </select>
                    @error('sofrete_tipo_recurso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sofrete_id_docente">Docente</label>
                    <select class="form-select" name="sofrete_id_docente" id="sofrete_id_docente" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}"
                                {{ $docente->id == $recurso->sofrete_id_docente ? 'selected' : '' }}>
                                {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                        @endforeach
                    </select>
                    @error('sofrete_id_docente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sofrete_id_asignatura">Asignatura</label>
                    <select class="form-select" name="sofrete_id_asignatura" id="sofrete_id_asignatura" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($asignaturas as $asignatura)
                            <option value="{{ $asignatura->id }}"
                                {{ $asignatura->id == $recurso->sofrete_id_asignatura ? 'selected' : '' }}>
                                {{ $asignatura->asig_nombre }}</option>
                        @endforeach
                    </select>
                    @error('sofrete_id_docente')
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
