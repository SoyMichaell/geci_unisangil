@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del estudiante.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title"><i class="fas fa-plus-square"></i> Registro estudiante</h4>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="esture_year">{{ __('Año *') }}</label>
                    <input id="esture_year" type="number" class="form-control @error('esture_year') is-invalid @enderror"
                        name="esture_year" value="{{ $general->esture_year }}" autocomplete="esture_year" autofocus
                        disabled>
                    @error('esture_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_id_programa">{{ __('Programa *') }}</label>
                    <select class="form-select" name="esture_id_programa" id="esture_id_programa" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($programas as $programa)
                            <option value="{{ $programa->id }}"
                                {{ $programa->id == $general->esture_id_programa ? 'selected' : '' }}>
                                {{ $programa->pro_nombre }}</option>
                        @endforeach
                    </select>
                    @error('esture_id_programa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_periodo">{{ __('Periodo *') }}</label>
                    <input id="esture_periodo" type="text"
                        class="form-control @error('esture_periodo') is-invalid @enderror" name="esture_periodo"
                        value="{{ $general->esture_periodo }}" autocomplete="esture_periodo" autofocus disabled>
                    @error('esture_periodo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="esture_inscritos">{{ __('Inscritos *') }}</label>
                    <input id="esture_inscritos" type="number"
                        class="form-control @error('esture_inscritos') is-invalid @enderror" name="esture_inscritos"
                        value="{{ $general->esture_inscritos }}" autocomplete="esture_inscritos" autofocus disabled>
                    @error('esture_inscritos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_admitidos">{{ __('Admitidos *') }}</label>
                    <input id="esture_admitidos" type="number"
                        class="form-control @error('esture_admitidos') is-invalid @enderror" name="esture_admitidos"
                        value="{{ $general->esture_admitidos }}" autocomplete="esture_admitidos" autofocus disabled>
                    @error('esture_admitidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_mat_antiguos">{{ __('Matriculados antiguos *') }}</label>
                    <input id="esture_mat_antiguos" type="number"
                        class="form-control @error('esture_mat_antiguos') is-invalid @enderror"
                        name="esture_mat_antiguos" value="{{ $general->esture_mat_antiguos }}"
                        autocomplete="esture_mat_antiguos" autofocus disabled>
                    @error('esture_mat_antiguos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="esture_mat_primer_semestre">{{ __('Matriculados primer semestre *') }}</label>
                    <input id="esture_mat_primer_semestre" type="number"
                        class="form-control @error('esture_mat_primer_semestre') is-invalid @enderror"
                        name="esture_mat_primer_semestre" value="{{ $general->esture_mat_primer_semestre }}"
                        autocomplete="esture_mat_primer_semestre" autofocus disabled>
                    @error('esture_mat_primer_semestre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_mat_total">{{ __('Matriculados total *') }}</label>
                    <input id="esture_mat_total" type="number"
                        class="form-control @error('esture_mat_total') is-invalid @enderror" name="esture_mat_total"
                        value="{{ $general->esture_mat_total }}" autocomplete="esture_mat_total" autofocus disabled>
                    @error('esture_mat_total')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_egresado_no_graduado">{{ __('Egresados no graduados *') }}</label>
                    <input id="esture_egresado_no_graduado" type="number"
                        class="form-control @error('esture_egresado_no_graduado') is-invalid @enderror"
                        name="esture_egresado_no_graduado" value="{{ $general->esture_egresado_no_graduado }}"
                        autocomplete="esture_egresado_no_graduado" autofocus disabled>
                    @error('esture_egresado_no_graduado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="esture_graduados">{{ __('Graduados *') }}</label>
                    <input id="esture_graduados" type="number"
                        class="form-control @error('esture_graduados') is-invalid @enderror" name="esture_graduados"
                        value="{{ $general->esture_graduados }}" autocomplete="esture_graduados" autofocus disabled>
                    @error('esture_graduados')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_retirados">{{ __('Retirados *') }}</label>
                    <input id="esture_retirados" type="number"
                        class="form-control @error('esture_retirados') is-invalid @enderror" name="esture_retirados"
                        value="{{ $general->esture_retirados }}" autocomplete="esture_retirados" autofocus disabled>
                    @error('esture_retirados')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_tasa_desercion">{{ __('Tasa de deserción *') }}</label>
                    <input id="esture_tasa_desercion" type="number"
                        class="form-control @error('esture_tasa_desercion') is-invalid @enderror"
                        name="esture_tasa_desercion" value="{{ $general->esture_tasa_desercion }}"
                        autocomplete="esture_tasa_desercion" autofocus disabled>
                    @error('esture_tasa_desercion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="esture_tasa_desercion_pro">{{ __('Tasa de deserción del programa *') }}</label>
                    <input id="esture_tasa_desercion_pro" type="number"
                        class="form-control @error('esture_tasa_desercion_pro') is-invalid @enderror"
                        name="esture_tasa_desercion_pro" value="{{ $general->esture_tasa_desercion_pro }}"
                        autocomplete="esture_tasa_desercion_pro" autofocus disabled>
                    @error('esture_tasa_desercion_pro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_porcentaje_termina">{{ __('Porcentaje que culmina el programa *') }}</label>
                    <input id="esture_porcentaje_termina" type="number"
                        class="form-control @error('esture_porcentaje_termina') is-invalid @enderror"
                        name="esture_porcentaje_termina" value="{{ $general->esture_porcentaje_termina }}"
                        autocomplete="esture_porcentaje_termina" autofocus disabled>
                    @error('esture_porcentaje_termina')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label
                        for="esture_nro_estudiante_ies_nacional">{{ __('Número de estudiantes en otras IES Nacional *') }}</label>
                    <input id="esture_nro_estudiante_ies_nacional" type="number"
                        class="form-control @error('esture_nro_estudiante_ies_nacional') is-invalid @enderror"
                        name="esture_nro_estudiante_ies_nacional"
                        value="{{ $general->esture_nro_estudiante_ies_nacional }}"
                        autocomplete="esture_nro_estudiante_ies_nacional" autofocus disabled>
                    @error('esture_nro_estudiante_ies_nacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label
                        for="esture_nro_estudiante_ies_internacional">{{ __('Número de estudiantes en otras IES Internacional *') }}</label>
                    <input id="esture_nro_estudiante_ies_internacional" type="number"
                        class="form-control @error('esture_nro_estudiante_ies_internacional') is-invalid @enderror"
                        name="esture_nro_estudiante_ies_internacional"
                        value="{{ $general->esture_nro_estudiante_ies_internacional }}"
                        autocomplete="esture_nro_estudiante_ies_internacional" autofocus disabled>
                    @error('esture_nro_estudiante_ies_internacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_vis_nacional">{{ __('Número de visitantes nacional *') }}</label>
                    <input id="esture_vis_nacional" type="number"
                        class="form-control @error('esture_vis_nacional') is-invalid @enderror"
                        name="esture_vis_nacional" value="{{ $general->esture_vis_nacional }}"
                        autocomplete="esture_vis_nacional" autofocus disabled>
                    @error('esture_vis_nacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="esture_vis_internacional">{{ __('Número de visitante internacional *') }}</label>
                    <input id="esture_vis_internacional" type="number"
                        class="form-control @error('esture_vis_internacional') is-invalid @enderror"
                        name="esture_vis_internacional" value="{{ $general->esture_vis_internacional }}"
                        autocomplete="esture_vis_internacional" autofocus disabled>
                    @error('esture_vis_internacional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
