@extends('reporte.app')
@section('title_report') <p>DOCENTES</p> @endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '. $fecha;
@endphp <br>MÓDULO: DOCENTES</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo documento</th>
            <th>No. documento</th>
            <th>Nombre (s)</th>
            <th>Apellido (s)</th>
            <th>Correo electronico</th>
            <th>Departamento</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $docente)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $docente->per_tipo_documento }}</td>
                <td>{{ $docente->per_numero_documento }}</td>
                <td>{{ $docente->per_nombre }}</td>
                <td>{{ $docente->per_apellido }}</td>
                <td>{{ $docente->per_correo }}</td>
                <td>{{ $docente->dep_nombre }}</td>
                <td>{{ $docente->mun_nombre }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection


