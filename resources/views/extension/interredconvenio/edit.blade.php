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
            <form action="/extension/{{ $interredconvenio->id }}/actualizarinterredconvenio" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exsered_year">Año</label>
                        <input class="form-control @error('exsered_year') is-invalid @enderror" name="exsered_year"
                            id="exsered_year" value="{{ $interredconvenio->exsered_year }}" type="number"
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
                            id="exsered_periodo" value="{{ $interredconvenio->exsered_periodo }}" type="text"
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
                            id="exsered_ies" value="{{ $interredconvenio->exsered_ies }}" type="text"
                            autocomplete="exsered_ies" autofocus>
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
                            <option value="nacional"
                                {{ $interredconvenio->exsered_caracter == 'nacional' ? 'selected' : '' }}>Nacional
                            </option>
                            <option value="internacional"
                                {{ $interredconvenio->exsered_caracter == 'internacional' ? 'selected' : '' }}>
                                Internacional</option>
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
                            id="exsered_fecha" value="{{ $interredconvenio->exsered_fecha }}" type="date"
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
                            rows="10">{{ $interredconvenio->exsered_logros }}</textarea>
                        @error('exsered_logros')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_resultados">Resultado (s)</label>
                        <textarea class="form-control" name="exsered_resultados" id="exsered_resultados" cols="30"
                            rows="10">{{ $interredconvenio->exsered_resultados }}</textarea>
                        @error('exsered_resultados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exsered_productos">Producto (s)</label>
                        <textarea class="form-control" name="exsered_productos" id="exsered_productos" cols="30"
                            rows="10">{{ $interredconvenio->exsered_productos }}</textarea>
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
                            <option value="formacion"
                                {{ $interredconvenio->exsered_funcion == 'formacion' ? 'selected' : '' }}>Formación
                            </option>
                            <option value="investigacion"
                                {{ $interredconvenio->exsered_funcion == 'investigacion' ? 'selected' : '' }}>
                                Investigación</option>
                            <option value="extension"
                                {{ $interredconvenio->exsered_funcion == 'extension' ? 'selected' : '' }}>Extensión
                            </option>
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
                    @foreach ($participantes as $item)
                        <div class="row mb-3">
                            <div class="col-md-4"><input class="form-control mt-2" type="number"
                                    name="exseredpar_numero_identificacion[]"
                                    value="{{ $item->exseredpar_numero_identificacion }}" readonly />
                            </div>
                            <div class="col-md-4"><input class="form-control mt-2" type="text"
                                    name="exseredpar_nombre_participante[]" placeholder="Nombre completo"
                                    value="{{ $item->exseredpar_nombre_participante }}" />
                            </div>
                            <div class="col-md-4"><select class="form-select mt-2"
                                    name="exseredpar_rol_participante[]">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="estudiante"
                                        {{ $item->exseredpar_rol_participante == 'estudiante' ? 'selected' : '' }}>
                                        Estudiante</option>
                                    <option value="docente"
                                        {{ $item->exseredpar_rol_participante == 'docente' ? 'selected' : '' }}>Docente
                                    </option>
                                    <option value="administrativo"
                                        {{ $item->exseredpar_rol_participante == 'administrativo' ? 'selected' : '' }}>
                                        Administrativo</option>
                                    <option value="directivo"
                                        {{ $item->exseredpar_rol_participante == 'directivo' ? 'selected' : '' }}>
                                        Directivo</option>
                                    <option value="egresado"
                                        {{ $item->exseredpar_rol_participante == 'egresado' ? 'selected' : '' }}>
                                        Egresado</option>
                                </select>
                            </div>
                        </div>
                    @endforeach
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

@section('scripts')
<script src="/js/admin/add_input.js"></script>
@endsection
