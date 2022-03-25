@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 shadow-sm bg-white p-3">
                <h4>Listado módulos</h4>
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Módulo</th>
                            <th>Tipo prueba</th>
                            <th style="width: 7%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($tipomodulos as $tipomodulo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $tipomodulo->tipo_modulo_nombre }}</td>
                                <td>{{ $tipomodulo->pruebas->tipo_prueba_nombre }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/prueba/{{$tipomodulo->id}}/eliminartipomodulo" method="POST">
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
                <h4><i class="fab fa-wpforms"></i> Registro módulos pruebas</h4>
                <form action="/prueba/registrotipomodulo" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12 mt-2">
                            <label for="tipo_modulo_nombre">{{ __('Nombre tipo módulo *') }}</label>
                            <input id="tipo_modulo_nombre" type="text"
                                class="form-control @error('tipo_modulo_nombre') is-invalid @enderror"
                                name="tipo_modulo_nombre" value="{{ old('tipo_modulo_nombre') }}"
                                autocomplete="tipo_modulo_nombre">
                            @error('tipo_modulo_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="tipo_modulo_id_prueba">{{ __('Nombre tipo módulo *') }}</label>
                            <select class="form-select @error('tipo_modulo_id_prueba') is-invalid @enderror" name="tipo_modulo_id_prueba" id="tipo_modulo_id_prueba">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($tipospruebas as $prueba)
                                    <option value="{{$prueba->id}}">{{$prueba->tipo_prueba_nombre}}</option>
                                @endforeach
                            </select>
                            @error('tipo_modulo_id_prueba')
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
