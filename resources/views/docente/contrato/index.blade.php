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
            <div class="d-flex justify-content-end">
                <a class="btn btn-success" href="/docente/{{ $persona->id }}/crearcontrato"><i
                        class="fa-solid fa-circle-plus"></i> Nuevo</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="tile table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Lista de registros</h3> <!-- TODO: arreglar botones pdf y excel-->
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-primary" style="border-radius: 100%" data-bs-toggle="modal" data-bs-target="#listadopdf"><i
                                class="fa-solid fa-file-pdf"></i></a></button>
                            <a class="btn btn-outline-danger" 
                                href="{{ url('docente/pdf') }}" title="Generar reporte pdf" target="_blank">
                            <a class="btn btn-outline-success" style="border-radius: 100%"
                                href="{{ url('docente/export') }}" title="Generar reporte excel" target="_blank"><i
                                    class="fa-solid fa-file-excel"></i></a>

                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>No. contrato</th>
                                <th>Objeto</th>
                                <th>Tipo de contrato</th>
                                <th>Fecha inicio</th>
                                <th>Fecha final</th>
                                <th>Rol</th>
                                <th>Soporte</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contratos as $contrato)
                                <tr>
                                    <td>{{ $contrato->doco_numero_contrato }}</td>
                                    <td>{{ $contrato->doco_objeto_contrato }}</td>
                                    <td>{{ Str::ucfirst($contrato->doco_tipo_contrato) }}</td>
                                    <td>{{ $contrato->doco_fecha_inicio }}</td>
                                    <td>{{ $contrato->doco_fecha_fin }}</td>
                                    <td>{{ $contrato->doco_rol }}</td>
                                    <td>
                                        <a href="{{ asset('/datos/contrato/' . $contrato->doco_url_soporte) }}"
                                            target="_blank">{{ $contrato->doco_url_soporte }}</a>
                                    </td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <td>
                                            <form action="{{ url("docente/{$contrato->id}/eliminarcontrato") }}"
                                                method="POST">
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/docente/{{ $persona->id }}/{{ $contrato->id }}/editarcontrato"><i
                                                            class="fa-solid fa-refresh"></i></a>
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
