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
<style>
    .content__investigacion{
        margin-top: 10%;
    }
    .card__investigacion {
        width: 350px;
        height: 250px;
        margin-left: 10px;
        line-height: 200px;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
    }
    .card__investigacion:hover{
        color: #fff;
        text-decoration: none;
        background-color: rgb(1, 76, 141);
    }

</style>
@section('content')
    <div class="container">
        <div class="content__investigacion">
            <div class="row mx-auto">
                <a class="tile card__investigacion" href="/investigacion/mostrargrupo">
                    Grupo de investigación
                </a>
                <a class="tile card__investigacion" href="/investigacion/mostrarintegrante">
                    Investigadores
                </a>
                <a class="tile card__investigacion" href="/investigacion/mostrarproyecto">
                    Proyectos
                </a>
            </div>
        </div>
    </div>
@endsection
@endif
