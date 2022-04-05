@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/convenio">Convenio</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo convenios</h1>
    @section('message')
        <p>Listado de registro convenios</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('convenio/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('convenio/exportexcel') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('convenio/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. convenio</th>
                            <th>Alcance</th>
                            <th>Tipo convenio</th>
                            <th>Institución</th>
                            <th>País</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Objeto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($convenios as $convenio)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $convenio->con_numero }}</td>
                                <td>{{ Str::ucfirst($convenio->con_alcance) }}</td>
                                <td>{{ $convenio->con_tipo }}</td>
                                <td>{{ $convenio->con_institucion }}</td>
                                <td>{{ $convenio->con_pais }}</td>
                                <td>{{ $convenio->con_fecha_inicio }}</td>
                                <td>{{ $convenio->con_fecha_final }}</td>
                                <td>{{ $convenio->con_observacion }}</td>
                                <td>
                                    <form action="{{ route('convenio.destroy', $convenio->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/convenio/{{ $convenio->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/convenio/{{ $convenio->id }}/edit"><i
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
