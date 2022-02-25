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
            <h4 class="tile title"><i class="fas fa-plus-square"></i> Registro estudiante</h4>
            <form action="/estudiante" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="estu_programa">{{ __('Programa *') }}</label>
                                <select class="form-select" name="estu_programa" id="estu_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                                    @endforeach
                                </select>
                                @error('estu_programa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="estu_programa_plan">{{ __('Plan de estudio *') }}</label>
                                <select class="form-select" name="estu_programa_plan" id="estu_programa_plan">
                                </select>
                                @error('estu_programa_plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_tipo_documento">{{ __('Tipo Documento *') }}</label>
                        <select class="form-select" name="estu_tipo_documento" id="estu_tipo_documento">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($tiposdocumento as $tipo)
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                            @endforeach
                        </select>
                        @error('estu_tipo_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_numero_documento">{{ __('Número de Documento *') }}</label>
                        <input id="estu_numero_documento" type="number"
                            class="form-control @error('estu_numero_documento') is-invalid @enderror"
                            name="estu_numero_documento" value="{{ old('estu_numero_documento') }}"
                            autocomplete="estu_numero_documento" autofocus>
                        @error('estu_numero_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_nombre">{{ __('Nombre (s) *') }}</label>
                        <input id="estu_nombre" type="text"
                            class="form-control @error('estu_nombre') is-invalid @enderror" name="estu_nombre"
                            value="{{ old('estu_nombre') }}" autocomplete="estu_nombre" autofocus>
                        @error('estu_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_apellido">{{ __('Apellido (s) *') }}</label>
                        <input id="estu_apellido" type="text"
                            class="form-control @error('estu_apellido') is-invalid @enderror" name="estu_apellido"
                            value="{{ old('estu_apellido') }}" autocomplete="estu_apellido" autofocus>
                        @error('estu_apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_telefono1">{{ __('Telefono 1 *') }}</label>
                        <input id="estu_telefono1" type="number"
                            class="form-control @error('estu_telefono1') is-invalid @enderror" name="estu_telefono1"
                            value="{{ old('estu_telefono1') }}" autocomplete="estu_telefono1" autofocus>
                        @error('estu_telefono1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_telefono2">{{ __('Telefono 2 (Opcional)') }}</label>
                        <input id="estu_telefono2" type="number"
                            class="form-control @error('estu_telefono2') is-invalid @enderror" name="estu_telefono2"
                            value="{{ old('estu_telefono2') }}" autocomplete="estu_telefono2" autofocus>
                        @error('estu_telefono2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_direccion">{{ __('Dirección *') }}</label>
                        <input id="estu_direccion" type="text"
                            class="form-control @error('estu_direccion') is-invalid @enderror" name="estu_direccion"
                            value="{{ old('estu_direccion') }}" autocomplete="estu_direccion" autofocus>
                        @error('estu_direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_correo">{{ __('Correo electronico *') }}</label>
                        <input id="estu_correo" type="email"
                            class="form-control @error('estu_correo') is-invalid @enderror" name="estu_correo"
                            value="{{ old('estu_correo') }}" autocomplete="estu_correo" autofocus>
                        @error('estu_correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_estrato">{{ __('Estrato *') }}</label>
                        <input id="estu_estrato" type="text"
                            class="form-control @error('estu_estrato') is-invalid @enderror" name="estu_estrato"
                            value="{{ old('estu_estrato') }}" autocomplete="estu_estrato" autofocus>
                        @error('estu_estrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_departamento">{{ __('Departamento *') }}</label>
                        <select class="form-select" name="estu_departamento" id="estu_departamento">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->dep_nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('estu_departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ciudad">{{ __('Municipio / sede *') }}</label>
                        <select class="form-select" name="estu_ciudad" id="estu_ciudad">
                        </select>
                        @error('estu_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_fecha_nacimiento">{{ __('Fecha de Nacimiento *') }}</label>
                        <input id="estu_fecha_nacimiento" type="date"
                            class="form-control @error('estu_fecha_nacimiento') is-invalid @enderror"
                            name="estu_fecha_nacimiento" value="{{ old('estu_fecha_nacimiento') }}"
                            autocomplete="estu_fecha_nacimiento" autofocus>
                        @error('estu_fecha_nacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ingreso">{{ __('Año de ingreso *') }}</label>
                        <input id="estu_ingreso" type="text"
                            class="form-control @error('estu_ingreso') is-invalid @enderror" name="estu_ingreso"
                            value="{{ old('estu_ingreso') }}" autocomplete="estu_ingreso" autofocus>
                        @error('estu_ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_ult_matricula">{{ __('Ultimo periodo matriculado *') }}</label>
                        <input id="estu_ult_matricula" type="text"
                            class="form-control @error('estu_ult_matricula') is-invalid @enderror"
                            name="estu_ult_matricula" value="{{ old('estu_ult_matricula') }}"
                            autocomplete="estu_ult_matricula" autofocus placeholder="Ej: 2022-1">
                        @error('estu_ult_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-select" name="estu_semestre" id="estu_semestre">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        @error('estu_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_financiamiento">{{ __('Tipo de financiamiento *') }}</label>
                        <select class="form-select" name="estu_financiamiento" id="estu_financiamiento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="beca">Beca</option>
                            <option value="de-contado">De contado</option>
                            <option value="prestamo">Prestamo</option>
                        </select>
                        @error('estu_financiamiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="estu_entidad">{{ __('Tipo de Beca (Solo si el tipo de financiamiento es BECA)') }}</label>
                        <input id="estu_entidad" type="text"
                            class="form-control @error('estu_entidad') is-invalid @enderror" name="estu_entidad"
                            value="{{ old('estu_entidad') }}" autocomplete="estu_entidad" autofocus>
                        @error('estu_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estado">{{ __('Estado *') }}</label>
                        <select class="form-select" name="estu_estado" id="estu_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="reserva-cupo">Reserva de Cupo</option>
                            <option value="pfu">PFU</option>
                            <option value="bajo-rendimiento">Bajo Rendimiento</option>
                            <option value="egresado">Egresado</option>
                            <option value="egresado-no-graduado">Egresado no Graduado</option>
                        </select>
                        @error('estu_estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_matricula">{{ __('Tipo de matricula *') }}</label>
                        <select class="form-select" name="estu_matricula" id="estu_matricula">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="pagado">Pagado</option>
                            <option value="sin-liquidar">Sin liquidar</option>
                        </select>
                        @error('estu_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_pga">{{ __('Promedio general acumulado ') }}</label>
                        <input id="estu_pga" type="text" class="form-control @error('estu_pga') is-invalid @enderror"
                            name="estu_pga" value="{{ old('estu_pga') }}" autocomplete="estu_pga" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_reconocimiento">{{ __('Reconocimiento (Opcional)') }}</label>
                        <input id="estu_reconocimiento" type="number"
                            class="form-control @error('estu_reconocimiento') is-invalid @enderror"
                            name="estu_reconocimiento" value="{{ old('estu_reconocimiento') }}"
                            autocomplete="estu_reconocimiento" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estado">{{ __('¿Es egresado? ') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-select" name="estu_egresado" id="estu_estado">
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_grado">{{ __('Fecha de grado (Opcional)') }}</label>
                        <input id="estu_grado" type="date"
                            class="form-control @error('estu_grado') is-invalid @enderror" name="estu_grado"
                            value="{{ old('estu_grado') }}" autocomplete="estu_grado" autofocus>
                        @error('estu_grado')
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
