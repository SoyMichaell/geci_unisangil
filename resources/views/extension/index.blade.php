@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension">Extensión</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo Extensión</h1>
    @section('message')
        <p>Listado de registro programas académic os</p>
    @endsection
@endsection
<style>
    .card__extension {
        width: 250px !important;
        border: 1px solid #cccc;
        padding: 15px;
        text-decoration: none;
        color: inherit;
        text-align: center;
        background: #fff;
        margin-left: 25px;
    }

</style>
@section('content')
    <div class="container">
        <h4 class="ml-3">Extencion</h4>
        <div class="row">
            <a class="card__extension tile" href="/extension/mostraractividad">
                <i class="fa-solid fa-boxes-stacked fa-4x"></i>
                <h4 class="mt-2">Actividad cultural</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostraractrecurso">
                <i class="fa-solid fa-helmet-safety fa-4x"></i>
                <h4 class="mt-2">Actividad cultural recurso humano</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarconsultoria">
                <i class="fa-solid fa-magnifying-glass fa-4x"></i>
                <h4 class="mt-2">Consultoria</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarconsurecurso">
                <i class="fa-solid fa-mask fa-4x"></i>
                <h4 class="mt-2">Consultoria recurso humano</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarcurso">
                <i class="fa-solid fa-signature fa-4x"></i>
                <h4 class="mt-2">Curso</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrareducacion">
                <i class="fa-solid fa-chalkboard fa-4x"></i>
                <h4 class="mt-2">Educación continua</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarparticipante">
                <i class="fa-solid fa-chalkboard-user fa-4x"></i>
                <h4 class="mt-2">Participante</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarproyectoextension">
                <i class="fa-solid fa-book-open-reader fa-4x"></i>
                <h4 class="mt-2">Proyecto de extensión</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarservicioextension">
                <i class="fa-solid fa-book-open-reader fa-4x"></i>
                <h4 class="mt-2">Servicio de extensión</h4>
            </a>
        </div>
        <h4 class="ml-3">Internacionalización</h4>
        <div class="row">
            <a class="card__extension tile" href="/extension/mostrarregistrofotografico">
                <i class="fa-solid fa-camera fa-4x"></i>
                <h4 class="mt-2">Registro fotografico actividades</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarinterredconvenio">
                <i class="fa-solid fa-microchip fa-4x"></i>
                <h4 class="mt-2">Redes acádemicas</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarinterorganizacion">
                <i class="fa-solid fa-magnifying-glass fa-4x"></i>
                <h4 class="mt-2">Redes disciplinarias - asociaciones - organizaciones</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarcurriculo">
                <i class="fa-solid fa-globe fa-4x"></i>
                <h4 class="mt-2">Internacionalización de curriculo (asignauturas)</h4>
            </a>
        </div>
        <h4 class="ml-3">Movilidad</h4>
        <div class="row">
            <a class="card__extension tile" href="/extension/mostrarmovilidadnacional">
                <i class="fa-solid fa-caravan fa-4x"></i>
                <h4 class="mt-2">Movilidad Nacional</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarmovilidadintersedes">
                <i class="fa-solid fa-plane fa-4x"></i>
                <h4 class="mt-2">Movilidad Intersedes</h4>
            </a>
            <a class="card__extension tile" href="/extension/mostrarmovilidadinternacional">
                <i class="fa-solid fa-plane-departure fa-4x"></i>
                <h4 class="mt-2">Movilidad Internacional</h4>
            </a>
        </div>
    </div>
@endsection
@endif
