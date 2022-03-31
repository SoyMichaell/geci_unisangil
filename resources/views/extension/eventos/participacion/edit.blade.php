@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
       <a href="/extension/{{$participacion->id}}/editarparticipacioneventos">Editar</a>  / <a href="/extension/mostrarparticipacioneventos">Participación eventos</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4>Actualizar información</h4><hr>
            <form action="/extension/{{$participacion->id}}/actualizarparticipacioneventos" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expaev_year">Año</label>
                        <input class="form-control @error('expaev_year') is-invalid @enderror"
                            name="expaev_year" id="expaev_year"
                            value="{{$participacion->expaev_year}}" type="text" autocomplete="expaev_year"
                            autofocus>
                        @error('expaev_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_periodo">Periodo</label>
                        <input class="form-control @error('expaev_periodo') is-invalid @enderror"
                            name="expaev_periodo" id="expaev_periodo"
                            value="{{$participacion->expaev_periodo}}" type="text" autocomplete="expaev_periodo"
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
                        <label for="expaev_tipo_evento">Tipo evento</label>
                        <select class="form-select @error('expaev_tipo_evento') is-invalid @enderror" name="expaev_tipo_evento" id="expaev_tipo_evento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="taller" {{$participacion->expaev_tipo_evento == 'taller' ? 'selected' : ''}}>Taller</option>
                            <option value="conferencia" {{$participacion->expaev_tipo_evento == 'conferencia' ? 'selected' : ''}}>Conferencia</option>
                            <option value="simposio" {{$participacion->expaev_tipo_evento == 'simposio' ? 'selected' : ''}}>Simposio</option>
                            <option value="webinar" {{$participacion->expaev_tipo_evento == 'webinar' ? 'selected' : ''}}>Webinar</option>
                            <option value="foro" {{$participacion->expaev_tipo_evento == 'foro' ? 'selected' : ''}}>Foro</option>
                            <option value="encuentro" {{$participacion->expaev_tipo_evento == 'encuentro' ? 'selected' : ''}}>Encuentro</option>
                            <option value="congreso" {{$participacion->expaev_tipo_evento == 'congreso' ? 'selected' : ''}}>Congreso</option>
                            <option value="charla" {{$participacion->expaev_tipo_evento == 'charla' ? 'selected' : ''}}>Charla</option>
                            <option value="otro" {{$participacion->expaev_tipo_evento == 'otro' ? 'selected' : ''}}>Otro</option>
                        </select>
                        @error('expaev_tipo_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_nombre_evento">Nombre evento</label>
                        <input class="form-control @error('expaev_nombre_evento') is-invalid @enderror"
                            name="expaev_nombre_evento" id="expaev_nombre_evento"
                            value="{{$participacion->expaev_nombre_evento}}" type="text"
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
                        <label for="expaev_fecha">Fecha</label>
                        <input class="form-control @error('expaev_fecha') is-invalid @enderror"
                            name="expaev_fecha" id="expaev_fecha"
                            value="{{$participacion->expaev_fecha}}" type="date" autocomplete="expaev_fecha"
                            autofocus>
                        @error('expaev_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="expaev_organizador">Organizador</label>
                        <input class="form-control @error('expaev_organizador') is-invalid @enderror"
                            name="expaev_organizador" id="expaev_organizador"
                            value="{{$participacion->expaev_organizador}}" type="text" autocomplete="expaev_organizador"
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
                        <label for="expaev_id_persona">Nombre completo participante</label>
                        <select class="form-select js-example-placeholder-single @error('expaev_id_persona') is-invalid @enderror" name="expaev_id_persona" id="expaev_id_persona">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{$persona->id}}" {{$participacion->expaev_id_persona == $persona->id ? 'selected' : ''}}>{{$persona->per_nombre.' '.$persona->per_apellido}}</option>
                            @endforeach
                        </select>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
