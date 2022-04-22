@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos *.</p>
    @endsection
@endsection
@section('content')
    <div class="col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fa fa-pencil"></i> Registro de asignación materia / horario / aula</h4><hr>
            <form action="/programa/{{$horario->id}}/actualizarhorario" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pph_year">{{ __('Año *') }}</label>
                        <input id="pph_year" type="text" class="form-control @error('pph_year') is-invalid @enderror"
                            name="pph_year" value="{{$horario->pph_year}}" autocomplete="pph_year" autofocus>
                        @error('pph_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pph_semestre">{{ __('Semestre *') }}</label>
                        <select class="js-example-placeholder-single form-control @error('pph_semestre') is-invalid @enderror" name="pph_semestre"
                            id="pph_semestre">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1" {{$horario->pph_semestre == '1' ? 'selected' : ''}}>1</option>
                            <option value="2" {{$horario->pph_semestre == '2' ? 'selected' : ''}}>2</option>
                            <option value="3" {{$horario->pph_semestre == '3' ? 'selected' : ''}}>3</option>
                            <option value="4" {{$horario->pph_semestre == '4' ? 'selected' : ''}}>4</option>
                            <option value="5" {{$horario->pph_semestre == '5' ? 'selected' : ''}}>5</option>
                            <option value="6" {{$horario->pph_semestre == '6' ? 'selected' : ''}}>6</option>
                            <option value="7" {{$horario->pph_semestre == '7' ? 'selected' : ''}}>7</option>
                            <option value="8" {{$horario->pph_semestre == '8' ? 'selected' : ''}}>8</option>
                            <option value="9" {{$horario->pph_semestre == '9' ? 'selected' : ''}}>9</option>
                            <option value="10" {{$horario->pph_semestre == '10' ? 'selected' : ''}}>10</option>
                            <option value="11" {{$horario->pph_semestre == '11' ? 'selected' : ''}}>10</option>
                            <option value="12" {{$horario->pph_semestre == '12' ? 'selected' : ''}}>10</option>
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
                        <select class="js-example-placeholder-single form-control @error('pph_id_asignatura') is-invalid @enderror"
                            name="pph_id_asignatura" id="pph_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}" {{$asignatura->id == $horario->pph_id_asignatura ? 'selected' : ''}}>{{ $asignatura->asig_nombre }}</option>
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
                            name="pph_grupo" value="{{$horario->pph_grupo}}" autocomplete="pph_grupo" autofocus>
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
                        <select class="js-example-placeholder-single form-control @error('pph_id_docente') is-invalid @enderror" name="pph_id_docente"
                            id="pph_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" {{$persona->id == $horario->pph_id_docente ? 'selected' : ''}}>
                                    {{ Str::upper($persona->per_nombre . ' ' . $persona->per_apellido) }}</option>
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
                            rows="10">{{$horario->pph_horario}}</textarea>
                        @error('asig_no_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="pph_aula">{{ __('Aula *') }}</label>
                        <input id="pph_aula" type="text" class="form-control @error('pph_aula') is-invalid @enderror"
                            name="pph_aula" value="{{$horario->pph_aula}}" autocomplete="pph_aula" autofocus>
                        @error('pph_aula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label
                            for="pph_nro_horas_semana_docencia">{{ __('Número de horas dedicadas a la docencia *') }}</label>
                        <input id="pph_nro_horas_semana_docencia" type="number"
                            class="form-control @error('pph_nro_horas_semana_docencia') is-invalid @enderror"
                            name="pph_nro_horas_semana_docencia" value="{{$horario->pph_nro_horas_semana_docencia}}"
                            autocomplete="pph_nro_horas_semana_docencia" autofocus>
                        @error('pph_nro_horas_semana_docencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label
                            for="pph_nro_horas_semana_investigacion">{{ __('Número de horas dedicadas a la investigación *') }}</label>
                        <input id="pph_nro_horas_semana_investigacion" type="number"
                            class="form-control @error('pph_nro_horas_semana_investigacion') is-invalid @enderror"
                            name="pph_nro_horas_semana_investigacion"
                            value="{{$horario->pph_nro_horas_semana_investigacion}}"
                            autocomplete="pph_nro_horas_semana_investigacion" autofocus>
                        @error('pph_nro_horas_semana_investigacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label
                            for="pph_nro_horas_semana_extension">{{ __('Número de horas dedicadas a extensión *') }}</label>
                        <input id="pph_nro_horas_semana_extension" type="number"
                            class="form-control @error('pph_nro_horas_semana_extension') is-invalid @enderror"
                            name="pph_nro_horas_semana_extension" value="{{$horario->pph_nro_horas_semana_extension}}"
                            autocomplete="pph_nro_horas_semana_extension" autofocus>
                        @error('pph_nro_horas_semana_extension')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="pph_nro_horas_semana_administrativas">{{ __('Número de horas dedicadas a labores administrativas *') }}</label>
                        <input id="pph_nro_horas_semana_administrativas" type="number"
                            class="form-control @error('pph_nro_horas_semana_administrativas') is-invalid @enderror"
                            name="pph_nro_horas_semana_administrativas"
                            value="{{$horario->pph_nro_horas_semana_administrativas}}"
                            autocomplete="pph_nro_horas_semana_administrativas" autofocus>
                        @error('pph_nro_horas_semana_administrativas')
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
