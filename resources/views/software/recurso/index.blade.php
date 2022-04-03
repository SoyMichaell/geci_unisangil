@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/software/mostrarrecurso">Recurso tecnológico</a> / <a href="/software/">Software</a> 
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo TIC'S | recuros tecnológico</h1>
    @section('message')
        <p>Listado de registro recursos tecnológicos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-danger" style="border-radius: 100%"
                            href="{{ url('software/exportrecursopdf') }}" title="Generar reporte pdf" target="_blank"><i
                                class="fa fa-file-pdf-o"></i></a>
                        <a class="btn btn-outline-success" style="border-radius: 100%"
                            href="{{ url('software/exportrecursoexcel') }}" title="Generar reporte excel"><i
                                class="fa fa-file-excel-o"></i></a>
                        <a class="btn btn-outline-success" href="{{ url('software/crearrecurso') }}"><i
                                class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Periodo</th>
                            <th>Tipo recurso</th>
                            <th>Docente</th>
                            <th>Asignatura</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($recursos as $recurso)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $recurso->sofrete_year }}</td>
                                <td>{{ $recurso->sofrete_periodo }}</td>
                                <td>{{ $recurso->sofrete_tipo_recurso }}</td>
                                <td>{{ $recurso->docentes->per_nombre . ' ' . $recurso->docentes->per_apellido }}</td>
                                <td>{{ $recurso->asignaturas->asig_nombre }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/software/{{$recurso->id}}/eliminarrecurso" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/software/{{ $recurso->id }}/verrecurso"><i
                                                        class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/software/{{ $recurso->id }}/editarrecurso"><i
                                                        class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
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
