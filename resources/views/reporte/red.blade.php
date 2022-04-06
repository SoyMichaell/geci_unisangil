@extends('reporte.app')
@section('title_report')<p>RED ACADÉMICA</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: REDES ACADÉMICAS</p>
<br>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Red</th>
            <th>Nombre contacto</th>
            <th>Telefono</th>
            <th>País</th>
            <th>Ciudad</th>
            <th>Alcance</th>
            <th>Acción</th>
            <th>Programa (s)</th>
            <th>Observación</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $red)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $red->red_year }}</td>
                <td>{{ $red->red_nombre }}</td>
                <td>{{ $red->red_nombre_contacto }}</td>
                <td>{{ $red->red_telefono }}</td>
                <td>{{ $red->red_pais }}</td>
                <td>{{ $red->red_ciudad }}</td>
                <td>{{ $red->red_alcance }}</td>
                <td>{{ $red->red_accion }}</td>
                <td>{{ $red->red_id_programa }}</td>
                <td>{{ $red->red_observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
