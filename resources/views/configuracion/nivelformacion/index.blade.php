@extends('layouts.app')
@section('navegar')
    <a href="/nivelformacion">Nivel de formación</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / nivel de formación programas</h1
        class="titulo">
@section('message')
    <p>Nivel de formación: Listado niveles de formación registradas</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile col-md-12">
        <div class="row">
            <div class="col-md-7">
                <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
            </div>
            <div class="col-md-5 d-flex justify-content-end align-items-start">
                <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('nivelformacion/pdf') }}"
                    title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                <a class="btn btn-outline-success" style="border-radius: 100%"
                    href="{{ url('nivelformacion/export') }}" title="Generar reporte excel" target="_blank"><i
                        class="fa-solid fa-file-excel"></i></a>
                <a class="btn btn-success" href="{{ url('nivelformacion/create') }}"><i
                        class="fa-solid fa-plus-circle"></i>
                    Nuevo</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tables">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nivel Formación</th>
                        <th style="width: 20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($nivelformacion as $nivelformacion)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $nivelformacion->niv_nombre }}</td>
                            <td>
                                <form action="{{ url("nivelformacion/{$nivelformacion->id}") }}" method="POST">
                                    <div class="d-flex">
                                        <a class="btn btn-sm" href="/nivelformacion/{{ $nivelformacion->id }}"><i
                                                class="fa-solid fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info btn-sm"
                                            href="nivelformacion/{{ $nivelformacion->id }}/edit"><i
                                                class="fa-solid fa-refresh"></i></a>
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
