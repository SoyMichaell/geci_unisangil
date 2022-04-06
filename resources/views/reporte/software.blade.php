@extends('reporte.app')
@section('title_report')<p>SOFTWARE</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp 
<?php if($valor == 'software'){ ?>
<br>MÓDULO: TIC'S</p>
<?php }else if($valor == 'recurso'){ ?>
<br>MÓDULO: RECURSO TECNOLÓGICO</p>
<?php } ?>
<table class="table">
    <?php if($valor == 'software'){ ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Software</th>
            <th>Desarrollador</th>
            <th>Versión</th>
            <th>Asignatura (s)</th>
            <th>Programa (s)</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $software)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $software->sof_tipo }}</td>
                <td>{{ $software->sof_nombre }}</td>
                <td>{{ $software->sof_desarrollador }}</td>
                <td>{{ $software->sof_version }}</td>
                <td>{{ $software->sof_asignatura }}</td>
                <td>{{ $software->sof_id_programa }}</td>
            </tr>
        @endforeach
    </tbody>
    <?php }else if($valor == 'recurso'){ ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Tipo recurso</th>
                <th>Docente</th>
                <th>Asignatura</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $recurso)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $recurso->sofrete_year }}</td>
                    <td>{{ $recurso->sofrete_periodo }}</td>
                    <td>{{ $recurso->sofrete_tipo_recurso }}</td>
                    <td>{{ $recurso->per_nombre.' '.$recurso->per_apellido }}</td>
                    <td>{{ $recurso->asig_nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    <?php } ?>
</table>
@endsection
