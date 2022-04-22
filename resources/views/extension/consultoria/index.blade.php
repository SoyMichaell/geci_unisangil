@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarconsultoria">Consultoria</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Consultoria</h1>
    @section('message')
        <p>Listado de registro consultoria</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista actividad consultoria</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportconsultoriapdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportconsultoriaexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearconsultoria') }}"><i
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
                            <th>Código consultoria</th>
                            <th>Entidad</th>
                            <th>Valor</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($consultorias as $consultoria)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $consultoria->extcon_year }}</td>
                                <td>{{ $consultoria->extcon_semestre }}</td>
                                <td>{{ $consultoria->extcon_codigo_consultoria }}</td>
                                <td>{{ $consultoria->extcon_nombre_entidad }}</td>
                                <td>{{ number_format($consultoria->extcon_valor, 0) }}</td>
                                <td>{{ $consultoria->extcon_fecha_inicio }}</td>
                                <td>{{ $consultoria->extcon_fecha_fin }}</td>
                                <td>
                                    <form action="/extension/{{ $consultoria->id }}/eliminarconsultoria" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $consultoria->id }}/verconsultoria"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $consultoria->id }}/editarconsultoria"><i
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
