@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostraractividad">Actividad cultural</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Actividad cultural
        </h1>
    @section('message')
        <p>Listado de registro actividades culturaless</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registro</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportactividadculturalpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportactividadculturalexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearactividad') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Codigo unidad organizacional</th>
                            <th>Codigo actividad</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Valor nacional</th>
                            <th>Valor internacional</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($actividadescul as $actividad)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $actividad->extcul_year }}</td>
                                <td>{{ $actividad->extcul_semestre }}</td>
                                <td>{{ $actividad->extcul_codigo_unidad_org }}</td>
                                <td>{{ $actividad->extcul_codigo_actividad }}</td>
                                <td>{{ $actividad->extcul_fecha_inicio }}</td>
                                <td>{{ $actividad->extcul_fecha_fin }}</td>
                                <td>{{ number_format($actividad->extcul_valor_financiacion_nac, 0) }}</td>
                                <td>{{ number_format($actividad->extcul_valor_internacional, 0) }}</td>
                                <td>
                                    <form action="/extension/{{ $actividad->id }}/eliminaractividad" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $actividad->id }}/veractividad"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $actividad->id }}/editaractividad"><i
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
