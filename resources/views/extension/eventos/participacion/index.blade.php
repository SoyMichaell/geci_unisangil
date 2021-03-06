@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarparticipacioneventos">Participación Eventos </a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Participación
            eventos</h1>
    @section('message')
        <p>Listado de registro de participaciones a eventos</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de registro de participaciones a eventos</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportparticipacionpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportparticipacionexcel') }}" title="Generar reporte excel"
                        target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearparticipacioneventos') }}"><i
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
                            <th>Periodo</th>
                            <th>Tipo evento</th>
                            <th>Nombre evento</th>
                            <th>Fecha</th>
                            <th>Organizador</th>
                            <th>Nombre completo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($participaciones as $participacion)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $participacion->expaev_year }}</td>
                                <td>{{ $participacion->expaev_periodo }}</td>
                                <td>{{ $participacion->expaev_tipo_evento }}</td>
                                <td>{{ $participacion->expaev_nombre_evento }}</td>
                                <td>{{ $participacion->expaev_fecha }}</td>
                                <td>{{ $participacion->expaev_organizador }}</td>
                                <td>{{ $participacion->personas->per_nombre . ' ' . $participacion->personas->per_apellido }}
                                </td>
                                <td>{{ $participacion->personas->per_tipo_usuario == '2' ? 'Director programa docente' : 'Docente' }}
                                </td>
                                <td>
                                    <form action="/extension/{{ $participacion->id }}/eliminarparticipacioneventos"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $participacion->id }}/verparticipacioneventos"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $participacion->id }}/editarparticipacioneventos"><i
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
