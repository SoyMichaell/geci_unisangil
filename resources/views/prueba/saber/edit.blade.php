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
        <div class="tile" style="width: 500px">
            <form action="/prueba/{{$saber->prueba_saber_id_estudiante}}/actualizarsaber" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="prueba_saber_id_estudiante">Estudiante</label>
                        <select class="form-select" name="prueba_saber_id_estudiante" id="prueba_saber_id_estudiante" disabled>
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" {{$estudiante->id == $saber->prueba_saber_id_estudiante ? 'selected' : ''}}>
                                    {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="prueba_saber_year">Año</label>
                        <input class="form-control @error('prueba_saber_year') is-invalid @enderror"
                            name="prueba_saber_year" id="prueba_saber_year" value="{{$saber->prueba_saber_year}}"
                            type="number" autocomplete="prueba_saber_year" autofocus>
                        @error('prueba_saber_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="prueba_saber_periodo">Periodo</label>
                        <input class="form-control @error('prueba_saber_periodo') is-invalid @enderror"
                            name="prueba_saber_periodo" id="prueba_saber_periodo"
                            value="{{$saber->prueba_saber_periodo}}" type="text" autocomplete="prueba_saber_periodo"
                            autofocus>
                        @error('prueba_saber_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @foreach ($saberes as $saberx)
                        <div class="col-md-12 mb-3">
                            <label for="prsamo_id_modulo">Módulo {{$saberx->tipo_modulo_nombre}}</label>
                            <input class="form-control @error('prsamo_id_modulo') is-invalid @enderror"
                                name="prsamo_id_modulo[]" id="prsamo_id_modulo" value="{{ $saberx->prsamo_id_modulo}}"
                                type="hidden" autocomplete="prsamo_id_modulo" autofocus readonly>
                            @error('prsamo_id_modulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prsamo_puntaje">Puntaje</label>
                            <input class="form-control @error('prsamo_puntaje') is-invalid @enderror"
                                name="prsamo_puntaje[]" id="prsamo_puntaje" value="{{$saberx->prsamo_puntaje}}"
                                type="number" autocomplete="prsamo_puntaje" autofocus>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
