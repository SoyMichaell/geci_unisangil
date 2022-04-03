@extends('layouts.app')
@section('navegar') <a href="/departamento/create">Crear</a> / <a href="/departamento">Departamento</a> @endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    <!--TODO: Validad icono-->
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-cube"></i> Registro departamento</h4>
        <form action="/departamento" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="dep_nombre">{{ __('Departamento *') }}</label>
                    <input id="dep_nombre" type="text" class="form-control @error('dep_nombre') is-invalid @enderror"
                        name="dep_nombre" value="{{ old('dep_nombre') }}" autocomplete="dep_nombre" autofocus>
                    @error('dep_nombre')
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
