@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion/crearproyecto">Crear</a> / <a href="/investigacion/mostrarproyecto">Proyecto</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Registro de proyecto</h1>
    @section('message')
        <p>Diligencie todos los campos requeridos. </p>
    @endsection
@endsection
@section('content')
    <div class="container col-md-12">
        <div class="tile">
            <h4>Registro proyecto</h4> <hr>
            <form action="/investigacion/registroproyecto" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invpro_id_grupo">{{ __('Grupo de investigación *') }}</label>
                        <select class="form-select @error('invpro_id_grupo') is-invalid @enderror"
                            name="invpro_id_grupo" id="invpro_id_grupo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
                                    {{$grupo->inv_nombre_grupo}}</option>
                            @endforeach
                        </select>
                        @error('invpro_id_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invpro_titulo">{{ __('Titulo proyecto *') }}</label>
                        <input id="invpro_titulo" type="text"
                            class="form-control @error('invpro_titulo') is-invalid @enderror"
                            name="invpro_titulo" value="{{ old('invpro_titulo') }}"
                            autocomplete="invpro_titulo" autofocus>
                        @error('invpro_titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invpro_resumen">{{ __('Resumen *') }}</label>
                        <textarea class="form-control @error('invpro_resumen') is-invalid @enderror" name="invpro_resumen" id="invpro_resumen" cols="30" rows="10"></textarea>
                        @error('invpro_resumen')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invpro_impacto">{{ __('Impacto proyecto *') }}</label>
                        <textarea class="form-control @error('invpro_impacto') is-invalid @enderror" name="invpro_impacto" id="invpro_impacto" cols="30" rows="10"></textarea>
                        @error('invpro_impacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invpro_lugar">{{ __('Lugar *') }}</label>
                        <input id="invpro_lugar" type="text"
                            class="form-control @error('invpro_lugar') is-invalid @enderror"
                            name="invpro_lugar" value="{{ old('invpro_lugar') }}"
                            autocomplete="invpro_lugar" autofocus>
                        @error('invpro_lugar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invpro_resultados">{{ __('Resultados esperados *') }}</label>
                        <textarea class="form-control @error('invpro_resultados') is-invalid @enderror" name="invpro_resultados" id="invpro_resultados" cols="30" rows="10"></textarea>
                        @error('invpro_resultados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invpro_fecha_inicio">{{ __('Fecha inicio *') }}</label>
                        <input id="invpro_fecha_inicio" type="date"
                            class="form-control @error('invpro_fecha_inicio') is-invalid @enderror"
                            name="invpro_fecha_inicio" value="{{ old('invpro_fecha_inicio') }}"
                            autocomplete="invpro_fecha_inicio" autofocus>
                        @error('invpro_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invpro_id_integrantes">{{ __('Investigadores *') }}</label>
                        <select class="form-select js-example-basic-multiple @error('invpro_id_integrantes') is-invalid @enderror" name="invpro_id_integrantes[]" id="invpro_id_integrantes" multiple="multiple">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{$persona->per_nombre.' '.$persona->per_apellido}}">{{$persona->per_nombre.' '.$persona->per_apellido}}</option>
                            @endforeach
                        </select>
                        @error('invpro_id_integrantes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invpro_palabras_clave">{{ __('Palabras claves *') }}</label>
                        <textarea class="form-control @error('invpro_palabras_clave') is-invalid @enderror" name="invpro_palabras_clave" id="invpro_palabras_clave" cols="30" rows="10"></textarea>
                        @error('invpro_palabras_clave')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invpro_estado">{{ __('Estado proyecto *') }}</label>
                        <select class="form-select @error('invpro_estado') is-invalid @enderror" name="invpro_estado" id="invpro_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="por-iniciar">Por iniciar</option>
                            <option value="en-curso">En curso</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                        @error('invpro_estado')
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
