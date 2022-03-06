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
            <form action="/prueba/registrosaberpro" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="prsapr_year">Año</label>
                        <input class="form-control @error('prsapr_year') is-invalid @enderror" name="prsapr_year"
                            id="prsapr_year" value="{{ old('prsapr_year') }}" type="number" autocomplete="prsapr_year"
                            autofocus>
                        @error('prsapr_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prsapr_periodo">Periodo</label>
                        <input class="form-control @error('prsapr_periodo') is-invalid @enderror" name="prsapr_periodo"
                            id="prsapr_periodo" value="{{ old('prsapr_periodo') }}" type="text"
                            autocomplete="prsapr_periodo" autofocus>
                        @error('prsapr_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prsapr_id_estudiante">Estudiante</label>
                        <select class="form-select" name="prsapr_id_estudiante" id="prsapr_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prsapr_numero_registro">Número de registro</label>
                        <input class="form-control @error('prsapr_numero_registro') is-invalid @enderror"
                            name="prsapr_numero_registro" id="prsapr_numero_registro"
                            value="{{ old('prsapr_numero_registro') }}" type="text"
                            autocomplete="prsapr_numero_registro" autofocus>
                        @error('prsapr_numero_registro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="prsapr_grupo_referencia">Grupo de referencia</label>
                        <input class="form-control @error('prsapr_grupo_referencia') is-invalid @enderror"
                            name="prsapr_grupo_referencia" id="prsapr_grupo_referencia"
                            value="{{ old('prsapr_grupo_referencia') }}" type="text"
                            autocomplete="prsapr_grupo_referencia" autofocus>
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
                            value="{{ old('prsapr_percentil_nacional') }}" type="number"
                            autocomplete="prsapr_percentil_nacional" autofocus>
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
                            value="{{ old('prsapr_percentil_grupo') }}" type="number"
                            autocomplete="prsapr_percentil_grupo" autofocus>
                        @error('prsapr_percentil_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <h4>Puntajes por módulos</h4>
                    @foreach ($tiposmodulos as $tiposmodulo)
                        <h5>{{ $tiposmodulo->tipo_modulo_nombre }}</h5>
                        <div class="col-md-3 mb-3 d-none">
                            <input class="form-control @error('prsaprmo_id_modulo') is-invalid @enderror"
                                name="prsaprmo_id_modulo[]" id="prsaprmo_id_modulo" value="{{ $tiposmodulo->id }}"
                                type="hidden" autocomplete="prsaprmo_id_modulo" autofocus readonly>
                            @error('prsaprmo_id_modulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prsaprmo_puntaje">Puntaje</label>
                            <input class="form-control @error('prsaprmo_puntaje') is-invalid @enderror"
                                name="prsaprmo_puntaje[]" id="prsaprmo_puntaje" value="{{ old('prsaprmo_puntaje') }}"
                                type="number" autocomplete="prsaprmo_puntaje" autofocus>
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
                                value="{{ old('prsaprmo_nivel_desempeno') }}" type="number"
                                autocomplete="prsaprmo_nivel_desempeno" autofocus>
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
                                value="{{ old('prsaprmo_percentil_nacional') }}" type="number"
                                autocomplete="prsaprmo_percentil_nacional" autofocus>
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
                                value="{{ old('prsaprmo_percentil_grupo') }}" type="number"
                                autocomplete="prsaprmo_percentil_grupo" autofocus>
                            @error('prsaprmo_percentil_grupo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endforeach
                    <div class="col-md-12 mb-3">
                        <label for="prsapr_novedad">Novedades</label>
                        <textarea class="form-control" name="prsapr_novedad" id="prsapr_novedad" cols="30"
                            rows="10"></textarea>
                        @error('prsapr_novedad')
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
