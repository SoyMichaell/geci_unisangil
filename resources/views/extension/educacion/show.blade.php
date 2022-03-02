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
                    <label for="extedu_semestre">Semestre</label>
                    <input class="form-control @error('extedu_semestre') is-invalid @enderror" name="extedu_semestre"
                        id="extedu_semestre" value="{{ $educacion->extedu_semestre }}" type="number"
                        autocomplete="extedu_semestre" autofocus disabled>
                    @error('extedu_semestre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extedu_codigo_curso">Código curso</label>
                    <input class="form-control @error('extedu_codigo_curso') is-invalid @enderror"
                        name="extedu_codigo_curso" id="extedu_codigo_curso"
                        value="{{ $educacion->extedu_codigo_curso }}" type="text" autocomplete="extedu_codigo_curso"
                        autofocus disabled>
                    @error('extedu_codigo_curso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extedu_numero_horas">Número de horas</label>
                    <input class="form-control @error('extedu_numero_horas') is-invalid @enderror"
                        name="extedu_numero_horas" id="extedu_numero_horas"
                        value="{{ $educacion->extedu_numero_horas }}" type="number" autocomplete="extedu_numero_horas"
                        autofocus disabled>
                    @error('extedu_numero_horas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extedu_tipo_curso">Tipo de curso</label>
                    <select class="form-select" name="extedu_tipo_curso" id="extedu_tipo_curso" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="1" {{ $educacion->extedu_tipo_curso == '1' ? 'selected' : '' }}>Cursos,
                            cursos especializados (certificaciones)</option>
                        <option value="2" {{ $educacion->extedu_tipo_curso == '2' ? 'selected' : '' }}>Talleres
                        </option>
                        <option value="3" {{ $educacion->extedu_tipo_curso == '3' ? 'selected' : '' }}>Diplomado
                        </option>
                        <option value="4" {{ $educacion->extedu_tipo_curso == '4' ? 'selected' : '' }}>Seminarios,
                            congresos o simposios</option>
                        <option value="5" {{ $educacion->extedu_tipo_curso == '5' ? 'selected' : '' }}>Otro
                        </option>
                    </select>
                    @error('extedu_tipo_curso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extedu_valor_curso">Valor del curso</label>
                    <input class="form-control @error('extedu_valor_curso') is-invalid @enderror"
                        name="extedu_valor_curso" id="extedu_valor_curso"
                        value="{{ $educacion->extedu_valor_curso }}" type="number" autocomplete="extedu_valor_curso"
                        autofocus disabled>
                    @error('extedu_valor_curso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extedu_id_docente">Docente</label>
                    <select class="form-select" name="extedu_id_docente" id="extedu_id_docente" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}"
                                {{ $docente->id == $educacion->extedu_id_docente ? 'selected' : '' }}>
                                {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                        @endforeach
                    </select>
                    @error('extedu_id_docente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="extedu_tipo_extension">Tipo beneficio de extensión</label>
                    <select class="form-select" name="extedu_tipo_extension" id="extedu_tipo_extension" disabled>
                        <option value="">---- SELECCIONE ----</option>
                        <option value="1" {{ $educacion->extedu_tipo_extension == '1' ? 'selected' : '' }}>
                            Estudiante de la IES</option>
                        <option value="2" {{ $educacion->extedu_tipo_extension == '2' ? 'selected' : '' }}>Graduado
                            de la IES</option>
                        <option value="3" {{ $educacion->extedu_tipo_extension == '3' ? 'selected' : '' }}>Profesor
                            de la IES</option>
                        <option value="4" {{ $educacion->extedu_tipo_extension == '4' ? 'selected' : '' }}>
                            Administrativo de la IES</option>
                        <option value="5" {{ $educacion->extedu_tipo_extension == '5' ? 'selected' : '' }}>Persona
                            no vinculada a la IES</option>
                    </select>
                    @error('extedu_tipo_extension')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="extedu_cantidad">Cantidad de beneficiados</label>
                    <input class="form-control @error('extedu_cantidad') is-invalid @enderror" name="extedu_cantidad"
                        id="extedu_cantidad" value="{{ $educacion->extedu_cantidad }}" type="number"
                        autocomplete="extedu_cantidad" autofocus disabled>
                    @error('extedu_cantidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="extedu_url_soporte">Evidencia | Formatos soportados .zip y .rar</label>
                    <input class="form-control @error('extedu_url_soporte') is-invalid @enderror"
                        name="extedu_url_soporte" id="extedu_url_soporte" value="{{$educacion->extedu_url_soporte}}"
                        type="file" autocomplete="extedu_url_soporte" autofocus disabled>
                        <p><small><a href="{{asset('datos/educacion/'.$educacion->extedu_url_soporte)}}" target="_blank">{{$educacion->extedu_url_soporte}}</a></small></p>
                    @error('extedu_url_soporte')
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
