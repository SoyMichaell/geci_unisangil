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
            <form action="/convenio/" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_numero">{{ __('No. convenio *') }}</label>
                        <input id="con_numero" type="text" class="form-control @error('con_numero') is-invalid @enderror"
                            name="con_numero" value="{{ old('con_numero') }}" autocomplete="con_numero" autofocus>
                        @error('con_numero')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_alcance">{{ __('Alcance *') }}</label>
                        <select class="form-select" name="con_alcance" id="con_alcance">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="regional">Regional</option>
                            <option value="nacional">Nacional</option>
                            <option value="internacional">Internacional</option>
                        </select>
                        @error('con_alcance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_tipo">{{ __('Tipo de convenio *') }}</label>
                        <input id="con_tipo" type="text" class="form-control @error('con_tipo') is-invalid @enderror"
                            name="con_tipo" value="{{ old('con_tipo') }}" autocomplete="con_tipo" autofocus>
                        @error('con_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="con_institucion">{{ __('Institución con la cual se celebró el convenio *') }}</label>
                        <input id="con_institucion" type="text"
                            class="form-control @error('con_institucion') is-invalid @enderror" name="con_institucion"
                            value="{{ old('con_institucion') }}" autocomplete="con_institucion" autofocus>
                        @error('con_institucion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_nit">{{ __('Nit *') }}</label>
                        <input id="con_nit" type="text" class="form-control @error('con_nit') is-invalid @enderror"
                            name="con_nit" value="{{ old('con_nit') }}" autocomplete="con_nit" autofocus>
                        @error('con_nit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_direccion">{{ __('Dirección *') }}</label>
                        <input id="con_direccion" type="text"
                            class="form-control @error('con_direccion') is-invalid @enderror" name="con_direccion"
                            value="{{ old('con_direccion') }}" autocomplete="con_direccion" autofocus>
                        @error('con_direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_pais">{{ __('País *') }}</label>
                        <input id="con_pais" type="text" class="form-control @error('con_pais') is-invalid @enderror"
                            name="con_pais" value="{{ old('con_pais') }}" autocomplete="con_pais" autofocus>
                        @error('con_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_ciudad">{{ __('Ciudad *') }}</label>
                        <input id="con_ciudad" type="text"
                            class="form-control @error('con_ciudad') is-invalid @enderror" name="con_ciudad"
                            value="{{ old('con_ciudad') }}" autocomplete="con_ciudad" autofocus>
                        @error('con_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_contacto">{{ __('Nombre contacto *') }}</label>
                        <input id="con_contacto" type="text"
                            class="form-control @error('con_contacto') is-invalid @enderror" name="con_contacto"
                            value="{{ old('con_contacto') }}" autocomplete="con_contacto" autofocus>
                        @error('con_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_correo">{{ __('Correo electronico *') }}</label>
                        <input id="con_correo" type="email"
                            class="form-control @error('con_correo') is-invalid @enderror" name="con_correo"
                            value="{{ old('con_correo') }}" autocomplete="con_correo" autofocus>
                        @error('con_correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_telefono">{{ __('Telefono *') }}</label>
                        <input id="con_telefono" type="text"
                            class="form-control @error('con_telefono') is-invalid @enderror" name="con_telefono"
                            value="{{ old('con_telefono') }}" autocomplete="con_telefono" autofocus>
                        @error('con_telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_objeto">{{ __('Objeto *') }}</label>
                        <textarea class="form-control @error('con_objeto') is-invalid @enderror" name="con_objeto" id="con_objeto" cols="30" rows="10"></textarea>
                        @error('con_objeto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_logro_resultado">{{ __('Logros o Resultados *') }}</label>
                        <textarea class="form-control @error('con_logro_resultado') is-invalid @enderror" name="con_logro_resultado" id="con_logro_resultado" cols="30" rows="10"></textarea>
                        @error('con_logro_resultado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_vigencia">{{ __('Vigencia *') }}</label>
                        <input id="con_vigencia" type="text"
                            class="form-control @error('con_vigencia') is-invalid @enderror" name="con_vigencia"
                            value="{{ old('con_vigencia') }}" autocomplete="con_vigencia" autofocus>
                        @error('con_vigencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_programa_beneficiado">{{ __('Programa Beneficiarios *') }}</label>
                        <select class="js-example-placeholder-single form-select @error('con_programa_beneficiado') is-invalid @enderror" name="con_programa_beneficiado[]" id="con_programa_beneficiado" multiple>
                            @foreach ($programas as $programa)
                                <option value="{{$programa->pro_nombre}}">{{$programa->pro_nombre}}</option>
                            @endforeach
                        </select>
                        @error('con_logro_resultado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_actividad_year_programa">{{ __('Actividad o actividades separar por ;*') }}</label>
                        <textarea class="form-control @error('con_actividad_year_programa') is-invalid @enderror" name="con_actividad_year_programa" id="con_actividad_year_programa" cols="30" rows="10"></textarea>
                        @error('con_actividad_year_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="con_fecha_inicio">{{ __('Fecha inicio *') }}</label>
                        <input id="con_fecha_inicio" type="date"
                            class="form-control @error('con_fecha_inicio') is-invalid @enderror" name="con_fecha_inicio"
                            value="{{ old('con_fecha_inicio') }}" autocomplete="con_fecha_inicio" autofocus>
                        @error('con_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="con_fecha_final">{{ __('Fecha final *') }}</label>
                        <input id="con_fecha_final" type="date"
                            class="form-control @error('con_fecha_final') is-invalid @enderror" name="con_fecha_final"
                            value="{{ old('con_fecha_final') }}" autocomplete="con_fecha_final" autofocus>
                        @error('con_fecha_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="con_observacion">{{ __('Observaciones ') }}</label>
                        <textarea class="form-control @error('con_observacion') is-invalid @enderror" name="con_observacion" id="con_observacion" cols="30" rows="10"></textarea>
                        @error('con_observacion')
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
