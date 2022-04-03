@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro recurso</h4><hr>
            <form action="/software/registrorecurso" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sofrete_year">Año</label>
                        <input class="form-control @error('sofrete_year') is-invalid @enderror" name="sofrete_year"
                            id="sofrete_year" value="{{ old('sofrete_year') }}" type="number"
                            autocomplete="sofrete_year" autofocus>
                        @error('sofrete_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sofrete_periodo">Periodo</label>
                        <input class="form-control @error('sofrete_periodo') is-invalid @enderror"
                            name="sofrete_periodo" id="sofrete_periodo"
                            value="{{ old('sofrete_periodo') }}" type="text" autocomplete="sofrete_periodo"
                            autofocus>
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
                        <select class="form-control js-example-placeholder-single @error('sofrete_tipo_recurso') is-invalid @enderror" name="sofrete_tipo_recurso" id="sofrete_tipo_recurso">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="software">Software</option>
                            <option value="plataforma-agora">Plataforma Agora</option>
                            <option value="app">App</option>
                            <option value="laboratori">Laboratorio</option>
                        </select>
                        @error('sofrete_tipo_recurso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="sofrete_id_docente">Docente</label>
                        <select class="form-control js-example-placeholder-single @error('sofrete_id_docente') is-invalid @enderror" name="sofrete_id_docente" id="sofrete_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->per_nombre.' '.$docente->per_apellido}}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$docentes->count()<=0 ? 'No existen registro de docentes' : ''}}</p>
                        @error('sofrete_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="sofrete_id_asignatura">Asignatura</label>
                        <select class="form-control js-example-placeholder-single @error('sofrete_id_asignatura') is-invalid @enderror" name="sofrete_id_asignatura" id="sofrete_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{$asignatura->id}}">{{$asignatura->asig_nombre}}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$asignaturas->count()<=0 ? 'No existen registro de asignaturas' : ''}}</p>
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
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
