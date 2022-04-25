@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$nacional->id}}/editarmovilidadnacional">Editar</a> / <a href="/extension/mostrarmovilidadnacional">Movilidad nacional</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
            <form action="/extension/{{$nacional->id}}/actualizarmovilidadnacional" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_tipo">Tipo *</label>
                        <select class="form-control @error('exmona_tipo') is-invalid @enderror" name="exmona_tipo"
                            id="exmona_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="entrante" {{$nacional->exmona_tipo == 'entrante' ? 'selected' : ''}}>Entrante</option>
                            <option value="saliente" {{$nacional->exmona_tipo == 'saliente' ? 'selected' : ''}}>Saliente</option>
                        </select>
                        @error('exmona_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_rol">Rol *</label>
                        <select class="form-control @error('exmona_rol') is-invalid @enderror" name="exmona_rol"
                            id="exmona_rol">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="estudiante" {{$nacional->exmona_rol == 'estudiante' ? 'selected' : ''}}>Estudiante</option>
                            <option value="docente" {{$nacional->exmona_rol == 'docente' ? 'selected' : ''}}>Docente</option>
                            <option value="administrativo" {{$nacional->exmona_rol == 'administrativo' ? 'selected' : ''}}>Administrativo</option>
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
                        <label for="exmona_id_sede">Sede *</label>
                        <select class="form-control @error('exmona_id_sede') is-invalid @enderror" name="exmona_id_sede" id="exmona_id_sede">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}" {{$sede->id == $nacional->exmona_id_sede ? 'selected' : ''}}>{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmona_id_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_id_facultad">Facultad *</label>
                        <select class="form-control @error('exmona_id_facultad') is-invalid @enderror" name="exmona_id_facultad" id="exmona_id_facultad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}" {{$facultad->id == $nacional->exmona_id_facultad ? 'selected' : ''}}>{{ $facultad->fac_nombre }}</option>
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
                        <label for="exmona_id_programa">Programa *</label>
                        <select class="form-control @error('exmona_id_programa') is-invalid @enderror" name="exmona_id_programa" id="exmona_id_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}" {{$programa->id == $nacional->exmona_id_programa ? 'selected' : ''}}>{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        @error('exmona_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 otros" id="otros">
                        <label for="exmona_id_persona">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmona_id_persona') is-invalid @enderror" name="exmona_id_persona" id="exmona_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" {{$persona->id == $nacional->exmona_id_persona ? 'selected' : ''}}>
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('exmona_id_persona')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 estudiantes" id="estudiantes">
                        <label for="exmona_id_estudiante">Persona - Nombre completo</label>
                        <select class="js-example-placeholder-single form-control @error('exmona_id_estudiante') is-invalid @enderror" name="exmona_id_estudiante" id="exmona_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" {{$estudiante->id == $nacional->exmona_id_persona ? 'selected' : ''}}>
                                    {{ $estudiante->per_nombre . ' ' . $estudiante->per_nombre}}</option>
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
                            proviene la movilidad. Por favor indique el nombre completo, sin siglas. *</label>
                        <input class="form-control @error('exmona_institucion_proviene') is-invalid @enderror"
                            name="exmona_institucion_proviene" id="exmona_institucion_proviene"
                            value="{{$nacional->exmona_institucion_proviene}}" type="text"
                            autocomplete="exmona_institucion_proviene" autofocus>
                        @error('exmona_institucion_proviene')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_tipo_movilidad">Tipo de movilidad</label>
                        @php
                            $tipom = explode(';', $nacional->exmona_tipo_movilidad);
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                value="Misión" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Misión' ? 'checked' : '' }} @endforeach>
                            <label class="form-check-label" for="flexCheckChecked">
                                Misión
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                value="Curso corto" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Curso corto' ? 'checked' : '' }}  @endforeach>
                            <label class="form-check-label" for="flexCheckChecked">
                                Curso corto
                            </label>
                        </div>
                        <div class="tipo-estudiante" id="tipo-estudiante">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Voluntariado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Voluntariado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Voluntariado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Pasantia' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantia o práctica" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Pasantia o práctica' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía o práctica
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Asistencia a eventos' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Curso de idiomas" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Curso de idiomas' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Curso de idiomas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Semestre acádemico de intercambio" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Semestre acádemico de intercambio' ? 'checked' : '' }}  @endforeach>
                                    Semestre acádemico de intercambio
                                </label>
                            </div>
                        </div>
                        <div class="entrante-docente" id="entrante-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estancia de investigación" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Estancia de investigación' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estancia de investigación
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa pregrado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Profesor programa pregrado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa pregrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa especialización" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Profesor programa especialización' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa especialización
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa maestría" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Profesor programa maestría' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa doctorado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Profesor programa doctorado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Profesor programa posdoctorado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Profesor programa posdoctorado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Profesor programa posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="saliente-docente" id="saliente-docente">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de maestría" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Estudios de maestría' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de maestría
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de doctorado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Estudios de doctorado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de doctorado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Estudios de posdoctorado" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Estudios de posdoctorado' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Estudios de posdoctorado
                                </label>
                            </div>
                        </div>
                        <div class="entrante-administrativo" id="entrante-administrativo">
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Asistencia a eventos" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Asistencia a eventos' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Asistencia a eventos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Pasantía" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Pasantía' ? 'checked' : '' }}  @endforeach>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Pasantía
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="exmona_tipo_movilidad[]" type="checkbox"
                                    value="Gestión de convenios" id="flexCheckChecked" @foreach($tipom as $m) {{ $m == 'Gestión de convenios' ? 'checked' : '' }}  @endforeach>
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
                            de un evento académico por favor indique el nombre completo del evento, sin siglas. *</label>
                        <textarea class="form-control @error('exmona_descripcion') is-invalid @enderror" name="exmona_descripcion" id="exmona_descripcion" cols="30" rows="10">{{$nacional->exmona_descripcion}}</textarea>
                        @error('exmona_descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exmona_fecha_inicio">Fecha de inicio *</label>
                        <input class="form-control @error('exmona_fecha_inicio') is-invalid @enderror"
                            name="exmona_fecha_inicio" id="exmona_fecha_inicio"
                            value="{{$nacional->exmona_fecha_inicio}}" type="date"
                            autocomplete="exmona_fecha_inicio" autofocus>
                        @error('exmona_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exmona_fecha_final">Fecha final *</label>
                        <input class="form-control @error('exmona_fecha_final') is-invalid @enderror"
                            name="exmona_fecha_final" id="exmona_fecha_final"
                            value="{{$nacional->exmona_fecha_final}}" type="date"
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
@section('scripts')
<script src="/js/admin/movilidad_nacional.js"></script>
@endsection
