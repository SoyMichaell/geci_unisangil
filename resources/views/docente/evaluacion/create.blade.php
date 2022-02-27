@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{$persona->id}}/crearevaluacion">Crear</a> / <a href="/docente/{{$persona->id}}/mostrarevaluacion">Evaluación</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100 mx-auto">
            <h4 class="tile title"><i class="fab fa-wpforms"></i> Registro evaluación docente</h4>
            <form action="/docente/registroevaluacion" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="doe_persona_docente" id="doe_persona_docente" value="{{$persona->id}}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doe_year">{{ __('Año *') }}</label>
                        <input id="doe_year" type="number" class="form-control @error('doe_year') is-invalid @enderror"
                            name="doe_year" value="{{ old('doe_year') }}" autocomplete="doe_year">
                        @error('doe_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="doe_semestre">{{ __('Semestre *') }}</label>
                        <select class="form-select @error('doe_semestre') is-invalid @enderror" name="doe_semestre"
                            id="doe_semestre">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        @error('doe_semestre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doe_cal_auto">{{ __('Calificación Autoevaluación *') }}</label>
                        <input id="doe_cal_auto" type="text"
                            class="form-control @error('doe_cal_auto') is-invalid @enderror" name="doe_cal_auto"
                            value="{{ old('doe_cal_auto') }}" autocomplete="doe_cal_auto">
                        @error('doe_cal_auto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="doe_cal_hete">{{ __('Calificación Heroevaluación *') }}</label>
                        <input id="doe_cal_hete" type="text"
                            class="form-control @error('doe_cal_hete') is-invalid @enderror" name="doe_cal_hete"
                            value="{{ old('doe_cal_hete') }}" autocomplete="doe_cal_hete">
                        @error('doe_cal_hete')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doe_cal_coe">{{ __('Calificación Coevaluación *') }}</label>
                        <input id="doe_cal_coe" type="text"
                            class="form-control @error('doe_cal_coe') is-invalid @enderror" name="doe_cal_coe"
                            value="{{ old('doe_cal_coe') }}" autocomplete="doe_cal_coe">
                        @error('doe_cal_coe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="doe_total_pro">{{ __('Total promedio *') }}</label>
                        <input id="doe_total_pro" type="text"
                            class="form-control @error('doe_total_pro') is-invalid @enderror" name="doe_total_pro"
                            value="{{ old('doe_total_pro') }}" autocomplete="doe_total_pro">
                        @error('doe_total_pro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doe_observacion">{{ __('Observación *') }}</label>
                        <textarea class="form-control @error('doe_total_pro') is-invalid @enderror"
                            name="doe_observacion" id="doe_observacion" cols="30" rows="10"></textarea>
                        @error('doe_observacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="doe_url_evaluacion">{{ __('Cargar .pdf de soporte evaluación docente *') }}</label>
                        <input id="doe_url_evaluacion" type="file"
                            class="form-control @error('doe_url_evaluacion') is-invalid @enderror"
                            name="doe_url_evaluacion" value="{{ old('doe_url_evaluacion') }}"
                            autocomplete="doe_url_evaluacion">
                        @error('doe_url_evaluacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0 mt-2">
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
