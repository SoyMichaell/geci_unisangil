@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Registro de asignaturas</h1>
    @section('message')
        <p>Programas acádemicos </p>
    @endsection
@endsection
@section('content')
    <div class="col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fab fa-wpforms"></i> Registro de asignación materia / horario / aula</h4>
            <form action="/programa/registrohorario" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pph_year">{{ __('Año *') }}</label>
                        <input id="pph_year" type="text" class="form-control @error('pph_year') is-invalid @enderror"
                            name="pph_year" value="{{ old('pph_year') }}" autocomplete="pph_year" autofocus>
                        @error('pph_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pph_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-select @error('pph_semestre') is-invalid @enderror" name="pph_semestre"
                            id="pph_semestre">
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
                        @error('pph_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pph_id_asignatura">{{ __('Asignatura *') }}</label>
                        <select class="form-select @error('pph_id_asignatura') is-invalid @enderror"
                            name="pph_id_asignatura" id="pph_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}">{{ $asignatura->asig_nombre }}</option>
                            @endforeach
                        </select>
                        @error('asig_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pph_grupo">{{ __('Grupo *') }}</label>
                        <input id="pph_grupo" type="text" class="form-control @error('pph_grupo') is-invalid @enderror"
                            name="pph_grupo" value="{{ old('pph_grupo') }}" autocomplete="pph_grupo" autofocus>
                        @error('pph_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pph_id_docente">{{ __('Docente *') }}</label>
                        <select class="form-select @error('pph_id_docente') is-invalid @enderror" name="pph_id_docente"
                            id="pph_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('asig_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pph_horario">{{ __('Horario *') }}</label>
                        <textarea class="form-control" name="pph_horario" id="pph_horario" cols="30"
                            rows="10"></textarea>
                        @error('asig_no_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="pph_aula">{{ __('Grupo *') }}</label>
                        <input id="pph_aula" type="text" class="form-control @error('pph_aula') is-invalid @enderror"
                            name="pph_aula" value="{{ old('pph_aula') }}" autocomplete="pph_aula" autofocus>
                        @error('pph_aula')
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
