@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrarparticipante">Participante</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo extensión e internacionalización | Participante</h1>
    @section('message')
        <p>Listado de registro participantes</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de registros</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('extension/exportparticipantepdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('extension/exportparticipanteexcel') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('extension/crearparticipante') }}"><i
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
                            <th>Tipo documento</th>
                            <th>Número de documento</th>
                            <th>Nombre completo</th>
                            <th>Telefono</th>
                            <th>Correo electronico personal</th>
                            <th>Correo electronico institucional</th>
                            <th>Dirección</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($participantes as $participante)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $participante->docentes->per_tipo_documento }}</td>
                                <td>{{ $participante->docentes->per_numero_documento }}</td>
                                <td>{{ Str::ucfirst($participante->docentes->per_nombre).' '.Str::ucfirst($participante->docentes->per_apellido) }}</td>
                                <td>{{ $participante->docentes->per_telefono }}</td>
                                <td>{{ $participante->dop_correo_personal }}</td>
                                <td>{{ $participante->docentes->per_correo}}</td>
                                <td>{{ $participante->dop_direccion }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/extension/{{ $participante->id }}/eliminarparticipante"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/extension/{{ $participante->id }}/verparticipante"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/extension/{{ $participante->id }}/editarparticipante"><i
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
