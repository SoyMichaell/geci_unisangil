@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Horarios asignatura</h1>
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
                            <h4>Listado plan de estudios</h4>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            <a class="btn btn-success" href="/programa/crearhorario"><i
                                    class="fa-solid fa-circle-plus"></i>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horarios as $horario)
                                <tr>
                                    <td>{{ $horario->id }}</td>
                                    <td>{{ $horario->pph_year }}</td>
                                    <td>{{ $horario->pph_semestre }}</td>
                                    <td>{{ $horario->asignaturas->asig_nombre }}</td>
                                    <td>{{ $horario->pph_grupo }}</td>
                                    <td>{{ $horario->docentes->per_nombre . ' ' . $horario->docentes->per_apellido }}
                                    </td>
                                    <td>{{ $horario->pph_horario }}</td>
                                    <td>{{ $horario->pph_aula }}</td>
                                    <td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <form action="/programa/{{ $horario->id }}/eliminarhorario" method="POST">
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{ url('programa/' . $horario->id . '/editarhorario') }}"
                                                        title="Editar registro"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit"><i
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
    </div>
@endsection
@endif
