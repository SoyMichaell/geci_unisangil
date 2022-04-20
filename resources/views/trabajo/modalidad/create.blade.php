@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro modalidad de grado.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4 class="title"><i class="fa fa-cube"></i> Registro modalidad de grado</h4>
            <form action="/modalidad" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="mod_nombre">{{ __('Modalidad de grado *') }}</label>
                        <input id="mod_nombre" type="text" class="form-control @error('mod_nombre') is-invalid @enderror"
                            name="mod_nombre" value="{{ old('mod_nombre') }}" autocomplete="mod_nombre" autofocus>
                        @error('mod_nombre')
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
@endif
