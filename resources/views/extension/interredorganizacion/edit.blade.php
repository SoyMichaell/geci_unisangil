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
            <form action="/extension/{{$interredorganizacion->id}}/actualizarinterorganizacion" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exseor_year">Año</label>
                        <input class="form-control @error('exseor_year') is-invalid @enderror" name="exseor_year"
                            id="exseor_year" value="{{$interredorganizacion->exseor_year}}" type="number"
                            autocomplete="exsered_year" autofocus>
                        @error('exseor_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_periodo">Periodo</label>
                        <input class="form-control @error('exseor_periodo') is-invalid @enderror" name="exseor_periodo"
                            id="exseor_periodo" value="{{$interredorganizacion->exseor_periodo}}" type="text"
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
                        <label for="exseor_tipo">Tipo</label>
                        <select class="form-select" name="exseor_tipo" id="exseor_tipo">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="red" {{$interredorganizacion->exseor_tipo == 'red' ? 'selected': ''}}>Red</option>
                            <option value="asociación" {{$interredorganizacion->exseor_tipo == 'asociación' ? 'selected': ''}}>Asociación</option>
                            <option value="organización" {{$interredorganizacion->exseor_tipo == 'organización' ? 'selected': ''}}>Organización</option>
                        </select>
                        @error('exseor_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_nombre">Nombre</label>
                        <input class="form-control @error('exseor_nombre') is-invalid @enderror" name="exseor_nombre"
                            id="exseor_nombre" value="{{$interredorganizacion->exseor_nombre}}" type="text" autocomplete="exseor_nombre"
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
                        <label for="exseor_caracter">Cáracter</label>
                        <select class="form-select" name="exseor_caracter" id="exseor_caracter">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="nacional" {{$interredorganizacion->exseor_caracter == 'nacional' ? 'selected': ''}}>Nacional</option>
                            <option value="internacional" {{$interredorganizacion->exseor_caracter == 'internacional' ? 'selected': ''}}>Internacional</option>
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
                            id="exseor_fecha" value="{{$interredorganizacion->exseor_fecha}}" type="date"
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
                            rows="10">{{$interredorganizacion->exseor_actividades}}</textarea>
                        @error('exseor_actividades')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_logros">Logro (s)</label>
                        <textarea class="form-control" name="exseor_logros" id="exseor_logros" cols="30"
                            rows="10">{{$interredorganizacion->exseor_logros}}</textarea>
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
                            rows="10">{{$interredorganizacion->exseor_resultados}}</textarea>
                        @error('exseor_resultados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exseor_productos">Producto (s)</label>
                        <textarea class="form-control" name="exseor_productos" id="exseor_productos" cols="30"
                            rows="10">{{$interredorganizacion->exseor_productos}}</textarea>
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
                            <option value="formacion" {{$interredorganizacion->exseor_funcion == 'formacion' ? 'selected': ''}}>Formación</option>
                            <option value="investigacion" {{$interredorganizacion->exseor_funcion == 'investigacion' ? 'selected': ''}}>Investigación</option>
                            <option value="extension" {{$interredorganizacion->exseor_funcion == 'extension' ? 'selected': ''}}>Extensión</option>
                        </select>
                        @error('exseor_funcion')
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
                                    name="exseorpar_numero_identificacion[]"
                                    value="{{ $item->exseorpar_numero_identificacion }}" readonly />
                            </div>
                            <div class="col-md-4"><input class="form-control mt-2" type="text"
                                    name="exseorpar_nombre_completo[]" placeholder="Nombre completo"
                                    value="{{ $item->exseorpar_nombre_completo }}" />
                            </div>
                            <div class="col-md-4"><select class="form-select mt-2"
                                    name="exseorpar_rol[]">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="estudiante"
                                        {{ $item->exseorpar_rol == 'estudiante' ? 'selected' : '' }}>
                                        Estudiante</option>
                                    <option value="docente"
                                        {{ $item->exseorpar_rol == 'docente' ? 'selected' : '' }}>Docente
                                    </option>
                                    <option value="administrativo"
                                        {{ $item->exseorpar_rol == 'administrativo' ? 'selected' : '' }}>
                                        Administrativo</option>
                                    <option value="directivo"
                                        {{ $item->exseorpar_rol == 'directivo' ? 'selected' : '' }}>
                                        Directivo</option>
                                    <option value="egresado"
                                        {{ $item->exseorpar_rol == 'egresado' ? 'selected' : '' }}>
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
