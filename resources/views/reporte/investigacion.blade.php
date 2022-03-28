<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;600;800;900&display=swap');

    body {
        font-family: "Nunito Sans", sans-serif !important;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .table th,
    .table td {
        border: 1px solid #dddddd;
        padding: 4px;
        font-size: 14px;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        font-size: 14px;
        color: #000;
    }

    hr {
        color: #dddddd;
        margin-bottom: 10px;
    }

    img {
        width: 80px;
        float: left;
    }

    .header_right {
        font-size: 12px;
        text-align: right;
    }

    .titulo__header {
        font-size: 20px;
        text-align: left;
    }

    .left__footer {
        text-align: left;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

    .right__footer {
        text-align: right;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

</style>

<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">Unisangil <br>@php
    $fecha = date('Y-m-d');
    echo $fecha;
@endphp
    <?php if($valor == 'grupo'){ ?><br>Módulo: investigación - grupos de investigación</p> <?php }else if($valor == 'investigadores') { ?><br>Módulo:
investigacion - investigadores</p><?php }else if($valor == 'proyectos'){ ?><br>Módulo: investigacion - investigadores</p><?php } ?>
<br>
<hr>
<table class="table">
    <?php if($valor == 'grupo'){ ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>Coordinardor</th>
            <th>Grupo</th>
            <th>Correo electronico grupo</th>
            <th>Código Minciencias</th>
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

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
