@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/movilidad">Movilidad</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo movilidad</h1>
    @section('message')
        <p>Listado de registro movilidades</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('movilidad/exportpdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('movilidad/exportexcel') }}"
                        title="Generar reporte excel"><i class="fa fa-file-excel-o"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('movilidad/create') }}"><i
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
                            <th>Periodo</th>
                            <th>Rol</th>
                            <th>Nombre completo</th>
                            <th>Tipo de movilidad</th>
                            <th>Pais</th>
                            <th>Ciudad</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($movilidades as $movilidad)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $movilidad->movi_year }}</td>
                                <td>{{ $movilidad->movi_periodo }}</td>
                                <td>{{ Str::ucfirst($movilidad->movi_tipo_persona) }}</td>
                                <td>{{ ($movilidad->movi_tipo_persona == 'administrativo'? $movilidad->administrativos->per_nombre . ' ' . $movilidad->administrativos->per_apellido: '') .($movilidad->movi_tipo_persona == 'docente' ? $movilidad->docentes->per_nombre . ' ' . $movilidad->docentes->per_apellido: '') . ($movilidad->movi_tipo_persona == 'estudiante' ? $movilidad->estudiantes->per_nombre.' '.$movilidad->estudiantes->per_apellido : '') }}
                                </td>
                                <td>{{ $movilidad->movi_tipo_movilidad }}</td>
                                <td>{{ $movilidad->movi_pais }}</td>
                                <td>{{ $movilidad->movi_ciudad }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="{{ route('movilidad.destroy', $movilidad->id) }}"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/movilidad/{{ $movilidad->id }}"><i
                                                        class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/movilidad/{{ $movilidad->id }}/edit"><i
                                                        class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
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
