@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$proyectoextension->id}}/editarproyectoextension">Editar</a> / <a href="/extension/mostrarproyectoextension">Proyectos extensión</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4>Actualizar información</h4><hr>
            <form action="/extension/{{$proyectoextension->id}}/actualizarproyectoextension" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_year">Año *</label>
                        <input class="form-control @error('extprex_year') is-invalid @enderror" name="extprex_year"
                            id="extprex_year" value="{{$proyectoextension->extprex_year}}" type="number"
                            autocomplete="extprex_year" autofocus>
                        @error('extprex_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_semestre">Semestre *</label>
                        <input class="form-control @error('extprex_semestre') is-invalid @enderror"
                            name="extprex_semestre" id="extprex_semestre" value="{{$proyectoextension->extprex_semestre}}"
                            type="number" autocomplete="extprex_semestre" autofocus>
                        @error('extprex_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_codigo_organizacional">Código unidad organizacional *</label>
                        <input class="form-control @error('extprex_codigo_organizacional') is-invalid @enderror"
                            name="extprex_codigo_organizacional" id="extprex_codigo_organizacional"
                            value="{{$proyectoextension->extprex_codigo_organizacional}}" type="text"
                            autocomplete="extprex_codigo_organizacional" autofocus>
                        @error('extprex_codigo_organizacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_codigo_pr">Código proyecto *</label>
                        <input class="form-control @error('extprex_codigo_pr') is-invalid @enderror"
                            name="extprex_codigo_pr" id="extprex_codigo_pr" value="{{$proyectoextension->extprex_codigo_pr}}"
                            type="text" autocomplete="extprex_codigo_pr" autofocus>
                        @error('extprex_codigo_pr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_nombre_pr">Nombre proyecto *</label>
                        <input class="form-control @error('extprex_nombre_pr') is-invalid @enderror"
                            name="extprex_nombre_pr" id="extprex_nombre_pr" value="{{$proyectoextension->extprex_nombre_pr}}"
                            type="text" autocomplete="extprex_nombre_pr" autofocus>
                        @error('extprex_nombre_pr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_descripcion_pr">Descripción (Opcional)</label>
                        <textarea class="form-control" name="extprex_descripcion_pr" id="extprex_descripcion_pr"
                            cols="30" rows="10">{{$proyectoextension->extprex_descripcion_pr}}</textarea>
                        @error('extprex_descripcion_pr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_valor_pr">Valor proyecto (Opcional)</label>
                        <input class="form-control @error('extprex_valor_pr') is-invalid @enderror"
                            name="extprex_valor_pr" id="extprex_valor_pr" value="{{$proyectoextension->extprex_valor_pr}}"
                            type="text" autocomplete="extprex_valor_pr" autofocus>
                        @error('extprex_valor_pr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_id_area_extension">Área de extensión *</label>
                        <select class="form-control" name="extprex_id_area_extension" id="extprex_id_area_extension">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" {{$area->id == $proyectoextension->extprex_id_area_extension ? 'selected' : ''}}>{{ $area->coarex_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extedu_numero_horas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_fecha_inicio">Fecha inicio *</label>
                        <input class="form-control @error('extprex_fecha_inicio') is-invalid @enderror"
                            name="extprex_fecha_inicio" id="extprex_fecha_inicio"
                            value="{{$proyectoextension->extprex_fecha_inicio}}" type="date" autocomplete="extprex_fecha_inicio"
                            autofocus>
                        @error('extprex_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_fecha_final">Fecha final *</label>
                        <input class="form-control @error('extprex_fecha_final') is-invalid @enderror"
                            name="extprex_fecha_final" id="extprex_fecha_final"
                            value="{{$proyectoextension->extprex_fecha_final}}" type="date" autocomplete="extprex_fecha_final"
                            autofocus>
                        @error('extprex_fecha_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Datos contacto</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_nombre_contacto">Nombre (s) *</label>
                        <input class="form-control @error('extprex_nombre_contacto') is-invalid @enderror"
                            name="extprex_nombre_contacto" id="extprex_nombre_contacto"
                            value="{{$proyectoextension->extprex_nombre_contacto}}" type="text"
                            autocomplete="extprex_nombre_contacto" autofocus>
                        @error('extprex_nombre_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_apellido_contacto">Apellido (s) *</label>
                        <input class="form-control @error('extprex_apellido_contacto') is-invalid @enderror"
                            name="extprex_apellido_contacto" id="extprex_apellido_contacto"
                            value="{{$proyectoextension->extprex_apellido_contacto}}" type="text"
                            autocomplete="extprex_apellido_contacto" autofocus>
                        @error('extprex_apellido_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_telefono_contacto">Telefono *</label>
                        <input class="form-control @error('extprex_telefono_contacto') is-invalid @enderror"
                            name="extprex_telefono_contacto" id="extprex_telefono_contacto"
                            value="{{$proyectoextension->extprex_telefono_contacto}}" type="number"
                            autocomplete="extprex_telefono_contacto" autofocus>
                        @error('extprex_telefono_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_correo_contacto">Correo electronico *</label>
                        <input class="form-control @error('extprex_correo_contacto') is-invalid @enderror"
                            name="extprex_correo_contacto" id="extprex_correo_contacto"
                            value="{{$proyectoextension->extprex_correo_contacto}}" type="email"
                            autocomplete="extprex_correo_contacto" autofocus>
                        @error('extprex_correo_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_id_area_trabajo">Área de trabajo</label>
                        <select class="form-control" name="extprex_id_area_trabajo" id="extprex_id_area_trabajo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($areastrabajo as $trabajo)
                                <option value="{{ $trabajo->id }}" {{$trabajo->id == $proyectoextension->extprex_id_area_trabajo ? 'selected' : ''}}>{{ $trabajo->coartra_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_area_trabajo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_id_ciclo_vital">Ciclo vital</label>
                        <select class="form-control" name="extprex_id_ciclo_vital" id="extprex_id_ciclo_vital">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1" {{$proyectoextension->extprex_id_ciclo_vital == '1' ? 'selected' : ''}}>Primera infancia (0-5 años)</option>
                            <option value="2" {{$proyectoextension->extprex_id_ciclo_vital == '2' ? 'selected' : ''}}>Niñez (6-11 años)</option>
                            <option value="3" {{$proyectoextension->extprex_id_ciclo_vital == '3' ? 'selected' : ''}}>Jóvenes (12-26 años)</option>
                            <option value="4" {{$proyectoextension->extprex_id_ciclo_vital == '4' ? 'selected' : ''}}>Adultos (26-60 años)</option>
                            <option value="5" {{$proyectoextension->extprex_id_ciclo_vital == '5' ? 'selected' : ''}}>Adultos mayores (+60 años)</option>
                        </select>
                        @error('extprex_id_ciclo_vital')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Fuente nacional</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="extprex_id_entidad_nacional">Entidad nacional</label>
                        <select class="form-control" name="extprex_id_entidad_nacional"
                            id="extprex_id_entidad_nacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($entidadesnac as $entidadenac)
                                <option value="{{ $entidadenac->id }}" {{$entidadenac->id == $proyectoextension->extprex_id_entidad_nacional ? 'selected' : ''}}>{{ $entidadenac->coenna_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_entidad_nacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extprex_id_fuente_nacional">Fuente nacional</label>
                        <select class="form-control" name="extprex_id_fuente_nacional"
                            id="extprex_id_fuente_nacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($fuentenacionals as $nacional)
                                <option value="{{ $nacional->id }}" {{$nacional->id == $proyectoextension->extprex_id_fuente_nacional ? 'selected' : ''}}>{{ $nacional->cofuna_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_fuente_nacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extprex_valor_financiacion_nac">Valor financiación</label>
                        <input class="form-control @error('extprex_valor_financiacion_nac') is-invalid @enderror"
                            name="extprex_valor_financiacion_nac" id="extprex_valor_financiacion_nac"
                            value="{{$proyectoextension->extprex_valor_financiacion_nac}}" type="number"
                            autocomplete="extprex_valor_financiacion_nac" autofocus>
                        @error('extprex_valor_financiacion_nac')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Fuente internacional</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_id_fuente_internacional">Fuente internacional</label>
                        <select class="form-control" name="extprex_id_fuente_internacional"
                            id="extprex_id_fuente_internacional">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($entidadesinter as $entidadinter)
                                <option value="{{ $entidadinter->id }}" {{$entidadinter->id == $proyectoextension->extprex_id_fuente_internacional ? 'selected' : ''}}>{{ $entidadinter->cofuin_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_fuente_internacional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_id_pais">País financiador (Si la fuente seleccionada es organismo multilateral se debe registrar 0)</label>
                        <input class="form-control @error('extprex_id_pais') is-invalid @enderror"
                            name="extprex_id_pais" id="extprex_id_pais"
                            value="{{$proyectoextension->extprex_id_pais}}" type="number"
                            autocomplete="extprex_id_pais" autofocus>
                        @error('extprex_id_pais')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_nombre_institucion_inter">Nombre institución</label>
                        <input class="form-control @error('extprex_nombre_institucion_inter') is-invalid @enderror"
                            name="extprex_nombre_institucion_inter" id="extprex_nombre_institucion_inter"
                            value="{{$proyectoextension->extprex_nombre_institucion_inter}}" type="text"
                            autocomplete="extprex_nombre_institucion_inter" autofocus>
                        @error('extprex_nombre_institucion_inter')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_valor_financiacion_inter">Valor financiación internacional</label>
                        <input class="form-control @error('extprex_valor_financiacion_inter') is-invalid @enderror"
                            name="extprex_valor_financiacion_inter" id="extprex_valor_financiacion_inter"
                            value="{{$proyectoextension->extprex_valor_financiacion_inter}}" type="number"
                            autocomplete="extprex_valor_financiacion_inter" autofocus>
                        @error('extprex_valor_financiacion_inter')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Otras entidades</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="extprex_nombre_otra_entidad">Nombre entidad</label>
                        <input class="form-control @error('extprex_nombre_otra_entidad') is-invalid @enderror"
                            name="extprex_nombre_otra_entidad" id="extprex_nombre_otra_entidad"
                            value="{{$proyectoextension->extprex_nombre_otra_entidad}}" type="text"
                            autocomplete="extprex_nombre_otra_entidad" autofocus>
                        @error('extprex_nombre_otra_entidad')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extprex_id_sector_otra_entidad">Sector entidad</label>
                        <select class="form-control" name="extprex_id_sector_otra_entidad"
                            id="extprex_id_sector_otra_entidad">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($sectores as $sector)
                                <option value="{{ $sector->id }}" {{$sector->id == $proyectoextension->extprex_id_sector_otra_entidad ? 'selected' : ''}}>{{ $sector->cose_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_sector_otra_entidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="extprex_id_pais_otra_entidad">ID País entidad</label>
                        <input class="form-control @error('extprex_id_pais_otra_entidad') is-invalid @enderror"
                            name="extprex_id_pais_otra_entidad" id="extprex_id_pais_otra_entidad"
                            value="{{$proyectoextension->extprex_id_pais_otra_entidad}}" type="number"
                            autocomplete="extprex_id_pais_otra_entidad" autofocus>
                        @error('extprex_id_pais_otra_entidad')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Población condición</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_id_poblacion_condicion">Tipo población condición</label>
                        <select class="form-control" name="extprex_id_poblacion_condicion"
                            id="extprex_id_poblacion_condicion">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($poblacioncondicions as $poblacioncondicion)
                                <option value="{{ $poblacioncondicion->id }}" {{$poblacioncondicion->id == $proyectoextension->extprex_id_poblacion_condicion ? 'selected' : ''}}>{{ $poblacioncondicion->copoco_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_poblacion_condicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_cantidad_condicion">Cantidad población</label>
                        <input class="form-control @error('extprex_cantidad_condicion') is-invalid @enderror"
                            name="extprex_cantidad_condicion" id="extprex_cantidad_condicion"
                            value="{{$proyectoextension->extprex_cantidad_condicion}}" type="number"
                            autocomplete="extprex_cantidad_condicion" autofocus>
                        @error('extprex_cantidad_condicion')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile"><i class="fa fa-cubes"></i> Población grupo</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extprex_id_poblacion_grupo">Tipo población condición</label>
                        <select class="form-control" name="extprex_id_poblacion_grupo"
                            id="extprex_id_poblacion_grupo">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($poblaciongrupos as $poblaciongrupo)
                                <option value="{{ $poblaciongrupo->id }}" {{$poblaciongrupo->id == $proyectoextension->extprex_id_poblacion_grupo ? 'selected' : ''}}>{{ $poblaciongrupo->copogr_nombre }}</option>
                            @endforeach
                        </select>
                        @error('extprex_id_poblacion_grupo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extprex_cantidad_grupo">Cantidad población</label>
                        <input class="form-control @error('extprex_cantidad_grupo') is-invalid @enderror"
                            name="extprex_cantidad_grupo" id="extprex_cantidad_grupo"
                            value="{{$proyectoextension->extprex_cantidad_grupo}}" type="number"
                            autocomplete="extprex_cantidad_grupo" autofocus>
                        @error('extprex_cantidad_grupo')
                            <span extprex_semestre="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="extprex_soporte">Evidencias (Formatos admitidos .zip o .rar)</label>
                        <input class="form-control @error('extprex_soporte') is-invalid @enderror"
                            name="extprex_soporte" id="extprex_soporte"
                            value="{{ old('extprex_soporte') }}" type="file"
                            autocomplete="extprex_soporte" autofocus>
                        <p><small>Soporte: <a href="{{asset('datos/extension-internacionalizacion/proyecto/'.$proyectoextension->extprex_soporte)}}">{{$proyectoextension->extprex_soporte}}</a></small></p>
                        @error('extprex_soporte')
                            <span extprex_semestre="invalid-feedback" role="alert">
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
