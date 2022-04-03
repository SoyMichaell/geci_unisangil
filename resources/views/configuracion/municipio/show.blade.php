@extends('layouts.app')
@section('navegar')
    <a href="/municipio/show">Vista</a> / <a href="/municipio">Municipio</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
@section('message')
    <p>Información de registro</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-question-circle"></i> Vista registro</h4><hr>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="mun_departamento">{{ __('Departamento *') }}</label>
                <select class="form-control" name="mun_departamento" id="mun_departamento" disabled>
                    <option value="">---- SELECCIONE ----</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}"
                            {{ $departamento->id == $municipio->mun_departamento ? 'selected' : '' }}>
                            {{ $departamento->dep_nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="mun_nombre">{{ __('Municipio *') }}</label>
                <input id="mun_nombre" type="text" class="form-control @error('mun_nombre') is-invalid @enderror"
                    name="mun_nombre" value="{{ $municipio->mun_nombre }}" disabled required autocomplete="mun_nombre"
                    autofocus>
                @error('mun_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection