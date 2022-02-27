@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Listado asignaturas</h1>
    @section('message')
        <p>Historial de asignaturas</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">

            </div>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('asignatura/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('asignatura/export') }}" title="Generar reporte excel" target="_blank"><i
                            class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-success" href="{{ url('programa/crearasignatura') }}"><i
                                class="fa-solid fa-circle-plus"></i> Nuevo</a>
                    @endif

                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sede</th>
                            <th>Programa</th>
                            <th>Código</th>
                            <th>Asignatura</th>
                            <th>Plan</th>
                            <th>No. Hro creditos</th>
                            <th>No. Hro semanales</th>
                            <th>No. semestre</th>
                            <th>Estado</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($asignaturas as $asignatura)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $asignatura->sedes->mun_nombre }}</td>
                                <td>{{ $asignatura->programas->pro_nombre }}</td>
                                <td>{{ $asignatura->asig_codigo }}</td>
                                <td>{{ $asignatura->asig_nombre }}</td>
                                <td>{{ $asignatura->planes->pp_plan }}</td>
                                <td>{{ $asignatura->asig_no_creditos }}</td>
                                <td>{{ $asignatura->asig_no_semanales }}</td>
                                <td>{{ $asignatura->asig_no_semestre }}</td>
                                <td>
                                    <span
                                        class="badge badge-{{ $asignatura->asig_estado == 'activo' ? 'success' : 'danger' }}">{{ $asignatura->asig_estado }}</span>
                                </td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/programa/{{$asignatura->id}}/eliminarasignatura" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/programa/{{ $asignatura->id }}/editarasignatura"><i
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
