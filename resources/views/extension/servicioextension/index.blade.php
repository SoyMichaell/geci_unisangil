@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarservicioextension">Servicios extensión</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Servicio extensión
        </h1>
    @section('message')
        <p>Listado de registro servicios de extensión</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de servicios extensión</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportservicioextensionpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportservicioextensionexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearservicioextension') }}"><i
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
                        @foreach ($serviciosextension as $servicio)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $servicio->extseex_year }}</td>
                                <td>{{ $servicio->extseex_semestre }}</td>
                                <td>{{ $servicio->extseex_codigo_ser }}</td>
                                <td>{{ $servicio->extseex_nombre_ser }}</td>
                                <td>{{ number_format($servicio->extseex_valor_ser, 2) }}</td>
                                <td>{{ $servicio->extseex_id_area_extension }}</td>
                                <td>{{ $servicio->extseex_fecha_inicio }}</td>
                                <td>{{ $servicio->extseex_fecha_final }} </td>
                                <td>{{ $servicio->extseex_nombre_contacto . ' ' . $servicio->extseex_apellido_contacto }}
                                </td>
                                <td>{{ $servicio->extseex_telefono_contacto }} </td>
                                <td>{{ $servicio->extseex_correo_contacto }} </td>
                                <td>
                                    <form action="/extension/{{ $servicio->id }}/eliminarservicioextension"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $servicio->id }}/verservicioextension"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $servicio->id }}/editarservicioextension"><i
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
