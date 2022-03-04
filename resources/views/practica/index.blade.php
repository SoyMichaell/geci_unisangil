@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/practica">Practica Laboral</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo Practicas Laborales</h1>
    @section('message')
        <p>Listado de redes acádemicas</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('practica/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('practica/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('practica/create') }}"><i
                                class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Nombre completo</th>
                            <th>Razón social</th>
                            <th>Nit</th>
                            <th>Pais</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($practicas as $practica)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $practica->prac_year }}</td>
                                <td>{{ ($practica->prac_id_docente != "" ? $practica->docentes->per_nombre.' '.$practica->docentes->per_apellido : '').($practica->prac_id_estudiante != "" ? $practica->estudiantes->estu_nombre.' '.$practica->estudiantes->estu_apellido : '') }}</td>
                                <td>{{ $practica->prac_razon_social }}</td>
                                <td>{{ $practica->prac_nit_empresa }}</td>
                                <td>{{ $practica->prac_pais }}</td>
                                <td>{{ $practica->prac_departamento }}</td>
                                <td>{{ $practica->prac_ciudad }}</td>
                                <td>{{ $practica->prac_direccion }}</td>
                                <td>{{ $practica->prac_telefono }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="{{ route('practica.destroy', $practica->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/practica/{{ $practica->id }}"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/practica/{{ $practica->id }}/edit"><i
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