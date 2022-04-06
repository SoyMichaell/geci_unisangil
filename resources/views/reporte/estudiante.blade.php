@extends('reporte.app')
@section('title_report')<p>ESTUDIANTES</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: ESTUDIANTES</p>
@if ($nombre_datos != '' || $nombre_datos != null)
    <p class="titulo__header">Estudiantes: {{ $nombre_datos->pro_nombre }} </p>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo documento</th>
            <th>No. documento</th>
            <th>Nombre (s)</th>
            <th>Apellido (s)</th>
            <th>Correo electronico</th>
            @if ($nombre_datos != '' || $nombre_datos != null)
                <td>Semestre</td>
            @else
                <td>Programa</td>
            @endif
            <th>Tipo financiamiento</th>
            <th>Año de ingreso</th>
            <th>Tipo de matricula</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $estudiante)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $estudiante->per_tipo_documento }}</td>
                <td>{{ $estudiante->per_numero_documento }}</td>
                <td>{{ $estudiante->per_nombre }}</td>
                <td>{{ $estudiante->per_apellido }}</td>
                <td>{{ $estudiante->per_correo }}</td>
                @if ($nombre_datos != '' || $nombre_datos != null)
                    <td>{{ $estudiante->estu_semestre }}</td>
                @else
                    <td>{{ $estudiante->pro_nombre }}</td>
                @endif
                <td>{{ $estudiante->estu_financiamiento }}</td>
                <td>{{ $estudiante->estu_ingreso }}</td>
                <td>{{ $estudiante->estu_tipo_matricula }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection