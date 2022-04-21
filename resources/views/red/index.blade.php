@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/red">Redes académicas</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Redes Acádemicas</h1>
    @section('message')
        <p>Listado de redes acádemicas</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista de registros</h4> 
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('red/exportpdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('red/exportexcel') }}"
                        title="Generar reporte excel"><i class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('red/create') }}"><i
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
                            <th>Nombre red</th>
                            <th>Nombre contacto</th>
                            <th>Telefono</th>
                            <th>País</th>
                            <th>Ciudad</th>
                            <th>Alcance</th>
                            <th>Programa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($redes as $red)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $red->red_year }}</td>
                                <td>{{ $red->red_nombre }}</td>
                                <td>{{ $red->red_nombre_contacto }}</td>
                                <td>{{ $red->red_telefono }}</td>
                                <td>{{ $red->red_pais }}</td>
                                <td>{{ $red->red_ciudad }}</td>
                                <td>{{ $red->red_alcance }}</td>
                                <td>{{ $red->red_id_programa }}</td>
                                <td>
                                    <form action="{{ route('red.destroy', $red->id) }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm" href="/red/{{ $red->id }}"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/red/{{ $red->id }}/edit"><i class="fa fa-refresh"></i></a>
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
