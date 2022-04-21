@extends('reporte.app')
@section('title_report')<p>MOVILIDAD</p>@endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>MÓDULO: MOVILIDAD</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Periodo</th>
            <th>Tipo persona</th>
            <th>Nombre completo</th>
            <th>Tipo movilidad</th>
            <th>País</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $movilidad)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $movilidad->movi_year }}</td>
                <td>{{ $movilidad->movi_periodo }}</td>
                <td>{{ Str::ucfirst($movilidad->movi_tipo_persona) }}</td>
                <td>{{ ($movilidad->movi_tipo_persona == 'administrativo'? $movilidad->administrativos->per_nombre . ' ' . $movilidad->administrativos->per_apellido: '') .($movilidad->movi_tipo_persona == 'docente' ? $movilidad->docentes->per_nombre . ' ' . $movilidad->docentes->per_apellido: '') . ($movilidad->movi_tipo_persona == 'estudiante' ? $movilidad->estudiantes->per_nombre.' '.$movilidad->estudiantes->per_apellido : '') }}</td>
                <td>{{ $movilidad->movi_tipo_movilidad }}</td>
                <td>{{ $movilidad->movi_pais }}</td>
                <td>{{ $movilidad->movi_ciudad }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection