@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Horarios asignatura</h1>
        <p>Listado horario asignaturas</p>
    @section('message')
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive tile mt-2">
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <h4>Listado registro horario</h4>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            <a class="btn btn-outline-success" href="/programa/crearhorario"><i
                                    class="fa fa-plus-circle"></i>
                                Nuevo</a>
                        </div>
                    </div>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Año</th>
                                <th>Semestre</th>
                                <th>Código asignatura</th>
                                <th>Grupo</th>
                                <th>Docente</th>
                                <th>Horario</th>
                                <th>Aula</th>
                                <th>Nro. horas semana docencia</th>
                                <th>Nro. horas semana investigación</th>
                                <th>Nro. horas semana extensión</th>
                                <th>Nro. horas semana labores administrativas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($horarios as $horario)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $horario->pph_year }}</td>
                                    <td>{{ $horario->pph_semestre }}</td>
                                    <td>{{ $horario->asignaturas->asig_nombre }}</td>
                                    <td>{{ $horario->pph_grupo }}</td>
                                    <td>{{ $horario->docentes->per_nombre . ' ' . $horario->docentes->per_apellido }}
                                    </td>
                                    <td>{{ $horario->pph_horario }}</td>
                                    <td>{{ $horario->pph_aula }}</td>
                                    <td>{{ $horario->pph_nro_horas_semana_docencia }}</td>
                                    <td>{{ $horario->pph_nro_horas_semana_investigacion }}</td>
                                    <td>{{ $horario->pph_nro_horas_semana_extension }}</td>
                                    <td>{{ $horario->pph_nro_horas_semana_administrativas }}</td>
                                    <td>
                                        <form action="/programa/{{ $horario->id }}/eliminarhorario" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="{{ url('programa/' . $horario->id . '/editarhorario') }}"
                                                    title="Editar registro"><i
                                                        class="fa fa-pen-to-square"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i
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
        </div>
    </div>
@endsection
@endif
