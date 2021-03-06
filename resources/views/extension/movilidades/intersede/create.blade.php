@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/crearmovilidadintersede">Crear</a> / <a href="/extension/mostrarmovilidadintersede">Movilidad intersede</a> / <a href="/extension">Extension - internacionalizaci√≥n</a>
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
            <h4><i class="fa fa-cube"></i> Registro movilidad intersede</h4><hr>
            <form action="/extension/registromovilidadintersede" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmoin_tipo">Tipo *</label>
                        <select class="form-control @error('exmoin_tipo') is-invalid @enderror" name="exmoin_tipo"
                            id="exmoin_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="entrante">Entrante</option>
                            <option value="saliente">Saliente</option>
                        </select>
                        @error('exmoin_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmoin_rol">Rol *</label>
                        <select class="form-control @error('exmoin_rol') is-invalid @enderror" name="exmoin_rol"
                            id="exmoin_rol">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
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
                        <label for="exmoin_id_sede_or">Sede origen *</label>
                        <select class="form-control @error('exmoin_id_sede_or') is-invalid @enderror" name="exmoin_id_sede_or" id="exmoin_id_sede_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmoin_id_sede_or')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmoin_id_facultad_or">Facultad origen ¬®*</label>
                        <select class="form-control @error('exmoin_id_facultad_or') is-invalid @enderror" name="exmoin_id_facultad_or" id="exmoin_id_facultad_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}</option>
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
                        <label for="exmoin_id_programa_or">Programa origen *</label>
                        <select class="form-control @error('exmoin_id_programa_or') is-invalid @enderror" name="exmoin_id_programa_or" id="exmoin_id_programa_or">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$programas->count()<=0 ? 'No existen registros de programas' : ''}}</p>
                        @error('exmoin_id_programa_or')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 otros" id="otros">
                        <label for="exmoin_id_persona">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmoin_id_persona') is-invalid @enderror" name="exmoin_id_persona" id="exmoin_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$personas->count()<=0 ? 'No existen registros de personas' : ''}}</p>
                        @error('exmoin_id_persona')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 estudiantes" id="estudiantes">
                        <label for="exmoin_id_estudiante">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmoin_id_estudiante') is-invalid @enderror" name="exmoin_id_estudiante" id="exmoin_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                            @endforeach
                        </select>
                        {{$estudiantes->count()<=0 ? 'No hay estudiantes en plataforma' : ''}}
                        @error('exmoin_id_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmoin_id_sede_des">Sede destino *</label>
                        <select class="form-control @error('exmoin_id_sede_des') is-invalid @enderror" name="exmoin_id_sede_des" id="exmoin_id_sede_des">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmoin_id_sede_des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmoin_id_facultad_des">Facultad destino *</label>
                        <select class="form-control @error('exmoin_id_facultad_des') is-invalid @enderror" name="exmoin_id_facultad_des" id="exmoin_id_facultad_des">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}</option>
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
                        <select class="form-control @error('exmoin_id_programa_des') is-invalid @enderror" name="exmoin_id_programa_des" id="exmoin_id_programa_des">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger">{{$programas->count()<=0 ? 'No existen registros de programas' : ''}}</p>
                        @error('exmoin_id_programa_des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmoin_tipo_movilidad">Tipo de movilidad</label>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Misi√≥n" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Misi√≥n
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                value="Curso corto" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Curso corto
                            </label>
                        </div>
                        <div class="tipo-estudiante" id="tipo-estudiante">
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Voluntariado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Voluntariado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasant√≠a
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia o pr√°ctica" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasant√≠a o pr√°ctica
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Curso de idiomas" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Curso de idiomas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Semestre ac√°demico de intercambio" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Semestre ac√°demico de intercambio
                                </label>
                            </div>
                        </div>
                        <div class="entrante-docente" id="entrante-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Estancia de investigaci√≥n" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estancia de investigaci√≥n
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa pregrado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa pregrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa especializaci√≥n" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa especializaci√≥n
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa maestr√≠a" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa maestr√≠a
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="saliente-docente" id="saliente-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de maestr√≠a" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de maestr√≠a
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de doctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de posdoctorado" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="entrante-administrativo" id="entrante-administrativo">
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Pasant√≠a" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasant√≠a
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmoin_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Gesti√≥n de convenios
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exmoin_descripcion">Descripci√≥n de la movilidad. Ampl√≠e la informaci√≥n. Si se trata
                            de un evento acad√©mico por favor indique el nombre completo del evento, sin siglas. *</label>
                        <textarea class="form-control @error('exmoin_descripcion') is-invalid @enderror" name="exmoin_descripcion" id="exmoin_descripcion" cols="30" rows="10"></textarea>
                        @error('exmoin_descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmoin_fecha_inicio">Fecha de inicio *</label>
                        <input class="form-control @error('exmoin_fecha_inicio') is-invalid @enderror"
                            name="exmoin_fecha_inicio" id="exmoin_fecha_inicio"
                            value="{{ old('exmoin_fecha_inicio') }}" type="date"
                            autocomplete="exmoin_fecha_inicio" autofocus>
                        @error('exmoin_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmoin_fecha_final">Fecha final *</label>
                        <input class="form-control @error('exmoin_fecha_final') is-invalid @enderror"
                            name="exmoin_fecha_final" id="exmoin_fecha_final"
                            value="{{ old('exmoin_fecha_final') }}" type="date"
                            autocomplete="exmoin_fecha_final" autofocus>
                        @error('exmoin_fecha_final')
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
<script src="/js/admin/movilidad_intersede.js"></script>
@endsection
