@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/crearresultado">Crear</a> / <a href="/prueba/mostrarresultado">Resultado programa</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <h4><i class="fa fa-cube"></i> Registro resultado programa</h4>
            <hr>
            <form action="/prueba/registroresultado" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="prurepro_year">Año *</label>
                        <input class="form-control @error('prurepro_year') is-invalid @enderror" name="prurepro_year"
                            id="prurepro_year" value="{{ old('prurepro_year') }}" type="number"
                            autocomplete="prurepro_year" autofocus required>
                        @error('prurepro_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prurepromo_id_prueba_programa">Programa *</label>
                        <select class="form-control" name="prurepromo_id_prueba_programa"
                            id="prurepromo_id_prueba_programa" required>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}">
                                    {{ $programa->pro_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="prurepro_global_programa">Resultado global programa *</label>
                        <input class="form-control @error('prurepro_global_programa') is-invalid @enderror"
                            name="prurepro_global_programa" id="prurepro_global_programa"
                            value="{{ old('prurepro_global_programa') }}" type="number"
                            autocomplete="prurepro_global_programa" autofocus required>
                        @error('prurepro_global_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prurepro_global_institucion">Resultado global institución *</label>
                        <input class="form-control @error('prurepro_global_institucion') is-invalid @enderror"
                            name="prurepro_global_institucion" id="prurepro_global_institucion"
                            value="{{ old('prurepro_global_institucion') }}" type="number"
                            autocomplete="prurepro_global_institucion" autofocus required>
                        @error('prurepro_global_institucion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="prurepro_global_sede">Resultado global sede *</label>
                        <input class="form-control @error('prurepro_global_sede') is-invalid @enderror"
                            name="prurepro_global_sede" id="prurepro_global_sede"
                            value="{{ old('prurepro_global_sede') }}" type="number"
                            autocomplete="prurepro_global_sede" autofocus required>
                        @error('prurepro_global_sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prurepro_global_grupo_referencia">Resultado global grupo referencia *</label>
                        <input class="form-control @error('prurepro_global_grupo_referencia') is-invalid @enderror"
                            name="prurepro_global_grupo_referencia" id="prurepro_global_grupo_referencia"
                            value="{{ old('prurepro_global_grupo_referencia') }}" type="number"
                            autocomplete="prurepro_global_grupo_referencia" autofocus required>
                        @error('prurepro_global_grupo_referencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @foreach ($tiposmodulos as $tiposmodulo)
                    <h5>{{ $tiposmodulo->tipo_modulo_nombre }}</h5>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3 mb-3 d-none">
                            <input class="form-control @error('prureprono_id_modulo') is-invalid @enderror"
                                name="prureprono_id_modulo[]" id="prureprono_id_modulo"
                                value="{{ $tiposmodulo->id }}" type="hidden" autocomplete="prureprono_id_modulo"
                                autofocus readonly>
                            @error('prureprono_id_modulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prureprono_puntaje_programa">Programa *</label>
                            <input class="form-control @error('prureprono_puntaje_programa') is-invalid @enderror"
                                name="prureprono_puntaje_programa[]" id="prureprono_puntaje_programa"
                                value="{{ old('prureprono_puntaje_programa') }}" type="number"
                                autocomplete="prureprono_puntaje_programa" autofocus required>
                            @error('prureprono_puntaje_programa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prureprono_puntaje_institucion">Institución *</label>
                            <input class="form-control @error('prureprono_puntaje_institucion') is-invalid @enderror"
                                name="prureprono_puntaje_institucion[]" id="prureprono_puntaje_institucion"
                                value="{{ old('prureprono_puntaje_institucion') }}" type="number"
                                autocomplete="prureprono_puntaje_institucion" autofocus required>
                            @error('prureprono_puntaje_institucion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prureprono_puntaje_sede">Sede *</label>
                            <input class="form-control @error('prureprono_puntaje_sede') is-invalid @enderror"
                                name="prureprono_puntaje_sede[]" id="prureprono_puntaje_sede"
                                value="{{ old('prureprono_puntaje_sede') }}" type="number"
                                autocomplete="prureprono_puntaje_sede" autofocus required>
                            @error('prureprono_puntaje_sede')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prureprono_puntaje_grupo_referencia">Grupo referencia (NBC) *</label>
                            <input
                                class="form-control @error('prureprono_puntaje_grupo_referencia') is-invalid @enderror"
                                name="prureprono_puntaje_grupo_referencia[]" id="prureprono_puntaje_grupo_referencia"
                                value="{{ old('prureprono_puntaje_grupo_referencia') }}" type="number"
                                autocomplete="prureprono_puntaje_grupo_referencia" autofocus required>
                            @error('prureprono_puntaje_grupo_referencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
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
