@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/laboratorio/create">Crear</a> / <a href="/laboratorio">Laboratorio</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligencie todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4 class="titulo"><i class="fa fa-cube"></i> Registro laboratorio</h4><hr>
            <form action="/laboratorio" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lab_fecha">{{ __('Fecha realización *') }}</label>
                        <input id="lab_fecha" type="date" class="form-control @error('lab_fecha') is-invalid @enderror"
                            name="lab_fecha" value="{{ old('lab_fecha') }}" autocomplete="lab_fecha" autofocus>
                        @error('lab_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lab_nombre">{{ __('Nombre laboratorio *') }}</label>
                        <input id="lab_nombre" type="text"
                            class="form-control @error('lab_nombre') is-invalid @enderror" name="lab_nombre"
                            value="{{ old('lab_nombre') }}" autocomplete="lab_nombre" autofocus>
                        @error('lab_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lab_ubicacion">{{ __('Ubicación *') }}</label>
                        <input id="lab_ubicacion" type="text"
                            class="form-control @error('lab_ubicacion') is-invalid @enderror" name="lab_ubicacion"
                            value="{{ old('lab_ubicacion') }}" autocomplete="lab_ubicacion" autofocus>
                        @error('lab_ubicacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lab_id_docente">{{ __('Docente responsable *') }}</label>
                        <select class="form-control @error('lab_id_docente') is-invalid @enderror" name="lab_id_docente"
                            id="lab_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">
                                    {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                            @endforeach
                            <p class="{{$docentes->count()<=0 ? 'badge badge-danger' : ''}}">{{$docentes->count()<=0 ? 'No existen registros de docentes' : ''}}</p>
                        </select>
                        @error('lab_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lab_finalidad">{{ __('Finalidad *') }}</label>
                        <input id="lab_finalidad" type="text"
                            class="form-control @error('lab_finalidad') is-invalid @enderror" name="lab_finalidad"
                            value="{{ old('lab_finalidad') }}" autocomplete="lab_finalidad" autofocus>
                        @error('lab_finalidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lab_id_facultad">{{ __('Facultad *') }}</label>
                        <select class="form-control @error('lab_id_facultad') is-invalid @enderror"
                            name="lab_id_facultad" id="lab_id_facultad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}</option>
                            @endforeach
                        </select>
                        @error('lab_id_facultad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lab_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-control @error('lab_id_programa') is-invalid @enderror"
                            name="lab_id_programa" id="lab_id_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="{{$programas->count()<=0 ? 'badge badge-danger' : ''}}">{{$programas->count()<=0 ? 'No existen registros de programas' : ''}}</p>
                        @error('lab_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lab_id_practicante">{{ __('Practicante a cargo *') }}</label>
                        <select class="form-control @error('lab_id_practicante') is-invalid @enderror"
                            name="lab_id_practicante" id="lab_id_practicante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                            @endforeach
                        </select>
                        <p class="{{$estudiantes->count()<=0 ? 'badge badge-danger' : ''}}">{{$estudiantes->count()<=0 ? 'No existen registros de estudiantes con rol administrativo' : ''}}</p>
                        @error('lab_id_practicante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="lab_nombre_practica">{{ __('Nombre practica *') }}</label>
                        <input id="lab_nombre_practica" type="text"
                            class="form-control @error('lab_nombre_practica') is-invalid @enderror"
                            name="lab_nombre_practica" value="{{ old('lab_nombre_practica') }}"
                            autocomplete="lab_nombre_practica" autofocus>
                        @error('lab_nombre_practica')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="lab_cantidad_estudiante">{{ __('Cantidad estudiantes *') }}</label>
                        <input id="lab_cantidad_estudiante" type="text"
                            class="form-control @error('lab_cantidad_estudiante') is-invalid @enderror"
                            name="lab_cantidad_estudiante" value="{{ old('lab_cantidad_estudiante') }}"
                            autocomplete="lab_cantidad_estudiante" autofocus>
                        @error('lab_cantidad_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="lab_id_software">{{ __('Software (s) utilizado (s) *') }}</label>
                        <select class="form-control @error('lab_id_software') is-invalid @enderror"
                            name="lab_id_software" id="lab_id_software">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($softwares as $software)
                                <option value="{{ $software->id }}">{{ $software->sof_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="{{$softwares->count()<=0 ? 'badge badge-danger' : ''}}">{{$softwares->count()<=0 ? 'No existen registros de software' : ''}}</p>
                        @error('lab_id_software')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lab_material">{{ __('Materiales *') }}</label>
                        <textarea class="form-control @error('lab_material') is-invalid @enderror" name="lab_material" id="lab_material" cols="30"
                            rows="10"></textarea>
                        @error('lab_material')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lab_observaciones">{{ __('Observaciones *') }}</label>
                        <textarea class="form-control @error('lab_observaciones') is-invalid @enderror" name="lab_observaciones" id="lab_observaciones" cols="30"
                            rows="10"></textarea>
                        @error('lab_observaciones')
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
