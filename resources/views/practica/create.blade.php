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
            <form action="/practica/" method="post">
                @csrf
                <div class="seccion1">
                    <h4>Información institución</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prac_year">Año</label>
                            <input class="form-control @error('prac_year') is-invalid @enderror" name="prac_year"
                                id="prac_year" value="{{ old('prac_year') }}" type="number" autocomplete="prac_year"
                                autofocus>
                            @error('prac_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prac_razon_social">Razón social</label>
                            <input class="form-control @error('prac_razon_social') is-invalid @enderror"
                                name="prac_razon_social" id="prac_razon_social" value="{{ old('prac_razon_social') }}"
                                type="text" autocomplete="prac_razon_social" autofocus>
                            @error('prac_razon_social')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prac_nit_empresa">Nit</label>
                            <input class="form-control @error('prac_nit_empresa') is-invalid @enderror"
                                name="prac_nit_empresa" id="prac_nit_empresa" value="{{ old('prac_nit_empresa') }}"
                                type="text" autocomplete="prac_nit_empresa" autofocus>
                            @error('prac_nit_empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prac_pais">País</label>
                            <input class="form-control @error('prac_pais') is-invalid @enderror" name="prac_pais"
                                id="prac_pais" value="{{ old('prac_pais') }}" type="text" autocomplete="prac_pais"
                                autofocus>
                            @error('prac_pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prac_departamento">Departamento</label>
                            <input class="form-control @error('prac_departamento') is-invalid @enderror"
                                name="prac_departamento" id="prac_departamento" value="{{ old('prac_departamento') }}"
                                type="text" autocomplete="prac_departamento" autofocus>
                            @error('prac_departamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prac_ciudad">Ciudad</label>
                            <input class="form-control @error('prac_ciudad') is-invalid @enderror" name="prac_ciudad"
                                id="prac_ciudad" value="{{ old('prac_ciudad') }}" type="text"
                                autocomplete="prac_ciudad" autofocus>
                            @error('prac_ciudad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prac_direccion">Dirección</label>
                            <input class="form-control @error('prac_direccion') is-invalid @enderror"
                                name="prac_direccion" id="prac_direccion" value="{{ old('prac_direccion') }}"
                                type="text" autocomplete="prac_direccion" autofocus>
                            @error('prac_direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prac_telefono">Telefono</label>
                            <input class="form-control @error('prac_telefono') is-invalid @enderror"
                                name="prac_telefono" id="prac_telefono" value="{{ old('prac_telefono') }}"
                                type="text" autocomplete="prac_telefono" autofocus>
                            @error('prac_telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="prac_url_web">Dirección web</label>
                            <input class="form-control @error('prac_url_web') is-invalid @enderror" name="prac_url_web"
                                id="prac_url_web" value="{{ old('prac_url_web') }}" type="text"
                                autocomplete="prac_url_web" autofocus>
                            @error('prac_url_web')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="prac_correo">Correo electronico</label>
                            <input class="form-control @error('prac_correo') is-invalid @enderror" name="prac_correo"
                                id="prac_correo" value="{{ old('prac_correo') }}" type="email"
                                autocomplete="prac_correo" autofocus>
                            @error('prac_correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="prac_area_practica">Area de practica</label>
                            <input class="form-control @error('prac_area_practica') is-invalid @enderror"
                                name="prac_area_practica" id="prac_area_practica"
                                value="{{ old('prac_area_practica') }}" type="text"
                                autocomplete="prac_area_practica" autofocus>
                            @error('prac_area_practica')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Información persona</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Tipo de persona</label>
                        <select class="form-select" name="tipo_persona" id="tipo_persona">
                            <option value="0">---- SELECCIONE ----</option>
                            <option value="1">Docente</option>
                            <option value="2">Estudiante</option>
                        </select>
                    </div>
                    <div class="col-md-4" id="docente">
                        <label for="">Docente</label>
                        <select class="form-select" name="prac_id_docente" id="prac_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">
                                    {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" id="estudiante">
                        <label for="">Estudiante</label>
                        <select class="form-select" name="prac_id_estudiante" id="prac_id_estudiante">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="prac_cargo">Cargo</label>
                        <input class="form-control @error('prac_cargo') is-invalid @enderror" name="prac_cargo"
                            id="prac_cargo" value="{{ old('prac_cargo') }}" type="text" autocomplete="prac_cargo"
                            autofocus>
                        @error('prac_cargo')
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

@section('scripts')
<script src="/js/divoculto.js"></script>
@endsection
