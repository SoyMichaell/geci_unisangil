@extends('layouts.app')
@section('navegar')
    <a href="/departamento/{{ $departamento->id }}">Vista</a> / <a href="/departamento">Departamento</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-book"></i> Visualizar Información</h1> 
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
                <label for="dep_nombre">{{ __('Departamento *') }}</label>
                <input id="dep_nombre" type="text" class="form-control @error('dep_nombre') is-invalid @enderror"
                    name="dep_nombre" value="{{ $departamento->dep_nombre }}" autocomplete="dep_nombre" readonly
                    autofocus>
                @error('dep_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
