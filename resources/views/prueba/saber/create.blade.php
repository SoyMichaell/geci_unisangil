@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/prueba/crearsaber">Crear</a> / <a href="/prueba/mostrarsaber">Saber 11</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro pruebas saber 11</h4>
            <hr>
            <form action="/prueba/registrosaber" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="prueba_saber_id_estudiante">Estudiante *</label>
                        <select class="form-control js-example-placeholder-single" name="prueba_saber_id_estudiante" id="prueba_saber_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prueba_saber_year">Año *</label>
                        <input class="form-control @error('prueba_saber_year') is-invalid @enderror"
                            name="prueba_saber_year" id="prueba_saber_year" value="{{ old('prueba_saber_year') }}"
                            type="number" autocomplete="prueba_saber_year" autofocus required>
                        @error('prueba_saber_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="prueba_saber_periodo">Periodo *</label>
                        <input class="form-control @error('prueba_saber_periodo') is-invalid @enderror"
                            name="prueba_saber_periodo" id="prueba_saber_periodo"
                            value="{{ old('prueba_saber_periodo') }}" type="text" autocomplete="prueba_saber_periodo"
                            autofocus required>
                        @error('prueba_saber_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @foreach ($tiposmodulos as $tiposmodulo)
                        <div class="col-md-6 mb-3">
                            <input class="form-control @error('prsamo_id_modulo') is-invalid @enderror"
                                name="prsamo_id_modulo[]" id="prsamo_id_modulo" value="{{ $tiposmodulo->id }}"
                                type="hidden" autocomplete="prsamo_id_modulo" autofocus readonly>
                            @error('prsamo_id_modulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prsamo_id_modulo">{{ $tiposmodulo->tipo_modulo_nombre }}</label> | <label for="prsamo_puntaje">Puntaje *</label>
                            <input class="form-control @error('prsamo_puntaje') is-invalid @enderror"
                                name="prsamo_puntaje[]" id="prsamo_puntaje" value="{{ old('prsamo_puntaje') }}"
                                type="number" autocomplete="prsamo_puntaje" autofocus required>
                            @error('prsamo_puntaje')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endforeach
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
