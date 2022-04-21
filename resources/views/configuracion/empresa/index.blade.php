@extends('layouts.app')
@section('navegar')
    <a href="/empresa">Empresas</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / empresas</h1>
@section('message')
    <p>Listado empresas</p>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="tile col-md-12">
        <div class="row">
            <div class="col-md-7">
                <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
            </div>
            <div class="col-md-5 d-flex justify-content-end align-items-start">
                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2 || Auth::user()->per_tipo_usuario == 9 || Auth::user()->per_tipo_usuario == 10)
                <a class="btn btn-outline-success" href="{{ url('empresa/create') }}"><i
                        class="fa fa-plus-circle"></i>
                    Nuevo</a>
                @endif
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tables">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Razón social</th>
                        <th>Nit</th>
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th style="width: 20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $empresa->razon_social }}</td>
                            <td>{{ $empresa->nit}}</td>
                            <td>{{ $empresa->pais}}</td>
                            <td>{{ $empresa->departamento}}</td>
                            <td>{{ $empresa->ciudad}}</td>
                            <td>{{ $empresa->direccion}}</td>
                            <td>{{ $empresa->telefono}}</td>
                            <td>
                                <form action="{{ url("empresa/{$empresa->id}") }}" method="POST">
                                    <div class="d-flex">
                                        <a class="btn btn-sm" href="/empresa/{{ $empresa->id }}"
                                            title="Ver registro"><i class="fa fa-folder-open"></i></a>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2 || Auth::user()->per_tipo_usuario == 9 || Auth::user()->per_tipo_usuario == 10)
                                        <a class="btn btn-outline-info btn-sm"
                                            href="empresa/{{ $empresa->id }}/edit"
                                            title="Editar registro"><i class="fa fa-refresh"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
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
