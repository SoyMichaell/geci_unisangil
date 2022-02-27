@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/edit">Editar</a> / <a href="/programa">Programa</a>
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
            <h4 class="tile title"><i class="fab fa-wpforms"></i> Registro programa</h4>
            <form action="/programa/{{$programa->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pro_estado_programa">{{ __('Estado programa') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-select" name="pro_estado_programa" id="pro_estado_programa">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($estadoprogramas as $estadoprograma)
                                        <option value="{{ $estadoprograma }}" {{$programa->pro_estado == $estadoprograma ? 'selected' : ''}}>{{ $estadoprograma }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pro_departamento">{{ __('Departamento') }}</label>
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="pro_departamento" id="pro_departamento">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{$departamento->id == $programa->pro_departamento ? 'selected' : ''}}>{{ $departamento->dep_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/departamento/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pro_municipio">{{ __('Municipio / sede') }}</label>
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="pro_municipio" id="pro_municipio">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}" {{$municipio->id == $programa->pro_municipio ? 'selected' : ''}}>{{ $municipio->mun_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/municipio/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pro_facultad">{{ __('Facultad') }}</label>
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="pro_facultad" id="pro_facultad">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($facultades as $facultad)
                                        <option value="{{ $facultad->id }}" {{$facultad->id == $programa->pro_facultad ? 'selected' : ''}}>{{ $facultad->fac_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/facultad/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pro_nombre">{{ __('Programa *') }}</label>
                        <input id="pro_nombre" type="text"
                            class="form-control @error('pro_nombre') is-invalid @enderror" name="pro_nombre"
                            value="{{$programa->pro_nombre}}" autocomplete="pro_nombre" autofocus>
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
                            value="{{$programa->pro_codigosnies}}" autocomplete="pro_codigosnies" autofocus>
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
                            value="{{$programa->pro_resolucion}}" autocomplete="pro_resolucion" autofocus>
                        @error('pro_resolucion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="pro_titulo">{{ __('Titulo *') }}</label>
                        <input id="pro_titulo" type="text"
                            class="form-control @error('pro_titulo') is-invalid @enderror" name="pro_titulo"
                            value="{{$programa->pro_titulo}}" autocomplete="pro_titulo" autofocus>
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
                            value="{{$programa->pro_fecha_ult}}" autocomplete="pro_fecha_ult" autofocus>
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
                            value="{{$programa->pro_fecha_prox}}" autocomplete="pro_fecha_prox" autofocus>
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
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="pro_nivel_formacion" id="pro_nivel_formacion">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($niveles as $nivel)
                                        <option value="{{ $nivel->id }}" {{$nivel->id == $programa->pro_nivel_formacion ? 'selected' : ''}}>{{ $nivel->niv_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/nivelformacion/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pro_programa_ciclos">{{ __('Progama por ciclos') }}</label>
                        <select class="form-select" name="pro_programa_ciclos" id="pro_programa_ciclos">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($programasCiclo as $programaCiclo)
                                <option value="{{ $programaCiclo }}" {{$programa->pro_programa_ciclo == $programaCiclo ? 'selected' : ''}}>{{ $programaCiclo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pro_metodologia">{{ __('Metodologia ') }}</label>
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="pro_metodologia" id="pro_metodologia">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($metodologias as $metodologia)
                                        <option value="{{ $metodologia->id }}" {{$metodologia->id == $programa->pro_metodologia ? 'selected' : ''}}>{{ $metodologia->met_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/metodologia/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pro_duraccion">{{ __('Duracción programa (semestres)') }}</label>
                        <select class="form-select" name="pro_duraccion" id="pro_duraccion">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($duraccions as $duraccion)
                                <option value="{{ $duraccion }}" {{$programa->pro_duraccion == $duraccion ? 'selected' : ''}}>{{ $duraccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pro_periodo">{{ __('Periodo de admisión ') }}</label>
                        <select class="form-select" name="pro_periodo" id="pro_periodo">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($periodoAdmision as $periodo)
                                <option value="{{ $periodo }}" {{$programa->pro_periodo_admision == $periodo ? 'selected' : ''}}>{{ $periodo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="pro_norma">{{ __('Norma creación programa *') }}</label>
                        <input id="pro_norma" type="text" class="form-control @error('pro_norma') is-invalid @enderror"
                            name="pro_norma" value="{{$programa->pro_tipo_norma}}" autocomplete="pro_norma" autofocus>
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
                        <div class="row">
                            <div class="col-md-11">
                                <select class="js-example-placeholder-single form-select" name="pro_director_programa"
                                    id="pro_director_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}"  {{$docente->id == $programa->pro_id_director ? 'selected' : ''}}>
                                            {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-outline-primary" href="/docente/create">Agregar</a>
                            </div>
                        </div>
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
    <br>
@endsection
@endif
