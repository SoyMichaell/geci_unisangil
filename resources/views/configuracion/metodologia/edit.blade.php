@extends('layouts.app')
@section('navegar')
    <a href="/metodologia/edit">Editar</a> / <a href="/metodologia">Metodologia</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
@section('message')
    <p>Diligencie todos los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
        <form action="/metodologia/{{ $metodologia->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="met_nombre">{{ __('Metodologia *') }}</label>
                    <input id="met_nombre" type="text" class="form-control @error('met_nombre') is-invalid @enderror"
                        name="met_nombre" value="{{ $metodologia->met_nombre }}" required autocomplete="met_nombre"
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
                        {{ __('Actualizar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
