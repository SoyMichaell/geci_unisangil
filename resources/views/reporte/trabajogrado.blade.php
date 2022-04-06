@extends('reporte.app')
@section('title_report')<p>TRABAJO DE GRADO</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: TRABAJO DE GRADO</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cod. proyecto</th>
            <th>Titulo proyecto</th>
            <th>Autores</th>
            <th>Director</th>
            <th>Codirector</th>
            <th>Fecha inicio</th>
            <th>Estado del proyecto</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $trabajo)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $trabajo->tra_codigo_proyecto }}</td>
                <td>{{ $trabajo->tra_titulo_proyecto }}</td>
                <td>{{ $trabajo->tra_id_estudiante }}</td>
                <td>@foreach($director as $d) {{$d->tra_id_director == $trabajo->tra_id_director ? $d->per_nombre.' '.$d->per_apellido : ''}} @endforeach</td>
                <td>@foreach($codirector as $di) {{$di->tra_id_codirector == $trabajo->tra_id_codirector ? $di->per_nombre.' '.$di->per_apellido : ''}} @endforeach</td>
                <td>{{ $trabajo->tra_fecha_inicio }}</td>
                <td>{{ $trabajo->tra_estado_proyecto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection