@extends('reporte.app')
@section('title_report')<p>PRUEBA SABER</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: PRUEBAS SABER 11</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año presentación</th>
            <th>Periodo</th>
            <th>Nombre (s)</th>
            <th>Apellido (s)</th>
            <th>Puntaje global</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $prueba)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $prueba->prueba_saber_year }}</td>
                <td>{{ $prueba->prueba_saber_periodo }}</td>
                <td>{{ $prueba->per_nombre }}</td>
                <td>{{ $prueba->per_apellido }}</td>
                <td>{{ number_format($prueba->prueba_saber_puntaje_global,2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
