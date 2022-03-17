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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="movi_year">Año</label>
                    <input class="form-control @error('movi_year') is-invalid @enderror" name="movi_year" id="movi_year"
                        value="{{ $movilidad->movi_year }}" type="number" autocomplete="movi_year" autofocus disabled>
                    @error('movi_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="movi_periodo">Periodo</label>
                    <input class="form-control @error('movi_periodo') is-invalid @enderror" name="movi_periodo"
                        id="movi_periodo" value="{{ $movilidad->movi_periodo }}" type="text"
                        autocomplete="movi_periodo" autofocus disabled>
                    @error('movi_periodo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="">Tipo de persona</label>
                    <select class="form-select @error('tipo_persona_movilidad') is-invalid @enderror"
                        name="tipo_persona_movilidad" id="tipo_persona_movilidad" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="administrativo"
                            {{ $movilidad->movi_tipo_persona == 'administrativo' ? 'selected' : '' }}>Administrativo
                        </option>
                        <option value="docente" {{ $movilidad->movi_tipo_persona == 'docente' ? 'selected' : '' }}>
                            Docente</option>
                        <option value="estudiante"
                            {{ $movilidad->movi_tipo_persona == 'estudiante' ? 'selected' : '' }}>Estudiante
                        </option>
                    </select>
                    @error('tipo_persona_movilidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6" id="docente">
                    <label for="">Nombre completo</label>
                    <select class="form-select" name="prac_id_docente" id="prac_id_docente" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}"
                                {{ $movilidad->movi_id_persona == $persona->id ? 'selected' : '' }}>
                                {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6" id="estudiante">
                    <label for="">Nombre completo</label>
                    <select class="form-select" name="prac_id_estudiante" id="prac_id_estudiante" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}"
                                {{ $movilidad->movi_id_persona == $estudiante->id ? 'selected' : '' }}>
                                {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="movi_tipo_movilidad">Tipo de movilidad</label>
                    <input class="form-control @error('movi_tipo_movilidad') is-invalid @enderror"
                        name="movi_tipo_movilidad" id="movi_tipo_movilidad"
                        value="{{ $movilidad->movi_tipo_movilidad }}" type="text" autocomplete="movi_tipo_movilidad"
                        autofocus disabled>
                    @error('movi_tipo_movilidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="movi_evento">Nombre evento o actividades</label>
                    <input class="form-control @error('movi_evento') is-invalid @enderror" name="movi_evento"
                        id="movi_evento" value="{{ $movilidad->movi_evento }}" type="text" autocomplete="movi_evento"
                        autofocus disabled>
                    @error('movi_evento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="movi_pais">País</label>
                    <input class="form-control @error('movi_pais') is-invalid @enderror" name="movi_pais" id="movi_pais"
                        value="{{ $movilidad->movi_pais }}" type="text" autocomplete="movi_pais" autofocus disabled>
                    @error('movi_pais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="movi_ciudad">Ciudad</label>
                    <input class="form-control @error('movi_ciudad') is-invalid @enderror" name="movi_ciudad"
                        id="movi_ciudad" value="{{ $movilidad->movi_ciudad }}" type="text" autocomplete="movi_ciudad"
                        autofocus disabled>
                    @error('movi_ciudad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="movi_observacion">Observaciones</label>
                    <input class="form-control @error('movi_observacion') is-invalid @enderror" name="movi_observacion"
                        id="movi_observacion" value="{{ $movilidad->movi_observacion }}" type="text"
                        autocomplete="movi_observacion" autofocus disabled>
                    @error('movi_observacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@section('scripts')
<script src="/js/divoculto.js"></script>
@endsection
