@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/software/{{$recurso->id}}/editarrecurso">Editar</a> / <a href="/software/mostrarrecurso">Recurso tecnológico</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <form action="/software/{{$recurso->id}}/actualizarrecurso" method="post">
                <h4><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sofrete_year">Año</label>
                        <input class="form-control @error('sofrete_year') is-invalid @enderror" name="sofrete_year"
                            id="sofrete_year" value="{{$recurso->sofrete_year}}" type="number"
                            autocomplete="sofrete_year" autofocus>
                        @error('sofrete_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sofrete_periodo">Periodo</label>
                        <input class="form-control @error('sofrete_periodo') is-invalid @enderror" name="sofrete_periodo"
                            id="sofrete_periodo" value="{{$recurso->sofrete_periodo}}" type="text"
                            autocomplete="sofrete_periodo" autofocus>
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
                        <select class="form-control js-example-placeholder-single" name="sofrete_tipo_recurso" id="sofrete_tipo_recurso">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="software" {{$recurso->sofrete_tipo_recurso == 'software' ? 'selected' : ''}}>Software</option>
                            <option value="plataforma-agora" {{$recurso->sofrete_tipo_recurso == 'plataforma-agora' ? 'selected' : ''}}>Plataforma Agora</option>
                            <option value="app" {{$recurso->sofrete_tipo_recurso == 'app' ? 'selected' : ''}}>App</option>
                            <option value="laboratorio" {{$recurso->sofrete_tipo_recurso == 'laboratorio' ? 'selected' : ''}}>Laboratorio</option>
                        </select>
                        @error('sofrete_tipo_recurso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="sofrete_id_docente">Docente</label>
                        <select class="form-control js-example-placeholder-single" name="sofrete_id_docente" id="sofrete_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}" {{$docente->id == $recurso->sofrete_id_docente ? 'selected' : ''}}>
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
                        <select class="form-control js-example-placeholder-single" name="sofrete_id_asignatura" id="sofrete_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}" {{$asignatura->id == $recurso->sofrete_id_asignatura ? 'selected' : ''}}>{{ $asignatura->asig_nombre }}</option>
                            @endforeach
                        </select>
                        @error('sofrete_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
