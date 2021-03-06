@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/crearservicioextension">Crear</a> / <a href="/extension/mostrarservicioextension">Servicios extensión</a> / <a href="/extension">Extension - internacionalización</a>
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
            <h4><i class="fa fa-cube"></i> Registro servicio extensión</h4><hr>
            <form action="/extension/registroservicioextension" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_year">Año *</label>
                        <input class="form-control @error('extseex_year') is-invalid @enderror" name="extseex_year"
                            id="extseex_year" value="{{ old('extseex_year') }}" type="number"
                            autocomplete="extseex_year" autofocus>
                        @error('extseex_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_semestre">Semestre *</label>
                        <input class="form-control @error('extseex_semestre') is-invalid @enderror"
                            name="extseex_semestre" id="extseex_semestre" value="{{ old('extseex_semestre') }}"
                            type="number" autocomplete="extseex_semestre" autofocus>
                        @error('extseex_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_codigo_organizacional">Código unidad organizacional *</label>
                        <input class="form-control @error('extseex_codigo_organizacional') is-invalid @enderror"
                            name="extseex_codigo_organizacional" id="extseex_codigo_organizacional"
                            value="{{ old('extseex_codigo_organizacional') }}" type="text"
                            autocomplete="extseex_codigo_organizacional" autofocus>
                        @error('extseex_codigo_organizacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_codigo_ser">Código servicio *</label>
                        <input class="form-control @error('extseex_codigo_ser') is-invalid @enderror"
                            name="extseex_codigo_ser" id="extseex_codigo_ser" value="{{ old('extseex_codigo_ser') }}"
                            type="text" autocomplete="extseex_codigo_ser" autofocus>
                        @error('extseex_codigo_ser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_nombre_ser">Nombre servicio *</label>
                        <input class="form-control @error('extseex_nombre_ser') is-invalid @enderror"
                            name="extseex_nombre_ser" id="extseex_nombre_ser" value="{{ old('extseex_nombre_ser') }}"
                            type="text" autocomplete="extseex_nombre_ser" autofocus>
                        @error('extseex_nombre_ser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_descripcion_ser">Descripción (Opcional)</label>
                        <textarea class="form-control" name="extseex_descripcion_ser" id="extseex_descripcion_ser"
                            cols="30" rows="10"></textarea>
                        @error('extseex_descripcion_ser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_valor_ser">Valor servicio (Opcional)</label>
                        <input class="form-control @error('extseex_valor_ser') is-invalid @enderror"
                            name="extseex_valor_ser" id="extseex_valor_ser" value="{{ old('extseex_valor_ser') }}"
                            type="text" autocomplete="extseex_valor_ser" autofocus>
                        @error('extseex_valor_ser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_id_area_extension">Área de extensión *</label>
                        <select class="form-control @error('extseex_id_area_extension') is-invalid @enderror" name="extseex_id_area_extension" id="extseex_id_area_extension">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->coarex_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_area_extension')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_fecha_inicio">Fecha inicio *</label>
                        <input class="form-control @error('extseex_fecha_inicio') is-invalid @enderror"
                            name="extseex_fecha_inicio" id="extseex_fecha_inicio"
                            value="{{ old('extseex_fecha_inicio') }}" type="date" autocomplete="extseex_fecha_inicio"
                            autofocus>
                        @error('extseex_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_fecha_final">Fecha final *</label>
                        <input class="form-control @error('extseex_fecha_final') is-invalid @enderror"
                            name="extseex_fecha_final" id="extseex_fecha_final"
                            value="{{ old('extseex_fecha_final') }}" type="date" autocomplete="extseex_fecha_final"
                            autofocus>
                        @error('extseex_fecha_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Datos contacto</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_nombre_contacto">Nombre (s) *</label>
                        <input class="form-control @error('extseex_nombre_contacto') is-invalid @enderror"
                            name="extseex_nombre_contacto" id="extseex_nombre_contacto"
                            value="{{ old('extseex_nombre_contacto') }}" type="text"
                            autocomplete="extseex_nombre_contacto" autofocus>
                        @error('extseex_nombre_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_apellido_contacto">Apellido (s) *</label>
                        <input class="form-control @error('extseex_apellido_contacto') is-invalid @enderror"
                            name="extseex_apellido_contacto" id="extseex_apellido_contacto"
                            value="{{ old('extseex_apellido_contacto') }}" type="text"
                            autocomplete="extseex_apellido_contacto" autofocus>
                        @error('extseex_apellido_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_telefono_contacto">Telefono *</label>
                        <input class="form-control @error('extseex_telefono_contacto') is-invalid @enderror"
                            name="extseex_telefono_contacto" id="extseex_telefono_contacto"
                            value="{{ old('extseex_telefono_contacto') }}" type="number"
                            autocomplete="extseex_telefono_contacto" autofocus>
                        @error('extseex_telefono_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_correo_contacto">Correo electronico *</label>
                        <input class="form-control @error('extseex_correo_contacto') is-invalid @enderror"
                            name="extseex_correo_contacto" id="extseex_correo_contacto"
                            value="{{ old('extseex_correo_contacto') }}" type="email"
                            autocomplete="extseex_correo_contacto" autofocus>
                        @error('extseex_correo_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_costo">¿Tiene costo?</label>
                        <select class="form-control" name="extseex_costo" id="extseex_costo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                        @error('extseex_costo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_criterio_elegibilidad">Criterio de elegibilidad</label>
                        <textarea class="form-control" name="extseex_criterio_elegibilidad" id="extseex_criterio_elegibilidad" cols="30" rows="10"></textarea>
                        @error('extseex_criterio_elegibilidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_id_area_trabajo">Área de trabajo</label>
                        <select class="form-control" name="extseex_id_area_trabajo" id="extseex_id_area_trabajo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($areastrabajo as $trabajo)
                                <option value="{{ $trabajo->id }}">{{ $trabajo->coartra_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_area_trabajo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_id_ciclo_vital">Ciclo vital</label>
                        <select class="form-control" name="extseex_id_ciclo_vital" id="extseex_id_ciclo_vital">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1">Primera infancia (0-5 años)</option>
                            <option value="2">Niñez (6-11 años)</option>
                            <option value="3">Jóvenes (12-26 años)</option>
                            <option value="4">Adultos (26-60 años)</option>
                            <option value="5">Adultos mayores (+60 años)</option>
                        </select>
                        @error('extseex_id_ciclo_vital')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Fuente nacional</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="extseex_id_entidad_nacional">Entidad nacional</label>
                        <select class="form-control" name="extseex_id_entidad_nacional"
                            id="extseex_id_entidad_nacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($entidadesnac as $entidadenac)
                                <option value="{{ $entidadenac->id }}">{{ $entidadenac->coenna_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_entidad_nacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extseex_id_fuente_nacional">Fuente nacional</label>
                        <select class="form-control" name="extseex_id_fuente_nacional"
                            id="extseex_id_fuente_nacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($fuentenacionals as $nacional)
                                <option value="{{ $nacional->id }}">{{ $nacional->cofuna_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_fuente_nacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extseex_valor_financiacion_nac">Valor financiación</label>
                        <input class="form-control @error('extseex_valor_financiacion_nac') is-invalid @enderror"
                            name="extseex_valor_financiacion_nac" id="extseex_valor_financiacion_nac"
                            value="{{ old('extseex_valor_financiacion_nac') }}" type="number"
                            autocomplete="extseex_valor_financiacion_nac" autofocus>
                        @error('extseex_valor_financiacion_nac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Fuente internacional</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_id_fuente_internacional">Fuente internacional</label>
                        <select class="form-control" name="extseex_id_fuente_internacional"
                            id="extseex_id_fuente_internacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($entidadesinter as $entidadinter)
                                <option value="{{ $entidadinter->id }}">{{ $entidadinter->cofuin_nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('extseex_id_fuente_internacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_id_pais">País financiador (Si la fuente seleccionada es organismo
                            multilateral se debe registrar 0)</label>
                        <input class="form-control @error('extseex_id_pais') is-invalid @enderror"
                            name="extseex_id_pais" id="extseex_id_pais" value="{{ old('extseex_id_pais') }}"
                            type="number" autocomplete="extseex_id_pais" autofocus>
                        @error('extseex_id_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_nombre_institucion_inter">Nombre institución</label>
                        <input class="form-control @error('extseex_nombre_institucion_inter') is-invalid @enderror"
                            name="extseex_nombre_institucion_inter" id="extseex_nombre_institucion_inter"
                            value="{{ old('extseex_nombre_institucion_inter') }}" type="text"
                            autocomplete="extseex_nombre_institucion_inter" autofocus>
                        @error('extseex_nombre_institucion_inter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_valor_financiacion_inter">Valor financiación internacional</label>
                        <input class="form-control @error('extseex_valor_financiacion_inter') is-invalid @enderror"
                            name="extseex_valor_financiacion_inter" id="extseex_valor_financiacion_inter"
                            value="{{ old('extseex_valor_financiacion_inter') }}" type="number"
                            autocomplete="extseex_valor_financiacion_inter" autofocus>
                        @error('extseex_valor_financiacion_inter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Otras entidades</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="extseex_nombre_otra_entidad">Nombre entidad</label>
                        <input class="form-control @error('extseex_nombre_otra_entidad') is-invalid @enderror"
                            name="extseex_nombre_otra_entidad" id="extseex_nombre_otra_entidad"
                            value="{{ old('extseex_nombre_otra_entidad') }}" type="text"
                            autocomplete="extseex_nombre_otra_entidad" autofocus>
                        @error('extseex_nombre_otra_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extseex_id_sector_otra_entidad">Sector entidad</label>
                        <select class="form-control" name="extseex_id_sector_otra_entidad"
                            id="extseex_id_sector_otra_entidad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sectores as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->cose_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_sector_otra_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extseex_id_pais_otra_entidad">ID País entidad</label>
                        <input class="form-control @error('extseex_id_pais_otra_entidad') is-invalid @enderror"
                            name="extseex_id_pais_otra_entidad" id="extseex_id_pais_otra_entidad"
                            value="{{ old('extseex_id_pais_otra_entidad') }}" type="number"
                            autocomplete="extseex_id_pais_otra_entidad" autofocus>
                        @error('extseex_id_pais_otra_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Población condición</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_id_poblacion_condicion">Tipo población condición</label>
                        <select class="form-control" name="extseex_id_poblacion_condicion"
                            id="extseex_id_poblacion_condicion">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($poblacioncondicions as $poblacioncondicion)
                                <option value="{{ $poblacioncondicion->id }}">
                                    {{ $poblacioncondicion->copoco_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extseex_id_poblacion_condicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_cantidad_condicion">Cantidad población</label>
                        <input class="form-control @error('extseex_cantidad_condicion') is-invalid @enderror"
                            name="extseex_cantidad_condicion" id="extseex_cantidad_condicion"
                            value="{{ old('extseex_cantidad_condicion') }}" type="number"
                            autocomplete="extseex_cantidad_condicion" autofocus>
                        @error('extseex_cantidad_condicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cube"></i> Población grupo</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extseex_id_poblacion_grupo">Tipo población condición</label>
                        <select class="form-control" name="extseex_id_poblacion_grupo"
                            id="extseex_id_poblacion_grupo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($poblaciongrupos as $poblaciongrupo)
                                <option value="{{ $poblaciongrupo->id }}">{{ $poblaciongrupo->copogr_nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('extseex_id_poblacion_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extseex_cantidad_grupo">Cantidad población</label>
                        <input class="form-control @error('extseex_cantidad_grupo') is-invalid @enderror"
                            name="extseex_cantidad_grupo" id="extseex_cantidad_grupo"
                            value="{{ old('extseex_cantidad_grupo') }}" type="number"
                            autocomplete="extseex_cantidad_grupo" autofocus>
                        @error('extseex_cantidad_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="extseex_soporte">Evidencias (Formatos admitidos .zip o .rar)</label>
                        <input class="form-control @error('extseex_soporte') is-invalid @enderror"
                            name="extseex_soporte" id="extseex_soporte" value="{{ old('extseex_soporte') }}"
                            type="file" autocomplete="extseex_soporte" autofocus>
                        @error('extseex_soporte')
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
