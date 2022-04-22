@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/extension/{{$curso->id}}/vercurso">Vista</a> / <a href="/extension/mostrarcurso">Curso</a> / <a href="/extension">Extensión - internacionalización</a>  
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-question-circle"></i> Vista de registro</h4><hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcurso_year">Año</label>
                    <input class="form-control @error('extcurso_year') is-invalid @enderror" name="extcurso_year"
                        id="extcurso_year" value="{{ $curso->extcurso_year }}" type="number"
                        autocomplete="extcurso_year" autofocus disabled>
                    @error('extcurso_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcurso_semestre">Semestre</label>
                    <input class="form-control @error('extcurso_semestre') is-invalid @enderror" name="extcurso_semestre"
                        id="extcuextcurso_semestrelre_year" value="{{ $curso->extcurso_semestre }}" type="number"
                        autocomplete="extcurso_semestre" autofocus disabled>
                    @error('extcurso_semestre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcurso_codigo">Código curso</label>
                    <input class="form-control @error('extcurso_codigo') is-invalid @enderror" name="extcurso_codigo"
                        id="extcurso_codigo" value="{{ $curso->extcurso_codigo }}" type="text"
                        autocomplete="extcurso_codigo" autofocus disabled>
                    @error('extcurso_codigo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcurso_nombre">Nombre curso</label>
                    <input class="form-control @error('extcurso_nombre') is-invalid @enderror" name="extcurso_nombre"
                        id="extcurso_nombre" value="{{ $curso->extcurso_nombre }}" type="text"
                        autocomplete="extcurso_nombre" autofocus disabled>
                    @error('extcurso_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcurso_id_cine">CINE Detallado</label>
                    <select class="form-control" name="extcurso_id_cine" id="extcurso_id_cine" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($cines as $cine)
                            <option value="{{ $cine->id }}"
                                {{ $cine->id == $curso->extcurso_id_cine ? 'selected' : '' }}>
                                {{ $cine->cocide_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcurso_id_cine')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcurso_extension">Es curso de extensión?</label>
                    <select class="form-control" name="extcurso_extension" id="extcurso_extension" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="S" {{ $curso->extcurso_extension == 'S' ? 'selected' : '' }}>Si</option>
                        <option value="N" {{ $curso->extcurso_extension == 'N' ? 'selected' : '' }}>No</option>
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
                    <label for="extcurso_estado">Estado curso activo?</label>
                    <select class="form-control" name="extcurso_estado" id="extcurso_estado" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="S" {{ $curso->extcurso_extension == 'S' ? 'selected' : '' }}>Si</option>
                        <option value="N" {{ $curso->extcurso_extension == 'N' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('extcurso_id_cine')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcurso_fecha">Fecha curso</label>
                    <input class="form-control @error('extcurso_fecha') is-invalid @enderror" name="extcurso_fecha"
                        id="extcurso_fecha" value="{{ $curso->extcurso_fecha }}" type="date"
                        autocomplete="extcurso_fecha" autofocus disabled>
                    @error('extcurso_fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcurso_id_docente">Docente</label>
                    <select class="form-control" name="extcurso_id_docente" id="extcurso_id_docente" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}"
                                {{ $persona->id == $curso->extcurso_id_docente ? 'selected' : '' }}>
                                {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                        @endforeach
                    </select>
                    @error('extcurso_id_docente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcurso_url_soporte">Soporte en archivo .zip o .rar</label>
                    <input class="form-control @error('extcurso_url_soporte') is-invalid @enderror"
                        name="extcurso_url_soporte" id="extcurso_url_soporte"
                        value="{{ $curso->extcurso_url_soporte }}" type="file" autocomplete="extcurso_url_soporte"
                        autofocus disabled>
                    <p><small><a>{{ $curso->extcurso_url_soporte }}</a></small></p>
                    @error('extcurso_url_soporte')
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
