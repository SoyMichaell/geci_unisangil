@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/software">Software</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo TIC'S</h1>
    @section('message')
        <p>Listado de registro software en uso</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex">
            <a class="btn btn-success" href="{{ url('software/mostrarrecurso') }}"><i class="fa fa-plus-circle"></i>
                Recursos tecnológicos</a>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('software/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('software/exportexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('software/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo software</th>
                            <th>Software</th>
                            <th>Desarrollador</th>
                            <th>Versión</th>
                            <th>Año adquisición licencia</th>
                            <th>Año vencimiento licencia</th>
                            <th>Programa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($softwares as $software)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $software->sof_tipo }}</td>
                                <td>{{ $software->sof_nombre }}</td>
                                <td>{{ $software->sof_desarrollador }}</td>
                                <td>{{ $software->sof_version }}</td>
                                <td>{{ $software->sof_year_ad_licencia }}</td>
                                <td>{{ $software->sof_year_ve_licencia }}</td>
                                <td>{{ $software->sof_id_programa }}</td>
                                <td>
                                    <form action="{{ route('software.destroy', $software->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/software/{{ $software->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/software/{{ $software->id }}/edit"><i
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
