@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{ $persona->id }}/crearcontrato">Crear</a> / <a
            href="/docente/{{ $persona->id }}/mostrarcontrato">Contrato</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100 mx-auto">
            <h4 class="tile title"><i class="fab fa-wpforms"></i> Registro evaluación docente</h4>
            <form action="/docente/{{$id}}/registrohistorial" method="post">
                @csrf
                <input type="hidden" name="doe_persona_docente" id="doe_persona_docente" value="{{ $persona->id }}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doco_fecha_inicio">{{ __('Fecha inicio contrato *') }}</label>
                        <input id="doco_fecha_inicio" type="date"
                            class="form-control @error('doco_fecha_inicio') is-invalid @enderror"
                            name="doco_fecha_inicio" value="{{ old('doco_fecha_inicio') }}"
                            autocomplete="doco_fecha_inicio">
                        @error('doco_fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-">
                        <label for="doco_fecha_fin">{{ __('Fecha fin contrato *') }}</label>
                        <input id="doco_fecha_fin" type="date"
                            class="form-control @error('doco_fecha_fin') is-invalid @enderror" name="doco_fecha_fin"
                            value="{{ old('doco_fecha_fin') }}" autocomplete="doco_fecha_fin">
                        @error('doco_fecha_fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0 mt-2">
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
