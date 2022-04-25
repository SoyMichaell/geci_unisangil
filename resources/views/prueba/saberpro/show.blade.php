@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/{{ $saber->prsapr_id_estudiante }}/versaberpro">Vista</a> / <a
            href="/prueba/mostrarsaberpro">Saber pro</a> /
        <a href="/prueba">Prueba</a>
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
            <h4><i class="fa fa-question-circle-o"></i> Vista de registro</h4>
            <hr>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="prsapr_year">Año</label>
                    <input class="form-control @error('prsapr_year') is-invalid @enderror" name="prsapr_year"
                        id="prsapr_year" value="{{ $saber->prsapr_year }}" type="number" autocomplete="prsapr_year"
                        autofocus disabled>
                    @error('prsapr_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prsapr_periodo">Periodo</label>
                    <input class="form-control @error('prsapr_periodo') is-invalid @enderror" name="prsapr_periodo"
                        id="prsapr_periodo" value="{{ $saber->prsapr_periodo }}" type="text"
                        autocomplete="prsapr_periodo" autofocus disabled>
                    @error('prsapr_periodo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="prsapr_id_estudiante">Estudiante</label>
                    <select class="form-control" name="prsapr_id_estudiante" id="prsapr_id_estudiante" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}"
                                {{ $estudiante->id == $saber->prsapr_id_estudiante ? 'selected' : '' }}>
                                {{ $estudiante->per_nombre . ' ' . $estudiante->per_apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prsapr_numero_registro">Número de registro</label>
                    <input class="form-control @error('prsapr_numero_registro') is-invalid @enderror"
                        name="prsapr_numero_registro" id="prsapr_numero_registro"
                        value="{{ $saber->prsapr_numero_registro }}" type="text" autocomplete="prsapr_numero_registro"
                        autofocus disabled>
                    @error('prsapr_numero_registro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <label for="prsapr_grupo_referencia">Grupo de referencia</label>
                    <input class="form-control @error('prsapr_grupo_referencia') is-invalid @enderror"
                        name="prsapr_grupo_referencia" id="prsapr_grupo_referencia"
                        value="{{ $saber->prsapr_grupo_referencia }}" type="text"
                        autocomplete="prsapr_grupo_referencia" autofocus disabled>
                    @error('prsapr_grupo_referencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="prsapr_percentil_nacional">Percentil nacional</label>
                    <input class="form-control @error('prsapr_percentil_nacional') is-invalid @enderror"
                        name="prsapr_percentil_nacional" id="prsapr_percentil_nacional"
                        value="{{ $saber->prsapr_percentil_nacional }}" type="number"
                        autocomplete="prsapr_percentil_nacional" autofocus disabled>
                    @error('prsapr_percentil_nacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="prsapr_percentil_grupo">Percentil grupo</label>
                    <input class="form-control @error('prsapr_percentil_grupo') is-invalid @enderror"
                        name="prsapr_percentil_grupo" id="prsapr_percentil_grupo"
                        value="{{ $saber->prsapr_percentil_grupo }}" type="number"
                        autocomplete="prsapr_percentil_grupo" autofocus disabled>
                    @error('prsapr_percentil_grupo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @foreach ($saberes as $saberx)
                <h5>{{ $saberx->tipo_modulo_nombre }}</h5>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-3 mb-3 d-none">
                        <input class="form-control @error('prsaprmo_id_modulo') is-invalid @enderror"
                            name="prsaprmo_id_modulo[]" id="prsaprmo_id_modulo"
                            value="{{ $saberx->prsaprmo_id_modulo }}" type="text" autocomplete="prsaprmo_id_modulo"
                            autofocus disabled>
                        @error('prsaprmo_id_modulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="prsaprmo_puntaje">Puntaje</label>
                        <input class="form-control @error('prsaprmo_puntaje') is-invalid @enderror"
                            name="prsaprmo_puntaje[]" id="prsaprmo_puntaje" value="{{ $saberx->prsaprmo_puntaje }}"
                            type="number" autocomplete="prsaprmo_puntaje" autofocus disabled>
                        @error('prsaprmo_puntaje')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="prsaprmo_nivel_desempeno">Nivel desempeño</label>
                        <input class="form-control @error('prsaprmo_nivel_desempeno') is-invalid @enderror"
                            name="prsaprmo_nivel_desempeno[]" id="prsaprmo_nivel_desempeno"
                            value="{{ $saberx->prsaprmo_nivel_desempeno }}" type="text"
                            autocomplete="prsaprmo_nivel_desempeno" autofocus disabled>
                        @error('prsaprmo_nivel_desempeno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="prsaprmo_percentil_nacional">Percentil nacional</label>
                        <input class="form-control @error('prsaprmo_percentil_nacional') is-invalid @enderror"
                            name="prsaprmo_percentil_nacional[]" id="prsaprmo_percentil_nacional"
                            value="{{ $saberx->prsaprmo_percentil_nacional }}" type="number"
                            autocomplete="prsaprmo_percentil_nacional" autofocus disabled>
                        @error('prsaprmo_percentil_nacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="prsaprmo_percentil_grupo">Percentil grupo</label>
                        <input class="form-control @error('prsaprmo_percentil_grupo') is-invalid @enderror"
                            name="prsaprmo_percentil_grupo[]" id="prsaprmo_percentil_grupo"
                            value="{{ $saberx->prsaprmo_percentil_grupo }}" type="number"
                            autocomplete="prsaprmo_percentil_grupo" autofocus disabled>
                        @error('prsaprmo_percentil_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @endforeach
            <div class="row mb-3">
                <div class="col-md-12 mb-3">
                    <label for="prsapr_novedad">Novedades</label>
                    <textarea class="form-control" name="prsapr_novedad" id="prsapr_novedad" cols="30" rows="10"
                        disabled>{{ $saber->prsapr_novedad }}</textarea>
                    @error('prsapr_novedad')
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
