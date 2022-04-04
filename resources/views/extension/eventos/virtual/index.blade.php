@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrareventosvirtuales">Eventos virtuales</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización | Eventos virtuales</h1>
    @section('message')
        <p>Listado de registro eventos virtuales</p>
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
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('extension/exporteventopdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('extension/exporteventoexcel') }}"
                        title="Generar reporte excel"><i class="fa fa-file-excel-o"></i></a>
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success" href="{{ url('extension/creareventosvirtuales') }}"><i
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
                            <th style="width: 30%">Nombre del evento</th>
                            <th style="width: 5%">Fecha inicio</th>
                            <th style="width: 5%">Fecha fin</th>
                            <th style="width: 5%">Enlace de ingreso</th>
                            <th style="width: 5%">Enlace de imagen</th>
                            <th style="width: 30%">Ponente (s)</th>
                            <th style="width: 30%">País</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($eventosvirtuales as $virtuales)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $virtuales->exevir_nombre_evento }}</td>
                                <td>{{ $virtuales->exevir_fecha_inicio }}</td>
                                <td>{{ $virtuales->exevir_fecha_fin }}</td>
                                <td><a href="{{ $virtuales->exevir_enlace_ingreso }}">{{ $virtuales->exevir_enlace_ingreso }}</a></td>
                                <td><a href="{{ $virtuales->exevir_enlace_imagen }}">{{ $virtuales->exevir_enlace_imagen }}</a></td>
                                <td>{{ $virtuales->exevir_nombre_ponente }}</td>
                                <td>{{ $virtuales->exevir_pais }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="/extension/{{ $virtuales->id }}/eliminareventosvirtuales"
                                            method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm"
                                                    href="/extension/{{ $virtuales->id }}/vereventosvirtuales"><i
                                                        class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/extension/{{ $virtuales->id }}/editareventosvirtuales"><i
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
