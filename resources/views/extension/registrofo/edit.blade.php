@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$fotografico->id}}/editarregistrofotografico">Editar</a> / <a href="/extension/mostrarregistrofotografico">Registro fotografico</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
            <form action="/extension/{{$fotografico->id}}/actualizarregistrofotografico" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extrefoin_year">Año *</label>
                        <input class="form-control @error('extrefoin_year') is-invalid @enderror" name="extrefoin_year"
                            id="extrefoin_year" value="{{$fotografico->extrefoin_year}}" type="number"
                            autocomplete="extrefoin_year" autofocus>
                        @error('extrefoin_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extrefoin_periodo">Periodo *</label>
                        <input class="form-control @error('extrefoin_periodo') is-invalid @enderror"
                            name="extrefoin_periodo" id="extrefoin_periodo" value="{{$fotografico->extrefoin_periodo}}"
                            type="text" autocomplete="extrefoin_periodo" autofocus>
                        @error('extrefoin_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extrefoin_tipo_actividad">Tipo actividad *</label>
                        <select class="form-control @error('extrefoin_tipo_actividad') is-invalid @enderror" name="extrefoin_tipo_actividad" id="extrefoin_tipo_actividad">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="internacionalizacion-curriculo" {{$fotografico->extrefoin_tipo_actividad == 'internacionalizacion-curriculo' ? 'selected' : ''}}>Internacionalización del curriculo</option>
                            <option value="segundo-idioma" {{$fotografico->extrefoin_tipo_actividad == 'segundo-idioma' ? 'selected' : ''}}>Segundo idioma</option>
                            <option value="programa-radial" {{$fotografico->extrefoin_tipo_actividad == 'programa-radial' ? 'selected' : ''}}>Programa radial</option>
                            <option value="curso" {{$fotografico->extrefoin_tipo_actividad == 'curso' ? 'selected' : ''}}>Curso</option>
                            <option value="taller" {{$fotografico->extrefoin_tipo_actividad == 'taller' ? 'selected' : ''}}>Taller</option>
                            <option value="diplomado" {{$fotografico->extrefoin_tipo_actividad == 'diplomado' ? 'selected' : ''}}>Diplomado</option>
                        </select>
                        @error('extrefoin_tipo_actividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extrefoin_actividad">Actividad *</label>
                        <input class="form-control @error('extrefoin_actividad') is-invalid @enderror"
                            name="extrefoin_actividad" id="extrefoin_actividad"
                            value="{{$fotografico->extrefoin_actividad}}" type="text" autocomplete="extrefoin_actividad"
                            autofocus>
                        @error('extrefoin_actividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extrefoin_ente_organizador">Ente organizador *</label>
                        <input class="form-control @error('extrefoin_ente_organizador') is-invalid @enderror"
                            name="extrefoin_ente_organizador" id="extrefoin_ente_organizador"
                            value="{{$fotografico->extrefoin_ente_organizador}}" type="text"
                            autocomplete="extrefoin_ente_organizador" autofocus>
                        @error('extrefoin_ente_organizador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extrefoin_fecha">Fecha *</label>
                        <input class="form-control @error('extrefoin_fecha') is-invalid @enderror"
                            name="extrefoin_fecha" id="extrefoin_fecha" value="{{$fotografico->extrefoin_fecha}}"
                            type="date" autocomplete="extrefoin_fecha" autofocus>
                        @error('extrefoin_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="extrefoin_tipo_evento">Tipo evento *</label>
                        <select class="form-control @error('extrefoin_tipo_evento') is-invalid @enderror" name="extrefoin_tipo_evento" id="extrefoin_tipo_evento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="interno" {{$fotografico->extrefoin_tipo_evento == 'interno' ? 'selected' : ''}}>Interno</option>
                            <option value="externo" {{$fotografico->extrefoin_tipo_evento == 'externo' ? 'selected' : ''}}>Externo</option>
                        </select>
                        @error('extrefoin_tipo_evento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extrefoin_tipo_modalidad">Tipo de modalidad *</label>
                        <select class="form-control @error('extrefoin_tipo_modalidad ') is-invalid @enderror" name="extrefoin_tipo_modalidad" id="extrefoin_tipo_modalidad">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="formacion" {{$fotografico->extrefoin_tipo_modalidad == 'formacion' ? 'selected' : ''}}>Formación</option>
                            <option value="investigacion" {{$fotografico->extrefoin_tipo_modalidad == 'investigacion' ? 'selected' : ''}}>Investigación</option>
                            <option value="internacionalizacion" {{$fotografico->extrefoin_tipo_modalidad == 'internacionalizacion' ? 'selected' : ''}}>Internacionalización</option>
                            <option value="extensión" {{$fotografico->extrefoin_tipo_modalidad == 'extensión' ? 'selected' : ''}}>Extensión</option>
                            <option value="internacionalizacion-extensión" {{$fotografico->extrefoin_tipo_modalidad == 'internacionalizacion-extensión' ? 'selected' : ''}}>Internacionalización y Extensión</option>
                        </select>
                        @error('extrefoin_tipo_modalidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extrefoin_soporte">Soporte (Opcional)</label>
                        <input class="form-control @error('extrefoin_soporte') is-invalid @enderror"
                            name="extrefoin_soporte" id="extrefoin_soporte" value="{{$fotografico->extrefoin_soporte}}"
                            type="file" autocomplete="extrefoin_soporte" autofocus>
                        <p><small><a>{{$fotografico->extrefoin_soporte}}</a></small></p>
                        @error('extrefoin_soporte')
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
