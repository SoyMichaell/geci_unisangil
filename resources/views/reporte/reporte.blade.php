@extends('reporte.app')
@section('title_report')<p>PROGRAMA</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: PROGRAMAS</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Programa</th>
            <th>Titulo</th>
            <th>Cod. SNIES</th>
            <th>Periodo de admisión</th>
            <th>Grupo de referencia</th>
            <th>Grupo de referencia NBC</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $programa)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $programa->pro_nombre }}</td>
                <td>{{ $programa->pro_titulo }}</td>
                <td>{{ $programa->pro_codigosnies }}</td>
                <td>{{ $programa->pro_periodo_admision }}</td>
                <td>{{ $programa->pro_grupo_referencia }}</td>
                <td>{{ $programa->pro_grupo_referencia_nbc }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
