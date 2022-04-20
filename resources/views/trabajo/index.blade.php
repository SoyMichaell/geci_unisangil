@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo trabajo de grado</h1>
    @section('message')
        <p>Lista de registro trabajo de grado</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-start">
            <a class="btn btn-info btn-sm" href="{{ url('modalidad') }}"><i class="fa fa-plus-circle"></i> Registro modalidad de grado</a>
            <a class="btn btn-info btn-sm" href="{{ url('practica') }}"><i class="fa fa-plus-circle"></i> Registro practica laboral</a>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Lista de registros</h3>
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('trabajo/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('trabajo/exportexcel') }}" title="Generar reporte excel" s><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success " href="{{ url('trabajo/create') }}"><i
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
                            <th>Código proyecto</th>
                            <th>Titulo de proyecto</th>
                            <th>Autor (es)</th>
                            <th>Director</th>
                            <th>Codirector</th>
                            <th>Fecha inicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($trabajos as $trabajo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $trabajo->tra_codigo_proyecto }}</td>
                                <td>{{ $trabajo->tra_titulo_proyecto }}</td>
                                <td>{{ $trabajo->tra_id_estudiante }}</td>
                                <td>{{ $trabajo->directores->per_nombre . ' ' . $trabajo->directores->per_apellido }}</td>
                                <td>{{ $trabajo->codirectores->per_nombre . ' ' . $trabajo->codirectores->per_apellido }}
                                </td>
                                <td>{{ $trabajo->tra_fecha_inicio }}</td>
                                <td>
                                    <form action="{{ route('trabajo.destroy', $trabajo->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/trabajo/{{ $trabajo->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="/trabajo/{{ $trabajo->id }}/edit"><i
                                                    class="fa fa-refresh"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
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
