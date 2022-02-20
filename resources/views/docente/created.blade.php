@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="informacion-tab" data-bs-toggle="tab" data-bs-target="#informacion" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="estudio-tab" data-bs-toggle="tab" data-bs-target="#estudio"
                    type="button" role="tab" aria-controls="estudio" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3 tile" id="informacion" role="tabpanel" aria-labelledby="informacion-tab">
                <form action="" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ciudad_procedencia">{{ __('Ciudad de procedencia *') }}</label>
                            <input id="ciudad_procedencia" type="text"
                                class="form-control @error('ciudad_procedencia') is-invalid @enderror"
                                name="ciudad_procedencia" value="{{ old('ciudad_procedencia') }}"
                                autocomplete="ciudad_procedencia" autofocus>
                            @error('ciudad_procedencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="correo_personal">{{ __('Correo personal *') }}</label>
                            <input id="correo_personal" type="email"
                                class="form-control @error('correo_personal') is-invalid @enderror"
                                name="correo_personal" value="{{ old('correo_personal') }}"
                                autocomplete="correo_personal" autofocus>
                            @error('correo_personal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dedicacion">{{ __('Dedicación *') }}</label>
                            <select class="form-select" name="dedicacion" id="dedicacion">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($dedicacions as $dedicacion)
                                    <option value="{{ $dedicacion }}">{{ $dedicacion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_contratacion">{{ __('Tipo de contratación *') }}</label>
                            <select class="form-select" name="tipo_contratacion" id="tipo_contratacion">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($tiposcontratacions as $contratacion)
                                    <option value="{{ $contratacion }}">{{ $contratacion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_vinculacion">{{ __('Fecha vinculación *') }}</label>
                            <input id="fecha_vinculacion" type="date"
                                class="form-control @error('fecha_vinculacion') is-invalid @enderror"
                                name="fecha_vinculacion" value="{{ old('fecha_vinculacion') }}"
                                autocomplete="fecha_vinculacion" autofocus>
                            @error('fecha_vinculacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="eps">{{ __('EPS afiliado *') }}</label>
                            <input id="eps" type="text" class="form-control @error('eps') is-invalid @enderror"
                                name="eps" value="{{ old('eps') }}" autocomplete="eps" autofocus>
                            @error('eps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="riesgo">{{ __('Riesgo *') }}</label>
                            <input id="riesgo" type="text" class="form-control @error('riesgo') is-invalid @enderror"
                                name="riesgo" value="{{ old('riesgo') }}" autocomplete="riesgo" autofocus>
                            @error('riesgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="caja_compensacion">{{ __('Caja de compensación *') }}</label>
                            <input id="caja_compensacion" type="text"
                                class="form-control @error('caja_compensacion') is-invalid @enderror"
                                name="caja_compensacion" value="{{ old('caja_compensacion') }}"
                                autocomplete="caja_compensacion" autofocus>
                            @error('caja_compensacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="banco">{{ __('Banco *') }}</label>
                            <input id="banco" type="text" class="form-control @error('banco') is-invalid @enderror"
                                name="banco" value="{{ old('banco') }}" autocomplete="banco" autofocus>
                            @error('banco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="no_cuenta">{{ __('Número de cuenta *') }}</label>
                            <input id="no_cuenta" type="text"
                                class="form-control @error('no_cuenta') is-invalid @enderror" name="no_cuenta"
                                value="{{ old('no_cuenta') }}" autocomplete="no_cuenta" autofocus>
                            @error('no_cuenta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pension">{{ __('Pension *') }}</label>
                            <input id="pension" type="text" class="form-control @error('pension') is-invalid @enderror"
                                name="pension" value="{{ old('pension') }}" autocomplete="pension" autofocus>
                            @error('pension')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="estado">{{ __('Estado *') }}</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade p-3 tile" id="estudio" role="tabpanel" aria-labelledby="estudio-tab">Estudio</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    @endsection
@endif
