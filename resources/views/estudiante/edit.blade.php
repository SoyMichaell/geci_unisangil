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
            <form action="/estudiante/{{ $persona->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_programa">{{ __('Programa *') }}</label>
                        <select class="form-select" name="estu_programa" id="estu_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}"
                                    {{ $programa->id == $persona->estu_programa ? 'selected' : '' }}>
                                    {{ $programa->pro_nombre }}</option>
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
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($planes as $plan)
                                <option value="{{ $plan->id }}"
                                    {{ $plan->id == $persona->estu_programa_plan ? 'selected' : '' }}>
                                    {{ $plan->pp_plan }}</option>
                            @endforeach
                        </select>
                        @error('estu_programa_plan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_tipo_documento">{{ __('Tipo Documento *') }}</label>
                        <select class="form-select" name="estu_tipo_documento" id="estu_tipo_documento">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($tiposdocumento as $tipo)
                                <option value="{{ $tipo }}"
                                    {{ $tipo == $persona->per_tipo_documento ? 'selected' : '' }}>{{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                        @error('estu_tipo_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_numero_documento">{{ __('Número de Documento *') }}</label>
                        <input id="estu_numero_documento" type="number"
                            class="form-control @error('estu_numero_documento') is-invalid @enderror"
                            name="estu_numero_documento" value="{{ $persona->per_numero_documento }}"
                            autocomplete="estu_numero_documento" autofocus>
                        @error('estu_numero_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_nombre">{{ __('Nombre (s) *') }}</label>
                        <input id="estu_nombre" type="text"
                            class="form-control @error('estu_nombre') is-invalid @enderror" name="estu_nombre"
                            value="{{ $persona->per_nombre }}" autocomplete="estu_nombre" autofocus>
                        @error('estu_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_apellido">{{ __('Apellido (s) *') }}</label>
                        <input id="estu_apellido" type="text"
                            class="form-control @error('estu_apellido') is-invalid @enderror" name="estu_apellido"
                            value="{{ $persona->per_apellido }}" autocomplete="estu_apellido" autofocus>
                        @error('estu_apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_telefono1">{{ __('Telefono 1 *') }}</label>
                        <input id="estu_telefono1" type="number"
                            class="form-control @error('estu_telefono1') is-invalid @enderror" name="estu_telefono1"
                            value="{{ $persona->per_telefono }}" autocomplete="estu_telefono1" autofocus>
                        @error('estu_telefono1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_telefono2">{{ __('Telefono 2 (Opcional)') }}</label>
                        <input id="estu_telefono2" type="number"
                            class="form-control @error('estu_telefono2') is-invalid @enderror" name="estu_telefono2"
                            value="{{ $persona->estu_telefono2 }}" autocomplete="estu_telefono2" autofocus>
                        @error('estu_telefono2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_direccion">{{ __('Dirección *') }}</label>
                        <input id="estu_direccion" type="text"
                            class="form-control @error('estu_direccion') is-invalid @enderror" name="estu_direccion"
                            value="{{ $persona->estu_direccion }}" autocomplete="estu_direccion" autofocus>
                        @error('estu_direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_correo">{{ __('Correo electronico *') }}</label>
                        <input id="estu_correo" type="email"
                            class="form-control @error('estu_correo') is-invalid @enderror" name="estu_correo"
                            value="{{ $persona->per_correo }}" autocomplete="estu_correo" autofocus>
                        @error('estu_correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estrato">{{ __('Estrato *') }}</label>
                        <input id="estu_estrato" type="text"
                            class="form-control @error('estu_estrato') is-invalid @enderror" name="estu_estrato"
                            value="{{ $persona->estu_estrato }}" autocomplete="estu_estrato" autofocus>
                        @error('estu_estrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_departamento">{{ __('Departamento *') }}</label>
                        <select class="form-select" name="estu_departamento" id="estu_departamento">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}"
                                    {{ $departamento->id == $persona->per_departamento ? 'selected' : '' }}>
                                    {{ $departamento->dep_nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('estu_departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_ciudad">{{ __('Municipio / sede *') }}</label>
                        <select class="form-select" name="estu_ciudad" id="estu_ciudad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}"
                                    {{ $municipio->id == $persona->per_ciudad ? 'selected' : '' }}>
                                    {{ $municipio->mun_nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('estu_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_fecha_nacimiento">{{ __('Fecha de Nacimiento *') }}</label>
                        <input id="estu_fecha_nacimiento" type="date"
                            class="form-control @error('estu_fecha_nacimiento') is-invalid @enderror"
                            name="estu_fecha_nacimiento" value="{{ $persona->estu_fecha_nacimiento }}"
                            autocomplete="estu_fecha_nacimiento" autofocus>
                        @error('estu_fecha_nacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_fecha_expedicion">{{ __('Fecha de Expedición  *') }}</label>
                        <input id="estu_fecha_expedicion" type="date"
                            class="form-control @error('estu_fecha_expedicion') is-invalid @enderror"
                            name="estu_fecha_expedicion" value="{{ $persona->estu_fecha_expedicion }}"
                            autocomplete="estu_fecha_expedicion" autofocus>
                        @error('estu_fecha_expedicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_sexo">{{ __('Sexo Biológico *') }}</label>
                        <select class="form-select" name="estu_sexo" id="estu_sexo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="M" {{ $persona->estu_sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $persona->estu_sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('estu_sexo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estado_civil">{{ __('Estado civil *') }}</label>
                        <select class="form-select" name="estu_estado_civil" id="estu_estado_civil">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="soltero(a)"
                                {{ $persona->estu_estado_civil == 'soltero(a)' ? 'selected' : '' }}>Soltero (a)
                            </option>
                            <option value="casado(a)" {{ $persona->estu_estado_civil == 'F' ? 'casado(a)' : '' }}>
                                Casado (a)</option>
                            <option value="divorciado(a)"
                                {{ $persona->estu_estado_civil == 'F' ? 'divorciado(a)' : '' }}>Divorciado (a)</option>
                            <option value="viudo(a)" {{ $persona->estu_estado_civil == 'F' ? 'viudo(a)' : '' }}>Viudo
                                (a)</option>
                            <option value="unionlibre" {{ $persona->estu_estado_civil == 'F' ? 'unionlibre' : '' }}>
                                Unión libre</option>
                            <option value="religioso(a)"
                                {{ $persona->estu_estado_civil == 'F' ? 'religioso(a)' : '' }}>Religioso (a)</option>
                            <option value="separado(a)" {{ $persona->estu_estado_civil == 'F' ? 'separado(a)' : '' }}>
                                Separado (a)</option>
                        </select>
                        @error('estu_estado_civil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ingreso">{{ __('Año de ingreso *') }}</label>
                        <input id="estu_ingreso" type="text"
                            class="form-control @error('estu_ingreso') is-invalid @enderror" name="estu_ingreso"
                            value="{{ $persona->estu_ingreso }}" autocomplete="estu_ingreso" autofocus>
                        @error('estu_ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_periodo_ingreso">{{ __('Periodo de ingreso *') }}</label>
                        <input id="estu_periodo_ingreso" type="text"
                            class="form-control @error('estu_periodo_ingreso') is-invalid @enderror"
                            name="estu_periodo_ingreso" value="{{ $persona->estu_periodo_ingreso }}"
                            autocomplete="estu_periodo_ingreso" placeholder="Ej: 2016-1" autofocus>
                        @error('estu_periodo_ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ult_matricula">{{ __('Ultimo periodo matriculado *') }}</label>
                        <input id="estu_ult_matricula" type="text"
                            class="form-control @error('estu_ult_matricula') is-invalid @enderror"
                            name="estu_ult_matricula" value="{{ $persona->estu_ult_matricula }}"
                            autocomplete="estu_ult_matricula" autofocus placeholder="Ej: 2022-1">
                        @error('estu_ult_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-select" name="estu_semestre" id="estu_semestre">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1" {{ $persona->estu_semestre == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $persona->estu_semestre == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $persona->estu_semestre == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $persona->estu_semestre == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $persona->estu_semestre == '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ $persona->estu_semestre == '6' ? 'selected' : '' }}>6</option>
                            <option value="7" {{ $persona->estu_semestre == '7' ? 'selected' : '' }}>7</option>
                            <option value="8" {{ $persona->estu_semestre == '8' ? 'selected' : '' }}>8</option>
                            <option value="9" {{ $persona->estu_semestre == '9' ? 'selected' : '' }}>9</option>
                            <option value="10" {{ $persona->estu_semestre == '10' ? 'selected' : '' }}>10</option>
                        </select>
                        @error('estu_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_financiamiento">{{ __('Tipo de financiamiento *') }}</label>
                        <select class="form-select" name="estu_financiamiento" id="estu_financiamiento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="beca" {{ $persona->estu_financiamiento == 'beca' ? 'selected' : '' }}>Beca
                            </option>
                            <option value="de-contado"
                                {{ $persona->estu_financiamiento == 'de-contado' ? 'selected' : '' }}>De contado
                            </option>
                            <option value="prestamo"
                                {{ $persona->estu_financiamiento == 'prestamo' ? 'selected' : '' }}>Prestamo</option>
                        </select>
                        @error('estu_financiamiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label
                            for="estu_entidad">{{ __('Tipo de Beca (Solo si el tipo de financiamiento es BECA)') }}</label>
                        <input id="estu_entidad" type="text"
                            class="form-control @error('estu_entidad') is-invalid @enderror" name="estu_entidad"
                            value="{{ $persona->estu_entidad }}" autocomplete="estu_entidad" autofocus>
                        @error('estu_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_estado">{{ __('Estado *') }}</label>
                        <select class="form-select" name="estu_estado" id="estu_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="activo" {{ $persona->estu_estado == 'activo' ? 'selected' : '' }}>Activo
                            </option>
                            <option value="inactivo" {{ $persona->estu_estado == 'inactivo' ? 'selected' : '' }}>
                                Inactivo</option>
                            <option value="reserva-cupo"
                                {{ $persona->estu_estado == 'reserva-cupo' ? 'selected' : '' }}>Reserva de Cupo
                            </option>
                            <option value="pfu" {{ $persona->estu_estado == 'pfu' ? 'selected' : '' }}>PFU</option>
                            <option value="bajo-rendimiento"
                                {{ $persona->estu_estado == 'bajo-rendimiento' ? 'selected' : '' }}>Bajo Rendimiento
                            </option>
                            <option value="egresado" {{ $persona->estu_estado == 'egresado' ? 'selected' : '' }}>
                                Egresado</option>
                            <option value="egresado-no-graduado"
                                {{ $persona->estu_estado == 'egresado-no-graduado' ? 'selected' : '' }}>Egresado no
                                Graduado</option>
                        </select>
                        @error('estu_estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_tipo_matricula">{{ __('Tipo de matricula *') }}</label>
                        <select class="form-select" name="estu_tipo_matricula" id="estu_tipo_matricula">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="movilidad-interna"
                                {{ $persona->estu_tipo_matricula == 'movilidad-interna' ? 'selected' : '' }}>Movilidad
                                Interna</option>
                            <option value="nuevo-transferencias-interna"
                                {{ $persona->estu_tipo_matricula == 'nuevo-transferencias-interna' ? 'selected' : '' }}>
                                Nuevo Transferencias Interna</option>
                            <option value="nuevo-reingreso"
                                {{ $persona->estu_tipo_matricula == 'nuevo-reingreso' ? 'selected' : '' }}>Nuevo
                                Reingreso</option>
                            <option value="estudiante-movilidad-academica"
                                {{ $persona->estu_tipo_matricula == 'estudiante-movilidad-academica' ? 'selected' : '' }}>
                                Estudiante de Movilidad Académica</option>
                            <option value="movilidad-externa"
                                {{ $persona->estu_tipo_matricula == 'movilidad-externa' ? 'selected' : '' }}>Movilidad
                                Externa</option>
                            <option value="nuevo-transferencia-externa"
                                {{ $persona->estu_tipo_matricula == 'nuevo-transferencia-externa' ? 'selected' : '' }}>
                                Nuevo Transferencia Externa</option>
                            <option value="antiguo"
                                {{ $persona->estu_tipo_matricula == 'antiguo' ? 'selected' : '' }}>Antiguo</option>
                            <option value="transferencia-obligatoria"
                                {{ $persona->estu_tipo_matricula == 'transferencia-obligatoria' ? 'selected' : '' }}>
                                Transferencia Obligatoria</option>
                            <option value="desertor"
                                {{ $persona->estu_tipo_matricula == 'desertor' ? 'selected' : '' }}>Desertor</option>
                            <option value="nuevo-regular"
                                {{ $persona->estu_tipo_matricula == 'nuevo-regular' ? 'selected' : '' }}>Nuevo Regular
                            </option>
                            <option value="continuidad-academica"
                                {{ $persona->estu_tipo_matricula == 'continuidad-academica' ? 'selected' : '' }}>
                                Continuidad Académica</option>
                            <option value="egresado"
                                {{ $persona->estu_tipo_matricula == 'egresado' ? 'selected' : '' }}>Egresado</option>
                        </select>
                        @error('estu_tipo_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_matricula">{{ __('Matricula *') }}</label>
                        <select class="form-select" name="estu_matricula" id="estu_matricula">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="pendiente" {{ $persona->estu_matricula == 'pendiente' ? 'selected' : '' }}>
                                Pendiente</option>
                            <option value="pagado" {{ $persona->estu_matricula == 'pagado' ? 'selected' : '' }}>Pagado
                            </option>
                            <option value="sin-liquidar"
                                {{ $persona->estu_matricula == 'sin-liquidar' ? 'selected' : '' }}>Sin liquidar
                            </option>
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
                            name="estu_pga" value="{{ $persona->estu_pga }}" autocomplete="estu_pga" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_reconocimiento">{{ __('Reconocimiento (Opcional)') }}</label>
                        <input id="estu_reconocimiento" type="number"
                            class="form-control @error('estu_reconocimiento') is-invalid @enderror"
                            name="estu_reconocimiento" value="{{ $persona->estu_reconocimiento }}"
                            autocomplete="estu_reconocimiento" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_egresado">{{ __('¿Es egresado? ') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-select" name="estu_egresado" id="estu_egresado">
                                    <option value="Si" {{ $persona->estu_egresado == 'Si' ? 'selected' : '' }}>Si
                                    </option>
                                    <option value="No" {{ $persona->estu_egresado == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label
                            for="estu_administrativo">{{ __('¿Es personal administrativo de unisangil? ') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-select" name="estu_administrativo" id="estu_administrativo">
                                    <option value="Si" {{ $persona->estu_administrativo == 'Si' ? 'selected' : '' }}>Si
                                    </option>
                                    <option value="No" {{ $persona->estu_administrativo == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" id="administrativo-estudiante">
                    <h4>Datos administrativos</h4>
                    <div class="col-md-6">
                        <label for="estu_cargo">{{ __('Cargo') }}</label>
                        <input id="estu_cargo" type="text"
                            class="form-control @error('estu_cargo') is-invalid @enderror" name="estu_cargo"
                            value="{{$persona->estu_cargo}}" autocomplete="estu_cargo" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_dependencia">{{ __('Dependencia') }}</label>
                        <input id="estu_dependencia" type="text"
                            class="form-control @error('estu_dependencia') is-invalid @enderror"
                            name="estu_dependencia" value="{{$persona->estu_dependencia}}"
                            autocomplete="estu_dependencia" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_fecha_ingreso">{{ __('Fecha de ingreso') }}</label>
                        <input id="estu_fecha_ingreso" type="date"
                            class="form-control @error('estu_fecha_ingreso') is-invalid @enderror"
                            name="estu_fecha_ingreso" value="{{$persona->estu_fecha_ingreso}}"
                            autocomplete="estu_fecha_ingreso" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_no_contrato">{{ __('No. contrato') }}</label>
                        <input id="estu_no_contrato" type="text"
                            class="form-control @error('estu_no_contrato') is-invalid @enderror"
                            name="estu_no_contrato" value="{{$persona->estu_no_contrato}}"
                            autocomplete="estu_no_contrato" autofocus>
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

@section('scripts')
<script src="/js/admin/programa_plan_estudio.js"></script>
@endsection
