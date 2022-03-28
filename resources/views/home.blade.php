@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-tachometer"></i> Bienvenido (a),
        {{ Str::ucfirst(auth()->user()->per_nombre . ' ' . auth()->user()->per_apellido) }} </h1>
@endsection

@section('content')
    <div class="container-fluid ">
        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
            <div class="row mb-3">
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-book-open-reader fa-3x"></i>
                        <div class="info">
                            <h4>Plan de estudio</h4>
                            <a href="/programa/mostrarplan">Crear</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-bookmark fa-3x"></i>
                        <div class="info">
                            <h4>Asignaturas</h4>
                            <a href="/programa/mostrarasignatura">Crear</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-calendar-days fa-3x"></i>
                        <div class="info">
                            <h4>Asignación horarios</h4>
                            <a href="/programa/mostrarhorario">Crear</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-school fa-3x"></i>
                        <div class="info">
                            <h4>Estudiantes</h4>
                            <p><b>({{$estudiantes->count()}})</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                        <div class="info">
                            <h4>Docentes</h4>
                            <p><b>({{$docentes->count()}})</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
                        <div class="info">
                            <h4>Egresados</h4>
                            <p><b>({{$egresados->count()}})</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
                        <div class="info">
                            <h4>Personal administrativo</h4>
                            <p><b>({{$administrativos->count()}})</b>
                            
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
            <div class="bg-white p-3 col-md-12 mt-2">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="titulo">Usuarios en plataforma</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-outline-success" href=""><i class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    </div>
                </div>
                <div class="table-responsive mt-3">
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
                                    <td>{{ $persona->tip_nombre }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endif
    </div>
@endsection
