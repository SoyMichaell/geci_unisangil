@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/red/create">Crear</a> / <a href="/red">Redes acádemicas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligencie los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container col-md-12">
        <div class="tile">
            <h4 class="titulo"><i class="fab fa-wpforms"></i> Actualizar información</h4>
            <hr>
            <form action="/red/{{$red->id}}/" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="red_nombre">{{ __('Nombre red *') }}</label>
                        <input id="red_nombre" type="text" class="form-control @error('red_nombre') is-invalid @enderror"
                            name="red_nombre" value="{{$red->red_nombre}}" autocomplete="red_nombre" autofocus>
                        @error('red_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_nombre_contacto">{{ __('Nombre contacto *') }}</label>
                        <input id="red_nombre_contacto" type="text"
                            class="form-control @error('red_nombre_contacto') is-invalid @enderror"
                            name="red_nombre_contacto" value="{{$red->red_nombre_contacto}}"
                            autocomplete="red_nombre_contacto" autofocus>
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
                            class="form-control @error('red_telefono') is-invalid @enderror" name="red_telefono"
                            value="{{$red->red_telefono}}" autocomplete="red_telefono" autofocus>
                        @error('red_telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_pais">{{ __('País *') }}</label>
                        <input id="red_pais" type="text" class="form-control @error('red_pais') is-invalid @enderror"
                            name="red_pais" value="{{$red->red_pais}}" autocomplete="red_pais" autofocus>
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
                            value="{{$red->red_ciudad}}" autocomplete="red_ciudad" autofocus>
                        @error('red_ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_alcance">{{ __('Alcance *') }}</label>
                        <select class="form-select @error('red_alcance') is-invalid @enderror" name="red_alcance"
                            id="red_alcance">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="regional" {{$red->red_alcance == 'regional' ? 'selected' : ''}}>Regional</option>
                            <option value="nacional" {{$red->red_alcance == 'nacional' ? 'selected' : ''}}>Nacional</option>
                            <option value="internacional" {{$red->red_alcance == 'internacional' ? 'selected' : ''}}>Internacional</option>
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
                        <label for="red_accion">{{ __('Acción red acádemica *') }}</label>
                        <textarea class="form-control" name="red_accion" id="red_accion" cols="30"
                            rows="10">{{$red->red_accion}}</textarea>
                        @error('red_accion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_year">{{ __('Año de afiliación a la red *') }}</label>
                        <input id="red_year" type="number" class="form-control @error('red_year') is-invalid @enderror"
                            name="red_year" value="{{$red->red_year}}" autocomplete="red_year" autofocus>
                        @error('red_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        @php
                            $programax = explode(';',$red->red_id_programa);
                        @endphp
                        <label for="red_id_programa">{{ __('Programa *') }}</label>
                        <select class="form-select js-example-placeholder-single @error('red_id_programa') is-invalid @enderror"
                            name="red_id_programa[]" id="red_id_programa" multiple="multiple">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->pro_nombre }}" @foreach($programax as $x) {{$programa->pro_nombre == $x ? 'selected' : ''}} @endforeach>{{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                        @error('red_id_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="red_observacion">{{ __('Observaciones *') }}</label>
                        <textarea class="form-control" name="red_observacion" id="red_observacion" cols="30"
                            rows="10">{{$red->red_observacion}}</textarea>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
