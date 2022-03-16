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
                        <a class="btn btn-outline-success" href="{{ url('extension/crearmovilidadintersede') }}"><i
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
                            <th>Tipo</th>
                            <th>Rol</th>
                            <th>Sede origen</th>
                            <th>Facultad origen</th>
                            <th>Programa origen</th>
                            <th>Nombre completo</th>
                            <th>Tipo de movilidad</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($movilidadintersedes as $intersede)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $intersede->exmoin_tipo }}</td>
                                <td>{{ $intersede->exmoin_rol }}</td>
                                <td>{{ $intersede->municipios->mun_nombre }}</td>
                                <td>{{ $intersede->facultades->fac_nombre }}</td>
                                <td>{{ $intersede->programas->pro_nombre }}</td>
                                <td>{{ $intersede->exmoin_tipo == 'estudiante' ? $intersede->estu_nombre.' '.$intersede->estu_apellido : $intersede->docentes->per_nombre.' '.$intersede->docentes->per_apellido }}</td>
                                <td>{{ $intersede->exmoin_tipo_movilidad }}</td>
                                <td>{{ $intersede->exmoin_fecha_inicio }}</td>
                                <td>{{ $intersede->exmoin_fecha_final }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/extension/{{ $intersede->id }}/eliminarmovilidadintersede"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/extension/{{ $intersede->id }}/vermovilidadintersede"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/extension/{{ $intersede->id }}/editarmovilidadintersede"><i
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
