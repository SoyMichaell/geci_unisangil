@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/software/create">Crear</a> / <a href="/software">Software</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Registro de software</h1>
    @section('message')
        <p>Programas acádemicos </p>
    @endsection
@endsection
@section('content')
    <div class="col-md-12">
        <div class="tile">
            <form action="/investigacion/{{$grupo->id}}/actualizargrupo" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_id_coordinador">{{ __('Coordinador grupo *') }}</label>
                        <select class="form-select @error('inv_id_coordinador') is-invalid @enderror" name="inv_id_coordinador" id="inv_id_coordinador">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" {{$grupo->inv_id_coordinador == $persona->id ? 'selected' : ''}}>
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                        @error('inv_id_coordinador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_nombre_grupo">{{ __('Nombre grupo investigación *') }}</label>
                        <input id="inv_nombre_grupo" type="text"
                            class="form-control @error('inv_nombre_grupo') is-invalid @enderror" name="inv_nombre_grupo"
                            value="{{$grupo->inv_nombre_grupo}}" autocomplete="inv_nombre_grupo" autofocus>
                        @error('inv_nombre_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_correo_institucional_grupo">{{ __('Correo institucional *') }}</label>
                        <input id="inv_correo_institucional_grupo" type="email"
                            class="form-control @error('inv_correo_institucional_grupo') is-invalid @enderror"
                            name="inv_correo_institucional_grupo" value="{{$grupo->inv_correo_institucional_grupo}}"
                            autocomplete="inv_correo_institucional_grupo" autofocus>
                        @error('inv_correo_institucional_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_codigo_minciencias">{{ __('Código MinCiencias *') }}</label>
                        <input id="inv_codigo_minciencias" type="text"
                            class="form-control @error('inv_codigo_minciencias') is-invalid @enderror"
                            name="inv_codigo_minciencias" value="{{$grupo->inv_codigo_minciencias}}"
                            autocomplete="inv_codigo_minciencias" autofocus>
                        @error('inv_codigo_minciencias')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_mision">{{ __('Misión ') }}</label>
                        <textarea class="form-control @error('inv_mision') is-invalid @enderror" name="inv_mision" id="inv_mision" cols="30"
                            rows="10">{{$grupo->inv_mision}}</textarea>
                        @error('inv_mision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_vision">{{ __('Visión ') }}</label>
                        <textarea class="form-control @error('inv_vision') is-invalid @enderror" name="inv_vision" id="inv_vision" cols="30"
                            rows="10">{{$grupo->inv_vision}}</textarea>
                        @error('inv_vision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_url_grupo">{{ __('Enlace grupo') }}</label>
                        <input id="inv_url_grupo" type="url"
                            class="form-control @error('inv_url_grupo') is-invalid @enderror"
                            name="inv_url_grupo" value="{{$grupo->inv_url_grupo}}" autocomplete="inv_url_grupo"
                            autofocus>
                        @error('inv_url_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_url_gruplac">{{ __('Enlace GrupLac *') }}</label>
                        <input id="inv_url_gruplac" type="url"
                            class="form-control @error('inv_url_gruplac') is-invalid @enderror" name="inv_url_gruplac"
                            value="{{$grupo->inv_url_gruplac}}" autocomplete="inv_url_gruplac" autofocus>
                        @error('inv_url_gruplac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label
                            for="inv_area_conocimiento_principal">{{ __('Área de conocimiento (Principal) *') }}</label>
                        <input id="inv_area_conocimiento_principal" type="text"
                            class="form-control @error('inv_area_conocimiento_principal') is-invalid @enderror"
                            name="inv_area_conocimiento_principal"
                            value="{{$grupo->inv_area_conocimiento_principal}}"
                            autocomplete="inv_area_conocimiento_principal" autofocus>
                        @error('inv_area_conocimiento_principal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_nucleo_conocimiento_nbc">{{ __('Nucleo del conocimiento (NBC) *') }}</label>
                        <input id="inv_nucleo_conocimiento_nbc" type="text"
                            class="form-control @error('inv_nucleo_conocimiento_nbc') is-invalid @enderror"
                            name="inv_nucleo_conocimiento_nbc" value="{{$grupo->inv_nucleo_conocimiento_nbc}}"
                            autocomplete="inv_nucleo_conocimiento_nbc" autofocus>
                        @error('inv_nucleo_conocimiento_nbc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_sede">{{ __('Sede *') }}</label>
                        <select class="form-select @error('inv_sede') is-invalid @enderror" name="inv_sede" id="inv_sede">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}" {{$grupo->inv_sede == $sede->id ? 'selected' : ''}}>{{ $sede->mun_nombre }}</option>
                            @endforeach
                        </select>
                        @error('inv_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_facultad">{{ __('Facultad *') }}</label>
                        <select class="form-select @error('inv_facultad') is-invalid @enderror" name="inv_facultad" id="inv_facultad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}" {{$grupo->inv_facultad == $facultad->id ? 'selected' : ''}}>{{ $facultad->fac_nombre }}</option>
                            @endforeach
                        </select>
                        @error('inv_facultad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inv_categoria_grupo">{{ __('Categoria del grupo') }}</label>
                        <input id="inv_categoria_grupo" type="text"
                            class="form-control @error('inv_categoria_grupo') is-invalid @enderror"
                            name="inv_categoria_grupo" value="{{$grupo->inv_categoria_grupo}}"
                            autocomplete="inv_categoria_grupo" autofocus>
                        @error('inv_categoria_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inv_aval_minciencias">{{ __('Aval MinCiencias') }}</label>
                        <input id="inv_aval_minciencias" type="text"
                            class="form-control @error('inv_aval_minciencias') is-invalid @enderror"
                            name="inv_aval_minciencias" value="{{$grupo->inv_aval_minciencias}}"
                            autocomplete="inv_aval_minciencias" autofocus>
                        @error('inv_aval_minciencias')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="inv_lineas_investigacion">{{ __('Linea (s) de investigación (Si es más de 1 linea, separar por ;) *') }}</label>
                        <input id="inv_lineas_investigacion" type="text"
                            class="form-control @error('inv_lineas_investigacion') is-invalid @enderror"
                            name="inv_lineas_investigacion" value="{{$grupo->inv_lineas_investigacion}}"
                            autocomplete="inv_lineas_investigacion" autofocus>
                        @error('inv_lineas_investigacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
@endsection
@endif
