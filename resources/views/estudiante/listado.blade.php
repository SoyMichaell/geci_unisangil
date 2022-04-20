@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Estudiantes</h1>
    @section('message')
        <p>Lista de registro estudiantes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2 p-4">
            <div class="row">
                <div class="col-md-8">
                    <h4>Listado estudiantes</h4>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('estudiante/' . $programax . '/exportpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <div class="dropdown">
                        <a class="btn btn-outline-success" style="border-radius: 100%" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item"
                                href="{{ url('estudiante/' . $programax . '/exportexcel') }}">Listado general
                                programa</a>
                            <a class="dropdown-item"
                                href="{{ url('estudiante/' . $programax . '/exportbecaexcel') }}">Listado SF Beca</a>
                            <a class="dropdown-item"
                                href="{{ url('estudiante/' . $programax . '/exportcontadoexcel') }}">Listado SF De
                                contado</a>
                            <a class="dropdown-item"
                                href="{{ url('estudiante/' . $programax . '/exportprestamoexcel') }}">Listado SF
                                Prestamo</a>
                        </div>
                    </div>
                    <a class="btn btn-outline-success " href="{{ url('estudiante/create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Nombre(s)</th>
                            <th>Apellido (s)</th>
                            <th>Correo electronico</th>
                            <th>Año de ingreso</th>
                            <th>¿Egresado?</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($programaestudiantes as $persona)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $persona->per_tipo_documento }}</td>
                                <td>{{ $persona->per_numero_documento }}</td>
                                <td>{{ $persona->per_nombre }}</td>
                                <td>{{ $persona->per_apellido }}</td>
                                <td>{{ $persona->per_correo }}</td>
                                <td>{{ $persona->estu_ingreso }}</td>
                                <td>{{ $persona->estu_egresado }} <a class="badge badge-info"
                                        href="/estudiante/{{ $persona->id }}/crearegresado">{{ $persona->estu_egresado == 'Si' ? 'Completar datos egresado' : '' }}</a>
                                </td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td style="width: 10%">
                                        <form action="{{ route('estudiante.destroy', $persona->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/estudiante/{{ $persona->id }}"><i
                                                        class="fa fa-folder-open "></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/estudiante/{{ $persona->id }}/edit"><i
                                                        class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                        class="fa fa-trash"></i></button>
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
        <hr>
        <div class="row">
            <div class="mt-3 tile" style="width: 600px; margin-left: 15px;">
                <h4><i class="fa fa-files-o"></i> Reporte por año de ingreso</h4><hr>
                <form action="/estudiante/{{ $programax }}/listadoingreso" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Listado por año de ingreso: </label>
                            <select class="form-control @error('estu_ingreso') is-invalid @enderror" name="estu_ingreso"
                                id="estu_ingreso">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($ingresos as $ingreso)
                                    <option value="{{ $ingreso->estu_ingreso }}">{{ $ingreso->estu_ingreso }}</option>
                                @endforeach
                            </select>
                            @error('estu_ingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-success mb-2">Generar reporte</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" mt-3 tile" style="width: 600px; margin-left: 15px;">
                <h4><i class="fa fa-files-o"></i> Reporte por periodo académico</h4>
                <hr>
                <form action="/estudiante/{{ $programax }}/listadoperiodoingreso" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Listado por periodo académico: </label>
                            <select class="form-control @error('estu_periodo_ingreso') is-invalid @enderror"
                                name="estu_periodo_ingreso" id="estu_periodo_ingreso">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($periodos as $periodo)
                                    <option value="{{ $periodo->estu_periodo_ingreso }}">
                                        {{ $periodo->estu_periodo_ingreso }}</option>
                                @endforeach
                            </select>
                            @error('estu_periodo_ingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success mb-2">Generar reporte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif
