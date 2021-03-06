@extends('layouts.app')
@section('navegar')
    <a href="/metodologia/show">Vista</a> / <a href="/metodologia">Metodologia</a>
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
                <label for="met_nombre">{{ __('Metodologia *') }}</label>
                <input id="met_nombre" type="text" class="form-control @error('met_nombre') is-invalid @enderror"
                    name="met_nombre" value="{{ $metodologia->met_nombre }}" required autocomplete="met_nombre"
                    autofocus disabled>
                @error('met_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
