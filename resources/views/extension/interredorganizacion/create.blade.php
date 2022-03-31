@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/crearinterorganizacion">Crear</a> / <a href="/extension/mostrarinterorganizacion">Red organizaciones</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4>Registro red disciplinarias - organizaciones - asociaciones</h4><hr>
            <form action="/extension/registrointerorganizacion" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_year">Año *</label>
                        <input class="form-control @error('exseor_year') is-invalid @enderror" name="exseor_year"
                            id="exseor_year" value="{{ old('exseor_year') }}" type="number"
                            autocomplete="exsered_year" autofocus>
                        @error('exseor_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_periodo">Periodo *</label>
                        <input class="form-control @error('exseor_periodo') is-invalid @enderror" name="exseor_periodo"
                            id="exseor_periodo" value="{{ old('exseor_periodo') }}" type="text"
                            autocomplete="exseor_periodo" autofocus>
                        @error('exseor_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_tipo">Tipo *</label>
                        <select class="form-select @error('exseor_tipo') is-invalid @enderror" name="exseor_tipo" id="exseor_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="red">Red</option>
                            <option value="asociación">Asociación</option>
                            <option value="organización">Organización</option>
                        </select>
                        @error('exseor_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_nombre">Nombre *</label>
                        <input class="form-control @error('exseor_nombre') is-invalid @enderror" name="exseor_nombre"
                            id="exseor_nombre" value="{{ old('exseor_nombre') }}" type="text" autocomplete="exseor_nombre"
                            autofocus>
                        @error('exseor_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_caracter">Cáracter *</label>
                        <select class="form-select @error('exseor_caracter') is-invalid @enderror" name="exseor_caracter" id="exseor_caracter">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="nacional">Nacional</option>
                            <option value="internacional">Internacional</option>
                        </select>
                        @error('exseor_caracter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_fecha">Fecha</label>
                        <input class="form-control @error('exseor_fecha') is-invalid @enderror" name="exseor_fecha"
                            id="exseor_fecha" value="{{ old('exseor_fecha') }}" type="date"
                            autocomplete="exseor_fecha" autofocus>
                        @error('exseor_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_actividades">Actividad (s)</label>
                        <textarea class="form-control" name="exseor_actividades" id="exseor_actividades" cols="30"
                            rows="10"></textarea>
                        @error('exseor_actividades')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_logros">Logro (s)</label>
                        <textarea class="form-control" name="exseor_logros" id="exseor_logros" cols="30"
                            rows="10"></textarea>
                        @error('exseor_logros')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_resultados">Resultado (s)</label>
                        <textarea class="form-control" name="exseor_resultados" id="exseor_resultados" cols="30"
                            rows="10"></textarea>
                        @error('exseor_resultados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_productos">Producto (s)</label>
                        <textarea class="form-control" name="exseor_productos" id="exseor_productos" cols="30"
                            rows="10"></textarea>
                        @error('exseor_productos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exseor_funcion">Función</label>
                        <select class="form-select" name="exseor_funcion" id="exseor_funcion">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="formacion">Formación</option>
                            <option value="investigacion">Investigación</option>
                            <option value="extension">Extensión</option>
                        </select>
                        @error('exseor_funcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile">Participante (s)</h4>
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="cantidad">Cantidad de participantes</label>
                        <input class="form-control @error('cantidad') is-invalid @enderror"
                            name="cantidad" id="cantidad"
                            value="{{ old('cantidad') }}" type="number"
                            autocomplete="cantidad" autofocus>
                        @error('cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row par_wrapper mb-3">
                    <div class="col-md-1">
                        <a class="btn btn-success add_button" href="javascript:void(0);" 
                            title="Add field"><i class="fa-solid fa-circle-plus"></i></a>
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

@section('scripts')
<script src="/js/admin/add_input.js"></script>
@endsection
