@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$consultoria->id}}">Vista</a> / <a href="/extension/mostrarconsultoria">Consultoria</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-question-circle"></i> Vista de registro</h4><hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_year">Año</label>
                    <input class="form-control @error('extcon_year') is-invalid @enderror" name="extcon_year"
                        id="extcon_year" value="{{ $consultoria->extcon_year }}" type="number"
                        autocomplete="extcon_year" autofocus disabled>
                    @error('extcon_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_semestre">Semestre</label>
                    <input class="form-control @error('extcon_semestre') is-invalid @enderror" name="extcon_semestre"
                        id="extcon_semestre" value="{{ $consultoria->extcon_semestre }}" type="number"
                        autocomplete="extcon_semestre" autofocus disabled>
                    @error('extcon_semestre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_codigo_consultoria">Código consultoria</label>
                    <input class="form-control @error('extcon_codigo_consultoria') is-invalid @enderror"
                        name="extcon_codigo_consultoria" id="extcon_codigo_consultoria"
                        value="{{ $consultoria->extcon_codigo_consultoria }}" type="text"
                        autocomplete="extcon_codigo_consultoria" autofocus disabled>
                    @error('extcon_codigo_consultoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_descripcion">Descripción</label>
                    <textarea class="form-control" name="extcon_descripcion" id="extcon_descripcion" cols="30" rows="10"
                        disabled>{{ $consultoria->extcon_descripcion }}</textarea>
                    @error('extcon_descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_id_cine_campo">ID CINE Detallado</label>
                    <select class="form-control" name="extcon_id_cine_campo" id="extcon_id_cine_campo" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($cinedetallados as $cinedetallado)
                            <option value="{{ $cinedetallado->id }}"
                                {{ $cinedetallado->id == $consultoria->extcon_id_cine_campo ? 'selected' : '' }}>
                                {{ $cinedetallado->cocide_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcon_id_cine_campo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_nombre_entidad">Nombre entidad</label>
                    <input class="form-control @error('extcon_nombre_entidad') is-invalid @enderror"
                        name="extcon_nombre_entidad" id="extcon_nombre_entidad"
                        value="{{ $consultoria->extcon_nombre_entidad }}" type="text"
                        autocomplete="extcon_nombre_entidad" autofocus disabled>
                    @error('extcon_nombre_entidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ext_sector_consultoria">Sector consultoria</label>
                    <select class="form-control" name="ext_sector_consultoria" id="ext_sector_consultoria" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($sectores as $sector)
                            <option value="{{ $sector->id }}"
                                {{ $sector->id == $consultoria->ext_sector_consultoria ? 'selected' : '' }}>
                                {{ $sector->cose_nombre }}</option>
                        @endforeach
                    </select>
                    @error('ext_sector_consultoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_valor">Valor consultoria</label>
                    <input class="form-control @error('extcon_valor') is-invalid @enderror" name="extcon_valor"
                        id="extcon_valor" value="{{ $consultoria->extcon_valor }}" type="number"
                        autocomplete="extcon_valor" autofocus disabled>
                    @error('extcon_valor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_fecha_inicio">Fecha de inicio</label>
                    <input class="form-control @error('extcon_fecha_inicio') is-invalid @enderror"
                        name="extcon_fecha_inicio" id="extcon_fecha_inicio"
                        value="{{ $consultoria->extcon_fecha_inicio }}" type="date"
                        autocomplete="extcon_fecha_inicio" autofocus disabled>
                    @error('extcon_fecha_inicio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_fecha_fin">Fecha fin</label>
                    <input class="form-control @error('extcon_fecha_fin') is-invalid @enderror" name="extcon_fecha_fin"
                        id="extcon_fecha_fin" value="{{ $consultoria->extcon_fecha_fin }}" type="date"
                        autocomplete="extcon_fecha_fin" autofocus disabled>
                    @error('extcon_fecha_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_fuente_nacional">Fuente nacional</label>
                    <select class="form-control" name="extcon_fuente_nacional" id="extcon_fuente_nacional" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($fuentenacionales as $fuentenacional)
                            <option value="{{ $fuentenacional->id }}"
                                {{ $fuentenacional->id == $consultoria->extcon_fuente_nacional ? 'selected' : '' }}>
                                {{ $fuentenacional->cofuna_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcon_fuente_nacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_valor_nacional">Valor nacional</label>
                    <input class="form-control @error('extcon_valor_nacional') is-invalid @enderror"
                        name="extcon_valor_nacional" id="extcon_valor_nacional"
                        value="{{ $consultoria->extcon_valor_nacional }}" type="number"
                        autocomplete="extcon_valor_nacional" autofocus disabled>
                    @error('extcon_valor_nacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_nombre_institucion">Nombre institución</label>
                    <input class="form-control @error('extcon_nombre_institucion') is-invalid @enderror"
                        name="extcon_nombre_institucion" id="extcon_nombre_institucion"
                        value="{{ $consultoria->extcon_nombre_institucion }}" type="text"
                        autocomplete="extcon_nombre_institucion" autofocus disabled>
                    @error('extcon_nombre_institucion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_fuente_internacional">Fuente internacional</label>
                    <select class="form-control" name="extcon_fuente_internacional" id="extcon_fuente_internacional"
                        disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($fuenteinternacionales as $fuenteinternacional)
                            <option value="{{ $fuenteinternacional->id }}"
                                {{ $fuenteinternacional->id == $consultoria->extcon_fuente_internacional ? 'selected' : '' }}>
                                {{ $fuenteinternacional->cofuin_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcon_fuente_internacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_pais">ID País</label>
                    <input class="form-control @error('extcon_pais') is-invalid @enderror" name="extcon_pais"
                        id="extcon_pais" value="{{ $consultoria->extcon_pais }}" type="number"
                        autocomplete="extcon_pais" autofocus disabled>
                    @error('extcon_pais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_valor_internacional">Valor internacional</label>
                    <input class="form-control @error('extcon_valor_internacional') is-invalid @enderror"
                        name="extcon_valor_internacional" id="extcon_valor_internacional"
                        value="{{ $consultoria->extcon_valor_internacional }}" type="number"
                        autocomplete="extcon_valor_internacional" autofocus disabled>
                    @error('extcon_valor_internacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <h4 class="tile"><i class="fa fa-question-circle"></i> Consultoria recurso humano</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcon_id_persona">Recurso Humano | Persona</label>
                    <select class="form-control js-example-placeholder-single" name="extcon_id_persona"
                        id="extcon_id_persona" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}"
                                {{ $consultoria->extcon_id_persona == $persona->id ? 'selected' : '' }}>
                                {{ Str::ucfirst($persona->per_nombre) .' ' .Str::ucfirst($persona->per_apellido) .' | ' .Str::ucfirst($persona->tip_nombre) }}
                            </option>
                        @endforeach
                    </select>
                    @error('extcon_id_persona')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcon_id_nivel_estudio">Nivel de estudio</label>
                    <select class="form-control js-example-placeholder-single" name="extcon_id_nivel_estudio"
                        id="extcon_id_nivel_estudio" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($nivelestudios as $nivel)
                            <option value="{{ $nivel->conies_nombre }}"
                                {{ $consultoria->extcon_id_nivel_estudio == $nivel->conies_nombre ? 'selected' : '' }}>
                                {{ $nivel->conies_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcon_id_nivel_estudio')
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
