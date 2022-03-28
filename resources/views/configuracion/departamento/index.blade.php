@extends('layouts.app')
@section('navegar')
    <a href="/departamento">Departamento</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / departamentos</h1>
@section('message')
    <p>Departamentos: Listado departamentos registrados</p>
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
                <a class="btn btn-outline-success" href="{{ url('departamento/create') }}"><i
                        class="fa fa-plus-circle"></i>
                    Nuevo</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tables">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Departamento</th>
                        <th style="width: 20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($departamentos as $departamento)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $departamento->dep_nombre }}</td>
                            <td>
                                <form action="{{ url("departamento/{$departamento->id}") }}" method="POST">
                                    <div class="d-flex">
                                        <a class="btn btn-sm" href="/departamento/{{ $departamento->id }}"
                                            title="Ver registro"><i class="fa-solid fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info btn-sm"
                                            href="departamento/{{ $departamento->id }}/edit"
                                            title="Editar registro"><i class="fa-solid fa-refresh"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i></button>
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
