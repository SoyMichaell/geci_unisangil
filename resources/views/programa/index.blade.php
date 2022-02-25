@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-start">
                  <a class="btn btn-outline-primary" href="{{ url('asignatura') }}"><i class="fa fa-plus-circle"></i>
                    Asignaturas</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-start">
                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                    <a class="btn btn-success" href="{{ url('programa/create') }}"><i class="fa fa-plus-circle"></i>
                        Nuevo</a>
                @endif
            </div>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('docente/pdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('docente/export') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa-solid fa-file-excel"></i></a>
                            
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Programa</th>
                            <th>Titulo</th>
                            <th style="width: 10%">Codigo SNIES</th>
                            <th>Nivel de formación</th>
                            <th>Director de programa</th>
                            <th>Plan de estudio</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($programas as $programa)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $programa->pro_nombre }}</td>
                                <td>{{ $programa->pro_titulo }}</td>
                                <td>{{ $programa->pro_codigosnies }}</td>
                                <td>{{ $programa->niveles->niv_nombre }}</td>
                                <td>{{ Str::ucfirst($programa->directorprograma->per_nombre).' '.Str::ucfirst($programa->directorprograma->per_apellido)}}
                                </td>
                                <td style="width: 10%">
                                    <a class="btn btn-info btn-sm"
                                        href="/programa/{{ $programa->id }}/mostrarplan"><i
                                            class="fa-solid fa-book-open"></i></a>
                                </td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="{{ route('programa.destroy', $programa->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/programa/{{ $programa->id }}"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/programa/{{ $programa->id }}/edit"><i
                                                        class="fa-solid fa-refresh"></i></a>
                                                
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
        </div>
    </div>
@endsection
@endif
