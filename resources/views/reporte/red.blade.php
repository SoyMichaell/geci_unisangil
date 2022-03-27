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
@endphp <br>Módulo: redes académicas</p>
<br>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Red</th>
            <th>Nombre contacto</th>
            <th>Telefono</th>
            <th>País</th>
            <th>Ciudad</th>
            <th>Alcance</th>
            <th>Acción</th>
            <th>Programa (s)</th>
            <th>Observación</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $red)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $red->red_year }}</td>
                <td>{{ $red->red_nombre }}</td>
                <td>{{ $red->red_nombre_contacto }}</td>
                <td>{{ $red->red_telefono }}</td>
                <td>{{ $red->red_pais }}</td>
                <td>{{ $red->red_ciudad }}</td>
                <td>{{ $red->red_alcance }}</td>
                <td>{{ $red->red_accion }}</td>
                <td>{{ $red->red_id_programa }}</td>
                <td>{{ $red->red_observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
