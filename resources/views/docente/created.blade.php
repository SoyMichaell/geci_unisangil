@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{$persona->id}}/directorcompletar">Completar información</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $cuenta > 0 ? ($docente->id_proceso == 1 ? 'active' : '') : 'active' }}" id="informacion-tab" data-bs-toggle="tab" data-bs-target="#informacion" type="button" role="tab"
                    aria-controls="informacion" aria-selected="true">Información</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $cuenta > 0 ? ($docente->id_proceso == 2 ? 'active' : '') : 'active' }}" id="estudio-tab" data-bs-toggle="tab" data-bs-target="#estudio" type="button" role="tab"
                    aria-controls="estudio" aria-selected="true">Estudios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $cuenta > 0 ? ($docente->id_proceso == 3 ? 'active' : '') : 'active' }}" id="zip-tab" data-bs-toggle="tab" data-bs-target="#zip" type="button" role="tab"
                    aria-controls="zip" aria-selected="true">.Zip</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane {{ $cuenta > 0 ? ($docente->id_proceso == 1 ? 'show active' : '') : 'show active' }} tile p-3" id="informacion" role="tabpanel" aria-labelledby="informacion-tab">
                <form
                    action="/docente/{{$persona->id}}/actualizarinformacion"
                    method="post">
                    @csrf @method('PUT')
                    <input type="hidden" value="{{ $persona->id }}" name="id" id="id" readonly>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ciudad_procedencia">{{ __('Ciudad de procedencia *') }}</label>
                            <input id="ciudad_procedencia" type="text"
                                class="form-control @error('ciudad_procedencia') is-invalid @enderror"
                                name="ciudad_procedencia"
                                value="{{ $cuenta > 0 ? ($docente->ciudad_procedencia == "" ? old('ciudad_procedencia') : $docente->ciudad_procedencia) : old('ciudad_procedencia') }}"
                                autocomplete="ciudad_procedencia" autofocus>
                            @error('ciudad_procedencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="correo_personal">{{ __('Correo personal *') }}</label>
                            <input id="correo_personal" type="email"
                                class="form-control @error('correo_personal') is-invalid @enderror"
                                name="correo_personal"
                                value="{{ $cuenta > 0 ? ($docente->correo_personal == "" ? old('correo_personal') : $docente->correo_personal) : old('correo_personal') }}"
                                autocomplete="correo_personal" autofocus>
                            @error('correo_personal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dedicacion">{{ __('Dedicación *') }}</label>
                            <select class="form-control" name="dedicacion" id="dedicacion">
                                <option value="medio-tiempo"
                                    {{ $cuenta > 0 ? ($docente->dedicacion == 'medio-tiempo' ? 'selected' : '') : '' }}>Medio tiempo
                                </option>
                                <option value="tiemplo-completo"
                                    {{ $cuenta > 0 ? ($docente->dedicacion == 'tiemplo-completo' ? 'selected' : '') : '' }}>Tiempo completo
                                </option>
                                <option value="tiempo-catedra"
                                    {{ $cuenta > 0 ? ($docente->dedicacion == 'tiempo-catedra' ? 'selected' : '') : '' }}>Tiempo catedra
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_contratacion">{{ __('Tipo de contratación *') }}</label>
                            <select class="form-control" name="tipo_contratacion" id="tipo_contratacion">
                                <option value="contrato-indefinido" {{ $cuenta > 0 ? ($docente->tipo_contratacion == 'contrato-indefinido' ? 'selected' : '') : '' }}>Contrato indefinido</option>
                                <option value="contrato-a-termino-fijo" {{ $cuenta > 0 ? ($docente->tipo_contratacion == 'contrato-a-termino-fijo' ? 'selected' : '') : '' }}> Contrato a término fijo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_vinculacion">{{ __('Fecha vinculación *') }}</label>
                            <input id="fecha_vinculacion" type="date"
                                class="form-control @error('fecha_vinculacion') is-invalid @enderror"
                                name="fecha_vinculacion"
                                value="{{ $cuenta > 0 ? ($docente->fecha_vinculacion == "" ? old('fecha_vinculacion') : $docente->fecha_vinculacion) : old('fecha_vinculacion') }}"
                                autocomplete="fecha_vinculacion" autofocus>
                            @error('fecha_vinculacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="eps">{{ __('EPS afiliado *') }}</label>
                            <input id="eps" type="text" class="form-control @error('eps') is-invalid @enderror"
                                name="eps" value="{{ $cuenta > 0 ? ($docente->eps == "" ? old('eps') : $docente->eps) : old('eps') }}"
                                autocomplete="eps" autofocus>
                            @error('eps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="riesgo">{{ __('Riesgo *') }}</label>
                            <input id="riesgo" type="text" class="form-control @error('riesgo') is-invalid @enderror"
                                name="riesgo" value="{{ $cuenta > 0 ? ($docente->riesgo == "" ? old('riesgo') : $docente->riesgo) : old('riesgo') }}"
                                autocomplete="riesgo" autofocus>
                            @error('riesgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cajacompensacion">{{ __('Caja de compensación *') }}</label>
                            <input id="cajacompensacion" type="text"
                                class="form-control @error('cajacompensacion') is-invalid @enderror"
                                name="cajacompensacion"
                                value="{{ $cuenta > 0 ? ($docente->caja_compensacion == "" ? old('cajacompensacion') : $docente->caja_compensacion) : old('cajacompensacion') }}"
                                autocomplete="cajacompensacion" autofocus>
                            @error('cajacompensacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="banco">{{ __('Banco *') }}</label>
                            <input id="banco" type="text" class="form-control @error('banco') is-invalid @enderror"
                                name="banco" value="{{ $cuenta > 0 ? ($docente->banco == "" ? old('banco') : $docente->banco) : old('banco') }}"
                                autocomplete="banco" autofocus>
                            @error('banco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="no_cuenta">{{ __('Número de cuenta *') }}</label>
                            <input id="no_cuenta" type="text"
                                class="form-control @error('no_cuenta') is-invalid @enderror" name="no_cuenta"
                                value="{{ $cuenta > 0 ? ($docente->no_cuenta == "" ? old('no_cuenta') : $docente->no_cuenta) : old('no_cuenta') }}"
                                autocomplete="no_cuenta" autofocus>
                            @error('no_cuenta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pension">{{ __('Pension *') }}</label>
                            <input id="pension" type="text" class="form-control @error('pension') is-invalid @enderror"
                                name="pension"
                                value="{{ $cuenta > 0 ? ($docente->pension == "" ? old('pension') : $docente->pension) : old('pension') }}"
                                autocomplete="pension" autofocus>
                            @error('pension')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="estado">{{ __('Estado *') }}</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="activo" {{ $cuenta > 0 ? ($docente->estado == 'activo' ? 'selected' : '') : '' }}>Activo
                                </option>
                                <option value="inactivo" {{ $cuenta > 0 ? ($docente->estado == 'inactivo' ? 'selected' : '') : '' }}>
                                    Inactivo</option>
                            </select>
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
            <div class="tab-pane fade {{ $cuenta > 0 ? ($docente->id_proceso == 2 ? 'show active' : '') : 'show active' }} tile p-3" id="estudio" role="tabpanel" aria-labelledby="estudio-tab">
                <form action="/docente/{{ $persona->id }}/directorestudios" method="post"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type="hidden" value="{{ $persona->id }}" name="id" id="id" readonly>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label
                                for="institucion_esp">{{ __('Nombre de la institución donde realizo especialización (Opcional)') }}</label>
                            <input id="institucion_esp" type="text"
                                class="form-control @error('institucion_esp') is-invalid @enderror"
                                name="institucion_esp" value="{{$cuenta > 0 ? ($docente->institucion_esp == "" ? old('institucion_esp') : $docente->institucion_esp) : old('institucion_esp')}}"
                                autocomplete="institucion_esp" autofocus>
                            @error('institucion_esp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="certificado_esp">{{ __('Certificado especialización (Opcional)') }}</label>
                            <input id="certificado_esp" type="file"
                                class="form-control @error('certificado_esp') is-invalid @enderror"
                                name="certificado_esp" value="{{old('certificado_esp')}}"
                                autocomplete="certificado_esp" autofocus>
                            @error('certificado_esp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a target="_blank" href="{{$cuenta > 0 ? ($docente->certificado_esp == "" ? '' : asset('datos/docente/estudios/'.$docente->certificado_esp) ) : asset('datos/docente/estudios/'.$docente->certificado_esp) }}">ver. {{$docente->certificado_esp}}</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label
                                for="institucion_dip">{{ __('Nombre de la institución donde realizo diplomado (Opcional)') }}</label>
                            <input id="institucion_dip" type="text"
                                class="form-control @error('institucion_dip') is-invalid @enderror"
                                name="institucion_dip" value="{{$cuenta > 0 ? ($docente->institucion_dip == "" ? old('institucion_dip') : $docente->institucion_dip) : old('institucion_dip')}}"
                                autocomplete="institucion_dip" autofocus>
                            @error('institucion_dip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="certificado_dip">{{ __('Certificado diplomado (Opcional)') }}</label>
                            <input id="certificado_dip" type="file"
                                class="form-control @error('certificado_dip') is-invalid @enderror"
                                name="certificado_dip" value="{{ old('certificado_dip') }}"
                                autocomplete="certificado_dip" autofocus>
                            @error('certificado_dip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a target="_blank" href="{{$cuenta > 0 ? ($docente->certificado_dip == "" ? '' : asset('datos/docente/estudios/'.$docente->certificado_dip) ) : asset('estudios/'.$docente->certificado_dip) }}">ver. {{$docente->certificado_dip}}</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="titulo_pregrado">{{ __('Titulo pregrado (Opcional)') }}</label>
                            <input id="titulo_pregrado" type="text"
                                class="form-control @error('titulo_pregrado') is-invalid @enderror"
                                name="titulo_pregrado" value="{{$cuenta > 0 ? ($docente->titulo_pregrado == "" ? old('titulo_pregrado') : $docente->titulo_pregrado) : old('titulo_pregrado')}}"
                                autocomplete="titulo_pregrado" autofocus>
                            @error('titulo_pregrado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label
                                for="institucion_pre">{{ __('Nombre de la institución donde realizo pregrado (Opcional)') }}</label>
                            <input id="institucion_pre" type="text"
                                class="form-control @error('institucion_pre') is-invalid @enderror"
                                name="institucion_pre" value="{{$docente->institucion_pre}}"
                                autocomplete="institucion_pre" autofocus>
                            @error('institucion_pre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label
                                for="titulo_especializacion">{{ __('Titulo de especialización (Opcional)') }}</label>
                            <input id="titulo_especializacion" type="text"
                                class="form-control @error('titulo_especializacion') is-invalid @enderror"
                                name="titulo_especializacion" value="{{$cuenta > 0 ? ($docente->titulo_especializacion == "" ? old('titulo_especializacion') : $docente->titulo_especializacion) : old('titulo_especializacion')}}"
                                autocomplete="titulo_especializacion" autofocus>
                            @error('titulo_especializacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label
                                for="institucion_espe">{{ __('Nombre de la institución donde realizo especialización (Opcional)') }}</label>
                            <input id="institucion_espe" type="text"
                                class="form-control @error('institucion_espe') is-invalid @enderror"
                                name="institucion_espe" value="{{ old('institucion_espe') }}"
                                autocomplete="institucion_espe" autofocus>
                            @error('institucion_espe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a target="_blank" href="{{$cuenta > 0 ? ($docente->institucion_espe == "" ? '' : asset('estudios/'.$docente->institucion_espe) ) : asset('estudios/'.$docente->institucion_espe) }}">ver. {{$docente->institucion_espe}}</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="titulo_maestria">{{ __('Titulo de maestria (Opcional)') }}</label>
                            <input id="titulo_maestria" type="text"
                                class="form-control @error('titulo_maestria') is-invalid @enderror"
                                name="titulo_maestria" value="{{$cuenta > 0 ? ($docente->titulo_maestria == "" ? old('titulo_maestria') : $docente->titulo_maestria) : old('titulo_maestria')}}"
                                autocomplete="titulo_maestria" autofocus>
                            @error('titulo_maestria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label
                                for="institucion_mae">{{ __('Nombre de la institución donde realizo maestria (Opcional)') }}</label>
                            <input id="institucion_mae" type="text"
                                class="form-control @error('institucion_mae') is-invalid @enderror"
                                name="institucion_mae" value="{{ old('institucion_mae') }}"
                                autocomplete="institucion_mae" autofocus>
                            @error('institucion_mae')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="titulo_doctorado">{{ __('Titulo doctorado (Opcional)') }}</label>
                            <input id="titulo_doctorado" type="text"
                                class="form-control @error('titulo_doctorado') is-invalid @enderror"
                                name="titulo_doctorado" value="{{$cuenta > 0 ? ($docente->titulo_doctorado == "" ? old('titulo_doctorado') : $docente->titulo_doctorado) : old('titulo_doctorado')}}"
                                autocomplete="titulo_doctorado" autofocus>
                            @error('titulo_doctorado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label
                                for="institucion_doc">{{ __('Nombre de la institución donde realizo doctorado (Opcional)') }}</label>
                            <input id="institucion_doc" type="text"
                                class="form-control @error('institucion_doc') is-invalid @enderror"
                                name="institucion_doc" value="{{$cuenta > 0 ? ($docente->institucion_doc == "" ? old('institucion_doc') : $docente->institucion_doc) : old('institucion_doc')}}"
                                autocomplete="institucion_doc" autofocus>
                            @error('institucion_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="area_conocimiento">{{ __('Area de conocimiento *') }}</label>
                            <input id="area_conocimiento" type="text"
                                class="form-control @error('area_conocimiento') is-invalid @enderror"
                                name="area_conocimiento" value="{{$cuenta > 0 ? ($docente->area_conocimiento == "" ? old('area_conocimiento') : $docente->area_conocimiento) : old('area_conocimiento')}}"
                                autocomplete="area_conocimiento" autofocus>
                            @error('area_conocimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="maximo_nivel_formacion">{{ __('Máximo nivel de formación *') }}</label>
                            <input id="maximo_nivel_formacion" type="text"
                                class="form-control @error('maximo_nivel_formacion') is-invalid @enderror"
                                name="maximo_nivel_formacion" value="{{$cuenta > 0 ? ($docente->maximo_nivel_formacion == "" ? old('maximo_nivel_formacion') : $docente->maximo_nivel_formacion) : old('maximo_nivel_formacion')}}"
                                autocomplete="maximo_nivel_formacion" autofocus>
                            @error('maximo_nivel_formacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="titulo_maximo_nivel">{{ __('Titulo máximo nivel *') }}</label>
                            <input id="titulo_maximo_nivel" type="text"
                                class="form-control @error('titulo_maximo_nivel') is-invalid @enderror"
                                name="titulo_maximo_nivel" value="{{$cuenta > 0 ? ($docente->titulo_maximo_nivel == "" ? old('titulo_maximo_nivel') : $docente->titulo_maximo_nivel) : old('titulo_maximo_nivel')}}"
                                autocomplete="titulo_maximo_nivel" autofocus>
                            @error('titulo_maximo_nivel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label
                                for="institucion_maximo_nivel">{{ __('Nombre Institución máximo nivel *') }}</label>
                            <input id="institucion_maximo_nivel" type="text"
                                class="form-control @error('institucion_maximo_nivel') is-invalid @enderror"
                                name="institucion_maximo_nivel" value="{{$cuenta > 0 ? ($docente->institucion_maximo_nivel == "" ? old('institucion_maximo_nivel') : $docente->institucion_maximo_nivel) : old('institucion_maximo_nivel')}}"
                                autocomplete="institucion_maximo_nivel" autofocus>
                            @error('institucion_maximo_nivel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="modalidad_programa">{{ __('Modalidad programa *') }}</label>
                            <select class="form-control" name="modalidad_programa" id="modalidad_programa">
                                <option value="">---- SELECCIONE ----</option>
                                <option value="presencial" {{$cuenta > 0 ? ($docente->modalidad_programa == 'presencial' ? 'selected' : '') : 'presencial'}}>Presencial</option>
                                <option value="virtual" {{$cuenta > 0 ? ($docente->modalidad_programa == 'virtual' ? 'selected' : '') : 'virtual'}}>Virtual</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="soporte_hoja_vida">{{ __('Cargar soporte hoja de vida *') }}</label>
                            <input id="soporte_hoja_vida" type="file"
                                class="form-control @error('soporte_hoja_vida') is-invalid @enderror"
                                name="soporte_hoja_vida" value="{{ old('soporte_hoja_vida') }}"
                                autocomplete="soporte_hoja_vida" autofocus>
                            @error('soporte_hoja_vida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a target="_blank" href="{{$cuenta > 0 ? ($docente->soporte_hoja_vida == "" ? '' : asset('datos/docente/estudios/'.$docente->soporte_hoja_vida) ) : asset('datos/docente/estudios/'.$docente->soporte_hoja_vida) }}">ver. {{$docente->soporte_hoja_vida}}</a>
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
            <div class="tab-pane fade {{ $cuenta > 0 ? ($docente->id_proceso == 3 ? 'show active' : '') : 'show active' }} tile p-3" id="zip" role="tabpanel" aria-labelledby="zip-tab">
                <form action="/docente/{{ $persona->id }}/zip" method="post"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type="hidden" value="{{ $persona->id }}" name="id" id="id" readonly>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label
                                for="documentos_compl">{{ __('Cargar archivo comprimido .zip (Documento de identidad, RUT etc..)') }}</label>
                            <input id="documentos_compl" type="file"
                                class="form-control @error('documentos_compl') is-invalid @enderror"
                                name="documentos_compl" value="{{$cuenta > 0 ? ($docente->documentos_compl == "" ? old('documentos_compl') : $docente->documentos_compl) : old('documentos_compl')}}"
                                autocomplete="documentos_compl" autofocus>
                            @error('documentos_compl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 offset-md-12 mt-2">
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
