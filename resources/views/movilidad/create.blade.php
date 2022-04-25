@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/movilidad/create">Crear</a> / <a href="/movilidad">Movilidad</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro movilidad</h4><hr>
            <form action="/movilidad" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="movi_year">Año *</label>
                        <input class="form-control @error('movi_year') is-invalid @enderror" name="movi_year"
                            id="movi_year" value="{{ old('movi_year') }}" type="number" autocomplete="movi_year"
                            autofocus>
                        @error('movi_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="movi_periodo">Periodo *</label>
                        <input class="form-control @error('movi_periodo') is-invalid @enderror" name="movi_periodo"
                            id="movi_periodo" value="{{ old('movi_periodo') }}" type="text" placeholder="2022-1 | 2022-2"
                            autocomplete="movi_periodo" autofocus>
                        @error('movi_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">Tipo de persona *</label>
                        <select class="form-control @error('tipo_persona_movilidad') is-invalid @enderror" name="tipo_persona_movilidad" id="tipo_persona_movilidad">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="docente">Docente</option>
                            <option value="estudiante">Estudiante</option>
                        </select>
                        @error('tipo_persona_movilidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6" id="administrativo">
                        <label for="">Nombre completo</label>
                        <select class="form-control js-example-placeholder-single" name="prac_id_administrativo" id="prac_id_administrativo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($administrativos as $administrativo)
                                <option value="{{ $administrativo->id }}">
                                    {{ $administrativo->per_nombre . ' ' . $administrativo->per_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6" id="docente">
                        <label for="">Nombre completo</label>
                        <select class="form-control js-example-placeholder-single" name="prac_id_docente" id="prac_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6" id="estudiante">
                        <label for="">Nombre completo</label>
                        <select class="form-control js-example-placeholder-single" name="prac_id_estudiante" id="prac_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="movi_tipo_movilidad">Tipo de movilidad *</label>
                        <input class="form-control @error('movi_tipo_movilidad') is-invalid @enderror" name="movi_tipo_movilidad"
                            id="movi_tipo_movilidad" value="{{ old('movi_tipo_movilidad') }}" type="text" autocomplete="movi_tipo_movilidad"
                            autofocus>
                        @error('movi_tipo_movilidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="movi_evento">Nombre evento o actividades *</label>
                        <input class="form-control @error('movi_evento') is-invalid @enderror" name="movi_evento"
                            id="movi_evento" value="{{ old('movi_evento') }}" type="text"
                            autocomplete="movi_evento" autofocus>
                        @error('movi_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="movi_pais">País *</label>
                        <input class="form-control @error('movi_pais') is-invalid @enderror" name="movi_pais"
                            id="movi_pais" value="{{ old('movi_pais') }}" type="text" autocomplete="movi_pais"
                            autofocus>
                        @error('movi_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="movi_ciudad">Ciudad *</label>
                        <input class="form-control @error('movi_ciudad') is-invalid @enderror" name="movi_ciudad"
                            id="movi_ciudad" value="{{ old('movi_ciudad') }}" type="text"
                            autocomplete="movi_ciudad" autofocus>
                        @error('movi_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="movi_observacion">Observaciones (Opcional)</label>
                        <input class="form-control @error('movi_observacion') is-invalid @enderror" name="movi_observacion"
                            id="movi_observacion" value="{{ old('movi_observacion') }}" type="text"
                            autocomplete="movi_observacion" autofocus>
                        @error('movi_observacion')
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
@section('scripts')
<script src="/js/divoculto.js"></script>
@endsection