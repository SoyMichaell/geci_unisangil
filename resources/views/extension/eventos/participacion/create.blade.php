@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
       <a href="/extension/crearparticipacioneventos">Crear</a>  / <a href="/extension/mostrarparticipacioneventos">Participación eventos</a> / <a href="/extension">Extension - internacionalización</a>
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
            <h4><i class="fa fa-cube"></i> Registro participación a evento</h4><hr>
            <form action="/extension/registroparticipacioneventos" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expaev_year">Año *</label>
                        <input class="form-control @error('expaev_year') is-invalid @enderror"
                            name="expaev_year" id="expaev_year"
                            value="{{ old('expaev_year') }}" type="text" autocomplete="expaev_year"
                            autofocus>
                        @error('expaev_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_periodo">Periodo *</label>
                        <input class="form-control @error('expaev_periodo') is-invalid @enderror"
                            name="expaev_periodo" id="expaev_periodo"
                            value="{{ old('expaev_periodo') }}" type="text" autocomplete="expaev_periodo"
                            autofocus>
                        @error('expaev_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expaev_tipo_evento">Tipo evento *</label>
                        <select class="form-control @error('expaev_tipo_evento') is-invalid @enderror" name="expaev_tipo_evento" id="expaev_tipo_evento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="taller">Taller</option>
                            <option value="conferencia">Conferencia</option>
                            <option value="simposio">Simposio</option>
                            <option value="webinar">Webinar</option>
                            <option value="foro">Foro</option>
                            <option value="encuentro">Encuentro</option>
                            <option value="congreso">Congreso</option>
                            <option value="charla">Charla</option>
                            <option value="otro">Otro</option>
                        </select>
                        @error('expaev_tipo_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_nombre_evento">Nombre evento *</label>
                        <input class="form-control @error('expaev_nombre_evento') is-invalid @enderror"
                            name="expaev_nombre_evento" id="expaev_nombre_evento"
                            value="{{ old('expaev_nombre_evento') }}" type="text"
                            autocomplete="expaev_nombre_evento" autofocus>
                        @error('expaev_nombre_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expaev_fecha">Fecha *</label>
                        <input class="form-control @error('expaev_fecha') is-invalid @enderror"
                            name="expaev_fecha" id="expaev_fecha"
                            value="{{ old('expaev_fecha') }}" type="date" autocomplete="expaev_fecha"
                            autofocus>
                        @error('expaev_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_organizador">Organizador *</label>
                        <input class="form-control @error('expaev_organizador') is-invalid @enderror"
                            name="expaev_organizador" id="expaev_organizador"
                            value="{{ old('expaev_organizador') }}" type="text" autocomplete="expaev_organizador"
                            autofocus>
                        @error('expaev_organizador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="expaev_id_persona">Nombre completo participante *</label>
                        <select class="form-control js-example-placeholder-single @error('expaev_id_persona') is-invalid @enderror" name="expaev_id_persona" id="expaev_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{$persona->id}}">{{$persona->per_nombre.' '.$persona->per_apellido}}</option>
                            @endforeach
                        </select>
                        <p class="{{$personas->count()<=0 ? 'badge badge-danger' : ''}}"><strong>{{$personas->count()<=0 ? 'No existen registros de participantes' : ''}}</strong></p>
                        @error('expaev_id_persona')
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
