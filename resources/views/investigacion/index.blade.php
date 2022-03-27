@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo investigación</h1>
    @section('message')
        <p>Módulo investigación Unisangil, Grupo de investigación , Investigadores y Proyectos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="mt-2">
            <div class="row mx-auto">
                <a class="col-md-4 tile" style="width: 400px; margin-left: 10px;" href="/investigacion/mostrargrupo">
                    Grupo de investigación
                </a>
                <a class="col-md-4 tile" style="width: 400px; margin-left: 10px;" href="/investigacion/mostrarintegrante">
                    Investigadores
                </a>
                <a class="col-md-4 tile" style="width: 400px; margin-left: 10px;" href="/investigacion/mostrarproyecto">
                    Proyectos
                </a>
            </div>
        </div>
    </div>
@endsection
@endif
