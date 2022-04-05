@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/mostrarasignatura">Asignaturas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo Programa</h1>
    @section('message')
        <p>Listado de asignaturas</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('programa/crearasignatura') }}"><i
                                class="fa fa-plus-circle"></i> Nuevo</a>
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
                            <th>Acciones</th>
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
                                    <form action="/programa/{{ $asignatura->id }}/eliminarasignatura" method="POST">
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
