@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion/mostrarintegrante">Investigador</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Investigación</h1>
    @section('message')
        <p>Lista de registro investigadores</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="bg-white p-3 col-md-12 mt-2">
            <div class="row">
                <div class="col-md-8">
                    <h4>Listado investigadores</h4>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-outline-danger" href="{{ url('investigacion/exportpdfintegrante') }}"
                        title="Generar reporte pdf" target="_blank" style="border-radius: 100%"><i
                            class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('investigacion/exportexcelintegrante') }}"
                        title="Generar reporte pdf" target="_blank" style="border-radius: 100%"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success " href="{{ url('investigacion/crearintegrante') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($investigadores as $investigador)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ Str::upper($investigador->inv_nombre_grupo) }}</td>
                                <td>{{ $investigador->per_nombre . ' ' . $investigador->per_apellido }}</td>
                                <td>{{ $investigador->inves_enlace_cvlac }}</td>
                                <td>{{ $investigador->inves_categoria }}</td>
                                <td style="width: 10%">
                                    <form action="" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/investigacion/{{ $investigador->inves_id_persona }}/verintegrante"><i
                                                    class="fa fa-folder-open "></i></a>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="/investigacion/{{ $investigador->id }}/editarintegrante"><i
                                                    class="fa fa-refresh"></i></a>
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
        </div>
    </div>
@endsection
@endif
