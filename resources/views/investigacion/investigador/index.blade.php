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
                    <h4>Listado investigadores</h4>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('estudiante/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <div class="dropdown">
                        <a class="btn btn-outline-success" style="border-radius: 100%" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-file-excel"></i>
                        </a>
                    </div>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success " href="{{ url('investigacion/crearintegrante') }}"><i
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
                            <th>Grupo de investigación</th>
                            <th>Investigador</th>
                            <th>CVLAC</th>
                            <th>Categoria</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($investigadores as $investigador)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ Str::upper($investigador->inv_nombre_grupo) }}</td>
                                <td>{{ $investigador->per_nombre.' '.$investigador->per_apellido }}</td>
                                <td>{{ $investigador->inves_enlace_cvlac }}</td>
                                <td>{{ $investigador->inves_categoria }}</td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td style="width: 10%">
                                        <form action=""
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/investigacion/{{ $investigador->id }}/verintegrante"><i
                                                        class="fa-solid fa-folder-open "></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/investigacion/{{ $investigador->id }}/editarintegrante"><i
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
