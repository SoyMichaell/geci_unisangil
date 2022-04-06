@extends('reporte.app')
@section('title_report')<p>BIENESTAR INSTITUCIONAL</p>@endsection
@section('content')
    <img src="{{ public_path('image/logo.jpg') }}">
    <p class="header_right">UNISANGIL <br>@php
        $fecha = date('Y-m-d');
        echo 'FECHA: '.$fecha;
    @endphp <br>MÓDULO: BIENESTAR INSTITUCIONAL</p>
    <br>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Actividad</th>
                <th>Total participantes</th>
                <th>Código SNIES</th>
                <th>Soporte</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $bienestar)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $bienestar->bie_fecha }}</td>
                    <td>{{ $bienestar->bie_nombre_actividad }}</td>
                    <td>{{ $bienestar->bie_total_participantes }}</td>
                    <td>{{ $bienestar->bie_codigo_snies }}</td>
                    <td>{{ $bienestar->bie_soporte }}</td>
                    <td>{{ $bienestar->bie_observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
