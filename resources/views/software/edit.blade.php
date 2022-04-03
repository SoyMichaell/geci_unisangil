@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/software/{{$software->id}}/edit">Editar</a> / <a href="/software">Software</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligencie todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fa fa-pencils"></i> Actualizar información</h4><hr>
            <form action="/software/{{$software->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_tipo">{{ __('Tipo de software *') }}</label>
                        <select class="form-control @error('sof_tipo') is-invalid @enderror" name="sof_tipo" id="sof_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="libre" {{$software->sof_tipo == 'libre' ? 'selected' : ''}}>Libre</option>
                            <option value="pago" {{$software->sof_tipo == 'pago' ? 'selected' : ''}}>Pago</option>
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
                            value="{{$software->sof_nombre}}" autocomplete="sof_nombre" autofocus>
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
                            value="{{$software->sof_desarrollador}}" autocomplete="sof_desarrollador" autofocus>
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
                            value="{{$software->sof_version}}" autocomplete="sof_version" autofocus>
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
                            value="{{$software->sof_no_licencia}}" autocomplete="sof_no_licencia" autofocus>
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
                            value="{{$software->sof_year_ad_licencia}}" autocomplete="sof_year_ad_licencia" autofocus>
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
                            value="{{$software->sof_year_ve_licencia}}" autocomplete="sof_year_ve_licencia" autofocus>
                        @error('sof_year_ve_licencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @php
                            $asignaturasx = explode(';',$software->sof_asignatura);
                        @endphp
                        <label for="sof_asignatura">{{ __('Asignatura *') }}</label>
                        <select class="js-example-placeholder-single form-control @error('sof_asignatura') is-invalid @enderror" name="sof_asignatura[]" id="sof_asignatura" multiple="multiple">
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{$asignatura->asig_nombre}}" @foreach($asignaturasx as $asig) {{$asig == $asignatura->asig_nombre ? 'selected' : ''}} @endforeach>{{$asignatura->asig_nombre}}</option>
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
                            value="{{$software->sof_cantidad}}" autocomplete="sof_cantidad" autofocus>
                        @error('sof_cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @php
                            $programasx = explode(';',$software->sof_id_programa);
                        @endphp
                        <label for="sof_id_programa">{{ __('Programa *') }}</label>
                        <select class="js-example-placeholder-single form-control @error('sof_id_programa') is-invalid @enderror" name="sof_id_programa[]" id="sof_id_programa" multiple="multiple">
                            @foreach ($programas as $programa)
                                <option value="{{$programa->pro_nombre}}" @foreach($programasx as $pro) {{$pro == $programa->pro_nombre ? 'selected' : ''}} @endforeach>{{$programa->pro_nombre}}</option>
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
                    <div class="col-md-4">
                        <label for="sof_valor_unitario">{{ __('Valor unitario *') }}</label>
                        <input id="sof_valor_unitario" type="text"
                            class="form-control @error('sof_valor_unitario') is-invalid @enderror" name="sof_valor_unitario"
                            value="{{$software->sof_valor_unitario}}" autocomplete="sof_valor_unitario" autofocus>
                        @error('sof_valor_unitario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="sof_fecha_actualizar">{{ __('Fecha ultima actualización *') }}</label>
                        <input id="sof_fecha_actualizar" type="date"
                            class="form-control @error('sof_fecha_actualizar') is-invalid @enderror" name="sof_fecha_actualizar"
                            value="{{$software->sof_fecha_actualizar}}" autocomplete="sof_fecha_actualizar" autofocus>
                        @error('sof_fecha_actualizar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="sof_fecha_instalacion">{{ __('Fecha instalación *') }}</label>
                        <input id="sof_fecha_instalacion" type="date"
                            class="form-control @error('sof_fecha_instalacion') is-invalid @enderror" name="sof_fecha_instalacion"
                            value="{{$software->sof_fecha_instalacion}}" autocomplete="sof_fecha_instalacion" autofocus>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
