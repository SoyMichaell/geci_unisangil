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
        <h4>Submodulos extensión</h4>
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
            <a class="card__extension tile" href="">
                <i class="fa-solid fa-chalkboard fa-4x"></i>
                <h4 class="mt-2">Educación continua</h4>
            </a>
            <a class="card__extension tile" href="">
                <i class="fa-solid fa-chalkboard-user fa-4x"></i>
                <h4 class="mt-2">Educación continua docente</h4>
            </a>
            <a class="card__extension tile" href="">
                <i class="fa-solid fa-book-open-reader fa-4x"></i>
                <h4 class="mt-2">Educación continua beneficiario</h4>
            </a>
        </div>
    </div>
@endsection
@endif
