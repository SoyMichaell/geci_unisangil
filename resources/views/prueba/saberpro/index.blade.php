@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/mostrarsaberpro">Saber pro</a> / <a href="/prueba">Prueba</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo pruebas saber PRO</h1>
    @section('message')
        <p>Listado pruebas saber pro</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado pruebas saber PRO</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="/prueba/crearsaberpro"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <br>
            <table class="table" id="tables">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Año presentación</th>
                        <th>Periodo</th>
                        <th>Estudiante</th>
                        <th>Número de registro</th>
                        <th>Grupo de referencia</th>
                        <th>Puntaje global</th>
                        <th>Percentil nacional</th>
                        <th>Percentil grupo</th>
                        <th style="width: 7%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($pros as $pro)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $pro->prsapr_year }}</td>
                            <td>{{ $pro->prsapr_periodo }}</td>
                            <td>{{ $pro->per_nombre . ' ' . $pro->per_apellido }}</td>
                            <td>{{ $pro->prsapr_numero_registro }}</td>
                            <td>{{ $pro->prsapr_grupo_referencia }}</td>
                            <td>{{ $pro->prsapr_puntaje_global }}</td>
                            <td>{{ $pro->prsapr_percentil_nacional }}</td>
                            <td>{{ $pro->prsapr_percentil_grupo }}</td>
                            <td>
                                <form action="/prueba/{{ $pro->prsapr_id_estudiante }}/eliminarsaberpro"
                                    method="POST">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-sm"
                                            href="/prueba/{{ $pro->prsapr_id_estudiante }}/versaberpro"><i
                                                class="fa fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info  btn-sm"
                                            href="/prueba/{{ $pro->prsapr_id_estudiante }}/editarsaberpro"><i
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
