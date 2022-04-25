@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba">Prueba</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Pruebas Saber</h1>
    @section('message')
        <p>Menu principal módulo pruebas saber </p>
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
    <div class="container tile">
        <h4>Módulo pruebas saber</h4>
        <div class="row">
            <table class="table">
                <tr style="width: 80%">
                    <td>Registro tipo módulo <small>(Registrar todos los módulos vigentes para las pruebas saber 11 y pruebas saber pro)</small></td>
                    <td><a href="/prueba/mostrartipomodulo">Enlace</a> ({{ $tipomodulos->count() }})</td>
                </tr>
                <tr style="width: 80%">
                    <td>Saber once (11)</td>
                    <td><a href="/prueba/mostrarsaber">Enlace</a> ({{ $saber11->count() }})</td>
                </tr>
                <tr style="width: 80%">
                    <td>Saber PRO</td>
                    <td><a href="/prueba/mostrarsaberpro">Enlace</a> ({{ $saberpro->count() }})</td>
                </tr>
                <tr style="width: 80%">
                    <td>Resultados generales de programa</td>
                    <td><a href="/prueba/mostrarresultado">Enlace</a> ({{$general->count()}})</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
@endif
