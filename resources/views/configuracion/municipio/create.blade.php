@extends('layouts.app')
@section('navegar')
    <a href="/municipio/create">Crear</a> / <a href="/municipio">Municipio</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-cube"></i> Registro municipio</h4><hr>
        <form action="/municipio" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="mun_departamento">{{ __('Departamento *') }}</label>
                    <select class="form-control @error('mun_departamento') is-invalid @enderror" name="mun_departamento"
                        id="mun_departamento">
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->dep_nombre }}</option>
                        @endforeach
                    </select>
                    <p class="badge badge-danger">{{$departamentos->count()<=0 ? 'No existen registros de departamentos' : ''}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="mun_nombre">{{ __('Municipio *') }}</label>
                    <input id="mun_nombre" type="text" class="form-control @error('mun_nombre') is-invalid @enderror"
                        name="mun_nombre" value="{{ old('mun_nombre') }}" autocomplete="mun_nombre" autofocus>
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
                        {{ __('Registrar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
