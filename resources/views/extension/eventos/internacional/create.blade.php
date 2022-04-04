@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/creareventosinternacionales">Crear</a> / <a href="/extension/mostrareventosinternacionales">Eventos internacionales </a> / <a href="/extension">Extension - internacionalización</a>
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
            <h4><i class="fa fa-cube"></i> Registro evento internacional</h4><hr>
            <form action="/extension/registroeventosinternacionales" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_tipo">Alcance</label>
                        <select class="form-control @error('exevin_tipo') is-invalid @enderror" name="exevin_tipo" id="exevin_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="nacional">Nacional</option>
                            <option value="internacional">Internacional</option>
                        </select>
                        @error('exevin_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_year">Año</label>
                        <input class="form-control @error('exevin_year') is-invalid @enderror"
                            name="exevin_year" id="exevin_year"
                            value="{{ old('exevin_year') }}" type="number" autocomplete="exevin_year"
                            autofocus>
                        @error('exevin_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_periodo">Periodo</label>
                        <input class="form-control @error('exevin_periodo') is-invalid @enderror"
                            name="exevin_periodo" id="exevin_periodo"
                            value="{{ old('exevin_periodo') }}" type="text" autocomplete="exevin_periodo"
                            autofocus>
                        @error('exevin_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_nombre_evento">Nombre del evento</label>
                        <input class="form-control @error('exevin_nombre_evento') is-invalid @enderror"
                            name="exevin_nombre_evento" id="exevin_nombre_evento" value="{{ old('exevin_nombre_evento') }}"
                            type="text" autocomplete="exevin_nombre_evento" autofocus>
                        @error('exevin_nombre_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_fecha_inicio">Fecha inicio</label>
                        <input class="form-control @error('exevin_fecha_inicio') is-invalid @enderror"
                            name="exevin_fecha_inicio" id="exevin_fecha_inicio"
                            value="{{ old('exevin_fecha_inicio') }}" type="date"
                            autocomplete="exevin_fecha_inicio" autofocus>
                        @error('exevin_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_fecha_final">Fecha fin</label>
                        <input class="form-control @error('exevin_fecha_final') is-invalid @enderror"
                            name="exevin_fecha_final" id="exevin_fecha_final"
                            value="{{ old('exevin_fecha_final') }}" type="date"
                            autocomplete="exevin_fecha_final" autofocus>
                        @error('exevin_fecha_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_lugar">Lugar</label>
                        <input class="form-control @error('exevin_lugar') is-invalid @enderror"
                            name="exevin_lugar" id="exevin_lugar"
                            value="{{ old('exevin_lugar') }}" type="text"
                            autocomplete="exevin_lugar" autofocus>
                        @error('exevin_lugar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_sede">Sede</label>
                        <input class="form-control @error('exevin_sede') is-invalid @enderror"
                            name="exevin_sede" id="exevin_sede"
                            value="{{ old('exevin_sede') }}" type="text"
                            autocomplete="exevin_sede" autofocus>
                        @error('exevin_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_ponentes">Nombre ponente, si es más de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevin_ponentes') is-invalid @enderror" name="exevin_ponentes[]"
                            id="exevin_ponentes" cols="30" rows="10"></textarea>
                        @error('exevin_ponentes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_institucion">Institución origen, si es más de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevin_institucion') is-invalid @enderror"
                            name="exevin_institucion[]" id="exevin_institucion" cols="30"
                            rows="10"></textarea>
                        @error('exevin_institucion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevin_pais">País origen, si es más de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevin_pais') is-invalid @enderror" name="exevin_pais[]" id="exevin_pais"
                            cols="30" rows="10"></textarea>
                        @error('exevin_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevin_nombre_ponencia">Nombre ponencia, si es más de un ponente separar por
                            ;</label>
                        <textarea class="form-control @error('exevin_nombre_ponencia') is-invalid @enderror" name="exevin_nombre_ponencia[]"
                            id="exevin_nombre_ponencia" cols="30" rows="10"></textarea>
                        @error('exevin_nombre_ponencia')
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
