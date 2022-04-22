@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion/">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Investigación</h1>
    @section('message')
        <p>Listado de registro proyectos</p>
    @endsection
@endsection
<style>
    #card-investigacion {
        border: none;
        text-decoration: none;
    }

    #card-investigacion h4 {
        color: rgb(1, 76, 141);
        font-weight: 900;
    }

    #card-investigacion p {
        color: black;
    }

    #card-investigacion p span {
        font-size: 13px;
        font-style: italic;
    }

</style>
@section('content')
    <div class="container">
        <h3>Proyectos de investigación <a class="btn btn-success btn-sm" href="/investigacion/crearproyecto"><i
                    class="fa fa-plus-circle"></i> Crear nuevo proyecto</a>
                    <a class="btn btn-outline-danger"
                href="{{ url('investigacion/exportpdfproyecto') }}" title="Generar reporte pdf" target="_blank"><i
                    class="fa fa-file-pdf-o"></i></a>
            <a class="btn btn-outline-success" href="{{ url('investigacion/exportexcelproyecto') }}"
                title="Generar reporte pdf"><i class="fa fa-file-excel-o"></i></a>
        </h3>
        <hr>
        @if ($proyectos->count() > 0)
            @foreach ($proyectos as $proyecto)
                <a class="card col-md-12 p-3 mt-2" id="card-investigacion"
                    href="/investigacion/{{ $proyecto->id }}/verproyecto">
                    <h4>{{ Str::upper($proyecto->invpro_titulo) }}</h4>
                    <p>Estado proyecto: {{ $proyecto->invpro_estado }}<br>
                        <span>Grupo de investigación:
                            {{ $proyecto->inv_nombre_grupo }}</span>
                    </p>
                </a>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                <strong>No se evidencia proyecto registrados</strong>
            </div>
        @endif


    </div>
@endsection
@endif
