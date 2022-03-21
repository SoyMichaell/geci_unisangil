@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa">Programa</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
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
        <h3>Proyectos de investigación <a class="btn btn-outline-success btn-sm" href="/investigacion/crearproyecto"><i
                    class="fa-solid fa-circle-plus"></i> Crear nuevo proyecto</a></h3>
        <hr>
        @if ($proyectos->count() > 0)
            @foreach ($proyectos as $proyecto)
                <a class="card col-md-12 p-3 mt-2" id="card-investigacion"
                    href="/investigacion/{{$proyecto->id}}/verproyecto">
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
