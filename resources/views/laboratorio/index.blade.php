@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/laboratorio">Laboratorios</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Laboratorios</h1>
    @section('message')
        <p>Listado de registro laboratorios</p>
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
                        href="{{ url('laboratorio/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('laboratorio/exportexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('laboratorio/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Laboratorio</th>
                            <th>Ubicación</th>
                            <th>Docente</th>
                            <th>Facultad</th>
                            <th>Programa</th>
                            <th>Responsable ambiente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($laboratorios as $laboratorio)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $laboratorio->lab_fecha }}</td>
                                <td>{{ $laboratorio->lab_nombre }}</td>
                                <td>{{ $laboratorio->lab_ubicacion }}</td>
                                <td>{{ Str::upper($laboratorio->docentes->per_nombre . ' ' . $laboratorio->docentes->per_apellido) }}
                                </td>
                                <td>{{ $laboratorio->facultades->fac_nombre }}</td>
                                <td>{{ $laboratorio->programas->pro_nombre }}</td>
                                <td>{{ $laboratorio->estudiantes->per_nombre . ' ' . $laboratorio->estudiantes->per_apellido }}
                                </td>
                                <td>
                                    <form action="{{ route('laboratorio.destroy', $laboratorio->id) }}"
                                        method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/laboratorio/{{ $laboratorio->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/laboratorio/{{ $laboratorio->id }}/edit"><i
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
