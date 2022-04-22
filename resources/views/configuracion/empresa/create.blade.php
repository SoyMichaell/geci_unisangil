@extends('layouts.app')
@section('navegar') <a href="/empresa/create">Crear</a> / <a href="/empresa">Empresa</a> @endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-cube"></i> Registro empresas</h4><hr>
        <form action="/empresa" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="razon_social">{{ __('Razón social *') }}</label>
                    <input id="razon_social" type="text" class="form-control @error('razon_social') is-invalid @enderror"
                        name="razon_social" value="{{ old('razon_social') }}" autocomplete="razon_social" autofocus>
                    @error('razon_social')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nit">{{ __('Nit *') }}</label>
                    <input id="nit" type="text" class="form-control @error('nit') is-invalid @enderror"
                        name="nit" value="{{ old('nit') }}" autocomplete="nit" autofocus>
                    @error('nit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pais">{{ __('País *') }}</label>
                    <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror"
                        name="pais" value="{{ old('pais') }}" autocomplete="pais" autofocus>
                    @error('pais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="departamento">{{ __('Departamento *') }}</label>
                    <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror"
                        name="departamento" value="{{ old('departamento') }}" autocomplete="departamento" autofocus>
                    @error('departamento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ciudad">{{ __('Ciudad *') }}</label>
                    <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror"
                        name="ciudad" value="{{ old('ciudad') }}" autocomplete="ciudad" autofocus>
                    @error('ciudad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="direccion">{{ __('Dirección *') }}</label>
                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror"
                        name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" autofocus>
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono">{{ __('Telefono *') }}</label>
                    <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror"
                        name="telefono" value="{{ old('telefono') }}" autocomplete="telefono" autofocus>
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="url">{{ __('Url') }}</label>
                    <input id="url" type="url" class="form-control @error('url') is-invalid @enderror"
                        name="url" value="{{ old('url') }}" autocomplete="url" autofocus>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="correo">{{ __('Correo electronico *') }}</label>
                    <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"
                        name="correo" value="{{ old('correo') }}" autocomplete="correo" autofocus>
                    @error('correo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="area">{{ __('Área *') }}</label>
                    <input id="area" type="text" class="form-control @error('area') is-invalid @enderror"
                        name="area" value="{{ old('area') }}" autocomplete="area" autofocus>
                    @error('area')
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
