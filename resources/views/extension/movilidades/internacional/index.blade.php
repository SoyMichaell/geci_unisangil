@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarmovilidadinternacional">Movilidad internacional</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Movilidad
            internacional</h1>
    @section('message')
        <p>Listado de registro movilidad internacional</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de registro movilidad internacional</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportmovilidadinternacionalpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportmovilidadinternacionalexcel') }}"
                        title="Generar reporte excel"><i class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearmovilidadinternacional') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Rol</th>
                            <th>Sede origen</th>
                            <th>Facultad origen</th>
                            <th>Programa origen</th>
                            <th>Nombre completo</th>
                            <th>Tipo de movilidad</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($movilidadinternacionales as $internacional)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $internacional->exmointer_tipo }}</td>
                                <td>{{ $internacional->exmointer_rol }}</td>
                                <td>{{ $internacional->municipios->mun_nombre }}</td>
                                <td>{{ $internacional->facultades->fac_nombre }}</td>
                                <td>{{ $internacional->programas->pro_nombre }}</td>
                                <td>{{ $internacional->docentes->per_nombre . ' ' . $internacional->docentes->per_apellido }}
                                </td>
                                <td>{{ $internacional->exmointer_tipo_movilidad }}</td>
                                <td>{{ $internacional->exmointer_fecha_inicio }}</td>
                                <td>{{ $internacional->exmointer_fecha_final }}</td>
                                <td>
                                    <form action="/extension/{{ $internacional->id }}/eliminarmovilidadinternacional"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $internacional->id }}/editarmovilidadinternacional"><i
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
