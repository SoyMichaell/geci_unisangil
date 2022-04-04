@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/investigacion/verintegrante">Vista</a> / <a href="/investigacion/mostrarintegrante">Investigador</a> / <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Listado de registro investigadores</p>
    @endsection
@endsection
<style>
    h4 {
        color: brown;
        font-weight: 900;
    }

    #li {
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
            <h4><i class="fa-solid fa-user-circle"></i> Información investigador</h4>
            <hr>
            <div class="col-md-8">
                <h5>Información general</h5>
                <ul>
                    <li id="li"><strong>Nombre completo</strong> <br>{{$investigador->per_nombre.' '.$investigador->per_apellido}}</li>
                    <li id="li"><strong>Identidad</strong> <br>{{$investigador->per_tipo_documento}}, {{$investigador->per_numero_documento}}</li>
                    <li id="li"><strong>Enlace CvLAC</strong> <br> {{$investigador->inves_enlace_cvlac == "" ? 'Sin registro' : $investigador->inves_enlace_cvlac}}</li>
                    <li id="li"><strong>Tipo de vinculación</strong> <br> {{$investigador->inves_tipo_vinculacion}}</li>
                    @if ($investigador->tip_nombre == 'Estudiante')
                        <li><strong>Semestre</strong> <br> 10</li>
                    @endif
                    <li id="li"><strong>Categoria</strong> <br> {{$investigador->inves_categoria}}</li>
                </ul>
                <h5>Formación acádemica</h5>
                <ul>
                    <li id="li"><strong>Estudio pregrado</strong> <br> {{$investigador->titulo_pregrado == "" ? 'Sin registro' : $investigador->titulo_pregrado}} <br> Institución educativa: {{$investigador->institucion_pre == "" ? 'Sin registro' : $investigador->institucion_pre}}</li>
                    <li id="li"><strong>Especialización</strong> <br> {{$investigador->titulo_especializacion == "" ? 'Sin registro' : $investigador->titulo_especializacion}} <br> Institución educativa: {{$investigador->institucion_espe == "" ? 'Sin registro' : $investigador->institucion_espe}}</li>
                    <li id="li"><strong>Maestría</strong> <br> {{$investigador->titulo_maestria == "" ? 'Sin registro' : $investigador->titulo_maestria}} <br> Institución educativa: {{$investigador->institucion_mae == "" ? 'Sin registro' : $investigador->institucion_mae}}</li>
                    <li id="li"><strong>Doctorado</strong> <br> {{$investigador->titulo_doctorado == "" ? 'Sin registro' : $investigador->titulo_doctorado}} <br> Institución educativa: {{$investigador->institucion_doc == "" ? 'Sin registro' : $investigador->institucion_doc}}</li>
                </ul>
                <h5>Proyectos</h5>
                <ul>
                    <li id="li">La Nueva Realidad Fase I <br> Estado proyecto: Finalizado</li>
                    <li id="li">La Nueva Realidad Fase II <br> Estado proyecto: En curso</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Grupos de investigación</h5>
                <ul>
                    <li id="li"><strong>Coordinador de:</strong> <br> {{$investigador->id == $investigador->inv_id_coordinador ? Str::upper($investigador->inv_nombre_grupo)  : 'Actualmente no es coordinador de ningún grupo'}}</li>
                    <li id="li"><strong>Integrante de:</strong> <br> {{$investigador->id == $investigador->inves_id_persona ? Str::upper($investigador->inv_nombre_grupo)  : 'Actualmente no es integrante de ningún grupo'}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
