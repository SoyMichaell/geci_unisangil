@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{$persona->id}}/crearcontrato">Crear</a> / <a href="/docente/{{$persona->id}}/mostrarcontrato">Contrato</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100 mx-auto">
            <h4 class="tile title"><i class="fab fa-wpforms"></i> Registro evaluación docente</h4>
            <form action="/docente/registrocontrato" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="doe_persona_docente" id="doe_persona_docente" value="{{$persona->id}}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doco_numero_contrato">{{ __('Número de contrato *') }}</label>
                        <input id="doco_numero_contrato" type="text" class="form-control @error('doco_numero_contrato') is-invalid @enderror"
                            name="doco_numero_contrato" value="{{ old('doco_numero_contrato') }}" autocomplete="doco_numero_contrato">
                        @error('doco_numero_contrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="doco_objeto_contrato">{{ __('Objeto contrato *') }}</label>
                        <textarea class="form-control" name="doco_objeto_contrato" id="doco_objeto_contrato" cols="30" rows="10"></textarea>
                        @error('doco_objeto_contrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doco_tipo_contrato">{{ __('Número de contrato *') }}</label>
                        <select class="form-select" name="doco_tipo_contrato" id="doco_tipo_contrato">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="ops">OPS</option>
                            <option value="nomina">Nomina</option>
                        </select>
                        @error('doco_tipo_contrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="doco_fecha_inicio">{{ __('Fecha inicio contrato *') }}</label>
                        <input id="doco_fecha_inicio" type="date" class="form-control @error('doco_fecha_inicio') is-invalid @enderror"
                            name="doco_fecha_inicio" value="{{ old('doco_fecha_inicio') }}" autocomplete="doco_fecha_inicio">
                        @error('doco_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="doco_fecha_fin">{{ __('Fecha fin contrato *') }}</label>
                        <input id="doco_fecha_fin" type="date" class="form-control @error('doco_fecha_fin') is-invalid @enderror"
                            name="doco_fecha_fin" value="{{ old('doco_fecha_fin') }}" autocomplete="doco_fecha_fin">
                        @error('doco_fecha_fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="doco_rol">{{ __('Rol *') }}</label>
                        <select class="form-select" name="doco_rol" id="doco_rol">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="director">Director</option>
                            <option value="docente-catedra">Docente catedra</option>
                            <option value="docente-tc">Docente TC</option>
                            <option value="jurado-tesis">Jurado de tesis</option>
                        </select>
                        @error('doco_rol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="doco_url_soporte">{{ __('Cargar contrato .pdf *') }}</label>
                        <input id="doco_url_soporte" type="file" class="form-control @error('doco_url_soporte') is-invalid @enderror"
                            name="doco_url_soporte" value="{{ old('doco_url_soporte') }}" autocomplete="doco_url_soporte">
                        @error('doco_url_soporte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="doco_estado">{{__('Estado de pago *')}}</label>
                        <select class="form-select" name="doco_estado" id="doco_estado">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="no-cancelado">No cancelado</option>
                        </select>
                        @error('doco_estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0 mt-2">
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
