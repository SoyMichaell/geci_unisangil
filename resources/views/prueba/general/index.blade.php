@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/mostrarresultado">Resultado programa</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo prueba | resultados generales programa</h1>
    @section('message')
        <p>Listado de resultados.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 tile">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado de resultados</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="/prueba/crearresultado"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <br>
            <table class="table" id="tables">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Año</th>
                        <th>Programa</th>
                        <th>Código SNIES</th>
                        <th>Sede</th>
                        <th style="width: 7%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($resultados as $resultado)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $resultado->prurepro_year }}</td>
                            <td>{{ $resultado->pro_nombre }}</td>
                            <td>{{ $resultado->pro_codigosnies }}</td>
                            <td>{{ $resultado->mun_nombre }}</td>
                            <td>
                                <form action="/prueba/{{ $resultado->prurepro_id_programa }}/eliminaresultado"
                                    method="POST">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-sm"
                                            href="/prueba/{{ $resultado->prurepro_id_programa }}/verresultado"><i
                                                class="fa fa-folder-open"></i></a>
                                        <a class="btn btn-outline-info  btn-sm"
                                            href="/prueba/{{ $resultado->prurepro_id_programa }}/editarresultado"><i
                                                class="fa fa-edit"></i></a>
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
@endsection
@endif
