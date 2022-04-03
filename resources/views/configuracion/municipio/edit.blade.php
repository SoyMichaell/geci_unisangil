@extends('layouts.app')
@section('navegar')
    <a href="/municipio/edit">Editar</a> / <a href="/municipio">Municipio</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4 class="title"><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
            <form action="/municipio/{{ $municipio->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="mun_departamento">{{ __('Departamento *') }}</label>
                        <select class="form-control @error('mun_departamento') is-invalid @enderror" name="mun_departamento"
                            id="mun_departamento">
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
                            name="mun_nombre" value="{{ $municipio->mun_nombre }}" required autocomplete="mun_nombre"
                            autofocus>
                        @error('mun_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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