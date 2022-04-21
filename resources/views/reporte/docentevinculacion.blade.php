@extends('reporte.app')
@section('title_report')<p>DOCENTES - VINCULACIÓN</p>@endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: DOCENTES - VINCULACIÓN</p>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Docente</th>
            <th>No. contrato</th>
            <th>Tipo contrato</th>
            <th>Fecha inicio</th>
            <th>Fecha final</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $docente)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $docente->per_nombre.' '.$docente->per_apellido }}</td>
                <td>{{ $docente->doco_numero_contrato }}</td>
                <td>{{ $docente->doco_tipo_contrato }}</td>
                <td>{{ $docente->doco_fecha_inicio }}</td>
                <td>{{ $docente->doco_fecha_fin }}</td>
                <td>{{ $docente->doco_rol }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection