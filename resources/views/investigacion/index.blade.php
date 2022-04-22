@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/investigacion">Investigación</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo investigación</h1>
    @section('message')
        <p>Módulo investigación Unisangil, Grupo de investigación , Investigadores y Proyectos</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="mt-2">
            <div class="row mx-auto">
                <a class="tile" style="width: 350px; margin-left: 10px;font-size:18px" href="/investigacion/mostrargrupo">
                    Grupo de investigación
                </a>
                <a class="tile" style="width: 350px; margin-left: 10px;font-size:18px" href="/investigacion/mostrarintegrante">
                    Investigadores
                </a>
                <a class="tile" style="width: 350px; margin-left: 10px;font-size:18px" href="/investigacion/mostrarproyecto">
                    Proyectos
                </a>
            </div>
        </div>
    </div>
@endsection
@endif
