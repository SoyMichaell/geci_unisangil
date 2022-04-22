@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/investigacion/vergrupo">Vista</a> / <a href="/investigacion/mostrargrupo">Grupo</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información registrada</p>
    @endsection
@endsection
<style>
    h4 {
        color: rgb(1, 76, 141);
        font-weight: 900;
    }

    li{
        list-style: none;
    }

    #li {
        font-size: 16px;
        text-decoration: none;
        list-style: none;
    }
    #integrantes{
        text-decoration: none;
    }

</style>
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                <h4 class="fw-bold">COORDINADOR</h4>
                <p>{{ $grupo->personas->per_nombre . ' ' . $grupo->personas->per_apellido }}</p>
                <hr>
                <h4 class="fw-bold">INFORMACIÓN GENERAL</h4>
                <ul>
                    <li id="li"><strong>Grupo</strong> <br> {{ $grupo->inv_nombre_grupo }}</li>
                    <li id="li"><strong>Correo institucional</strong> <br> {{ $grupo->inv_correo_institucional_grupo }}</li>
                    <li id="li"><strong>Código MinCiencias</strong> <br> {{ $grupo->inv_codigo_minciencias }}</li>
                    <li id="li"><strong>Plan estratégico</strong> <br> Misión <br> {{ $grupo->inv_mision }} <br> Visión <br>
                        {{ $grupo->inv_vision }}</li>
                    <li id="li"><strong>Enlace del grupo</strong> <br> <a
                            href="{{ $grupo->inv_url_grupo }}">{{ $grupo->inv_url_grupo == '' ? 'Sin registro' : $grupo->inv_url_grupo }}</a>
                    </li>
                    <li id="li"><strong>Enlace GrupLac</strong> <br> <a
                            href="{{ $grupo->inv_url_gruplac }}">{{ $grupo->inv_url_gruplac == '' ? 'Sin registro' : $grupo->inv_url_gruplac }}</a>
                    </li>
                    <li id="li"><strong>Área de conocimiento (Principal)</strong> <br>
                        {{ $grupo->inv_area_conocimiento_principal == '' ? 'Sin registro' : $grupo->inv_area_conocimiento_principal }}
                    </li>
                    <li id="li"><strong>Nucleo del conocimiento (NBC)</strong> <br>
                        {{ $grupo->inv_nucleo_conocimiento_nbc == '' ? 'Sin registro' : $grupo->inv_nucleo_conocimiento_nbc }}
                    </li>
                    <li id="li"><strong>Sede</strong> <br> {{ $grupo->sedes->mun_nombre }}</li>
                    <li id="li"><strong>Facultad</strong> <br> {{ $grupo->facultades->fac_nombre }}</li>
                    <li id="li"><strong>Categoria</strong> <br>
                        {{ $grupo->inv_categoria_grupo == '' ? 'Sin registro' : $grupo->inv_categoria_grupo }}</li>
                    <li id="li"><strong>Aval MinCiencias</strong> <br>
                        {{ $grupo->inv_aval_minciencias == '' ? 'Sin registro' : $grupo->inv_aval_minciencias }}</li>
                    <li id="li"><strong>Lineas de investigación</strong> <br>
                        {{ $grupo->inv_lineas_investigacion == '' ? 'Sin registro' : $grupo->inv_lineas_investigacion }}
                    </li>
                </ul>

            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success btn-sm" href="/investigacion/{{$grupo->id}}/editargrupo">Editar grupo</a>
                </div>
                <h4 class="fw-bold text-right">INTEGRANTES</h4>
                <ul class="text-right">
                    @foreach ($integrantes as $integrante)
                        <li><a href="/investigacion/{{$integrante->id}}/verintegrante" id="integrantes">[{{$integrante->per_nombre.' '.$integrante->per_apellido}} | {{$grupo->inv_id_coordinador == $integrante->inves_id_persona ? 'Coordinador' : $integrante->tip_nombre}}]</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
