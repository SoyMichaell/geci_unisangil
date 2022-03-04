@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del estudiante.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title"><i class="fas fa-plus-square"></i> Registro complementario egresado</h4>
            <form action="/estudiante/{{$estudiante->id}}/actualizaregresado" method="post">
                @csrf
                @method('PUT')
                <input name="este_id_estudiante" type="hidden" value="{{$estudiante->este_id_estudiante}}" readonly>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="este_fecha_finalizacion">{{ __('Año de finalización *') }}</label>
                        <input id="este_fecha_finalizacion" type="text"
                            class="form-control @error('este_fecha_finalizacion') is-invalid @enderror"
                            name="este_fecha_finalizacion" value="{{$estudiante->este_fecha_finalizacion == "" ?  old('este_fecha_finalizacion') : $estudiante->este_fecha_finalizacion}}"
                            autocomplete="este_fecha_finalizacion" autofocus>
                        @error('este_fecha_finalizacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="este_promedio_acumulado">{{ __('Promedio acumulado *') }}</label>
                        <input id="este_promedio_acumulado" type="text"
                            class="form-control @error('este_promedio_acumulado') is-invalid @enderror"
                            name="este_promedio_acumulado" value="{{$estudiante->este_promedio_acumulado == "" ?  old('este_promedio_acumulado') : $estudiante->este_promedio_acumulado}}"
                            autocomplete="este_promedio_acumulado" autofocus>
                        @error('este_promedio_acumulado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="este_nombre_empresa">{{ __('Nombre empresa *') }}</label>
                        <input id="este_nombre_empresa" type="text"
                            class="form-control @error('este_nombre_empresa') is-invalid @enderror"
                            name="este_nombre_empresa" value="{{$estudiante->este_nombre_empresa == "" ?  old('este_nombre_empresa') : $estudiante->este_nombre_empresa}}"
                            autocomplete="este_nombre_empresa" autofocus>
                        @error('este_nombre_empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="este_area">{{ __('Área *') }}</label>
                        <input id="este_area" type="text" class="form-control @error('este_area') is-invalid @enderror"
                            name="este_area" value="{{$estudiante->este_area == "" ?  old('este_area') : $estudiante->este_area}}" autocomplete="este_area" autofocus>
                        @error('este_area')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="este_cargo">{{ __('Cargo que desempeña *') }}</label>
                        <input id="este_cargo" type="text"
                            class="form-control @error('este_cargo') is-invalid @enderror" name="este_cargo"
                            value="{{$estudiante->este_cargo == "" ?  old('este_cargo') : $estudiante->este_cargo}}" autocomplete="este_cargo" autofocus>
                        @error('este_cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="este_sitio_trabajo">{{ __('¿Labora en algo relacionado a la carrera? *') }}</label>
                        <select class="form-select" name="este_sitio_trabajo" id="este_sitio_trabajo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="si" {{$estudiante->este_sitio_trabajo == 'si' ?  'selected' : ''}}>Si</option>
                            <option value="no"  {{$estudiante->este_sitio_trabajo == 'no' ?  'selected' : ''}}>No</option>
                        </select>
                        @error('este_sitio_trabajo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="este_tipo_contrato">{{ __('Tipo de contrato *') }}</label>
                        <select class="form-select" name="este_tipo_contrato" id="este_tipo_contrato">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="ops" {{$estudiante->este_tipo_contrato == 'ops' ?  'selected' : ''}}>OPS</option>
                            <option value="nomina" {{$estudiante->este_tipo_contrato == 'nomina' ?  'selected' : ''}}>Nomina</option>
                        </select>
                        @error('este_tipo_contrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="este_pais_residencia">{{ __('País *') }}</label>
                        <input id="este_pais_residencia" type="text"
                            class="form-control @error('este_pais_residencia') is-invalid @enderror"
                            name="este_pais_residencia" value="{{$estudiante->este_pais_residencia == "" ?  old('este_pais_residencia') : $estudiante->este_pais_residencia}}"
                            autocomplete="este_pais_residencia" autofocus>
                        @error('este_pais_residencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="este_ciudad_residencia">{{ __('Ciudad *') }}</label>
                        <input id="este_ciudad_residencia" type="text" class="form-control @error('este_ciudad_residencia') is-invalid @enderror"
                            name="este_ciudad_residencia" value="{{$estudiante->este_ciudad_residencia == "" ?  old('este_ciudad_residencia') : $estudiante->este_ciudad_residencia}}" autocomplete="este_ciudad_residencia" autofocus>
                        @error('este_ciudad_residencia')
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
    <br>
@endsection
@endif

@section('scripts')
<script src="/js/admin/programa_plan_estudio.js"></script>
@endsection
