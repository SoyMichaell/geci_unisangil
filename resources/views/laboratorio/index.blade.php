@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')

    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo TIC'S</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('software/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('software/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('laboratorio/create') }}"><i
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
                            <th>Fecha</th>
                            <th>Laboratorio</th>
                            <th>Ubicación</th>
                            <th>Docente</th>
                            <th>Facultad</th>
                            <th>Programa</th>
                            <th>Responsable ambiente</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
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
                                <td>{{ $laboratorio->docentes->per_nombre.' '.$laboratorio->docentes->per_apellido }}</td>
                                <td>{{ $laboratorio->facultades->fac_nombre }}</td>
                                <td>{{ $laboratorio->programas->pro_nombre }}</td>
                                <td>{{ $laboratorio->estudiantes->estu_nombre.' '.$laboratorio->estudiantes->estu_apellido }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="{{ route('laboratorio.destroy', $laboratorio->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/laboratorio/{{ $laboratorio->id }}"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/laboratorio/{{ $laboratorio->id }}/edit"><i
                                                        class="fa-solid fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i></button>
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
