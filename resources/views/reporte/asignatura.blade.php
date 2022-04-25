@extends('reporte.app')
@section('title_report')<p>ASIGNATURAS</p>@endsection
@section('content')
    <img src="{{ asset('image/logo.jpg') }}">
    <p class="header_right">UNISANGIL <br>@php
        $fecha = date('Y-m-d');
        echo 'FECHA: '.$fecha;
    @endphp
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
            
        </tbody>
    </table>
@endsection
