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
                <a class="btn btn-success" href="/docente/{{$persona->id}}/crearasignatura"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
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
                                <th>ID</th>
                                <th>Año</th>
                                <th>Semestre</th>
                                <th>Asignatura</th>
                                <th>Grupo</th>
                                <th>Sede</th>
                                <th>Unidad</th>
                                <th style="width: 10%">Hra. semana docencia</th>
                                <th style="width: 10%">Hra. semana investigación</th>
                                <th style="width: 10%">Hra. semana extensión</th>
                                <th style="width: 10%">Hra. semana administrativas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaturas as $asignatura)
                            <tr>
                                <td>{{$asignatura->id}}</td>
                                <td>{{$asignatura->doa_year}}</td>
                                <td>{{$asignatura->doa_semestre}}</td>
                                <td>{{$asignatura->pas_nombre}}</td>
                                <td>{{$asignatura->doa_grupo}}</td>
                                <td>{{$asignatura->mun_nombre}}</td>
                                <td>{{$asignatura->doa_unidad}}</td>
                                <td>{{$asignatura->doa_horas_semana_doc}}</td>
                                <td>{{$asignatura->doa_horas_semana_inv}}</td>
                                <td>{{$asignatura->doa_horas_extension}}</td>
                                <td>{{$asignatura->doa_horas_admin}}</td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td>
                                        <form action="{{ url("asignatura/{$asignatura->id}") }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/docente/{{$persona->id}}/{{$asignatura->id}}/editarasignatura"><i
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
