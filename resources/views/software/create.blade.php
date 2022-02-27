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
            <h4 class="titulo"><i class="fab fa-wpforms"></i> Registro plan de estudio</h4>
            <form action="/software/" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_tipo">{{ __('Tipo de software *') }}</label>
                        <select class="form-select @error('sof_tipo') is-invalid @enderror" name="sof_tipo" id="sof_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="libre">Libre</option>
                            <option value="pago">Pago</option>
                        </select>
                        @error('sof_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_nombre">{{ __('Nombre software *') }}</label>
                        <input id="sof_nombre" type="text"
                            class="form-control @error('sof_nombre') is-invalid @enderror" name="sof_nombre"
                            value="{{ old('sof_nombre') }}" autocomplete="sof_nombre" autofocus>
                        @error('sof_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_desarrollador">{{ __('Nombre desarrollador *') }}</label>
                        <input id="sof_desarrollador" type="text"
                            class="form-control @error('sof_desarrollador') is-invalid @enderror" name="sof_desarrollador"
                            value="{{ old('sof_desarrollador') }}" autocomplete="sof_desarrollador" autofocus>
                        @error('sof_desarrollador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_version">{{ __('Versión *') }}</label>
                        <input id="sof_version" type="text"
                            class="form-control @error('sof_version') is-invalid @enderror" name="sof_version"
                            value="{{ old('sof_version') }}" autocomplete="sof_version" autofocus>
                        @error('sof_version')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_no_licencia">{{ __('Número de licencia *') }}</label>
                        <input id="sof_no_licencia" type="text"
                            class="form-control @error('sof_no_licencia') is-invalid @enderror" name="sof_no_licencia"
                            value="{{ old('sof_no_licencia') }}" autocomplete="sof_no_licencia" autofocus>
                        @error('sof_no_licencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_year_ad_licencia">{{ __('Año adquisición de licencia *') }}</label>
                        <input id="sof_year_ad_licencia" type="text"
                            class="form-control @error('sof_year_ad_licencia') is-invalid @enderror" name="sof_year_ad_licencia"
                            value="{{ old('sof_year_ad_licencia') }}" autocomplete="sof_year_ad_licencia" autofocus>
                        @error('sof_year_ad_licencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_year_ve_licencia">{{ __('Año vencimiento de licencia *') }}</label>
                        <input id="sof_year_ve_licencia" type="text"
                            class="form-control @error('sof_year_ve_licencia') is-invalid @enderror" name="sof_year_ve_licencia"
                            value="{{ old('sof_year_ve_licencia') }}" autocomplete="sof_year_ve_licencia" autofocus>
                        @error('sof_year_ve_licencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_asignatura">{{ __('Asignatura *') }}</label>
                        <select class="form-select @error('sof_asignatura') is-invalid @enderror" name="sof_asignatura" id="sof_asignatura" multiple>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{$asignatura->id}}">{{$asignatura->asig_nombre}}</option>
                            @endforeach
                        </select>
                        @error('sof_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_cantidad">{{ __('Cantidad licencias *') }}</label>
                        <input id="sof_cantidad" type="number"
                            class="form-control @error('sof_cantidad') is-invalid @enderror" name="sof_cantidad"
                            value="{{ old('sof_cantidad') }}" autocomplete="sof_cantidad" autofocus>
                        @error('sof_cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-select @error('sof_id_programa') is-invalid @enderror" name="sof_id_programa" id="sof_id_programa" multiple>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{$programa->id}}">{{$programa->pro_nombre}}</option>
                            @endforeach
                        </select>
                        @error('sof_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_valor_unitario">{{ __('Valor unitario *') }}</label>
                        <input id="sof_valor_unitario" type="text"
                            class="form-control @error('sof_valor_unitario') is-invalid @enderror" name="sof_valor_unitario"
                            value="{{ old('sof_valor_unitario') }}" autocomplete="sof_valor_unitario" autofocus>
                        @error('sof_valor_unitario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_valor_total">{{ __('Valor total *') }}</label>
                        <input id="sof_valor_total" type="text"
                            class="form-control @error('sof_valor_total') is-invalid @enderror" name="sof_valor_total"
                            value="{{ old('sof_valor_total') }}" autocomplete="sof_valor_total" autofocus>
                        @error('sof_valor_total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_fecha_actualizar">{{ __('Fecha ultima actualización *') }}</label>
                        <input id="sof_fecha_actualizar" type="date"
                            class="form-control @error('sof_fecha_actualizar') is-invalid @enderror" name="sof_fecha_actualizar"
                            value="{{ old('sof_fecha_actualizar') }}" autocomplete="sof_fecha_actualizar" autofocus>
                        @error('sof_fecha_actualizar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sof_fecha_instalacion">{{ __('Fecha instalación *') }}</label>
                        <input id="sof_fecha_instalacion" type="date"
                            class="form-control @error('sof_fecha_instalacion') is-invalid @enderror" name="sof_fecha_instalacion"
                            value="{{ old('sof_fecha_instalacion') }}" autocomplete="sof_fecha_instalacion" autofocus>
                        @error('sof_fecha_instalacion')
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
