@extends('layouts.app')
@section('navegar')
    <a href="/municipio">Municipio</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / municipios</h1>
    <p>Municipios: Listado municipios o sedes registrados</p>
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12">
                <div class="row">
                    <div class="col-md-7">
                        <h4>Lista de registros</h4>
                    </div>
                    <div class="col-md-5 d-flex justify-content-end align-items-start">
                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2 || Auth::user()->per_tipo_usuario == 9 || Auth::user()->per_tipo_usuario == 10)
                        <a class="btn btn-outline-success" href="{{ url('municipio/create') }}"><i
                        class="fa fa-plus-circle"></i>
                            Nuevo</a>
                        @endif
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tables">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Departamento</th>
                                <th>Municipio / sede</th>
                                <th style="width: 20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$municipio->departamento->dep_nombre}}</td>
                                    <td>{{ $municipio->mun_nombre }}</td>
                                    <td>
                                        <form action="{{ route('municipio.destroy', $municipio->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="municipio/{{ $municipio->id }}"
                                                    title="Visualizar"><i class="fa fa-folder-open"></i></a>
                                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2 || Auth::user()->per_tipo_usuario == 9 || Auth::user()->per_tipo_usuario == 10)
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/municipio/{{ $municipio->id }}/edit" title="Editar"><i
                                                    class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                class="fa fa-trash"></i></button>
                                                @endif
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
