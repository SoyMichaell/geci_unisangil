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
            <div class="row">
                <div class="col-md-8">
                    <h4>Listado estudiantes</h4>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('estudiante/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <div class="dropdown">
                        <a class="btn btn-outline-success" style="border-radius: 100%" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-file-excel"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('estudiante/export') }}">Listado general</a>
                            <a class="dropdown-item" href="{{ url('estudiante/listadobeca') }}">Listado SF Beca</a>
                            <a class="dropdown-item" href="{{ url('estudiante/listadocontado') }}">Listado SF De
                                contado</a>
                            <a class="dropdown-item" href="{{ url('estudiante/listadoprestamo') }}">Listado SF
                                Prestamo</a>
                        </div>
                    </div>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success " href="{{ url('estudiante/create') }}"><i
                                class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Nombre(s)</th>
                            <th>Apellido (s)</th>
                            <th>Correo electronico</th>
                            <th>Año de ingreso</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $estudiante->estu_tipo_documento }}</td>
                                <td>{{ $estudiante->estu_numero_documento }}</td>
                                <td>{{ $estudiante->estu_nombre }}</td>
                                <td>{{ $estudiante->estu_apellido }}</td>
                                <td>{{ $estudiante->estu_correo }}</td>
                                <td>{{ $estudiante->estu_ingreso }}</td>
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
        <div class="col-md-5 tile">
            <form class="form-inline justify-content-center" action="/estudiante/listadoingreso" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label>Listado por periodo acádemico: </label>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select class="js-example-placeholder-single form-select" name="estu_ingreso" id="estu_ingreso">
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($ingresos as $ingreso)
                            <option value="{{ $ingreso->estu_ingreso }}">{{ $ingreso->estu_ingreso }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mb-2">Generar reporte</button>
            </form>
        </div>
    </div>
@endsection
@endif
