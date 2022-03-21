@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-wpforms"></i> Módulo trabajo de grado</h1>
    @section('message')
        <p>Lista de registro trabajo de grado</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <a class="btn btn-success" href="{{ url('modalidad') }}">Modalidad de grado</a>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Lista de registros</h3><!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('trabajo/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('trabajo/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success " href="{{ url('trabajo/create') }}"><i
                                class="fa-solid fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código proyecto</th>
                            <th>Titulo de proyecto</th>
                            <th>Autores</th>
                            <th>Director</th>
                            <th>Codirector</th>
                            <th>Fecha inicio</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($trabajos as $trabajo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $trabajo->tra_codigo_proyecto }}</td>
                                <td>{{ $trabajo->tra_titulo_proyecto }}</td>
                                <td>{{ $trabajo->tra_id_estudiante }}</td>
                                <td>{{ $trabajo->directores->per_nombre.' '.$trabajo->directores->per_apellido }}</td>
                                <td>{{ $trabajo->codirectores->per_nombre.' '.$trabajo->codirectores->per_apellido }}</td>
                                <td>{{ $trabajo->tra_fecha_inicio }}</td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td>
                                        <form action="{{ route('trabajo.destroy', $trabajo->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/trabajo/{{ $trabajo->id }}"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/trabajo/{{ $trabajo->id }}/edit"><i
                                                        class="fa-solid fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@endif