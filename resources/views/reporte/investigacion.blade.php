@extends('reporte.app')
@section('title_report')<p>INVESTIGACIÓN</p>@endsection
@section('content')
<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">UNISANGIL<br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp
    <?php if($valor == 'grupo'){ ?><br>MÓDULO: INVESTIGACIÓN - GRUPOS DE INVESTIGACIÓN</p> <?php }else if($valor == 'investigadores') { ?><br>MÓDULO:
INVESTIGACIÓN - INVESTIGADORES</p><?php }else if($valor == 'proyectos'){ ?><br>MÓDULO: INVESTIGACIÓN - PROYECTOS</p><?php } ?>
<table class="table">
    <?php if($valor == 'grupo'){ ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>Coordinardor</th>
            <th>Grupo</th>
            <th>Correo electronico grupo</th>
            <th>Cod. Minciencias</th>
            <th>Área conocimiento principal</th>
            <th>Nucleo conocimiento NBC</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $grupo)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $grupo->personas->per_nombre.' '.$grupo->personas->per_apellido }}</td>
                <td>{{ $grupo->inv_nombre_grupo }}</td>
                <td>{{ $grupo->inv_correo_institucional_grupo }}</td>
                <td>{{ $grupo->inv_codigo_minciencias }}</td>
                <td>{{ $grupo->inv_area_conocimiento_principal }}</td>
                <td>{{ $grupo->inv_nucleo_conocimiento_nbc }}</td>
            </tr>
        @endforeach
    </tbody>
    <?php }else if($valor == 'investigadores'){ ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Enlace CvLac</th>
                <th>Tipo vinculación</th>
                <th>Categoria</th>
                <th>Grupo de investigación</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $investigador)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $investigador->personas->per_nombre.' '.$investigador->personas->per_apellido }}</td>
                    <td>{{ $investigador->inves_enlace_cvlac }}</td>
                    <td>{{ $investigador->inves_tipo_vinculacion }}</td>
                    <td>{{ $investigador->inves_categoria }}</td>
                    <td>{{ $investigador->grupos->inv_nombre_grupo }}</td>
                </tr>
            @endforeach
        </tbody>
    <?php }else if($valor == 'proyectos'){ ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Grupo de investigación</th>
                <th>Titulo proyecto</th>
                <th>Resumen</th>
                <th>Impacto</th>
                <th>Lugar</th>
                <th>Fecha inicio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $proyecto)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $proyecto->grupos->inv_nombre_grupo }}</td>
                    <td>{{ $proyecto->invpro_titulo }}</td>
                    <td>{{ $proyecto->invpro_resumen }}</td>
                    <td>{{ $proyecto->invpro_impacto }}</td>
                    <td>{{ $proyecto->invpro_lugar }}</td>
                    <td>{{ $proyecto->invpro_fecha_inicio}}</td>
                    <td>{{ $proyecto->invpro_estado }}</td>
                </tr>
            @endforeach
        </tbody>
    <?php } ?>
</table>
@endsection
