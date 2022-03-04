@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-user"></i> Módulo docentes</h1>
    @section('message')
        <p>Lista de registro docentes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="tile table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Lista de registros</h3> <!-- TODO: arreglar botones pdf y excel-->
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <a class="btn btn-outline-danger" style="border-radius: 100%"
                                href="{{ url('docente/pdf') }}" title="Generar reporte pdf" target="_blank"><i
                                class="fa-solid fa-file-pdf"></i></a>
                            <a class="btn btn-outline-success" style="border-radius: 100%"
                                href="{{ url('docente/export') }}" title="Generar reporte excel" target="_blank"><i
                                    class="fa-solid fa-file-excel"></i></a>

                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Docente</th>
                                <th>No. contrato</th>
                                <th>Tipo contrato</th>
                                <th>Fecha inicio</th>
                                <th>Fecha final</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @foreach ($personas as $persona)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $persona->per_nombre.' '.$persona->per_apellido }}</td>
                                    <td>{{ $persona->doco_numero_contrato }}</td>
                                    <td>{{ $persona->doco_tipo_contrato }}</td>
                                    <td>{{ $persona->doco_fecha_inicio }}</td>
                                    <td>{{ $persona->doco_fecha_fin }}</td>
                                    <td>{{ $persona->doco_rol }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
