@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion/mostrargrupo">Grupo</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo Investigación</h1>
    @section('message')
        <p>Listado de grupos de investigación</p>
    @endsection
@endsection
<style>
    #card-investigacion {
        text-decoration: none;
    }

    #card-investigacion h4 {
        color: brown;
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
        <h3>Grupos de investigación @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2) <a class="btn btn-success btn-sm" href="creargrupo"><i
                    class="fa-solid fa-circle-plus"></i> Crear nuevo grupo</a> @endif
            <a class="btn btn-outline-danger" href="{{ url('investigacion/exportpdfinvestigacion') }}"
                title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
            <a class="btn btn-outline-success" href="{{ url('investigacion/exportexcelinvestigacion') }}"
                title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
        </h3>
        <hr>
        @if ($grupos->count() > 0)
            @foreach ($grupos as $grupo)
                <a class="card col-md-12 p-3 mt-2" id="card-investigacion"
                    href="/investigacion/{{ $grupo->id }}/vergrupo">
                    <h4>{{ Str::upper($grupo->inv_nombre_grupo) }}</h4>
                    <p>{{ $grupo->inv_categoria_grupo == '' ? 'Sin categoria' : $grupo->inv_categoria_grupo }}<br>
                        <span>Lider grupo:
                            {{ $grupo->personas->per_nombre . ' ' . $grupo->personas->per_apellido }}</span>
                    </p>
                </a>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                <strong>No se evidencia grupos registrados</strong>
            </div>
        @endif


    </div>
@endsection
@endif
