@extends('layouts.app')
@section('navegar')
    <a href="/nivelformacion/create">Crear</a> / <a href="/nivelformacion">Nivel de formación</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1> <!--TODO: Validad icono-->
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-cube"></i> Registro nivel de formación</h4><hr>
        <form action="/nivelformacion" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="niv_nombre">{{ __('Nivel Formación *') }}</label>s
                    <input id="niv_nombre" type="text" class="form-control @error('niv_nombre') is-invalid @enderror"
                        name="niv_nombre" value="{{ old('niv_nombre') }}" autocomplete="niv_nombre" autofocus>
                    @error('niv_nombre')
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
