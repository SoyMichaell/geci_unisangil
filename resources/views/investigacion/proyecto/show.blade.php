@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa">
            Programa</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
<style>
    h4 {
        color: brown;
        font-weight: 900;
    }

    li {
        font-size: 16px;
        text-decoration: none;
        list-style: none;
    }

    #integrantes {
        text-decoration: none;
    }

</style>
@section('content')
    <div class="container">
        <div class="row mb-3">
            <h4 style="float: right">Información proyecto</h4>
            <hr>
            <div class="col-md-8">
                <h5>Grupo de investigación</h5>
                <ul>
                    <li><strong>Grupo</strong><br>{{ Str::upper($proyecto->inv_nombre_grupo) }}</li>
                </ul>
                <h5>Información general</h5>
                <ul>
                    <li><strong>Titulo</strong><br>{{ $proyecto->invpro_titulo }}</li>
                    <li><strong>Resumen</strong><br>{{ $proyecto->invpro_resumen }}</li>
                    <li><strong>Impacto</strong><br>{{ $proyecto->invpro_impacto }}</li>
                    <li><strong>Lugar</strong><br>{{ $proyecto->invpro_lugar }}</li>
                    <li><strong>Resultados esperados</strong><br>{{ $proyecto->invpro_resultados }}</li>
                    <li><strong>Fecha inicio</strong><br>{{ $proyecto->invpro_fecha_inicio }}</li>
                    <li><strong>Estado</strong><br>{{ Str::ucfirst($proyecto->invpro_estado) }}</li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success btn-sm" href="/investigacion/{{ $proyecto->id }}/editarproyecto">Editar proyecto</a>
                </div>
                @php
                    $personas = explode(';', $proyecto->invpro_id_integrantes);
                @endphp
                <ul>
                    <li><strong>Investigadores vinculados</strong><br>
                        @foreach ($personas as $per)
                            {{ $per }}
                            <br>
                        @endforeach
                    </li>
                    <li><strong>Palabras claves</strong><br>{{ $proyecto->invpro_palabras_clave }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
