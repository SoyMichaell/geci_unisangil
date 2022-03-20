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
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <a class="col-md-4" href="/investigacion/mostrargrupo">
                    Grupo de investigación
                </a>
                <a class="col-md-4" href="/investigacion/mostrarintegrante">
                    Investigadores
                </a>
                <a class="col-md-4" href="">
                    Proyectos
                </a>
            </div>
        </div>
    </div>
@endsection
@endif
