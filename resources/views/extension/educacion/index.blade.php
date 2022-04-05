@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/mostrareducacion">Educación continua</a> / <a href="/extension">Extension -
            internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo extensión e internacionalización | Educación
            continua</h1>
    @section('message')
        <p>Listado de registro educación continua</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h4>Lista cursos</h4> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%"
                        href="{{ url('extension/exporteducacionpdf') }}" title="Generar reporte pdf"
                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%"
                        href="{{ url('extension/exporteducacionexcel') }}" title="Generar reporte excel"><i
                            class="fa fa-file-excel-o"></i></a>
                    <a class="btn btn-outline-success" href="{{ url('extension/creareducacion') }}"><i
                            class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Semestre</th>
                            <th>Código curso</th>
                            <th>Número de horas</th>
                            <th>Tipo curso</th>
                            <th>Valor curso</th>
                            <th>Docente</th>
                            <th>Tipo extensión</th>
                            <th>Cantidad beneficiados</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($educacions as $educacion)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $educacion->extedu_semestre }}</td>
                                <td>{{ $educacion->extedu_codigo_curso }}</td>
                                <td>{{ $educacion->extedu_numero_horas }}</td>
                                <td>{{ $educacion->extedu_tipo_curso }}</td>
                                <td>{{ $educacion->extedu_valor_curso }}</td>
                                <td>{{ $educacion->docentes->per_nombre . ' ' . $educacion->docentes->per_apellido }}</td>
                                <td>{{ $educacion->extedu_tipo_extension }}</td>
                                <td>{{ $educacion->extedu_cantidad }}</td>
                                <td>
                                    <form action="/extension/{{ $educacion->id }}/eliminareducacion" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/extension/{{ $educacion->id }}/vereducacion"><i
                                                    class="fa fa-folder-open"></i></a>
                                            <a class="btn btn-outline-info btn-sm "
                                                href="/extension/{{ $educacion->id }}/editareducacion"><i
                                                    class="fa fa-refresh"></i></a>
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
