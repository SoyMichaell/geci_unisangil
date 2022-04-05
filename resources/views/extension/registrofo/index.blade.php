@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarregistrofotografico">Registro fotografico</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Registro
            fotografico</h1>
    @section('message')
        <p>Listado de registro fotografico</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado registro fotografico</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportfotograficopdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportfotograficoexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearregistrofotografico') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Periodo</th>
                            <th>Tipo de actividad</th>
                            <th>Actividad</th>
                            <th>Ente organizador</th>
                            <th>Fecha</th>
                            <th>Tipo evento</th>
                            <th>Tipo modalidad</th>
                            <th>Soporte</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($fotograficos as $fotografico)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $fotografico->extrefoin_year }}</td>
                                <td>{{ $fotografico->extrefoin_periodo }}</td>
                                <td>{{ $fotografico->extrefoin_tipo_actividad }}</td>
                                <td>{{ $fotografico->extrefoin_actividad }}</td>
                                <td>{{ $fotografico->extrefoin_ente_organizador }}</td>
                                <td>{{ $fotografico->extrefoin_fecha }}</td>
                                <td>{{ $fotografico->extrefoin_tipo_evento }}</td>
                                <td>{{ $fotografico->extrefoin_tipo_modalidad }}</td>
                                <td>{{ $fotografico->extrefoin_soporte }}</td>
                                <td>
                                    <form action="/extension/{{ $fotografico->id }}/eliminarregistrofotografico"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $fotografico->id }}/verregistrofotografico"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $fotografico->id }}/editarregistrofotografico"><i
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
