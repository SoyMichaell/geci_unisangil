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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extcor_year">Año</label>
                    <input class="form-control @error('extcor_year') is-invalid @enderror" name="extcor_year"
                        id="extcor_year" value="{{ $consurecurso->extcor_year }}" type="number"
                        autocomplete="extcor_year" autofocus disabled>
                    @error('extcor_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcor_semestre">Semestre</label>
                    <input class="form-control @error('extcor_semestre') is-invalid @enderror" name="extcor_semestre"
                        id="extcor_semestre" value="{{ $consurecurso->extcor_semestre }}" type="text"
                        autocomplete="extcor_semestre" autofocus disabled>
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
                        value="{{ $consurecurso->extcor_codigo_consultoria }}" type="text"
                        autocomplete="extcor_codigo_consultoria" autofocus disabled>
                    @error('extcor_codigo_consultoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcor_tipo_documento">Tipo de documento</label>
                    <select class="form-select" name="extcor_tipo_documento" id="extcor_tipo_documento" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="CC" {{ $consurecurso->extcor_tipo_documento == 'CC' ? 'selected' : '' }}>
                            Cédula de ciudadanía</option>
                        <option value="DE" {{ $consurecurso->extcor_tipo_documento == 'DE' ? 'selected' : '' }}>
                            Documento de identidad extranjera</option>
                        <option value="CE" {{ $consurecurso->extcor_tipo_documento == 'CE' ? 'selected' : '' }}>
                            Cédula de extranjería</option>
                        <option value="TI" {{ $consurecurso->extcor_tipo_documento == 'TI' ? 'selected' : '' }}>
                            Tarjeta de identidad</option>
                        <option value="PS" {{ $consurecurso->extcor_tipo_documento == 'PS' ? 'selected' : '' }}>
                            Pasaporte</option>
                        <option value="CA" {{ $consurecurso->extcor_tipo_documento == 'CA' ? 'selected' : '' }}>
                            Certificado cabildo</option>
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
                        value="{{ $consurecurso->extcor_numero_documento }}" type="number"
                        autocomplete="extcor_numero_documento" autofocus disabled>
                    @error('extcor_numero_documento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extcor_id_nivel_estudio">Máximo nivel de estudio</label>
                    <select class="form-select" name="extcor_id_nivel_estudio" id="extcor_id_nivel_estudio" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($nivelestudios as $nivelestudio)
                            <option value="{{ $nivelestudio->id }}"
                                {{ $nivelestudio->id == $consurecurso->extcor_id_nivel_estudio ? 'selected' : '' }}>
                                {{ $nivelestudio->conies_nombre }}</option>
                        @endforeach
                    </select>
                    @error('extcor_id_nivel_estudio')
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
