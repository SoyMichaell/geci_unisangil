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
@endphp <br>Módulo: movilidad</p>
<br>
<hr>
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

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
