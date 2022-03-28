@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/editarplan">Editar</a> / <a href="/programa/mostrarplan">Plan de estudio</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Módulo Programa</h1>
    @section('message')
        <p>Formulario de edición plan de estudio</p>
    @endsection
@endsection
@section('content')
    <div class="container col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fab fa-wpforms"></i> Actualizar plan de estudio</h4>
            <form action="/programa/{{ $plan->id }}/actualizarplan" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pp_id_sede">{{ __('Sede *') }}</label>
                        <select class="form-select" name="pp_id_sede" id="pp_id_sede">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}"
                                    {{ $plan->pp_id_sede == $municipio->id ? 'selected' : '' }}>
                                    {{ $municipio->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('pp_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pp_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-select" name="pp_id_programa" id="pp_id_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}"
                                    {{ $plan->pp_id_programa == $programa->id ? 'selected' : '' }}>
                                    {{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <small>{{ $programas->count() > 0 ? '' : 'No hay programas, primero registre' }}</small>
                        @error('pp_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pp_plan">{{ __('Nombre plan *') }}</label>
                        <input id="pp_plan" type="text" class="form-control @error('pp_plan') is-invalid @enderror"
                            name="pp_plan" value="{{ $plan->pp_plan }}" autocomplete="pp_plan" autofocus>
                        @error('pp_plan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pp_creditos">{{ __('Número de creditos *') }}</label>
                        <input id="pp_creditos" type="number"
                            class="form-control @error('pp_creditos') is-invalid @enderror" name="pp_creditos"
                            value="{{ $plan->pp_creditos }}" autocomplete="pp_creditos" autofocus>
                        @error('pp_creditos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pp_no_asignaturas">{{ __('Número de asignaturas *') }}</label>
                        <input id="pp_no_asignaturas" type="number"
                            class="form-control @error('pp_no_asignaturas') is-invalid @enderror"
                            name="pp_no_asignaturas" value="{{ $plan->pp_no_asignaturas }}"
                            autocomplete="pp_no_asignaturas" autofocus>
                        @error('pp_no_asignaturas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pp_estado">{{ __('Estado *') }}</label>
                        <select class="form-select" name="pp_estado" id="pp_estado">
                            <option value="activo" {{ $plan->pp_estado == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $plan->pp_estado == 'inactivo' ? 'selected' : '' }}>Inactivo
                            </option>
                        </select>
                        @error('pp_estado')
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
