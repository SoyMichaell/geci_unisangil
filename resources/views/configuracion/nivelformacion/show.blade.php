@extends('layouts.app')
@section('navegar')
    <a href="/nivelformacion/show">Vista</a> / <a href="/nivelformacion">Nivel de formación</a>
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
                <label for="niv_nombre">{{ __('Nivel Formación *') }}</label>
                <input id="niv_nombre" type="text" class="form-control @error('niv_nombre') is-invalid @enderror"
                    name="niv_nombre" value="{{ $nivelformacion->niv_nombre }}" autocomplete="niv_nombre" readonly
                    autofocus>
                @error('niv_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
