@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo docentes</h1>
    @section('message')
        <p>Lista de registro docentes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex">
            <a class="btn btn-success" href="/docente/mostrardocentevisitante"><i class="fa fa-plus-circle"></i> Registro
                docentes visitantes</a>
        </div>
        <div class="tile col-md-12 mt-2 p-3">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('docente/exportpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('docente/exportexcel') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success " href="{{ url('docente/mostrardocente') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Nombre(s)</th>
                            <th>Apellido (s)</th>
                            <th>Correo electronico</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($personas as $persona)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $persona->per_tipo_documento }}</td>
                                <td>{{ $persona->per_numero_documento }}</td>
                                <td>{{ Str::upper($persona->per_nombre)}}</td>
                                <td>{{ Str::upper($persona->per_apellido) }}</td>
                                <td>{{ $persona->per_correo }}</td>
                                <td>{{ $persona->tip_nombre }}</td>
                                <td style="width: 10%;">
                                    <form
                                        action="/docente/{{ $persona->id }}/{{ $persona->per_id_estado }}/estado"
                                        method="POST">
                                        <div class="d-flex justify-content-end">
                                            @if ($persona->per_id_estado == 'activo')
                                                <a class="btn btn-sm" href="/docente/{{ $persona->id }}"
                                                    title="Ver registro"><i class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="{{ url('docente/' . $persona->id . '/directorcompletar') }}"
                                                    title="Editar registro"><i class="fa fa-refresh"></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="{{ url('docente/' . $persona->id . '/mostrarcontrato') }}"
                                                    title="Agregar contrato"><i class="fa fa-folder"></i></a>
                                                <a class="btn btn-outline-primary btn-sm"
                                                    href="{{ url('docente/' . $persona->id . '/mostrarevaluacion') }}"
                                                    title="Agregar evaluación docente"><i
                                                        class="fa fa-tasks"></i></a>
                                            @endif
                                            @csrf
                                            @method('PUT')
                                            @if ($persona->per_id_estado == 'activo')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-ban"></i></button>
                                            @else
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="fa fa-check-circle-o"></i></button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/docente/mostrarvinculacion">Vinculación docencia</a>
            </div>
        </div>
    </div>
@endsection
@endif
