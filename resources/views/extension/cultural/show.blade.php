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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcul_year">Año</label>
                    <input class="form-control @error('extcul_year') is-invalid @enderror" name="extcul_year"
                        id="extcul_year" value="{{ $actividad->extcul_year }}" type="number"
                        autocomplete="extcul_year" autofocus disabled>
                    @error('extcul_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcul_semestre">Semestre</label>
                    <input class="form-control @error('extcul_semestre') is-invalid @enderror" name="extcul_semestre"
                        id="extcul_semestre" value="{{ $actividad->extcul_semestre }}" type="number"
                        autocomplete="extcul_semestre" autofocus disabled>
                    @error('extcul_semestre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcul_codigo_unidad_org">Código unidad organizacional</label>
                    <input class="form-control @error('extcul_codigo_unidad_org') is-invalid @enderror"
                        name="extcul_codigo_unidad_org" id="extcul_codigo_unidad_org"
                        value="{{ $actividad->extcul_codigo_unidad_org }}" type="text"
                        autocomplete="extcul_codigo_unidad_org" autofocus disabled>
                    @error('extcul_codigo_unidad_org')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcul_codigo_actividad">Código actividad</label>
                    <input class="form-control @error('extcul_codigo_actividad') is-invalid @enderror"
                        name="extcul_codigo_actividad" id="extcul_codigo_actividad"
                        value="{{ $actividad->extcul_codigo_actividad }}" type="text"
                        autocomplete="extcul_codigo_actividad" autofocus disabled>
                    @error('extcul_codigo_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcul_descripcion_actividad">Descripción actividad</label>
                    <textarea class="form-control" name="extcul_descripcion_actividad"
                        id="extcul_descripcion_actividad" cols="30" rows="10"
                        disabled>{{ $actividad->extcul_descripcion_actividad }}</textarea>
                    @error('extcul_descripcion_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcul_tipo_actividad">Tipo de actividad</label>
                    <select class="form-select" name="extcul_tipo_actividad" id="extcul_tipo_actividad" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="1" {{ $actividad->extcul_tipo_actividad == '1' ? 'selected' : '' }}>1->
                            Medio de comunicación</option>
                        <option value="2" {{ $actividad->extcul_tipo_actividad == '2' ? 'selected' : '' }}>2->
                            Semana cultural</option>
                        <option value="3" {{ $actividad->extcul_tipo_actividad == '3' ? 'selected' : '' }}>3->
                            Museo universitario</option>
                        <option value="4" {{ $actividad->extcul_tipo_actividad == '4' ? 'selected' : '' }}>4->
                            Programa guia cultural</option>
                        <option value="5" {{ $actividad->extcul_tipo_actividad == '5' ? 'selected' : '' }}>5-> Otro
                        </option>
                    </select>
                    @error('extcul_tipo_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcul_fecha_inicio">Fecha de inicio</label>
                    <input class="form-control @error('extcul_fecha_inicio') is-invalid @enderror"
                        name="extcul_fecha_inicio" id="extcul_fecha_inicio"
                        value="{{ $actividad->extcul_fecha_inicio }}" type="date" autocomplete="extcul_fecha_inicio"
                        autofocus disabled>
                    @error('extcul_fecha_inicio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcul_fecha_fin">Fecha fin</label>
                    <input class="form-control @error('extcul_fecha_fin') is-invalid @enderror" name="extcul_fecha_fin"
                        id="extcul_fecha_fin" value="{{ $actividad->extcul_fecha_fin }}" type="date"
                        autocomplete="extcul_fecha_fin" autofocus disabled>
                    @error('extcul_fecha_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="extcul_fuente_nacional">Fuente nacional</label>
                    <select class="form-select" name="extcul_fuente_nacional" id="extcul_fuente_nacional" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($fuentenacionales as $nacionales)
                            <option value="{{ $nacionales->id }}"
                                {{ $actividad->extcul_fuente_nacional == $nacionales->id ? 'selected' : '' }}>
                                {{ $nacionales->cofuna_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extul_tipo_actividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="extcul_valor_financiacion_nac">Valor financiación nacional</label>
                    <input class="form-control @error('extcul_valor_financiacion_nac') is-invalid @enderror"
                        name="extcul_valor_financiacion_nac" id="extcul_valor_financiacion_nac"
                        value="{{ $actividad->extcul_valor_financiacion_nac }}" type="number"
                        autocomplete="extcul_valor_financiacion_nac" autofocus disabled>
                    @error('extcul_valor_financiacion_nac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="extcul_nombre_institucion">Nombre institución</label>
                    <input class="form-control @error('extcul_nombre_institucion') is-invalid @enderror"
                        name="extcul_nombre_institucion" id="extcul_nombre_institucion"
                        value="{{ $actividad->extcul_nombre_institucion }}" type="text"
                        autocomplete="extcul_nombre_institucion" autofocus disabled>
                    @error('extcul_nombre_institucion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="extcul_fuente_internacional">Fuente internacional</label>
                    <select class="form-select" name="extcul_fuente_internacional" id="extcul_fuente_internacional"
                        disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($fuenteinternacionales as $internacionales)
                            <option value="{{ $internacionales->id }}"
                                {{ $actividad->extcul_fuente_internacional == $internacionales->id ? 'selected' : '' }}>
                                {{ $internacionales->cofuin_nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('extcul_fuente_internacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="extcul_pais_financiador">ID País financiador</label>
                    <input class="form-control @error('extcul_pais_financiador') is-invalid @enderror"
                        name="extcul_pais_financiador" id="extcul_pais_financiador"
                        value="{{ $actividad->extcul_pais_financiador }}" type="number"
                        autocomplete="extcul_pais_financiador" autofocus disabled>
                    @error('extcul_pais_financiador')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="extcul_valor_internacional">Valor financiación internacional</label>
                    <input class="form-control @error('extcul_valor_internacional') is-invalid @enderror"
                        name="extcul_valor_internacional" id="extcul_valor_internacional"
                        value="{{ $actividad->extcul_valor_internacional }}" type="number"
                        autocomplete="extcul_valor_internacional" autofocus disabled>
                    @error('extcul_valor_internacional')
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
