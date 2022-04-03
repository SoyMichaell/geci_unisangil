@extends('layouts.app')
@section('navegar') <a href="/departamento/{{$departamento->id}}/edit">Editar</a> / <a href="/departamento">Departamento</a> @endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
@section('message')
    <p>Diligencie los campos requeridos *.</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile">
        <h4 class="title"><i class="fa fa-pencil"></i> Actualizar información</h4><hr>
        <form action="/departamento/{{ $departamento->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="dep_nombre">{{ __('Departamento *') }}</label>
                    <input id="dep_nombre" type="text" class="form-control @error('dep_nombre') is-invalid @enderror"
                        name="dep_nombre" value="{{ $departamento->dep_nombre }}" autocomplete="dep_nombre" autofocus>
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
                        {{ __('Actualizar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection