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
    h4 {
        color: brown;
        font-weight: 900;
    }

    li {
        font-size: 16px;
        text-decoration: none;
        list-style: none;
    }

</style>
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                <h4 class="fw-bold">Coordinador</h4>
                <p>{{ $grupo->personas->per_nombre . ' ' . $grupo->personas->per_apellido }}</p>
                <hr>
                <h4 class="fw-bold">Información general</h4>
                <ul>
                    <li><strong>Grupo</strong> <br> {{ $grupo->inv_nombre_grupo }}</li>
                    <li><strong>Correo institucional</strong> <br> {{ $grupo->inv_correo_institucional_grupo }}</li>
                    <li><strong>Código MinCiencias</strong> <br> {{ $grupo->inv_codigo_minciencias }}</li>
                    <li><strong>Plan estratégico</strong> <br> Misión <br> {{ $grupo->inv_mision }} <br> Visión <br>
                        {{ $grupo->inv_vision }}</li>
                    <li><strong>Enlace del grupo</strong> <br> <a
                            href="{{ $grupo->inv_url_grupo }}">{{ $grupo->inv_url_grupo == '' ? 'Sin registro' : $grupo->inv_url_grupo }}</a>
                    </li>
                    <li><strong>Enlace GrupLac</strong> <br> <a
                            href="{{ $grupo->inv_url_gruplac }}">{{ $grupo->inv_url_gruplac == '' ? 'Sin registro' : $grupo->inv_url_gruplac }}</a>
                    </li>
                    <li><strong>Área de conocimiento (Principal)</strong> <br>
                        {{ $grupo->inv_area_conocimiento_principal == '' ? 'Sin registro' : $grupo->inv_area_conocimiento_principal }}
                    </li>
                    <li><strong>Nucleo del conocimiento (NBC)</strong> <br>
                        {{ $grupo->inv_nucleo_conocimiento_nbc == '' ? 'Sin registro' : $grupo->inv_nucleo_conocimiento_nbc }}
                    </li>
                    <li><strong>Sede</strong> <br> {{ $grupo->sedes->mun_nombre }}</li>
                    <li><strong>Facultad</strong> <br> {{ $grupo->facultades->fac_nombre }}</li>
                    <li><strong>Categoria</strong> <br>
                        {{ $grupo->inv_categoria_grupo == '' ? 'Sin registro' : $grupo->inv_categoria_grupo }}</li>
                    <li><strong>Aval MinCiencias</strong> <br>
                        {{ $grupo->inv_aval_minciencias == '' ? 'Sin registro' : $grupo->inv_aval_minciencias }}</li>
                    <li><strong>Lineas de investigación</strong> <br>
                        {{ $grupo->inv_lineas_investigacion == '' ? 'Sin registro' : $grupo->inv_lineas_investigacion }}
                    </li>
                </ul>

            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success btn-sm" href="">Editar grupo</a>
                </div>
                <h4 class="fw-bold text-right">Integrantes</h4>
                <ul class="text-right">
                    <li><a href="">[Michael Steven Rodriguez Hernandez]</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
