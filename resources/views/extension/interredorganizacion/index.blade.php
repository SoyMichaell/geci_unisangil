@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarinterorganizacion">Red organizaciones</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i>  Módulo extensión e internacionalización | Redes disciplinarias - asociaciones</h1>
    @section('message')
        <p>Listado de registro de redes disciplinarias - asociaciones - organizaciones</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de redes disciplinarias - asociaciones - organizaciones</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('extension/exportredorganizacionpdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('extension/exportredorganizacionexcel') }}"
                        title="Generar reporte excel"><i class="fa fa-file-excel-o"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('extension/crearinterorganizacion') }}"><i
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
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Cáracter</th>
                            <th>Fecha</th>
                            <th>Función</th>
                            <th>No. Participantes</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($interredorganizaciones as $interredorganizacion)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $interredorganizacion->exseor_year }}</td>
                                <td>{{ $interredorganizacion->exseor_periodo }}</td>
                                <td>{{ $interredorganizacion->exseor_tipo }}</td>
                                <td>{{ $interredorganizacion->exseor_nombre }}</td>
                                <td>{{ $interredorganizacion->exseor_caracter }}</td>
                                <td>{{ $interredorganizacion->exseor_fecha }}</td>
                                <td>{{ $interredorganizacion->exseor_funcion }}</td>
                                <td>{{ $interredorganizacion->exseor_participantes }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form
                                            action="/extension/{{ $interredorganizacion->id }}/eliminarinterorganizacion"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/extension/{{ $interredorganizacion->id }}/verinterorganizacion"><i
                                                        class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/extension/{{ $interredorganizacion->id }}/editarinterorganizacion"><i
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
