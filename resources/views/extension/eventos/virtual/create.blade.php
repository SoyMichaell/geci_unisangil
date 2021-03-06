@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
       <a href="/extension/creareventosvirtuales">Crear</a>  / <a href="/extension/mostrareventosvirtuales">Eventos virtuales</a> / <a href="/extension">Extension - internacionalizaci√≥n</a>
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
            <h4><i class="fa fa-cube"></i> Registro evento virtual</h4><hr>
            <form action="/extension/registroeventosvirtuales" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevir_nombre_evento">Nombre evento *</label>
                        <input class="form-control @error('exevir_nombre_evento') is-invalid @enderror" name="exevir_nombre_evento"
                            id="exevir_nombre_evento" value="{{ old('exevir_nombre_evento') }}" type="text"
                            autocomplete="exevir_nombre_evento" autofocus>
                        @error('exevir_nombre_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevir_fecha_inicio">Fecha inicio *</label>
                        <input class="form-control @error('exevir_fecha_inicio') is-invalid @enderror" name="exevir_fecha_inicio"
                            id="exevir_fecha_inicio" value="{{ old('exevir_fecha_inicio') }}" type="date"
                            autocomplete="exevir_fecha_inicio" autofocus>
                        @error('exevir_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevir_fecha_fin">Fecha fin *</label>
                        <input class="form-control @error('exevir_fecha_fin') is-invalid @enderror" name="exevir_fecha_fin"
                            id="exevir_fecha_fin" value="{{ old('exevir_fecha_fin') }}" type="date"
                            autocomplete="exevir_fecha_fin" autofocus>
                        @error('exevir_fecha_fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevir_enlace_ingreso">Enlace de ingreso *</label>
                        <input class="form-control @error('exevir_enlace_ingreso') is-invalid @enderror" name="exevir_enlace_ingreso"
                            id="exevir_enlace_ingreso" value="{{ old('exevir_enlace_ingreso') }}" type="text"
                            autocomplete="exevir_enlace_ingreso" autofocus>
                        @error('exevir_enlace_ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevir_enlace_imagen">Enlace imagen</label>
                        <input class="form-control @error('exevir_enlace_imagen') is-invalid @enderror" name="exevir_enlace_imagen"
                            id="exevir_enlace_imagen" value="{{ old('exevir_enlace_imagen') }}" type="text"
                            autocomplete="exevir_enlace_imagen" autofocus>
                        @error('exevir_enlace_imagen')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevir_nombre_ponente">Nombre ponente, si es m√°s de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevir_enlace_imagen') is-invalid @enderror" name="exevir_nombre_ponente[]" id="exevir_nombre_ponente" cols="30" rows="10"></textarea>
                        @error('exevir_nombre_ponente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exevir_institucion_origen">Instituci√≥n origen, si es m√°s de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevir_institucion_origen') is-invalid @enderror" name="exevir_institucion_origen[]" id="exevir_institucion_origen" cols="30" rows="10"></textarea>
                        @error('exevir_institucion_origen')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exevir_pais">Pa√≠s origen, si es m√°s de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevir_pais') is-invalid @enderror" name="exevir_pais[]" id="exevir_pais" cols="30" rows="10"></textarea>
                        @error('exevir_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exevir_nombre_ponencia">Nombre ponencia, si es m√°s de un ponente separar por ;</label>
                        <textarea class="form-control @error('exevir_nombre_ponencia') is-invalid @enderror" name="exevir_nombre_ponencia[]" id="exevir_nombre_ponencia" cols="30" rows="10"></textarea>
                        @error('exevir_nombre_ponencia')
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