@extends('reporte.app')
@section('title_report')<p>LABORATORIO</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL<br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: LABORATORIOS</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Docente</th>
            <th>Programa</th>
            <th>Cantidad estudiantes</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $laboratorio)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $laboratorio->lab_fecha }}</td>
                <td>{{ $laboratorio->lab_nombre }}</td>
                <td>{{ $laboratorio->lab_ubicacion }}</td>
                <td>{{ $laboratorio->docentes->per_nombre.' '.$laboratorio->docentes->per_apellido }}</td>
                <td>{{ $laboratorio->programas->pro_nombre }}</td>
                <td>{{ $laboratorio->lab_cantidad_estudiante }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
