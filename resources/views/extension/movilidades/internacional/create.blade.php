@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/crearmovilidadinternacional">Crear</a> / <a href="/extension/mostrarmovilidadinternacional">Movilidad internacional</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro movilidad internacional</h4><hr>
            <form action="/extension/registromovilidadinternacional" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_tipo">Tipo</label>
                        <select class="form-control @error('exmointer_tipo') is-invalid @enderror" name="exmointer_tipo"
                            id="exmointer_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="saliente">Saliente: desde UNISANGIL hacia otro país</option>
                            <option value="entrante">Entrante: desde otro país hacia UNISANGIL</option>
                        </select>
                        @error('exmointer_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmointer_rol">Rol</label>
                        <select class="form-control @error('exmointer_rol') is-invalid @enderror" name="exmointer_rol"
                            id="exmointer_rol">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
                        </select>
                        @error('exmointer_rol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_id_sede_or">Sede origen</label>
                        <select class="form-control @error('exmointer_id_sede_or') is-invalid @enderror"
                            name="exmointer_id_sede_or" id="exmointer_id_sede_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmointer_id_sede_or')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmointer_id_facultad_or">Facultad origen</label>
                        <select class="form-control @error('exmointer_id_facultad_or') is-invalid @enderror"
                            name="exmointer_id_facultad_or" id="exmointer_id_facultad_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmointer_id_facultad_or')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_id_programa_or">Programa origen</label>
                        <select class="form-control @error('exmointer_id_programa_or') is-invalid @enderror"
                            name="exmointer_id_programa_or" id="exmointer_id_programa_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{ $programas->count() <= 0 ? 'No existen registros de programas' : '' }}</p>
                        @error('exmointer_id_programa_or')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 otros" id="otros">
                        <label for="exmointer_id_persona">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmointer_id_persona') is-invalid @enderror"
                            name="exmointer_id_persona" id="exmointer_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{ $personas->count() <= 0 ? 'No existen registros de personas' : '' }}</p>
                        @error('exmointer_id_persona')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 estudiantes" id="estudiantes">
                        <label for="exmointer_id_estudiante">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmointer_id_estudiante') is-invalid @enderror"
                            name="exmointer_id_estudiante" id="exmointer_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                            @endforeach
                        </select>
                        {{ $estudiantes->count() <= 0 ? 'No hay estudiantes en plataforma' : '' }}
                        @error('exmointer_id_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_pais_des">País destino</label>
                        <input class="form-control @error('exmointer_pais_des') is-invalid @enderror"
                            name="exmointer_pais_des" id="exmointer_pais_des" value="{{ old('exmointer_pais_des') }}"
                            type="text" autocomplete="exmointer_pais_des" autofocus>
                        @error('exmointer_pais_des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmointer_ciudad_des">Ciudad destino</label>
                        <input class="form-control @error('exmointer_ciudad_des') is-invalid @enderror"
                            name="exmointer_ciudad_des" id="exmointer_ciudad_des"
                            value="{{ old('exmointer_ciudad_des') }}" type="text" autocomplete="exmointer_ciudad_des"
                            autofocus>
                        @error('exmointer_ciudad_des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_institucion_nombre">Institución educativa (fuera de Colombia) de donde
                            proviene la movilidad a UNISANGIL o hacia donde se dirige el miembro de la comunidad
                            académica de UNISANGIL. Por favor escriba el nombre completo, sin siglas.</label>
                        <input class="form-control @error('exmointer_institucion_nombre') is-invalid @enderror"
                            name="exmointer_institucion_nombre" id="exmointer_institucion_nombre"
                            value="{{ old('exmointer_institucion_nombre') }}" type="text"
                            autocomplete="exmointer_institucion_nombre" autofocus>
                        @error('exmointer_institucion_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmointer_tipo_movilidad">Tipo de movilidad</label>
                        <div class="form-check">
                            <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                value="Misión" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Misión
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                value="Curso corto" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Curso corto
                            </label>
                        </div>
                        <div class="tipo-estudiante" id="tipo-estudiante">
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Voluntariado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Voluntariado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia o práctica" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía o práctica
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Curso de idiomas" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Curso de idiomas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Semestre acádemico de intercambio" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Semestre acádemico de intercambio
                                </label>
                            </div>
                        </div>
                        <div class="entrante-docente" id="entrante-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Estancia de investigación" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estancia de investigación
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa pregrado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa pregrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa especialización" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa especialización
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa maestría" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="saliente-docente" id="saliente-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de maestría" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="entrante-administrativo" id="entrante-administrativo">
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Pasantía" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmointer_tipo_movilidad[]" type="checkbox"
                                    value="Gestión de eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Gestión de convenios
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exmointer_descripcion">Descripción de la movilidad. Amplíe la información. Si se trata
                            de un evento académico por favor indique el nombre completo del evento, sin siglas.</label>
                        <textarea class="form-control @error('exmointer_descripcion') is-invalid @enderror" name="exmointer_descripcion"
                            id="exmointer_descripcion" cols="30" rows="10"></textarea>
                        @error('exmointer_descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmointer_fecha_inicio">Fecha de inicio</label>
                        <input class="form-control @error('exmointer_fecha_inicio') is-invalid @enderror"
                            name="exmointer_fecha_inicio" id="exmointer_fecha_inicio"
                            value="{{ old('exmointer_fecha_inicio') }}" type="date" autocomplete="exmointer_fecha_inicio"
                            autofocus>
                        @error('exmointer_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmointer_fecha_final">Fecha final</label>
                        <input class="form-control @error('exmointer_fecha_final') is-invalid @enderror"
                            name="exmointer_fecha_final" id="exmointer_fecha_final" value="{{ old('exmointer_fecha_final') }}"
                            type="date" autocomplete="exmointer_fecha_final" autofocus>
                        @error('exmointer_fecha_final')
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
<script src="/js/admin/movilidad_internacional.js"></script>
@endsection
