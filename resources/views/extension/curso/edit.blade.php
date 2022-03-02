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
            <form action="/extension/{{$curso->id}}/actualizarcurso" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcurso_year">Año</label>
                        <input class="form-control @error('extcurso_year') is-invalid @enderror" name="extcurso_year"
                            id="extcurso_year" value="{{$curso->extcurso_year}}" type="number"
                            autocomplete="extcurso_year" autofocus>
                        @error('extcurso_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_semestre">Semestre</label>
                        <input class="form-control @error('extcurso_semestre') is-invalid @enderror"
                            name="extcurso_semestre" id="extcuextcurso_semestrelre_year"
                            value="{{$curso->extcurso_semestre}}" type="number" autocomplete="extcurso_semestre"
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
                        <label for="extcurso_codigo">Código curso</label>
                        <input class="form-control @error('extcurso_codigo') is-invalid @enderror"
                            name="extcurso_codigo" id="extcurso_codigo" value="{{$curso->extcurso_codigo}}"
                            type="text" autocomplete="extcurso_codigo" autofocus>
                        @error('extcurso_codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcurso_nombre">Nombre curso</label>
                        <input class="form-control @error('extcurso_nombre') is-invalid @enderror"
                            name="extcurso_nombre" id="extcurso_nombre" value="{{$curso->extcurso_nombre}}"
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
                        <label for="extcurso_id_cine">CINE Detallado</label>
                        <select class="form-select" name="extcurso_id_cine" id="extcurso_id_cine">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($cines as $cine)
                                <option value="{{ $cine->id }}" {{$cine->id == $curso->extcurso_id_cine ? 'selected' : ''}}>{{ $cine->cocide_nombre }}</option>
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
                        <select class="form-select" name="extcurso_extension" id="extcurso_extension">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="S" {{$curso->extcurso_extension == 'S' ? 'selected' : ''}}>Si</option>
                            <option value="N" {{$curso->extcurso_extension == 'N' ? 'selected' : ''}}>No</option>
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
                        <select class="form-select" name="extcurso_estado" id="extcurso_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="S" {{$curso->extcurso_extension == 'S' ? 'selected' : ''}}>Si</option>
                            <option value="N" {{$curso->extcurso_extension == 'N' ? 'selected' : ''}}>No</option>
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
                            id="extcurso_fecha" value="{{$curso->extcurso_fecha}}" type="date"
                            autocomplete="extcurso_fecha" autofocus>
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
                        <select class="form-select" name="extcurso_id_docente" id="extcurso_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" {{$persona->id == $curso->extcurso_id_docente ? 'selected' : ''}}>
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
                            value="{{$curso->extcurso_url_soporte}}" type="file" autocomplete="extcurso_url_soporte"
                            autofocus>
                        <p><small><a href="{{asset('datos/curso/'.$curso->extcurso_url_soporte)}}" target="_blank">{{$curso->extcurso_url_soporte}}</a></small></p>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
