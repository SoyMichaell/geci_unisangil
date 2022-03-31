@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/crearmovilidadnacional">Crear</a> / <a href="/extension/mostrarmovilidadnacional">Movilidad nacional</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4>Registro movilidad nacional</h4><hr>
            <form action="/extension/registromovilidadnacional" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_tipo">Tipo</label>
                        <select class="form-select @error('exmona_tipo') is-invalid @enderror" name="exmona_tipo"
                            id="exmona_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="entrante">Entrante</option>
                            <option value="saliente">Saliente</option>
                        </select>
                        @error('exmona_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_rol">Rol</label>
                        <select class="form-select @error('exmona_rol') is-invalid @enderror" name="exmona_rol"
                            id="exmona_rol">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
                        </select>
                        @error('exmona_rol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_id_sede">Sede</label>
                        <select class="form-select @error('exmona_id_sede') is-invalid @enderror" name="exmona_id_sede" id="exmona_id_sede">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmona_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_id_facultad">Facultad</label>
                        <select class="form-select @error('exmona_id_facultad') is-invalid @enderror" name="exmona_id_facultad" id="exmona_id_facultad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmona_id_facultad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_id_programa">Programa</label>
                        <select class="form-select @error('exmona_id_programa') is-invalid @enderror" name="exmona_id_programa" id="exmona_id_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$programas->count()<=0 ? 'No existen registros de programas' : ''}}</p>
                        @error('exmona_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 otros" id="otros">
                        <label for="exmona_id_persona">Persona - Nombre completo</label>
                        <select class="form-select @error('exmona_id_persona') is-invalid @enderror" name="exmona_id_persona" id="exmona_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$personas->count()<=0 ? 'No existen registros de personas' : ''}}</p>
                        @error('exmona_id_persona')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 estudiantes" id="estudiantes">
                        <label for="exmona_id_estudiante">Persona - Nombre completo</label>
                        <select class="form-select @error('exmona_id_estudiante') is-invalid @enderror" name="exmona_id_estudiante" id="exmona_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                            @endforeach
                        </select>
                        {{$estudiantes->count()<=0 ? 'No hay estudiantes en plataforma' : ''}}
                        @error('exmona_id_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_institucion_proviene">Institución educativa, organización o entidad de donde
                            proviene la movilidad. Por favor indique el nombre completo, sin siglas.</label>
                        <input class="form-control @error('exmona_institucion_proviene') is-invalid @enderror"
                            name="exmona_institucion_proviene" id="exmona_institucion_proviene"
                            value="{{ old('exmona_institucion_proviene') }}" type="text"
                            autocomplete="exmona_institucion_proviene" autofocus>
                        @error('exmona_institucion_proviene')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_tipo_movilidad">Tipo de movilidad</label>
                        <div class="form-check">
                            <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                value="Misión" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Misión
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                value="Curso corto" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Curso corto
                            </label>
                        </div>
                        <div class="tipo-estudiante" id="tipo-estudiante">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Voluntariado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Voluntariado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia o práctica" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía o práctica
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Curso de idiomas" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Curso de idiomas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Semestre acádemico de intercambio" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Semestre acádemico de intercambio
                                </label>
                            </div>
                        </div>
                        <div class="entrante-docente" id="entrante-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estancia de investigación" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estancia de investigación
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa pregrado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa pregrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa especialización" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa especialización
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa maestría" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="saliente-docente" id="saliente-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de maestría" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="entrante-administrativo" id="entrante-administrativo">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantía" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Gestión de convenios
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exmona_descripcion">Descripción de la movilidad. Amplíe la información. Si se trata
                            de un evento académico por favor indique el nombre completo del evento, sin siglas.</label>
                        <textarea class="form-control @error('exmona_descripcion') is-invalid @enderror" name="exmona_descripcion" id="exmona_descripcion" cols="30" rows="10"></textarea>
                        @error('exmona_descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_fecha_inicio">Fecha de inicio</label>
                        <input class="form-control @error('exmona_fecha_inicio') is-invalid @enderror"
                            name="exmona_fecha_inicio" id="exmona_fecha_inicio"
                            value="{{ old('exmona_fecha_inicio') }}" type="date"
                            autocomplete="exmona_fecha_inicio" autofocus>
                        @error('exmona_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_fecha_final">Fecha final</label>
                        <input class="form-control @error('exmona_fecha_final') is-invalid @enderror"
                            name="exmona_fecha_final" id="exmona_fecha_final"
                            value="{{ old('exmona_fecha_final') }}" type="date"
                            autocomplete="exmona_fecha_final" autofocus>
                        @error('exmona_fecha_final')
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
<script src="/js/admin/programa_plan_estudio.js"></script>
@endsection
