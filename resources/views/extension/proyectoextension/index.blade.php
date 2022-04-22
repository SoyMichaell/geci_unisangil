@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarproyectoextension">Proyectos extensión</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Proyecto extensión
        </h1>
    @section('message')
        <p>Listado de registro proyectos de extensión</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de registro proyectos extensión</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportproyectoextensionpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportproyectoextensionexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearproyectoextension') }}"><i
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
                            <th>Código proyecto</th>
                            <th>Nombre proyecto</th>
                            <th>Valor</th>
                            <th>Área extensión</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Nombre contacto</th>
                            <th>Telefono</th>
                            <th>Correo electronico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($proyectos as $proyecto)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $proyecto->extprex_year }}</td>
                                <td>{{ $proyecto->extprex_semestre }}</td>
                                <td>{{ $proyecto->extprex_codigo_pr }}</td>
                                <td>{{ $proyecto->extprex_nombre_pr }}</td>
                                <td>{{ number_format($proyecto->extprex_valor_pr, 2) }}</td>
                                <td>{{ $proyecto->extprex_id_area_extension }}</td>
                                <td>{{ $proyecto->extprex_fecha_inicio }}</td>
                                <td>{{ $proyecto->extprex_fecha_final }} </td>
                                <td>{{ $proyecto->extprex_nombre_contacto . ' ' . $proyecto->extprex_apellido_contacto }}
                                </td>
                                <td>{{ $proyecto->extprex_telefono_contacto }} </td>
                                <td>{{ $proyecto->extprex_correo_contacto }} </td>
                                <td>
                                    <form action="/extension/{{ $proyecto->id }}/eliminarproyectoextension"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $proyecto->id }}/verproyectoextension"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $proyecto->id }}/editarproyectoextension"><i
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
