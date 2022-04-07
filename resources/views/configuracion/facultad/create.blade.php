@extends('layouts.app')
@section('navegar')
    <a href="/facultad/create">Crear</a> / <a href="/facultad">Facultad</a>
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
        <h4 class="title"><i class="fa fa-cube"></i> Registro facultad</h4><hr>
        <form action="/facultad" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="fac_nombre">{{ __('Facultad *') }}</label>
                    <input id="fac_nombre" type="text" class="form-control @error('fac_nombre') is-invalid @enderror"
                        name="fac_nombre" value="{{ old('fac_nombre') }}" autocomplete="fac_nombre">
                    @error('fac_nombre')
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
