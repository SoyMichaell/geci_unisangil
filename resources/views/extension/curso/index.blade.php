@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarcurso">Curso</a> / <a href="/extension">Extensión - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Curso</h1>
    @section('message')
        <p>Listado de registro cursos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista cursos</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportcursopdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportcursoexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearcurso') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Código curso</th>
                            <th>Nombre curso</th>
                            <th>CINE</th>
                            <th>Docente</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $curso->extcurso_year }}</td>
                                <td>{{ $curso->extcurso_semestre }}</td>
                                <td>{{ $curso->extcurso_codigo }}</td>
                                <td>{{ $curso->extcurso_nombre }}</td>
                                <td>{{ $curso->cines->cocide_nombre }}</td>
                                <td>{{ $curso->docentes->per_nombre . ' ' . $curso->docentes->per_apellido }}</td>
                                <td>{{ $curso->extcurso_estado }}</td>
                                <td>
                                    <form action="/extension/{{ $curso->id }}/eliminarcurso" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/extension/{{ $curso->id }}/vercurso"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $curso->id }}/editarcurso"><i
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
