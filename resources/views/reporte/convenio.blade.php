@extends('reporte.app')
@section('title_report') <p>CONVENIOS</p> @endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL<br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: CONVENIOS</p>
<br>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>No convenio</th>
            <th>Alcance</th>
            <th>Tipo</th>
            <th>Institución</th>
            <th>Programa (s)</th>
            <th>Fecha inicio</th>
            <th>Fecha final</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $convenio)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $convenio->con_numero }}</td>
                <td>{{ Str::ucfirst($convenio->con_alcance) }}</td>
                <td>{{ $convenio->con_tipo }}</td>
                <td>{{ $convenio->con_institucion }}</td>
                <td>{{ $convenio->con_programa_beneficiado }}</td>
                <td>{{ $convenio->con_fecha_inicio }}</td>
                <td>{{ $convenio->con_fecha_final }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
