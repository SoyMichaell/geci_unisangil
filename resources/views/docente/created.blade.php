@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="informacion-tab"
                        data-bs-toggle="tab" data-bs-target="#informacion" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Información</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="estudio-tab"
                        data-bs-toggle="tab" data-bs-target="#estudio" type="button" role="tab" aria-controls="estudio"
                        aria-selected="false">Estudios</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active tile p-3" id="informacion"
                    role="tabpanel" aria-labelledby="informacion-tab">
                    <form action="/docente/directorinformacion" method="post">
                        @csrf
                        <input type="hidden" value="{{ $persona->id }}" name="id" id="id" readonly>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ciudad_procedencia">{{ __('Ciudad de procedencia *') }}</label>
                                <input id="ciudad_procedencia" type="text"
                                    class="form-control @error('ciudad_procedencia') is-invalid @enderror"
                                    name="ciudad_procedencia" value="{{old('ciudad_procedencia') }}"
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
                                    name="correo_personal" value="{{ old('correo_personal') }}"
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
                                <select class="form-select" name="dedicacion" id="dedicacion">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($dedicacions as $dedicacion)
                                        <option value="{{ $dedicacion }}">{{ $dedicacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo_contratacion">{{ __('Tipo de contratación *') }}</label>
                                <select class="form-select" name="tipo_contratacion" id="tipo_contratacion">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($tiposcontratacions as $contratacion)
                                        <option value="{{ $contratacion }}">{{ $contratacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fecha_vinculacion">{{ __('Fecha vinculación *') }}</label>
                                <input id="fecha_vinculacion" type="date"
                                    class="form-control @error('fecha_vinculacion') is-invalid @enderror"
                                    name="fecha_vinculacion" value="{{ old('fecha_vinculacion') }}"
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
                                    name="eps" value="{{ old('eps') }}" autocomplete="eps" autofocus>
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
                                <input id="riesgo" type="text"
                                    class="form-control @error('riesgo') is-invalid @enderror" name="riesgo"
                                    value="{{ old('riesgo') }}" autocomplete="riesgo" autofocus>
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
                                    name="cajacompensacion" value="{{ old('cajacompensacion') }}"
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
                                    name="banco" value="{{ old('banco') }}" autocomplete="banco" autofocus>
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
                                    value="{{ old('no_cuenta') }}" autocomplete="no_cuenta" autofocus>
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
                                <input id="pension" type="text"
                                    class="form-control @error('pension') is-invalid @enderror" name="pension"
                                    value="{{ old('pension') }}" autocomplete="pension" autofocus>
                                @error('pension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="estado">{{ __('Estado *') }}</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}">{{ $estado }}</option>
                                    @endforeach
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
                <div class="tab-pane fade tile p-3" id="estudio"
                    role="tabpanel" aria-labelledby="estudio-tab">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label
                                    for="institucion_esp">{{ __('Nombre de la institución donde realizo especialización (Opcional)') }}</label>
                                <input id="institucion_esp" type="text"
                                    class="form-control @error('institucion_esp') is-invalid @enderror"
                                    name="institucion_esp" value="{{ old('institucion_esp') }}"
                                    autocomplete="institucion_esp" autofocus>
                                @error('institucion_esp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="certificado_esp">{{ __('Certificado especialización (Opcional)') }}</label>
                                <input id="certificado_esp" type="file"
                                    class="form-control @error('certificado_esp') is-invalid @enderror"
                                    name="certificado_esp" value="{{ old('certificado_esp') }}"
                                    autocomplete="certificado_esp" autofocus>
                                @error('certificado_esp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label
                                    for="institucion_dip">{{ __('Nombre de la institución donde realizo diplomado (Opcional)') }}</label>
                                <input id="institucion_dip" type="text"
                                    class="form-control @error('institucion_dip') is-invalid @enderror"
                                    name="institucion_dip" value="{{ old('institucion_dip') }}"
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
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="titulo_pregrado">{{ __('Titulo pregrado (Opcional)') }}</label>
                                <input id="titulo_pregrado" type="text"
                                    class="form-control @error('titulo_pregrado') is-invalid @enderror"
                                    name="titulo_pregrado" value="{{ old('titulo_pregrado') }}"
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
                                <input id="institucion_pre" type="file"
                                    class="form-control @error('institucion_pre') is-invalid @enderror"
                                    name="institucion_pre" value="{{ old('institucion_pre') }}"
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
                                <label for="titulo_especializacion">{{ __('Titulo de especialización (Opcional)') }}</label>
                                <input id="titulo_especializacion" type="text"
                                    class="form-control @error('titulo_especializacion') is-invalid @enderror"
                                    name="titulo_especializacion" value="{{ old('titulo_especializacion') }}"
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
                                <input id="institucion_espe" type="file"
                                    class="form-control @error('institucion_espe') is-invalid @enderror"
                                    name="institucion_espe" value="{{ old('institucion_espe') }}"
                                    autocomplete="institucion_espe" autofocus>
                                @error('institucion_espe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="titulo_maestria">{{ __('Titulo de maestria (Opcional)') }}</label>
                                <input id="titulo_maestria" type="text"
                                    class="form-control @error('titulo_maestria') is-invalid @enderror"
                                    name="titulo_maestria" value="{{ old('titulo_maestria') }}"
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
                                <input id="institucion_mae" type="file"
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
                                    name="titulo_doctorado" value="{{ old('titulo_doctorado') }}"
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
                                <input id="institucion_doc" type="file"
                                    class="form-control @error('institucion_doc') is-invalid @enderror"
                                    name="institucion_doc" value="{{ old('institucion_doc') }}"
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
                                    name="area_conocimiento" value="{{ old('area_conocimiento') }}"
                                    autocomplete="area_conocimiento" autofocus>
                                @error('area_conocimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="maximo_nivel_formacion">{{ __('Máximo nivel de formación *') }}</label>
                                <input id="maximo_nivel_formacion" type="text"
                                    class="form-control @error('maximo_nivel_formacion') is-invalid @enderror"
                                    name="maximo_nivel_formacion" value="{{ old('maximo_nivel_formacion') }}"
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
                                    name="titulo_maximo_nivel" value="{{ old('titulo_maximo_nivel') }}"
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
                                    name="institucion_maximo_nivel" value="{{ old('institucion_maximo_nivel') }}"
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
                                <select class="form-select" name="modalidad_programa" id="modalidad_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($modalidadprograma as $modalidad)
                                        <option value="{{ $modalidad }}">{{ $modalidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="soporte_hoja_vida">{{ __('Cargar soporte hoja de vida *') }}</label>
                                <input id="soporte_hoja_vida" type="file"
                                    class="form-control @error('soporte_hoja_vida') is-invalid @enderror"
                                    name="soporte_hoja_vida" value="{{ old('soporte_hoja_vida') }}"
                                    autocomplete="soporte_hoja_vida" autofocus>
                                @error('soporte_hoja_vida')
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
