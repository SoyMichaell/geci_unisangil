@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-users"></i> Módulo Estudiantes</h1>
    @section('message')
        <p>Lista de registro estudiantes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="table-responsive">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Periodo</th>
                            <th>Inscritos</th>
                            <th>Admitidos</th>
                            <th>Matriculados antiguos</th>
                            <th>Matriculados Primer Semestre</th>
                            <th>Matriculados total</th>
                            <th>Programa</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($generales as $general)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $general->estu_tipo_documento }}</td>
                                <td>{{ $general->estu_numero_documento }}</td>
                                <td>{{ $general->estu_nombre }}</td>
                                <td>{{ $general->estu_apellido }}</td>
                                <td>{{ $general->estu_correo }}</td>
                                <td>{{ $general->estu_ingreso }}</td>
                                <td>{{ $general->estu_ingreso }}</a>
                                </td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td style="width: 10%">
                                        <form action="{{ route('estudiante.destroy', $estudiante->id) }}"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/estudiante/{{ $estudiante->id }}"><i
                                                        class="fa-solid fa-folder-open "></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/estudiante/{{ $estudiante->id }}/edit"><i
                                                        class="fa-solid fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
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
@endsection
@endif
