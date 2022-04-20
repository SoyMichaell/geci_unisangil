@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/estudiante/create">Crear</a> / <a href="/estudiante">Estudiante</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4 class="title"><i class="fa fa-cubes"></i> Registro estudiante</h4>
            <hr>
            <form action="/estudiante" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_programa">{{ __('Programa *') }}</label>
                        <select class="form-control @error('estu_programa') is-invalid @enderror" name="estu_programa"
                            id="estu_programa">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="{{ $programa->count() <= 0 ? 'badge badge-danger' : '' }}">{{ $programa->count() <= 0 ? 'No existen registros dee programas' : '' }}</p>
                        @error('estu_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_programa_plan">{{ __('Plan de estudio *') }}</label>
                        <select class="form-control @error('estu_programa_plan') is-invalid @enderror"
                            name="estu_programa_plan" id="estu_programa_plan">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programasPlan as $plan)
                                <option value="{{ $plan->id }}">
                                    {{ $plan->pro_nombre . ' ' . $plan->pp_plan }}</option>
                            @endforeach
                        </select>
                        <p class="{{ $programasPlan->count() <= 0 ? 'badge badge-danger' : '' }}">{{ $programasPlan->count() <= 0 ? 'No existen registros de plan de estudio' : '' }}</p>
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
                        <select class="form-control @error('estu_tipo_documento') is-invalid @enderror"
                            name="estu_tipo_documento" id="estu_tipo_documento">
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
                </div>
                <div class="row mb-3">
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
                </div>
                <div class="row mb-3">
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
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_direccion">{{ __('Dirección (Opcional)') }}</label>
                        <input id="estu_direccion" type="text"
                            class="form-control @error('estu_direccion') is-invalid @enderror" name="estu_direccion"
                            value="{{ old('estu_direccion') }}" autocomplete="estu_direccion" autofocus>
                        @error('estu_direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_correo">{{ __('Correo electronico institucional *') }}</label>
                        <input id="estu_correo" type="email"
                            class="form-control @error('estu_correo') is-invalid @enderror" name="estu_correo"
                            value="{{ old('estu_correo') }}" autocomplete="estu_correo" autofocus>
                        @error('estu_correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_correo_personal">{{ __('Correo electronico personal (Opcional)') }}</label>
                        <input id="estu_correo_personal" type="email"
                            class="form-control @error('estu_correo_personal') is-invalid @enderror" name="estu_correo_personal"
                            value="{{ old('estu_correo_personal') }}" autocomplete="estu_correo_personal" autofocus>
                        @error('estu_correo_personal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_colegio">{{ __('Institución educativa secundaría (Opcional)') }}</label>
                        <input id="estu_colegio" type="text"
                            class="form-control @error('estu_colegio') is-invalid @enderror" name="estu_colegio"
                            value="{{ old('estu_colegio') }}" autocomplete="estu_colegio" autofocus>
                        @error('estu_colegio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estrato">{{ __('Estrato (Opcional)') }}</label>
                        <input id="estu_estrato" type="text"
                            class="form-control @error('estu_estrato') is-invalid @enderror" name="estu_estrato"
                            value="{{ old('estu_estrato') }}" autocomplete="estu_estrato" autofocus>
                        @error('estu_estrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_departamento">{{ __('Departamento procedencia (Opcional)') }}</label>
                        <select class="form-control @error('estu_departamento') is-invalid @enderror"
                            name="estu_departamento" id="estu_departamento">
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
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_ciudad">{{ __('Municipio de procedencia (Opcional)') }}</label>
                        <select class="form-control @error('estu_ciudad') is-invalid @enderror" name="estu_ciudad"
                            id="estu_ciudad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}">
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
                        <label for="estu_fecha_nacimiento">{{ __('Fecha de Nacimiento (Opcional)') }}</label>
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
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_fecha_expedicion">{{ __('Fecha de Expedición  (Opcional)') }}</label>
                        <input id="estu_fecha_expedicion" type="date"
                            class="form-control @error('estu_fecha_expedicion') is-invalid @enderror"
                            name="estu_fecha_expedicion" value="{{ old('estu_fecha_expedicion') }}"
                            autocomplete="estu_fecha_expedicion" autofocus>
                        @error('estu_fecha_expedicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_sexo">{{ __('Sexo Biológico (Opcional)') }}</label>
                        <select class="form-control @error('estu_sexo') is-invalid @enderror" name="estu_sexo"
                            id="estu_sexo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
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
                        <label for="estu_estado_civil">{{ __('Estado civil (Opcional)') }}</label>
                        <select class="form-control  @error('estu_estado_civil') is-invalid @enderror"
                            name="estu_estado_civil" id="estu_estado_civil">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="soltero(a)">Soltero (a)</option>
                            <option value="casado(s)">Casado (a)</option>
                            <option value="divorciado(s)">Divorciado (a)</option>
                            <option value="viudo(s)">Viudo (a)</option>
                            <option value="unionlibre">Unión libre</option>
                            <option value="religioso(s)">Religioso (a)</option>
                            <option value="separado(s)">Separado (a)</option>
                        </select>
                        @error('estu_estado_civil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ingreso">{{ __('Año de ingreso (Opcional)') }}</label>
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
                        <label for="estu_periodo_ingreso">{{ __('Periodo de ingreso (Opcional)') }}</label>
                        <input id="estu_periodo_ingreso" type="text"
                            class="form-control @error('estu_periodo_ingreso') is-invalid @enderror"
                            name="estu_periodo_ingreso" value="{{ old('estu_periodo_ingreso') }}"
                            autocomplete="estu_periodo_ingreso" placeholder="Ej: 2016-1" autofocus>
                        @error('estu_periodo_ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ult_matricula">{{ __('Ultimo periodo matriculado (Opcional)') }}</label>
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
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-control @error('estu_semestre') is-invalid @enderror" name="estu_semestre"
                            id="estu_semestre">
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
                    <div class="col-md-6">
                        <label for="estu_financiamiento">{{ __('Tipo de financiamiento (Opcional)') }}</label>
                        <select class="form-control @error('estu_financiamiento') is-invalid @enderror"
                            name="estu_financiamiento" id="estu_financiamiento">
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
                </div>
                <div class="row mb-3">
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
                    <div class="col-md-6">
                        <label for="estu_estado">{{ __('Estado *') }}</label>
                        <select class="form-control @error('estu_estado') is-invalid @enderror" name="estu_estado"
                            id="estu_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="reserva-cupo">Reserva de Cupo</option>
                            <option value="pfu">PFU</option>
                            <option value="bajo-rendimiento">Bajo Rendimiento</option>
                            <option value="egresado">Egresado</option>
                            <option value="egresado-no-graduado">Egresado no Graduado</option>
                            <option value="no-renovacion-matricula">No renovación matricula</option>
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
                        <label for="estu_tipo_matricula">{{ __('Tipo de matricula (Opcional)') }}</label>
                        <select class="form-control @error('estu_tipo_matricula') is-invalid @enderror"
                            name="estu_tipo_matricula" id="estu_tipo_matricula">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="movilidad-interna">Movilidad Interna</option>
                            <option value="nuevo-transferencias-interna">Nuevo Transferencias Interna</option>
                            <option value="nuevo-reingreso">Nuevo Reingreso</option>
                            <option value="estudiante-movilidad-academica">Estudiante de Movilidad Académica</option>
                            <option value="movilidad-externa">Movilidad Externa</option>
                            <option value="nuevo-transferencia-externa">Nuevo Transferencia Externa</option>
                            <option value="antiguo">Antiguo</option>
                            <option value="transferencia-obligatoria">Transferencia Obligatoria</option>
                            <option value="desertor">Desertor</option>
                            <option value="nuevo-regular">Nuevo Regular</option>
                            <option value="continuidad-academica">Continuidad Académica</option>
                            <option value="egresado">Egresado</option>
                        </select>
                        @error('estu_tipo_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="estu_matricula">{{ __('Matricula (Opcional)') }}</label>
                        <select class="form-control @error('estu_matricula') is-invalid @enderror"
                            name="estu_matricula" id="estu_matricula">
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
                        <label for="estu_egresado">{{ __('¿Es egresado? ') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control" name="estu_egresado" id="estu_egresado">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label
                            for="estu_administrativo">{{ __('¿Es personal administrativo de unisangil? ') }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control" name="estu_administrativo" id="estu_administrativo">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3" id="administrativo-estudiante">
                    <h4>Datos administrativos</h4><hr>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="admin_cargo">{{ __('Cargo') }}</label>
                            <input id="admin_cargo" type="text"
                                class="form-control @error('admin_cargo') is-invalid @enderror" name="admin_cargo"
                                value="{{ old('admin_cargo') }}" autocomplete="admin_cargo" autofocus>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="admin_dependencia">{{ __('Dependencia') }}</label>
                            <input id="admin_dependencia" type="text"
                                class="form-control @error('admin_dependencia') is-invalid @enderror"
                                name="admin_dependencia" value="{{ old('admin_dependencia') }}"
                                autocomplete="admin_dependencia" autofocus>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="admin_fecha_ingreso">{{ __('Fecha de ingreso') }}</label>
                            <input id="admin_fecha_ingreso" type="date"
                                class="form-control @error('admin_fecha_ingreso') is-invalid @enderror"
                                name="admin_fecha_ingreso" value="{{ old('admin_fecha_ingreso') }}"
                                autocomplete="admin_fecha_ingreso" autofocus>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="admin_no_contrato">{{ __('No. contrato') }}</label>
                            <input id="admin_no_contrato" type="text"
                                class="form-control @error('admin_no_contrato') is-invalid @enderror"
                                name="admin_no_contrato" value="{{ old('admin_no_contrato') }}"
                                autocomplete="admin_no_contrato" autofocus>
                        </div>
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
    </div>
    <br>
@endsection
@endif

@section('scripts')
<script src="/js/admin/programa_plan_estudio.js"></script>
@endsection
