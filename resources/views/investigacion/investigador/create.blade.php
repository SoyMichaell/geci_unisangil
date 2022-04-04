@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion/crearintegrante">Crear</a> / <a href="/investigacion/mostrarintegrante">Investigador</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligencie todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="col-md-12">
        <div class="tile w-50">
            <h4><i class="fa fa-cube"></i> Registro investigador</h4><hr>
            <form action="/investigacion/registrointegrante" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="inves_id_persona">{{ __('Investigador *') }}</label>
                        <select class="form-control @error('inves_id_persona') is-invalid @enderror"
                            name="inves_id_persona" id="inves_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('inves_id_persona')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="inves_enlace_cvlac">{{ __('Enlace CVLAC ') }}</label>
                        <input id="inves_enlace_cvlac" type="url"
                            class="form-control @error('inves_enlace_cvlac') is-invalid @enderror" name="inves_enlace_cvlac"
                            value="{{ old('inves_enlace_cvlac') }}" autocomplete="inves_enlace_cvlac" autofocus>
                        @error('inves_enlace_cvlac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="inves_tipo_vinculacion">{{ __('Tipo de vinculación *') }}</label>
                        <input id="inves_tipo_vinculacion" type="text"
                            class="form-control @error('inves_tipo_vinculacion') is-invalid @enderror"
                            name="inves_tipo_vinculacion" value="{{ old('inves_tipo_vinculacion') }}"
                            autocomplete="inves_tipo_vinculacion" autofocus>
                        @error('inves_tipo_vinculacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="inves_categoria">{{ __('Categoría') }}</label>
                        <input id="inves_categoria" type="text"
                            class="form-control @error('inves_categoria') is-invalid @enderror"
                            name="inves_categoria" value="{{ old('inves_categoria') }}"
                            autocomplete="inves_categoria" autofocus>
                        @error('inves_categoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="inves_id_grupo">{{ __('Grupo de investigación *') }}</label>
                        <select class="form-control @error('inves_id_grupo') is-invalid @enderror"
                            name="inves_id_grupo" id="inves_id_grupo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
                                    {{$grupo->inv_nombre_grupo}}</option>
                            @endforeach
                        </select>
                        @error('inves_id_grupo')
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
