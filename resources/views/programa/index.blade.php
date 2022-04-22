@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa">Programa</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo programas</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="col-md-12 tile">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('programa/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('programa/exportexcel') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('programa/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead class="bg-light">
                        <tr>
                            <th>N°</th>
                            <th>Programa</th>
                            <th>Titulo</th>
                            <th style="width: 10%">Codigo SNIES</th>
                            <th>Nivel de formación</th>
                            <th>Metodologia</th>
                            <th>Director de programa</th>
                            <th>Acciones</th>
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
                                <td>{{ $programa->metodologias->met_nombre }}</td>
                                <td>{{ Str::ucfirst($programa->directorprograma->per_nombre) .' ' .Str::ucfirst($programa->directorprograma->per_apellido) }}
                                </td>
                                <td>
                                    <form action="{{ route('programa.destroy', $programa->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/programa/{{ $programa->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/programa/{{ $programa->id }}/edit"><i
                                                    class="fa fa-refresh"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i></button>
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
@endif
