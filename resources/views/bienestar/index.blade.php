@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/bienestar">Bienestar Institucional</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo bienestar institucional</h1>
    @section('message')
        <p>Listado de registro eventos bienestar</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('bienestar/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('bienestar/exportexcel') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('bienestar/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Actividad</th>
                            <th>Total participantes</th>
                            <th>Soporte</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($bienestars as $bienestar)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $bienestar->bie_fecha }}</td>
                                <td>{{ $bienestar->bie_nombre_actividad }}</td>
                                <td>{{ $bienestar->bie_total_participantes }}</td>
                                <td>{{ $bienestar->bie_soporte }}</td>
                                <td>
                                    <form action="{{ route('bienestar.destroy', $bienestar->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/bienestar/{{ $bienestar->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/bienestar/{{ $bienestar->id }}/edit"><i
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
