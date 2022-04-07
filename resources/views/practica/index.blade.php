@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/practica">Practica Laboral</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Practicas Laborales</h1>
    @section('message')
        <p>Listado de practicas laborales docentes / estudiantes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h4>Lista de registros</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center" style="margin-left: -30px">
                    <div class="dropdown">
                        <a class="btn btn-outline-danger" style="border-radius: 100%" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-file-pdf-o"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('practica/exportpdf') }}" target="_blank">Practica
                                laboral general</a>
                            <a class="dropdown-item" href="{{ url('practica/exportdocentepdf') }}"
                                target="_blank">Practica laboral
                                docentes</a>
                            <a class="dropdown-item" href="{{ url('practica/exportestudiantepdf') }}"
                                target="_blank">Practica laboral
                                estudiantes</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-outline-success" style="border-radius: 100%" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-file-pdf-o"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('practica/exportexcel') }}">Practica laboral
                                general</a>
                            <a class="dropdown-item" href="{{ url('practica/expordocenteexcel') }}">Practica laboral
                                docentes</a>
                            <a class="dropdown-item" href="{{ url('practica/exportestudianteexcel') }}">Practica
                                laboral
                                estudiantes</a>
                        </div>
                    </div>
                    <a class="btn btn-outline-success" href="{{ url('practica/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Año</th>
                            <th>Rol</th>
                            <th>Nombre completo</th>
                            <th>Razón social</th>
                            <th>Nit</th>
                            <th>Pais</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($practicas as $practica)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $practica->prac_year }}</td>
                                <td>{{ Str::ucfirst($practica->prac_rol) }}</td>
                                <td>{{ $practica->per_nombre . ' ' . $practica->per_apellido }}</td>
                                <td>{{ $practica->prac_razon_social }}</td>
                                <td>{{ $practica->prac_nit_empresa }}</td>
                                <td>{{ $practica->prac_pais }}</td>
                                <td>{{ $practica->prac_departamento }}</td>
                                <td>{{ $practica->prac_ciudad }}</td>
                                <td>{{ $practica->prac_direccion }}</td>
                                <td>{{ $practica->prac_telefono }}</td>
                                <td>
                                    <form action="{{ route('practica.destroy', $practica->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/practica/{{ $practica->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/practica/{{ $practica->id }}/edit"><i
                                                    class="fa fa-refresh"></i></a>
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
    </div>
@endsection
@endif
