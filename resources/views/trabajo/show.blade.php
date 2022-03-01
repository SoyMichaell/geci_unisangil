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
                <a class="nav-link active" id="fasestado-tab"
                    data-toggle="tab" href="#fase1" role="tab" aria-controls="fase1" aria-selected="true">Fase
                    Información</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="fasestado-tab"
                    data-toggle="tab" href="#fasestado" role="tab" aria-controls="fasestado" aria-selected="true">Fase
                    estado proyecto</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="fasejurado-tab"
                    data-toggle="tab" href="#fasejurado" role="tab" aria-controls="fasejurado"
                    aria-selected="false">Fase asignación jurados</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="faseacta-tab"
                    data-toggle="tab" href="#faseacta" role="tab" aria-controls="faseacta" aria-selected="false">Fase
                    actas / cierre</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="fasecontrato-tab"
                    data-toggle="tab" href="#fasecontrato" role="tab" aria-controls="fasecontrato"
                    aria-selected="false">Fase contratos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="fasefinal-tab"
                    data-toggle="tab" href="#fasefinal" role="tab" aria-controls="fasefinal" aria-selected="false">Fase
                    final</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active tile"
                id="fase1" role="tabpanel" aria-labelledby="fase1-tab">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_codigo_proyecto">Codigo proyecto</label>
                        <input class="form-control @error('tra_codigo_proyecto') is-invalid @enderror"
                            name="tra_codigo_proyecto" id="tra_codigo_proyecto"
                            value="{{ $trabajo->tra_codigo_proyecto }}" type="text" autocomplete="tra_codigo_proyecto"
                            autofocus disabled>
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
                            value="{{ $trabajo->tra_titulo_proyecto }}" type="text" autocomplete="tra_titulo_proyecto"
                            autofocus disabled>
                        @error('tra_titulo_proyecto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tra_id_estudiante">Estudiante (s)</label>
                        <select class="form-select" name="tra_id_estudiante[]"
                            id="tra_id_estudiante" multiple disabled>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}"
                                    {{ $estudiante->id == $trabajo->tra_id_estudiante ? 'selected' : '' }}>
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
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
                            name="tra_fecha_inicio" id="tra_fecha_inicio" value="{{ $trabajo->tra_fecha_inicio }}"
                            type="date" autocomplete="tra_fecha_inicio" autofocus disabled>
                        @error('tra_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tra_modalidad_grado">Modalidad de grado</label>
                        <select class="form-select" name="tra_modalidad_grado"
                            id="tra_modalidad_grado" disabled>
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
                        <select class="form-select" name="tra_id_director"
                            id="tra_id_director" disabled>
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
                        <select class="form-select" name="tra_id_codirector"
                            id="tra_id_codirector" disabled>
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
            </div>
            <div class="tab-pane fade tile"
                id="fasestado" role="tabpanel" aria-labelledby="fasestado-tab">
                <div class="mt-2 p-2">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tra_estado_propuesta">Estado de la propuesta</label>
                            <select class="form-select" name="tra_estado_propuesta" id="tra_estado_propuesta" disabled>
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
                            <select class="form-select" name="tra_estado_proyecto" id="tra_estado_proyecto" disabled>
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
                </div>
            </div>
            <div class="tab-pane fade tile"
                id="fasejurado" role="tabpanel" aria-labelledby="fasejurado-tab">
                <div class="mt-2 p-2">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tra_id_jurado1">Jurado 1</label>
                            <select class="form-select" name="tra_id_jurado1" id="tra_id_jurado1" disabled>
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
                            <select class="form-select" name="tra_id_jurado2" id="tra_id_jurado2" disabled>
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
                </div>
            </div>
            <div class="tab-pane fade tile"
                id="faseacta" role="tabpanel" aria-labelledby="faseacta-tab">
                <div class="mt-2 p-2">
                    <div class="mb-3 form-inline">
                        <div class="form-group col-md-1">
                            <label for="tra_acta_sustentacion">Acta sustentación</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control w-100 @error('tra_acta_sustentacion') is-invalid @enderror"
                                name="tra_acta_sustentacion" id="tra_acta_sustentacion"
                                value="{{ $trabajo->tra_numero_acta_sustentacion }}" type="number"
                                autocomplete="tra_acta_sustentacion" placeholder="Número acta de sustentación"
                                autofocus disabled>
                            @error('tra_acta_sustentacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input class="form-control col-md-5" type="file" name="tra_acta_sustentacion_soporte[]"
                            id="tra_acta_sustentacion_soporte" multiple disabled>
                        <span><small>{{ $trabajo->tra_acta_sustentacion_soporte }}</small></span>
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
                                autocomplete="tra_acta_grado" placeholder="Número acta de grado" autofocus disabled>
                            @error('tra_acta_grado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input class="form-control col-md-5" type="file" name="tra_acta_grado_soporte[]"
                            id="tra_acta_grado_soporte" multiple disabled>
                        <p><small>{{ $trabajo->tra_acta_grado_soporte }}</small></p>
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
                                autocomplete="tra_fecha_finalizacion" autofocus disabled>
                            @error('tra_fecha_finalizacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tile"
                id="fasecontrato" role="tabpanel" aria-labelledby="fasecontrato-tab">
                @if ($contratos->count() > 0)
                    <div class="row mb-3">
                        <div class="card col-md-6">
                            <div class="card-header">Jurado</div>
                            <div class="card-body">
                                <h4>{{ $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}</h4>
                                <p>Estado de pago</p>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-header">Jurado</div>
                            <div class="card-body">
                                <h4>{{ $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}</h4>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            <strong>
                                <h3>No registra contratos</h3>
                            </strong>
                        </div>
                @endif
            </div>
            <div class="tab-pane fade tile"
                id="fasefinal" role="tabpanel" aria-labelledby="fasefinal-tab">
            </div>
        </div>
    </div>
@endsection
@endif