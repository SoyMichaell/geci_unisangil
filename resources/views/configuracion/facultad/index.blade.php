@extends('layouts.app')
@section('navegar')
    <a href="/facultad">Facultad</a>
@endsection
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / facultad</h1>
@section('message')
    <p>Facultades: Listado facultades registradas</p>
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
                <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('facultad/pdf') }}"
                    title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('facultad/export') }}"
                    title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                <a class="btn btn-success" href="{{ url('facultad/create') }}"><i class="fa fa-plus-circle"></i>
                    Nuevo</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tables">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Facultad</th>
                        <th style="width: 20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($facultad as $facultad)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $facultad->fac_nombre }}</td>
                            <td>
                                <form action="{{ route('facultad.destroy', $facultad->id) }}" method="POST">
                                    <div class="d-flex">
                                        <a class="btn btn-sm" href="facultad/{{ $facultad->id }}"
                                            title="Visualizar"><i class="fa-solid fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info btn-sm btn-eye"
                                            href="/facultad/{{ $facultad->id }}/edit" title="Editar"><i
                                                class="fa-solid fa-refresh"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
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
