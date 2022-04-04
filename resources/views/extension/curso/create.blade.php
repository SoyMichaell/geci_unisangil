@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/extension/crearcurso">Crear</a> / <a href="/extension/mostrarcurso">Curso</a> / <a href="/extension">Extensión - internacionalización</a>  
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
            <h4><i class="fa fa-cube"></i> Registro curso</h4><hr>
            <form action="/extension/registrocurso" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_year">Año *</label>
                        <input class="form-control @error('extcurso_year') is-invalid @enderror" name="extcurso_year"
                            id="extcurso_year" value="{{ old('extcurso_year') }}" type="number"
                            autocomplete="extcurso_year" autofocus>
                        @error('extcurso_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_semestre">Semestre *</label>
                        <input class="form-control @error('extcurso_semestre') is-invalid @enderror"
                            name="extcurso_semestre" id="extcurso_semestre"
                            value="{{ old('extcurso_semestre') }}" type="number" autocomplete="extcurso_semestre"
                            autofocus>
                        @error('extcurso_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_codigo">Código curso *</label>
                        <input class="form-control @error('extcurso_codigo') is-invalid @enderror"
                            name="extcurso_codigo" id="extcurso_codigo" value="{{ old('extcurso_codigo') }}"
                            type="text" autocomplete="extcurso_codigo" autofocus>
                        @error('extcurso_codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_nombre">Nombre curso *</label>
                        <input class="form-control @error('extcurso_nombre') is-invalid @enderror"
                            name="extcurso_nombre" id="extcurso_nombre" value="{{ old('extcurso_nombre') }}"
                            type="text" autocomplete="extcurso_nombre" autofocus>
                        @error('extcurso_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_id_cine">CINE Detallado *</label>
                        <select class="form-control js-example-placeholder-single @error('extcurso_id_cine') is-invalid @enderror" name="extcurso_id_cine" id="extcurso_id_cine">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($cines as $cine)
                                <option value="{{ $cine->id }}">{{ $cine->cocide_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extcurso_id_cine')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_extension">Es curso de extensión? *</label>
                        <select class="form-control @error('extcurso_extension') is-invalid @enderror" name="extcurso_extension" id="extcurso_extension">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                        @error('extcurso_extension')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_estado">Estado curso activo? *</label>
                        <select class="form-control @error('extcurso_estado') is-invalid @enderror" name="extcurso_estado" id="extcurso_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                        @error('extcurso_id_cine')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_fecha">Fecha curso *</label>
                        <input class="form-control @error('extcurso_fecha') is-invalid @enderror"
                            name="extcurso_fecha" id="extcurso_fecha" value="{{ old('extcurso_fecha') }}"
                            type="date" autocomplete="extcurso_fecha" autofocus>
                        @error('extcurso_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_id_docente">Docente *</label>
                        <select class="form-control js-example-placeholder-single @error('extcurso_id_docente') is-invalid @enderror" name="extcurso_id_docente" id="extcurso_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{$persona->id}}">{{$persona->per_nombre.' '.$persona->per_apellido}}</option>
                            @endforeach
                        </select>
                        <p class="{{$personas->count()<=0 ? 'badge badge-danger' : ''}}"><strong>{{$personas->count()<=0 ? 'No existen registros de docentes' : ''}}</strong></p>
                        @error('extcurso_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_url_soporte">Soporte en archivo .zip o .rar</label>
                        <input class="form-control @error('extcurso_url_soporte') is-invalid @enderror"
                            name="extcurso_url_soporte" id="extcurso_url_soporte" value="{{ old('extcurso_url_soporte') }}"
                            type="file" autocomplete="extcurso_url_soporte" autofocus>
                        @error('extcurso_url_soporte')
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
