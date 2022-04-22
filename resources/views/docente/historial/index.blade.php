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
                            <a class="btn btn-outline-success" href=""><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

                        </div>
                    </div>
                    <br>
                    <table class="table" id="tables">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Año</th>
                                <th>Semestre</th>
                                <th>Asignatura</th>
                                <th>Grupo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($historials as $historial)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $historial->pph_year }}</td>
                                    <td>{{ $historial->pph_semestre }}</td>
                                    <td>{{ $historial->asig_nombre }}</td>
                                    <td>{{ $historial->pph_grupo }}</td>
                                    <td>
                                        <form action="" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/docente/{{ $historial->programa_plan_estudio_asignatura . id }}/crearhistorial"><i
                                                        class="fa-solid fa-circle-plus"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i></button>
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
    </div>
@endsection
@endif
