@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$intersede->id}}/vermovilidadintersede">Vista</a> / <a href="/extension/mostrarmovilidadintersede">Movilidad intersede</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-question-circle"></i> Vista de registro</h4><hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_tipo">Tipo</label>
                    <select class="form-control @error('exmoin_tipo') is-invalid @enderror" name="exmoin_tipo"
                        id="exmoin_tipo" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="entrante" {{ $intersede->exmoin_tipo == 'entrante' ? 'selected' : '' }}>Entrante
                        </option>
                        <option value="saliente" {{ $intersede->exmoin_tipo == 'saliente' ? 'selected' : '' }}>Saliente
                        </option>
                    </select>
                    @error('exmoin_tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exmoin_rol">Rol</label>
                    <select class="form-control @error('exmoin_rol') is-invalid @enderror" name="exmoin_rol"
                        id="exmoin_rol" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="estudiante" {{ $intersede->exmoin_rol == 'estudiante' ? 'selected' : '' }}>
                            Estudiante</option>
                        <option value="docente" {{ $intersede->exmoin_rol == 'docente' ? 'selected' : '' }}>Docente
                        </option>
                        <option value="administrativo"
                            {{ $intersede->exmoin_rol == 'administrativo' ? 'selected' : '' }}>Administrativo</option>
                    </select>
                    @error('exmoin_rol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_id_sede_or">Sede origen</label>
                    <select class="form-control @error('exmoin_id_sede_or') is-invalid @enderror"
                        name="exmoin_id_sede_or" id="exmoin_id_sede_or" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}"
                                {{ $intersede->exmoin_id_sede_or == $sede->id ? 'selected' : '' }}>
                                {{ $sede->mun_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_sede_or')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exmoin_id_facultad_or">Facultad origen</label>
                    <select class="form-control @error('exmoin_id_facultad_or') is-invalid @enderror"
                        name="exmoin_id_facultad_or" id="exmoin_id_facultad_or" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->id }}"
                                {{ $intersede->exmoin_id_facultad_or == $facultad->id ? 'selected' : '' }}>
                                {{ $facultad->fac_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_facultad_or')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_id_programa_or">Programa origen</label>
                    <select class="form-control @error('exmoin_id_programa_or') is-invalid @enderror"
                        name="exmoin_id_programa_or" id="exmoin_id_programa_or" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($programas as $programa)
                            <option value="{{ $programa->id }}"
                                {{ $intersede->exmoin_id_programa_or == $programa->id ? 'selected' : '' }}>
                                {{ $programa->pro_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_programa_or')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 otros" id="otros">
                    <label for="exmoin_id_persona">Persona - Nombre completo</label>
                    <select class="form-control @error('exmoin_id_persona') is-invalid @enderror"
                        name="exmoin_id_persona" id="exmoin_id_persona" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}"
                                {{ $intersede->exmoin_id_persona == $persona->id ? 'selected' : '' }}>
                                {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_persona')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 estudiantes" id="estudiantes">
                    <label for="exmoin_id_estudiante">Persona - Nombre completo</label>
                    <select class="form-control @error('exmoin_id_estudiante') is-invalid @enderror"
                        name="exmoin_id_estudiante" id="exmoin_id_estudiante" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}"
                                {{ $intersede->exmoin_id_persona == $estudiante->id ? 'selected' : '' }}>
                                {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                        @endforeach
                    </select>
                    {{ $estudiantes->count() <= 0 ? 'No hay estudiantes en plataforma' : '' }}
                    @error('exmoin_id_estudiante')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_id_sede_des">Sede destino</label>
                    <select class="form-control @error('exmoin_id_sede_des') is-invalid @enderror"
                        name="exmoin_id_sede_des" id="exmoin_id_sede_des" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}"
                                {{ $intersede->exmoin_id_sede_des == $sede->id ? 'selected' : '' }}>
                                {{ $sede->mun_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_sede_des')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exmoin_id_facultad_des">Facultad destino</label>
                    <select class="form-control @error('exmoin_id_facultad_des') is-invalid @enderror"
                        name="exmoin_id_facultad_des" id="exmoin_id_facultad_des" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->id }}"
                                {{ $intersede->exmoin_id_facultad_des == $facultad->id ? 'selected' : '' }}>
                                {{ $facultad->fac_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_facultad_des')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_id_programa_des">Programa destino</label>
                    <select class="form-control @error('exmoin_id_programa_des') is-invalid @enderror"
                        name="exmoin_id_programa_des" id="exmoin_id_programa_des" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($programas as $programa)
                            <option value="{{ $programa->id }}"
                                {{ $intersede->exmoin_id_programa_des == $programa->id ? 'selected' : '' }}>
                                {{ $programa->pro_nombre }}</option>
                        @endforeach
                    </select>
                    @error('exmoin_id_programa_des')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exmoin_tipo_movilidad">Tipo de movilidad</label>
                    @php
                        $tipomo = explode(';', $intersede->exmoin_tipo_movilidad);
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox" value="Misión"
                            id="flexCheckChecked"
                            @foreach ($tipomo as $m) {{ $m == 'Misión' ? 'checked' : '' }} @endforeach disabled>
                        <label class="form-check-label" for="flexCheckChecked">
                            Misión
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                            value="Curso corto" id="flexCheckChecked"
                            @foreach ($tipomo as $m) {{ $m == 'Curso corto' ? 'checked' : '' }} @endforeach disabled>
                        <label class="form-check-label" for="flexCheckChecked">
                            Curso corto
                        </label>
                    </div>
                    <div class="tipo-estudiante" id="tipo-estudiante">
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Voluntariado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Voluntariado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Voluntariado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Pasantia" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Pasantia' ? 'checked' : '' }} @endforeach disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Pasantía
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Pasantia o práctica" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Pasantia o práctica' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Pasantía o práctica
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Asistencia a eventos" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Asistencia a eventos' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Asistencia a eventos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Curso de idiomas" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Curso de idiomas' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Curso de idiomas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Semestre acádemico de intercambio" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Semestre acádemico de intercambio' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Semestre acádemico de intercambio
                            </label>
                        </div>
                    </div>
                    <div class="entrante-docente" id="entrante-docente">
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Estancia de investigación" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Estancia de investigación' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Estancia de investigación
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Profesor programa pregrado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Profesor programa pregrado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Profesor programa pregrado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Profesor programa especialización" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Profesor programa especialización' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Profesor programa especialización
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Profesor programa maestría" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Profesor programa maestría' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Profesor programa maestría
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Profesor programa doctorado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Profesor programa doctorado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Profesor programa doctorado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Profesor programa posdoctorado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Profesor programa posdoctorado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Profesor programa posdoctorado
                            </label>
                        </div>
                    </div>
                    <div class="saliente-docente" id="saliente-docente">
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Estudios de maestría" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Estudios de maestría' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Estudios de maestría
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Estudios de doctorado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Estudios de doctorado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Estudios de doctorado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Estudios de posdoctorado" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Estudios de posdoctorado' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Estudios de posdoctorado
                            </label>
                        </div>
                    </div>
                    <div class="entrante-administrativo" id="entrante-administrativo">
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Asistencia a eventos" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Asistencia a eventos' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Asistencia a eventos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Pasantía" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Pasantía' ? 'checked' : '' }} @endforeach disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Pasantía
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Asistencia a eventos" id="flexCheckChecked"
                                @foreach ($tipomo as $m) {{ $m == 'Asistencia a eventos' ? 'checked' : '' }} @endforeach
                                disabled>
                            <label class="form-check-label" for="flexCheckChecked">
                                Gestión de convenios
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="exmoin_descripcion">Descripción de la movilidad. Amplíe la información. Si se trata
                        de un evento académico por favor indique el nombre completo del evento, sin siglas.</label>
                    <textarea class="form-control @error('exmoin_descripcion') is-invalid @enderror" name="exmoin_descripcion"
                        id="exmoin_descripcion" cols="30" rows="10"
                        disabled>{{ $intersede->exmoin_descripcion }}</textarea>
                    @error('exmoin_descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exmoin_fecha_inicio">Fecha de inicio</label>
                    <input class="form-control @error('exmoin_fecha_inicio') is-invalid @enderror"
                        name="exmoin_fecha_inicio" id="exmoin_fecha_inicio"
                        value="{{ $intersede->exmoin_fecha_inicio }}" type="date" autocomplete="exmoin_fecha_inicio"
                        autofocus disabled>
                    @error('exmoin_fecha_inicio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exmoin_fecha_final">Fecha final</label>
                    <input class="form-control @error('exmoin_fecha_final') is-invalid @enderror"
                        name="exmoin_fecha_final" id="exmoin_fecha_final" value="{{ $intersede->exmoin_fecha_final }}"
                        type="date" autocomplete="exmoin_fecha_final" autofocus disabled>
                    @error('exmoin_fecha_final')
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
<script src="/js/admin/movilidad_intersede.js"></script>
@endsection
