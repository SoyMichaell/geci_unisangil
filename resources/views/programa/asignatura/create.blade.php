@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/crearasignatura">Crear</a> / <a href="/programa/mostrarasignatura">Asignaturas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Módulo Programa</h1>
    @section('message')
        <p>Formulario de registro asignatura</p>
    @endsection
@endsection
@section('content')
    <div class="container col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fab fa-wpforms"></i> Registro plan de estudio</h4>
            <form action="/programa/registroasignatura" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="asig_id_sede">{{ __('Sede *') }}</label>
                        <select class="form-select" name="asig_id_sede" id="asig_id_sede">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('asig_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="asig_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-select" name="asig_id_programa" id="asig_id_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <small>{{ $programas->count() > 0 ? '' : 'No hay programas, primero registre' }}</small>
                        @error('asig_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="asig_id_plan_estudio">{{ __('Plan de estudio *') }}</label>
                        <select class="form-select" name="asig_id_plan_estudio" id="asig_id_plan_estudio">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->pp_plan }}</option>
                            @endforeach
                        </select>
                        @error('asig_id_plan_estudio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="asig_codigo">{{ __('Código asignatura *') }}</label>
                        <input id="asig_codigo" type="text"
                            class="form-control @error('asig_codigo') is-invalid @enderror" name="asig_codigo"
                            value="{{ old('asig_codigo') }}" autocomplete="asig_codigo" autofocus>
                        @error('asig_codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="asig_nombre">{{ __('Nombre asignatura *') }}</label>
                        <input id="asig_nombre" type="text"
                            class="form-control @error('asig_nombre') is-invalid @enderror" name="asig_nombre"
                            value="{{ old('asig_nombre') }}" autocomplete="asig_nombre" autofocus>
                        @error('asig_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="asig_no_creditos">{{ __('Número de creditos *') }}</label>
                        <input id="asig_no_creditos" type="number"
                            class="form-control @error('asig_no_creditos') is-invalid @enderror"
                            name="asig_no_creditos" value="{{ old('asig_no_creditos') }}"
                            autocomplete="asig_no_creditos" autofocus>
                        @error('asig_no_creditos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="asig_no_semanales">{{ __('Número de horas semanales *') }}</label>
                        <input id="asig_no_semanales" type="number"
                            class="form-control @error('asig_no_semanales') is-invalid @enderror"
                            name="asig_no_semanales" value="{{ old('asig_no_semanales') }}"
                            autocomplete="asig_no_semanales" autofocus>
                        @error('asig_no_semanales')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="asig_no_semestre">{{ __('Número de horas semestre *') }}</label>
                        <input id="asig_no_semestre" type="number"
                            class="form-control @error('asig_no_semestre') is-invalid @enderror"
                            name="asig_no_semestre" value="{{ old('asig_no_semestre') }}"
                            autocomplete="asig_no_semestre" autofocus>
                        @error('asig_no_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="asig_estado">{{ __('Estado *') }}</label>
                        <select class="form-select" name="asig_estado" id="asig_estado">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        @error('asig_estado')
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
