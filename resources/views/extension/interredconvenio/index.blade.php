@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarinterredconvenio">Red convenio</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Redes académicas
        </h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado red convenio</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exportredacademiapdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exportredacademiaexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/crearinterredconvenio') }}"><i
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
                            <th>IES</th>
                            <th>Cáracter</th>
                            <th>Fecha</th>
                            <th>Función</th>
                            <th>No. Participantes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($interredconvenios as $interredconvenio)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $interredconvenio->exsered_year }}</td>
                                <td>{{ $interredconvenio->exsered_periodo }}</td>
                                <td>{{ $interredconvenio->exsered_ies }}</td>
                                <td>{{ $interredconvenio->exsered_caracter }}</td>
                                <td>{{ $interredconvenio->exsered_fecha }}</td>
                                <td>{{ $interredconvenio->exsered_funcion }}</td>
                                <td>{{ $interredconvenio->exsered_participantes }}</td>
                                <td>
                                    <form action="/extension/{{ $interredconvenio->id }}/eliminarinterredconvenio"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $interredconvenio->id }}/verinterredconvenio"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $interredconvenio->id }}/editarinterredconvenio"><i
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
