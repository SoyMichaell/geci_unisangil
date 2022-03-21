@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-wpforms"></i> Módulo trabajo de grado</h1>
    @section('message')
        <p>Lista de registro trabajo de grado</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 1 ? 'active tile' : '' }}" id="fasestado-tab"
                    data-toggle="tab" href="#fase1" role="tab" aria-controls="fase1" aria-selected="true">Fase
                    Información</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 2 ? 'active tile' : '' }}" id="fasestado-tab"
                    data-toggle="tab" href="#fasestado" role="tab" aria-controls="fasestado" aria-selected="true">Fase
                    estado proyecto</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 3 ? 'active tile' : '' }}" id="fasejurado-tab"
                    data-toggle="tab" href="#fasejurado" role="tab" aria-controls="fasejurado"
                    aria-selected="false">Fase asignación jurados</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 4 ? 'active tile' : '' }}" id="faseacta-tab"
                    data-toggle="tab" href="#faseacta" role="tab" aria-controls="faseacta" aria-selected="false">Fase
                    actas / cierre</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 5 ? 'active tile' : '' }}" id="fasecontrato-tab"
                    data-toggle="tab" href="#fasecontrato" role="tab" aria-controls="fasecontrato"
                    aria-selected="false">Fase contratos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $trabajo->tra_id_proceso == 6 ? 'active tile' : '' }}" id="fasefinal-tab"
                    data-toggle="tab" href="#fasefinal" role="tab" aria-controls="fasefinal" aria-selected="false">Fase
                    final</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 1 ? 'show active tile p-3' : 'tile p-3' }}"
                id="fase1" role="tabpanel" aria-labelledby="fase1-tab">
                <form action="/trabajo/{{ $trabajo->id }}/" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tra_codigo_proyecto">Codigo proyecto</label>
                            <input class="form-control @error('tra_codigo_proyecto') is-invalid @enderror"
                                name="tra_codigo_proyecto" id="tra_codigo_proyecto"
                                value="{{ $trabajo->tra_codigo_proyecto }}" type="text"
                                autocomplete="tra_codigo_proyecto" autofocus>
                            @error('tra_codigo_proyecto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tra_titulo_proyecto">Titulo proyecto de grado</label>
                            <input class="form-control @error('tra_titulo_proyecto') is-invalid @enderror"
                                name="tra_titulo_proyecto" id="tra_titulo_proyecto"
                                value="{{ $trabajo->tra_titulo_proyecto }}" type="text"
                                autocomplete="tra_titulo_proyecto" autofocus>
                            @error('tra_titulo_proyecto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            @php
                                $estudiantex = explode(';',$trabajo->tra_id_estudiante);
                            @endphp
                            <label for="tra_id_estudiante">Estudiante (s)</label>
                            <select class="js-example-placeholder-single form-select" name="tra_id_estudiante[]"
                                id="tra_id_estudiante" multiple>
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}" @foreach($estudiantex as $estu)
                                        {{ $estu == $estudiante->per_nombre . ' ' . $estudiante->per_apellido ? 'selected' : '' }} @endforeach>
                                        {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                                @endforeach
                            </select>
                            @error('tra_id_estudiante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tra_fecha_inicio">Fecha de inicio</label>
                            <input class="form-control @error('tra_fecha_inicio') is-invalid @enderror"
                                name="tra_fecha_inicio" id="tra_fecha_inicio"
                                value="{{ $trabajo->tra_fecha_inicio }}" type="date" autocomplete="tra_fecha_inicio"
                                autofocus>
                            @error('tra_fecha_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tra_modalidad_grado">Modalidad de grado</label>
                            <select class="js-example-placeholder-single form-select" name="tra_modalidad_grado"
                                id="tra_modalidad_grado">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($modalidades as $modalidad)
                                    <option value="{{ $modalidad->id }}"
                                        {{ $modalidad->id == $trabajo->tra_modalidad_grado ? 'selected' : '' }}>
                                        {{ $modalidad->mod_nombre }}</option>
                                @endforeach
                            </select>
                            @error('tra_modalidad_grado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tra_id_director">Director</label>
                            <select class="js-example-placeholder-single form-select" name="tra_id_director"
                                id="tra_id_director">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}"
                                        {{ $persona->id == $trabajo->tra_id_director ? 'selected' : '' }}>
                                        {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                                @endforeach
                            </select>
                            @error('tra_id_director')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tra_id_codirector">Codirector</label>
                            <select class="js-example-placeholder-single form-select" name="tra_id_codirector"
                                id="tra_id_codirector">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}"
                                        {{ $persona->id == $trabajo->tra_id_codirector ? 'selected' : '' }}>
                                        {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                                @endforeach
                            </select>
                            @error('tra_id_codirector')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('Siguiente') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 2 ? 'show active tile p-3' : 'tile p-3' }}"
                id="fasestado" role="tabpanel" aria-labelledby="fasestado-tab">
                <div class="mt-2 p-2">
                    <form action="/trabajo/{{ $trabajo->id }}/faseestado" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_estado_propuesta">Estado de la propuesta</label>
                                <select class="form-select" name="tra_estado_propuesta" id="tra_estado_propuesta">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="aprobada"
                                        {{ $trabajo->tra_estado_propuesta == 'aprobada' ? 'selected' : '' }}>Aprobada
                                    </option>
                                    <option value="rechazada"
                                        {{ $trabajo->tra_estado_propuesta == 'rechazada' ? 'selected' : '' }}>
                                        Rechazada
                                    </option>
                                    <option value="aplazada"
                                        {{ $trabajo->tra_estado_propuesta == 'aplazada' ? 'selected' : '' }}>Aplazada
                                    </option>
                                </select>
                                @error('tra_estado_propuesta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="tra_estado_proyecto">Estado del proyecto</label>
                                <select class="form-select" name="tra_estado_proyecto" id="tra_estado_proyecto">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="aprobado-anteproyecto"
                                        {{ $trabajo->tra_estado_proyecto == 'aprobado-anteproyecto' ? 'selected' : '' }}>
                                        Aprobado anteproyecto</option>
                                    <option value="aprobado-director"
                                        {{ $trabajo->tra_estado_proyecto == 'aprobado-director' ? 'selected' : '' }}>
                                        Aprobado por director</option>
                                    <option value="aprobado-jurados"
                                        {{ $trabajo->tra_estado_proyecto == 'aprobado-jurados' ? 'selected' : '' }}>
                                        Aprobado por jurados</option>
                                    <option value="aprobado-sustentacion"
                                        {{ $trabajo->tra_estado_proyecto == 'aprobado-sustentacion' ? 'selected' : '' }}>
                                        Aprobado para sustentación</option>
                                    <option value="sustentado"
                                        {{ $trabajo->tra_estado_proyecto == 'sustentado' ? 'selected' : '' }}>
                                        Sustentado</option>
                                    <option value="rechazado"
                                        {{ $trabajo->tra_estado_proyecto == 'rechazado' ? 'selected' : '' }}>
                                        Rechazado
                                    </option>
                                    <option value="anulado"
                                        {{ $trabajo->tra_estado_proyecto == 'anulado' ? 'selected' : '' }}>Anulado
                                    </option>
                                </select>
                                @error('tra_estado_proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Siguiente') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 3 ? 'show active tile p-3' : 'tile p-3' }}"
                id="fasejurado" role="tabpanel" aria-labelledby="fasejurado-tab">
                <div class="mt-2 p-2">
                    <form action="/trabajo/{{ $trabajo->id }}/fasejurado" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_id_jurado1">Jurado 1</label>
                                <select class="form-select" name="tra_id_jurado1" id="tra_id_jurado1">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}"
                                            {{ $persona->id == $trabajo->tra_id_jurado1 ? 'selected' : '' }}>
                                            {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                                    @endforeach
                                </select>
                                @error('tra_id_jurado1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="tra_id_jurado2">Jurado 2</label>
                                <select class="form-select" name="tra_id_jurado2" id="tra_id_jurado2">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}"
                                            {{ $persona->id == $trabajo->tra_id_jurado2 ? 'selected' : '' }}>
                                            {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                                    @endforeach
                                </select>
                                @error('tra_id_jurado2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0 mt-2">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Siguiente') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 4 ? 'show active tile p-3' : 'tile p-3' }}"
                id="faseacta" role="tabpanel" aria-labelledby="faseacta-tab">
                <div class="mt-2 p-2">
                    <form action="/trabajo/{{ $trabajo->id }}/faseacta" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 form-inline">
                            <div class="form-group col-md-1">
                                <label for="tra_acta_sustentacion">Acta sustentación</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control w-100 @error('tra_acta_sustentacion') is-invalid @enderror"
                                    name="tra_acta_sustentacion" id="tra_acta_sustentacion"
                                    value="{{ $trabajo->tra_numero_acta_sustentacion }}" type="number"
                                    autocomplete="tra_acta_sustentacion" placeholder="Número acta de sustentación"
                                    autofocus>
                                @error('tra_acta_sustentacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input class="form-control col-md-5" type="file" name="tra_acta_sustentacion_soporte[]"
                                id="tra_acta_sustentacion_soporte" multiple>
                            <span><small>{{ $trabajo->tra_acta_sustentacion_soporte }}</small></span>
                            <span><small>Cargar los 2 soporte de actas en un archivo .zip o .rar</small></span>
                        </div>
                        <hr>
                        <div class="mb-3 form-inline">
                            <div class="form-group col-md-1">
                                <label for="tra_acta_grado">Acta grado</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control w-100 @error('tra_acta_grado') is-invalid @enderror"
                                    name="tra_acta_grado" id="tra_acta_grado"
                                    value="{{ $trabajo->tra_numero_acta_grado }}" type="number"
                                    autocomplete="tra_acta_grado" placeholder="Número acta de grado" autofocus>
                                @error('tra_acta_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input class="form-control col-md-5" type="file" name="tra_acta_grado_soporte[]"
                                id="tra_acta_grado_soporte" multiple>
                            <p><small>{{ $trabajo->tra_acta_grado_soporte }}</small></p>
                            <span><small>Cargar los 2 soporte de actas en un archivo .zip o .rar</small></span>
                        </div>
                        <hr>
                        <div class="mb-3 form-inline">
                            <div class="form-group col-md-2">
                                <label for="tra_fecha_finalizacion">Fecha finalización</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input class="form-control w-100 @error('tra_fecha_finalizacion') is-invalid @enderror"
                                    name="tra_fecha_finalizacion" id="tra_fecha_finalizacion"
                                    value="{{ $trabajo->tra_fecha_finalizacion }}" type="date"
                                    autocomplete="tra_fecha_finalizacion" autofocus>
                                @error('tra_fecha_finalizacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-0 mt-4">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Siguiente') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 5 ? 'show active tile p-3' : 'tile p-3' }}"
                id="fasecontrato" role="tabpanel" aria-labelledby="fasecontrato-tab">
                @if ($contratos->count() > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Listado contratos asociados a los jurados asignados</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre completo</th>
                                        <th>Contrato</th>
                                        <th>Estado pago</th>
                                        <th>---</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}</td>
                                        <td><a
                                                href="/datos/contrato/{{ $jurado1->doco_url_soporte }}">{{ $jurado1->doco_url_soporte }}</a>
                                        </td>
                                        <td>{{ $jurado1->doco_estado }}</td>
                                        <td><a href="/docente">Cambiar estado de pago</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>{{ $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}</td>
                                        <td><a
                                                href="/datos/contrato/{{ $jurado2->doco_url_soporte }}">{{ $jurado2->doco_url_soporte }}</a>
                                        </td>
                                        <td>{{ $jurado2->doco_estado }}</td>
                                        <td><a href="/docente">Cambiar estado de pago</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        <strong>Los jurados no registran contratos</strong>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade {{ $trabajo->tra_id_proceso == 6 ? 'show active tile p-3' : 'tile p-3' }}"
                id="fasefinal" role="tabpanel" aria-labelledby="fasefinal-tab">
                <form action="/trabajo/{{$trabajo->id}}/registroobservacion" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="tra_obsevacion">Observación</label>
                            <textarea class="form-control" name="tra_observacion" id="tra_observacion" cols="30" rows="10">{{old('tra_obsevacion')}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-0 ">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('Finalizar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif
