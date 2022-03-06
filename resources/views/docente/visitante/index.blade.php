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
                            <a class="btn btn-outline-success" href="/docente/creardocentevisitante"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo documento</th>
                                <th>Número de documento</th>
                                <th>Nombre (s)</th>
                                <th>Apellido (s)</th>
                                <th>Telefono</th>
                                <th>Correo electronico</th>
                                <th>Entidad</th>
                                <th>País</th>
                                <th>Ciudad</th>
                                <th>Fecha estadía</th>
                                <th>Soporte</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($docentevisitantes as $docentevisitante)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $docentevisitante->docvi_tipo_documento }}</td>
                                    <td>{{ $docentevisitante->docvi_numero_documento }}</td>
                                    <td>{{ $docentevisitante->docvi_nombre }}</td>
                                    <td>{{ $docentevisitante->docvi_apellido }}</td>
                                    <td>{{ $docentevisitante->docvi_telefono }}</td>
                                    <td>{{ $docentevisitante->docvi_correo }}</td>
                                    <td>{{ $docentevisitante->docvi_entidad_origen }}</td>
                                    <td>{{ $docentevisitante->docvi_pais }}</td>
                                    <td>{{ $docentevisitante->docvi_ciudad }}</td>
                                    <td>{{ $docentevisitante->docvi_fecha_estadia }}</td>
                                    <td><a href="{{asset('datos/visitante/'.$docentevisitante->docvi_url_soporte)}}"><small>{{ $docentevisitante->docvi_url_soporte }}</small></a></td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <td>
                                            <form action="/docente/{{$docentevisitante->id}}/eliminardocentevisitante" method="POST">
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/docente/{{$docentevisitante->id}}/editardocentevisitante"><i
                                                            class="fa-solid fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
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
    </div>
@endsection
@endif
