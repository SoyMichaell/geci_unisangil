@extends('layouts.app')
@section('navegar')
    <a href="/facultad/show">Vista</a> / <a href="/facultad">Facultad</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
@section('message')
    <p>Información de registro.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-question-circle"></i> Vista registro</h4><hr>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="fac_nombre">{{ __('Facultad *') }}</label>
                <input id="fac_nombre" type="text" class="form-control @error('fac_nombre') is-invalid @enderror"
                    name="fac_nombre" value="{{ $facultad->fac_nombre }}" disabled required autocomplete="fac_nombre"
                    autofocus>
                @error('fac_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
