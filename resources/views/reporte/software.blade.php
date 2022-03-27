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
<?php if($valor == 'software'){ ?>
<br>Módulo: tic's</p>
<?php }else if($valor == 'recurso'){ ?>
<br>Módulo: software - recurso tecnológico</p>
<?php } ?>
<br>
<hr>
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

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
