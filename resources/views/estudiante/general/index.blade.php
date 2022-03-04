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
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-success" href="/estudiante/crearreporte"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Programa</th>
                            <th>Periodo</th>
                            <th>Inscritos</th>
                            <th>Admitidos</th>
                            <th>Matriculados antiguos</th>
                            <th>Matriculados Primer Semestre</th>
                            <th>Matriculados total</th>
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
                                <td>{{ $general->esture_year }}</td>
                                <td>{{ $general->programas->pro_nombre }}</td>
                                <td>{{ $general->esture_periodo }}</td>
                                <td>{{ $general->esture_inscritos }}</td>
                                <td>{{ $general->esture_admitidos }}</td>
                                <td>{{ $general->esture_mat_antiguos }}</td>
                                <td>{{ $general->esture_mat_primer_semestre }}</td>
                                <td>{{ $general->esture_mat_total }}</a>
                                </td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td style="width: 10%">
                                        <form action="/estudiante/{{$general->id}}/eliminarreporte"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/estudiante/{{$general->id}}/verreporte"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/estudiante/{{$general->id}}/editarreporte"><i
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
