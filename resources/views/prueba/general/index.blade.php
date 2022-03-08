@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 tile">
            <div class="row">
                <div class="col-md-6">
                    <h4>Listado módulos</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="/prueba/crearresultado"><i
                            class="fa-solid fa-circle-plus"></i>
                        Nuevo</a>
                </div>
            </div>
            <br>
            <table class="table table-bordered" id="tables">
                <thead>
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
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <form action="/prueba/{{ $resultado->prurepro_id_programa }}/eliminaresultado"
                                        method="POST">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-sm"
                                                href="/prueba/{{ $resultado->prurepro_id_programa }}/verresultado"><i
                                                    class="fa-solid fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info  btn-sm"
                                                href="/prueba/{{ $resultado->prurepro_id_programa }}/editarresultado"><i
                                                    class="fa-solid fa-edit"></i></a>
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
@endsection
@endif
