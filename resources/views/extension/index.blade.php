@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension">Extensión</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo extensión e internacionalización</h1>
    @section('message')
        <p>Listado eventos extensión e internacionalización</p>
    @endsection
@endsection
<style>


    .tile__title{
        border-bottom: 1px solid rgb(1, 76, 141);
    }

    .card__extension {
        width: 342px !important;
        height: 100%;
        border: 1px solid #cccc;
        padding: 15px;
        text-decoration: none;
        color: black;
        text-align: center;
        background: #fff;
        margin-left: 25px;
        margin-top: 10px !important;
        text-decoration: none !important;
        border-bottom: 5px solid rgb(1, 76, 141);
    }

    .card__extension:hover{
        border-top: 5px solid rgb(1, 76, 141);
        border-bottom: none;
        color: rgb(1, 76, 141);
        transition: .2s;
        -webkit-box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
        box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
    }

</style>
@section('content')
    <div class="container p-3">
        <h4 class="tile">Extensión</h4>
        <div class="row mb-3 mx-auto">
            <a class="card__extension tile" href="/extension/mostraractividad">
                <i class="fa fa-map-o fa-4x"></i>
                <h4 class="mt-2">Actividad cultural</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarconsultoria">
                <i class="fa fa-search fa-4x"></i>
                <h4 class="mt-2">Consultoria</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarcurso">
                <i class="fa fa-book fa-4x"></i>
                <h4 class="mt-2">Curso</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrareducacion">
                <i class="fa fa-window-restore fa-4x"></i>
                <h4 class="mt-2">Educación continua</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarparticipante">
                <i class="fa fa-users fa-4x"></i>
                <h4 class="mt-2">Participante</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarproyectoextension">
                <i class="fa fa-external-link-square fa-4x"></i>
                <h4 class="mt-2">Proyecto de extensión</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarservicioextension">
                <i class="fa fa-external-link-square fa-4x"></i>
                <h4 class="mt-2">Servicio de extensión</h4>
            </a>
        </div>
        <h4 class="tile">Internacionalización</h4>
        <div class="row mb-3">
            <a class="card__extension tile" href="/extension/mostrarregistrofotografico">
                <i class="fa fa-camera fa-4x"></i>
                <h4 class="mt-2">Registro fotografico actividades</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarinterredconvenio">
                <i class="fa fa-microchip fa-4x"></i>
                <h4 class="mt-2">Redes acádemicas</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarinterorganizacion">
                <i class="fa fa-sitemap fa-4x"></i>
                <h4 class="mt-2">Redes disciplinarias - asociaciones - organizaciones</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarcurriculo">
                <i class="fa fa-globe fa-4x"></i>
                <h4 class="mt-2">Internacionalización de curriculo (asignauturas)</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrareventosvirtuales">
                <i class="fa fa-globe fa-4x"></i>
                <h4 class="mt-2">Eventos virtuales</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarparticipacioneventos">
                <i class="fa fa-globe fa-4x"></i>
                <h4 class="mt-2">Participación eventos</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrareventosinternacionales">
                <i class="fa fa-globe fa-4x"></i>
                <h4 class="mt-2">Eventos internacionales</h4>
            </a>
        </div>
        <h4 class="tile">Movilidad</h4>
        <div class="row mb-3">
            <a class="card__extension tile" href="/extension/mostrarmovilidadnacional">
                <i class="fa fa-plane fa-4x"></i>
                <h4 class="mt-2">Movilidad Nacional</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarmovilidadintersede">
                <i class="fa fa-plane fa-4x"></i>
                <h4 class="mt-2">Movilidad Intersedes</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarmovilidadinternacional">
                <i class="fa fa-plane fa-4x"></i>
                <h4 class="mt-2">Movilidad Internacional</h4>
            </a>
        </div>
    </div>
@endsection
@endif
