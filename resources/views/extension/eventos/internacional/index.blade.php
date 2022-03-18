@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/software">Software</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo TIC'S</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista participantes</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('extension/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('extension/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('extension/creareventosinternacionales') }}"><i
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
                            <th>Alcance</th>
                            <th>Año</th>
                            <th>Periodo</th>
                            <th>Nombre del evento</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Lugar</th>
                            <th>Sede</th>
                            <th>Ponente (s)</th>
                            <th>País</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($internacionales as $internacional)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ Str::ucfirst($internacional->exevin_tipo) }}</td>
                                <td>{{ $internacional->exevin_year }}</td>
                                <td>{{ $internacional->exevin_periodo }}</td>
                                <td>{{ $internacional->exevin_nombre_evento }}</td>
                                <td>{{ $internacional->exevin_fecha_inicio }}</td>
                                <td>{{ $internacional->exevin_fecha_final }}</td>
                                <td>{{ $internacional->exevin_lugar }}</td>
                                <td>{{ $internacional->exevin_sede }}</td>
                                <td>{{ $internacional->exevin_ponentes }}</td>
                                <td>{{ $internacional->exevin_pais }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/extension/{{ $internacional->id }}/eliminareventosinternacionales"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/extension/{{ $internacional->id }}/vereventosinternacionales"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/extension/{{ $internacional->id }}/editareventosinternacionales"><i
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