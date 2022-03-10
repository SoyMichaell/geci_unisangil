@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del trabajo de grado.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <form action="/extension/registrointerredconvenio" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exsered_year">Año</label>
                        <input class="form-control @error('exsered_year') is-invalid @enderror" name="exsered_year"
                            id="exsered_year" value="{{ old('exsered_year') }}" type="number"
                            autocomplete="exsered_year" autofocus>
                        @error('exsered_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exsered_periodo">Periodo</label>
                        <input class="form-control @error('exsered_periodo') is-invalid @enderror" name="exsered_periodo"
                            id="exsered_periodo" value="{{ old('exsered_periodo') }}" type="text"
                            autocomplete="exsered_periodo" autofocus>
                        @error('exsered_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exsered_ies">IES</label>
                        <input class="form-control @error('exsered_ies') is-invalid @enderror" name="exsered_ies"
                            id="exsered_ies" value="{{ old('exsered_ies') }}" type="text" autocomplete="exsered_ies"
                            autofocus>
                        @error('exsered_ies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_caracter">Cáracter</label>
                        <select class="form-select" name="exsered_caracter" id="exsered_caracter">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="nacional">Nacional</option>
                            <option value="internacional">Internacional</option>
                        </select>
                        @error('exsered_caracter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_fecha">Fecha</label>
                        <input class="form-control @error('exsered_fecha') is-invalid @enderror" name="exsered_fecha"
                            id="exsered_fecha" value="{{ old('exsered_fecha') }}" type="date"
                            autocomplete="exsered_fecha" autofocus>
                        @error('exsered_fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exsered_logros">Logro (s)</label>
                        <textarea class="form-control" name="exsered_logros" id="exsered_logros" cols="30"
                            rows="10"></textarea>
                        @error('exsered_logros')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_resultados">Resultado (s)</label>
                        <textarea class="form-control" name="exsered_resultados" id="exsered_resultados" cols="30"
                            rows="10"></textarea>
                        @error('exsered_resultados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_productos">Producto (s)</label>
                        <textarea class="form-control" name="exsered_productos" id="exsered_productos" cols="30"
                            rows="10"></textarea>
                        @error('exsered_productos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="exsered_funcion">Función</label>
                        <select class="form-select" name="exsered_funcion" id="exsered_funcion">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="formacion">Formación</option>
                            <option value="investigacion">Investigación</option>
                            <option value="extension">Extensión</option>
                        </select>
                        @error('exsered_funcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <h4 class="tile">Participante (s)</h4>
                <div class="row par_wrapper mb-3">
                    <div class="col-md-5">
                        <label for="exseredpar_nombre_participante">Nombre completo</label>
                        <input class="form-control @error('exseredpar_nombre_participante') is-invalid @enderror"
                            name="exseredpar_nombre_participante[]" id="exseredpar_nombre_participante"
                            value="{{ old('exseredpar_nombre_participante') }}" type="text"
                            autocomplete="exseredpar_nombre_participante" autofocus>
                        @error('exseredpar_nombre_participante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseredpar_rol_participante">Rol</label>
                        <select class="form-select" name="exseredpar_rol_participante[]"
                            id="exseredpar_rol_participante">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="directivo">Directivo</option>
                            <option value="egresado">Egresado</option>
                        </select>
                        @error('exseredpar_rol_participante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
