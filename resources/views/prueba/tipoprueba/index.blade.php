@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 shadow-sm bg-white p-3">
                <h4>Listado tipo de pruebas</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo prueba</th>
                            <th style="width: 7%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($tipopruebas as $tipoprueba)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $tipoprueba->tipo_prueba_nombre }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/prueba/{{$tipoprueba->id}}/eliminartipoprueba" method="POST">
                                            <div class="d-flex justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-7 shadow-sm bg-white p-3">
                <h4><i class="fab fa-wpforms"></i> Registro evaluación docente</h4>
                <form action="/prueba/registrotipoprueba" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="tipo_prueba_nombre">{{ __('Nombre tipo prueba *') }}</label>
                            <input id="tipo_prueba_nombre" type="text"
                                class="form-control @error('tipo_prueba_nombre') is-invalid @enderror"
                                name="tipo_prueba_nombre" value="{{ old('tipo_prueba_nombre') }}"
                                autocomplete="tipo_prueba_nombre">
                            @error('tipo_prueba_nombre')
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
    </div>
@endsection
@endif
