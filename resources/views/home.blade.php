@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-tachometer"></i> Bienvenido (a),
        {{ auth()->user()->per_nombre . ' ' . auth()->user()->per_apellido }} </h1>
@endsection

@section('content')
    <div class="container-fluid ">
        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
            <div class="row mb-3">
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa-regular fa-user-tie fa-3x"></i>
                        <div class="info">
                            <h4>Estudiantes</h4>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                        <div class="info">
                            <h4>Docentes</h4>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
                        <div class="info">
                            <h4>Egresados</h4>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->per_tipo_usuario == 2)
            <div class="alert alert-primary" role="alert">
                <strong>Complementar información docente <a href="{{url('docente/'.auth()->user()->id.'/directorcompletar')}}">Completar</a></strong>
            </div>
        @endif
        @if (Auth::user()->per_tipo_usuario == 1)
            <div class="row">
                <div class="col-md-12 d-flex justify-content-start align-items-center">
                    <a class="btn btn-success" href=""><i class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="tile col-md-12 mt-2">
                <h4 class="tile titulo">Usuarios en plataforma</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Tipo documento</th>
                                <th>Número documento</th>
                                <th>Nombre (s)</th>
                                <th>Apellido (s)</th>
                                <th>Correo electronico</th>
                                <th>Telefono</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($personas as $persona)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $persona->per_tipo_documento }}</td>
                                    <td>{{ $persona->per_numero_documento }}</td>
                                    <td>{{ $persona->per_nombre }} </td>
                                    <td>{{ $persona->per_apellido }}</td>
                                    <td>{{ $persona->per_correo }}</td>
                                    <td>{{ $persona->per_telefono }}</td>
                                    <td>{{ $persona->tiposusuario->tip_nombre }}</td>
                                    <td>
                                        <form action="" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm" href=""><i class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endif
    </div>
@endsection
