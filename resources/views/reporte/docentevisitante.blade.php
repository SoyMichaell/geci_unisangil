@extends('reporte.app')
@section('title_report')<p>DOCENTES - VISITANTES</p>@endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: DOCENTES - VISITANTES</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Tipo documento</th>
            <th>No. documento</th>
            <th>Nombre (s)</th>
            <th>Apellido (s)</th>
            <th>Telefono</th>
            <th>Correo electronico</th>
            <th>Entidad</th>
            <th>Ciudad</th>
            <th>Fecha estadía</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $docente)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $docente->docvi_year }}</td>
                <td>{{ $docente->docvi_tipo_documento }}</td>
                <td>{{ $docente->docvi_numero_documento }}</td>
                <td>{{ $docente->docvi_nombre }}</td>
                <td>{{ $docente->docvi_apellido }}</td>
                <td>{{$docente->docvi_telefono}}</td>
                <td>{{ $docente->docvi_correo }}</td>
                <td>{{ $docente->docvi_entidad_origen }}</td>
                <td>{{ $docente->docvi_ciudad }}</td>
                <td>{{ $docente->docvi_fecha_estadia }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
