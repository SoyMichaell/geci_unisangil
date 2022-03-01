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
            <form action="/extension/registroconsurecurso" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcor_year">Año</label>
                        <input class="form-control @error('extcor_year') is-invalid @enderror" name="extcor_year"
                            id="extcor_year" value="{{ old('extcor_year') }}" type="number"
                            autocomplete="extcor_year" autofocus>
                        @error('extcor_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcor_semestre">Semestre</label>
                        <input class="form-control @error('extcor_semestre') is-invalid @enderror"
                            name="extcor_semestre" id="extcor_semestre"
                            value="{{ old('extcor_semestre') }}" type="text"
                            autocomplete="extcor_semestre" autofocus>
                        @error('extcor_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcor_codigo_consultoria">Código consultoria</label>
                        <input class="form-control @error('extcor_codigo_consultoria') is-invalid @enderror"
                            name="extcor_codigo_consultoria" id="extcor_codigo_consultoria"
                            value="{{ old('extcor_codigo_consultoria') }}" type="text"
                            autocomplete="extcor_codigo_consultoria" autofocus>
                        @error('extcor_codigo_consultoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcor_tipo_documento">Tipo de documento</label>
                        <select class="form-select" name="extcor_tipo_documento" id="extcor_tipo_documento">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="DE">Documento de identidad extranjera</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="PS">Pasaporte</option>
                            <option value="CA">Certificado cabildo</option>
                        </select>
                        @error('extcor_tipo_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="extcor_numero_documento">Número de documento</label>
                        <input class="form-control @error('extcor_numero_documento') is-invalid @enderror"
                            name="extcor_numero_documento" id="extcor_numero_documento"
                            value="{{ old('extcor_numero_documento') }}" type="number"
                            autocomplete="extcor_numero_documento" autofocus>
                        @error('extcor_numero_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="extcor_id_nivel_estudio">Máximo nivel de estudio</label>
                        <select class="form-select" name="extcor_id_nivel_estudio" id="extcor_id_nivel_estudio">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($nivelestudios as $nivelestudio)
                                <option value="{{$nivelestudio->id}}">{{$nivelestudio->conies_nombre}}</option>
                            @endforeach
                        </select>
                        @error('extcor_id_nivel_estudio')
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
