@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/red/create">Crear</a> / <a href="/red">Redes acádemicas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Listado de registro redes académicas</p>
    @endsection
@endsection
@section('content')
    <div class="container col-md-12">
        <div class="tile">
            <h4><i class="fa fa-cubes"></i> Registro red acádemica</h4><hr>
            <form action="/red/" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_nombre">{{ __('Nombre red *') }}</label>
                        <input id="red_nombre" type="text"
                            class="form-control @error('red_nombre') is-invalid @enderror" name="red_nombre"
                            value="{{ old('red_nombre') }}" autocomplete="red_nombre" autofocus>
                        @error('red_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_nombre_contacto">{{ __('Nombre contacto *') }}</label>
                        <input id="red_nombre_contacto" type="text"
                            class="form-control @error('red_nombre_contacto') is-invalid @enderror" name="red_nombre_contacto"
                            value="{{ old('red_nombre_contacto') }}" autocomplete="red_nombre_contacto" autofocus>
                        @error('red_nombre_contacto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_telefono">{{ __('Telefono *') }}</label>
                        <input id="red_telefono" type="number"
                            class="form-control @error('red_telefono') is-invalid @enderror"
                            name="red_telefono" value="{{ old('red_telefono') }}"
                            autocomplete="red_telefono" autofocus>
                        @error('red_telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_pais">{{ __('País *') }}</label>
                        <input id="red_pais" type="text"
                            class="form-control @error('red_pais') is-invalid @enderror" name="red_pais"
                            value="{{ old('red_pais') }}" autocomplete="red_pais" autofocus>
                        @error('red_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_ciudad">{{ __('Ciudad *') }}</label>
                        <input id="red_ciudad" type="text"
                            class="form-control @error('red_ciudad') is-invalid @enderror" name="red_ciudad"
                            value="{{ old('red_ciudad') }}" autocomplete="red_ciudad" autofocus>
                        @error('red_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_alcance">{{ __('Alcance *') }}</label>
                        <select class="form-control @error('red_alcance') is-invalid @enderror" name="red_alcance"
                            id="red_alcance">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="regional">Regional</option>
                            <option value="nacional">Nacional</option>
                            <option value="internacional">Internacional</option>
                        </select>
                        @error('sof_tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_accion">{{ __('Acción red acádemica (Opcional)') }}</label>
                        <textarea class="form-control" name="red_accion" id="red_accion" cols="30" rows="10"></textarea>
                        @error('red_accion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_year">{{ __('Año de afiliación a la red *') }}</label>
                        <input id="red_year" type="number"
                            class="form-control @error('red_year') is-invalid @enderror" name="red_year"
                            value="{{ old('red_year') }}" autocomplete="red_year" autofocus>
                        @error('red_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-control js-example-placeholder-single @error('red_id_programa') is-invalid @enderror"
                            name="red_id_programa[]" id="red_id_programa" multiple="multiple">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->pro_nombre }}">{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        <p class="{{$programas->count()<=0 ? 'badge badge-danger' : ''}}">{{$programas->count()<=0 ? 'No existe registro de programas académicos' : ''}}</p>
                        @error('red_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_observacion">{{ __('Observaciones (Opcional)') }}</label>
                        <textarea class="form-control" name="red_observacion" id="red_observacion" cols="30" rows="10"></textarea>
                        @error('red_observacion')
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
