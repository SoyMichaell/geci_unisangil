@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/mostratipoprueba">Saber 11</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo pruebas saber 11</h1>
    @section('message')
        <p>Listado pruebas saber 11.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado pruebas saber 11</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('prueba/exportsaberpdf') }}" title="Generar reporte pdf" target="_blank"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('prueba/exportexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="/prueba/crearsaber"><i class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <br>
            <table class="table" id="tables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Año presentación</th>
                        <th>Estudiante</th>
                        <th>Periodo</th>
                        <th>Puntaje global</th>
                        <th style="width: 7%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($saberes as $saber)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $saber->prueba_saber_year }}</td>
                            <td>{{ $saber->per_nombre . ' ' . $saber->per_apellido }}</td>
                            <td>{{ $saber->prueba_saber_periodo }}</td>
                            <td>{{ number_format($saber->prueba_saber_puntaje_global, 2) }}</td>
                            <td>
                                <form action="/prueba/{{ $saber->prueba_saber_id_estudiante }}/eliminarsaber"
                                    method="POST">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-sm"
                                            href="/prueba/{{ $saber->prueba_saber_id_estudiante }}/versaber"><i
                                                class="fa fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info  btn-sm"
                                            href="/prueba/{{ $saber->prueba_saber_id_estudiante }}/editarsaber"><i
                                                class="fa fa-edit"></i></a>
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
@endsection
@endif
