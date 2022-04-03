@extends('layouts.app')
@section('navegar')
    <a href="/metodologia/create">Crear</a> / <a href="/metodologia">Metodologia</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1><!--TODO: Validad icono-->
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-cube"></i> Registro metodologia</h4><hr>
            <form action="/metodologia" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="met_nombre">{{ __('Metodologia *') }}</label>
                        <input id="met_nombre" type="text" class="form-control @error('met_nombre') is-invalid @enderror"
                            name="met_nombre" value="{{ old('met_nombre') }}" autocomplete="met_nombre"
                            autofocus>
                        @error('met_nombre')
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
