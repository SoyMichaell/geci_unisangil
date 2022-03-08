@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/shiw">Vista</a> / <a href="/programa">Programa</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100 mx-auto">
            <h4><i class="fab fa-wpforms"></i> Registro programa</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_estado_programa">{{ __('Estado programa') }}</label>
                    <select class="form-select" name="pro_estado_programa" id="pro_estado_programa" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($estadoprogramas as $estadoprograma)
                            <option value="{{ $estadoprograma }}"
                                {{ $programa->pro_estado == $estadoprograma ? 'selected' : '' }}>
                                {{ $estadoprograma }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_departamento">{{ __('Departamento') }}</label>
                    <select class="form-select" name="pro_departamento" id="pro_departamento" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ $departamento->id == $programa->pro_departamento ? 'selected' : '' }}>
                                {{ $departamento->dep_nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_municipio">{{ __('Municipio / sede') }}</label>
                    <select class="form-select" name="pro_municipio" id="pro_municipio" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}"
                                {{ $municipio->id == $programa->pro_municipio ? 'selected' : '' }}>
                                {{ $municipio->mun_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_facultad">{{ __('Facultad') }}</label>
                    <select class="form-select" name="pro_facultad" id="pro_facultad" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->id }}"
                                {{ $facultad->id == $programa->pro_facultad ? 'selected' : '' }}>
                                {{ $facultad->fac_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_nombre">{{ __('Programa *') }}</label>
                    <input id="pro_nombre" type="text" class="form-control @error('pro_nombre') is-invalid @enderror"
                        name="pro_nombre" value="{{ $programa->pro_nombre }}" autocomplete="pro_nombre" autofocus
                        disabled>
                    @error('pro_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_codigosnies">{{ __('Codgio SNIES *') }}</label>
                    <input id="pro_codigosnies" type="number"
                        class="form-control @error('pro_codigosnies') is-invalid @enderror" name="pro_codigosnies"
                        value="{{ $programa->pro_codigosnies }}" autocomplete="pro_codigosnies" autofocus disabled>
                    @error('pro_codigosnies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_resolucion">{{ __('Resolución *') }}</label>
                    <input id="pro_resolucion" type="text"
                        class="form-control @error('pro_resolucion') is-invalid @enderror" name="pro_resolucion"
                        value="{{ $programa->pro_resolucion }}" autocomplete="pro_resolucion" autofocus disabled>
                    @error('pro_resolucion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_titulo">{{ __('Titulo *') }}</label>
                    <input id="pro_titulo" type="text" class="form-control @error('pro_titulo') is-invalid @enderror"
                        name="pro_titulo" value="{{ $programa->pro_titulo }}" autocomplete="pro_titulo" autofocus
                        disabled>
                    @error('pro_titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_fecha_ult">{{ __('Fecha ultimo registro*') }}</label>
                    <input id="pro_fecha_ult" type="date"
                        class="form-control @error('pro_fecha_ult') is-invalid @enderror" name="pro_fecha_ult"
                        value="{{ $programa->pro_fecha_ult }}" autocomplete="pro_fecha_ult" autofocus disabled>
                    @error('pro_fecha_ult')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_fecha_prox">{{ __('Fecha proximo registro *') }}</label>
                    <input id="pro_fecha_prox" type="date"
                        class="form-control @error('pro_fecha_prox') is-invalid @enderror" name="pro_fecha_prox"
                        value="{{ $programa->pro_fecha_prox }}" autocomplete="pro_fecha_prox" autofocus disabled>
                    @error('pro_fecha_prox')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_nivel_formacion">{{ __('Nivel de formación ') }}</label>
                    <select class="form-select" name="pro_nivel_formacion" id="pro_nivel_formacion" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($niveles as $nivel)
                            <option value="{{ $nivel->id }}"
                                {{ $nivel->id == $programa->pro_nivel_formacion ? 'selected' : '' }}>
                                {{ $nivel->niv_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_programa_ciclos">{{ __('Progama por ciclos') }}</label>
                    <select class="form-select" name="pro_programa_ciclos" id="pro_programa_ciclos" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($programasCiclo as $programaCiclo)
                            <option value="{{ $programaCiclo }}"
                                {{ $programa->pro_programa_ciclo == $programaCiclo ? 'selected' : '' }}>
                                {{ $programaCiclo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_metodologia">{{ __('Metodologia ') }}</label>
                    <select class="form-select" name="pro_metodologia" id="pro_metodologia" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($metodologias as $metodologia)
                            <option value="{{ $metodologia->id }}"
                                {{ $metodologia->id == $programa->pro_metodologia ? 'selected' : '' }}>
                                {{ $metodologia->met_nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_duraccion">{{ __('Duracción programa (semestres)') }}</label>
                    <select class="form-select" name="pro_duraccion" id="pro_duraccion" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($duraccions as $duraccion)
                            <option value="{{ $duraccion }}"
                                {{ $programa->pro_duraccion == $duraccion ? 'selected' : '' }}>{{ $duraccion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_periodo">{{ __('Periodo de admisión ') }}</label>
                    <select class="form-select" name="pro_periodo" id="pro_periodo" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($periodoAdmision as $periodo)
                            <option value="{{ $periodo }}" {{$programa->pro_periodo_admision == $periodo ? 'selected'  : ''}}>{{ $periodo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_grupo_referencia">{{ __('Grupo de referencia *') }}</label>
                    <input id="pro_grupo_referencia" type="text" class="form-control @error('pro_grupo_referencia') is-invalid @enderror"
                        name="pro_grupo_referencia" value="{{$programa->pro_grupo_referencia}}" autocomplete="pro_grupo_referencia" autofocus disabled>
                    @error('pro_grupo_referencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_grupo_referencia_nbc">{{ __('Grupo de referencia (NBC) *') }}</label>
                    <input id="pro_grupo_referencia_nbc" type="text" class="form-control @error('pro_grupo_referencia_nbc') is-invalid @enderror"
                        name="pro_grupo_referencia_nbc" value="{{$programa->pro_grupo_referencia_nbc}}" autocomplete="pro_grupo_referencia_nbc" autofocus disabled>
                    @error('pro_grupo_referencia_nbc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_norma">{{ __('Norma creación programa *') }}</label>
                    <input id="pro_norma" type="text" class="form-control @error('pro_norma') is-invalid @enderror"
                        name="pro_norma" value="{{$programa->pro_tipo_norma}}" autocomplete="pro_norma" autofocus disabled>
                    @error('pro_norma')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="pro_director_programa">{{ __(' Director de programa ') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_director_programa"
                        id="pro_director_programa" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}"
                                {{ $docente->id == $programa->pro_id_director ? 'selected' : '' }}>
                                {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
