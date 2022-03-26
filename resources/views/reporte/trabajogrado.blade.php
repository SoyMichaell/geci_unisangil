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
@endphp <br>Módulo: trabajo de grados</p>
<br>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código proyecto</th>
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

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
