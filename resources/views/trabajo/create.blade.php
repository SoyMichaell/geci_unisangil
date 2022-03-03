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
            <form action="/trabajo/" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_codigo_proyecto">Codigo proyecto</label>
                        <input class="form-control @error('tra_codigo_proyecto') is-invalid @enderror"
                            name="tra_codigo_proyecto" id="tra_codigo_proyecto"
                            value="{{ old('tra_codigo_proyecto') }}" type="text" autocomplete="tra_codigo_proyecto"
                            autofocus>
                        @error('tra_codigo_proyecto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tra_titulo_proyecto">Titulo proyecto de grado</label>
                        <input class="form-control @error('tra_titulo_proyecto') is-invalid @enderror"
                            name="tra_titulo_proyecto" id="tra_titulo_proyecto"
                            value="{{ old('tra_titulo_proyecto') }}" type="text" autocomplete="tra_titulo_proyecto"
                            autofocus>
                        @error('tra_titulo_proyecto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tra_id_estudiante">Estudiante (s)</label>
                        <select class="js-example-placeholder-single form-select" name="tra_id_estudiante[]"
                            id="tra_id_estudiante" multiple>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                            @endforeach
                        </select>
                        @error('tra_id_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_fecha_inicio">Fecha de inicio</label>
                        <input class="form-control @error('tra_fecha_inicio') is-invalid @enderror"
                            name="tra_fecha_inicio" id="tra_fecha_inicio" value="{{ old('tra_fecha_inicio') }}"
                            type="date" autocomplete="tra_fecha_inicio" autofocus>
                        @error('tra_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tra_modalidad_grado">Modalidad de grado</label>
                        <select class="js-example-placeholder-single form-select" name="tra_modalidad_grado"
                            id="tra_modalidad_grado">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($modalidades as $modalidad)
                                <option value="{{ $modalidad->id }}">{{ $modalidad->mod_nombre }}</option>
                            @endforeach
                        </select>
                        @error('tra_modalidad_grado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_id_director">Director</label>
                        <select class="js-example-placeholder-single form-select" name="tra_id_director"
                            id="tra_id_director">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('tra_id_director')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tra_id_codirector">Codirector</label>
                        <select class="js-example-placeholder-single form-select" name="tra_id_codirector"
                            id="tra_id_codirector">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('tra_id_codirector')
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
