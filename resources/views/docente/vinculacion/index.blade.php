@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Módulo docentes | vinculación docencia</h1>
    @section('message')
        <p>Listado vinculación contratos docentes</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="tile p-3 table-responsive">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Lista de registros</h3> <!-- TODO: arreglar botones pdf y excel-->
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('docente/exportvinculacionpdf') }}"
                            title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        <a class="btn btn-outline-success" style="border-radius: 100%"
                            href="{{ url('docente/exportvinculacionexcel') }}" title="Generar reporte excel"><i
                                class="fa fa-file-excel-o"></i></a>

                    </div>
                </div>
                <br>
                <table class="table" id="tables">
                    <thead class="bg-light">
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
                        <?php $i = 1; ?>
                        @foreach ($personas as $persona)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $persona->per_nombre . ' ' . $persona->per_apellido }}</td>
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
@endsection
@endif
