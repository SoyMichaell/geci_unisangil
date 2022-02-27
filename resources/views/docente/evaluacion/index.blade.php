@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{$persona->id}}/mostrarevaluacion">Evaluación</a> / <a href="/docente">Docente</a>
    @endsection
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
                <a class="btn btn-success" href="/docente/{{ $persona->id }}/crearevaluacion"><i
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
                                <th>Año</th>
                                <th>Semestre</th>
                                <th>Cal. Autoevaluación</th>
                                <th>Cal. Heteroevaluación</th>
                                <th>Cal. Coevaluación</th>
                                <th>Total promedio</th>
                                <th>Observación</th>
                                <th>Documento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluacions as $evaluacion)
                                <tr>
                                    <td>{{ $evaluacion->doe_year }}</td>
                                    <td>{{ $evaluacion->doe_semestre }}</td>
                                    <td>{{ $evaluacion->doe_cal_auto }}</td>
                                    <td>{{ $evaluacion->doe_cal_hete }}</td>
                                    <td>{{ $evaluacion->doe_cal_coe }}</td>
                                    <td>{{ $evaluacion->doe_total_pro }}</td>
                                    <td>{{ $evaluacion->doe_observacion }}</td>
                                    <td>
                                        <a href="{{ asset('/docente/evaluacion/' . $evaluacion->doe_url_evaluacion) }}"
                                            target="_blank">{{$evaluacion->doe_url_evaluacion}}</a>
                                    </td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <td>
                                            <form action="{{ url("docente/{$evaluacion->id}/eliminarevaluacion") }}" method="POST">
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/docente/{{$persona->id}}/{{$evaluacion->id}}/editarevaluacion"><i
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
