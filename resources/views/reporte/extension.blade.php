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
@endphp <br>
    <?php
    if ($valor == 'actividadcultural') {
        echo 'Módulo: extensión e internacionalización | actividad cultural';
    }else if($valor == 'consultoria'){
        echo 'Módulo: extensión e internacionalización | consultoria';
    }else if($valor == 'curso'){
        echo 'Módulo: extensión e internacionalización | curso';
    }else if($valor == 'educacioncontinua'){
        echo 'Módulo: extensión e internacionalización | educación continua';
    }else if($valor == 'participante'){
        echo 'Módulo: extensión e internacionalización | participante';
    }
    ?></p>

<br>
<hr>
@if ($valor == 'actividadcultural')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Código unidad organizacional</th>
                <th>Código actividad</th>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
                <th>Valor nacional</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $actividad)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $actividad->extcul_year }}</td>
                    <td>{{ $actividad->extcul_semestre }}</td>
                    <td>{{ $actividad->extcul_codigo_unidad_org }}</td>
                    <td>{{ $actividad->extcul_codigo_actividad }}</td>
                    <td>{{ $actividad->extcul_fecha_inicio }}</td>
                    <td>{{ $actividad->extcul_fecha_fin }}</td>
                    <td>{{ number_format($actividad->extcul_valor_financiacion_nac,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($valor == 'consultoria')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Código consultoria</th>
                <th>Entidad</th>
                <th>Valor</th>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $consultoria)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $consultoria->extcon_year }}</td>
                    <td>{{ $consultoria->extcon_semestre }}</td>
                    <td>{{ $consultoria->extcon_codigo_consultoria }}</td>
                    <td>{{ $consultoria->extcon_nombre_entidad }}</td>
                    <td>{{ number_format($consultoria->extcon_valor,2) }}</td>
                    <td>{{ $consultoria->extcon_fecha_inicio }}</td>
                    <td>{{ $consultoria->extcon_fecha_fin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($valor == 'curso')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Código curso</th>
                <th>Nombre curso</th>
                <th>CINE</th>
                <th>Docente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $curso)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $curso->extcurso_year }}</td>
                    <td>{{ $curso->extcurso_semestre }}</td>
                    <td>{{ $curso->extcurso_codigo }}</td>
                    <td>{{ $curso->extcurso_nombre }}</td>
                    <td>{{ $curso->cocide_nombre }}</td>
                    <td>{{ $curso->per_nombre.' '.$curso->per_apellido }}</td>
                    <td>{{ $curso->extcurso_estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($valor == 'educacioncontinua')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Semestre</th>
                <th>Código curso</th>
                <th>Número de horas</th>
                <th>Tipo curso</th>
                <th>Valor curso</th>
                <th>Docente</th>
                <th>Tipo extensión</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $educacion)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $educacion->extedu_semestre }}</td>
                    <td>{{ $educacion->extedu_codigo_curso }}</td>
                    <td>{{ $educacion->extedu_numero_horas }}</td>
                    <td>{{ $educacion->extedu_tipo_curso }}</td>
                    <td>{{ $educacion->extedu_valor_curso }}</td>
                    <td>{{ $educacion->per_nombre.' '.$curso->per_apellido }}</td>
                    <td>{{ $educacion->coarex_nombre }}</td>
                    <td>{{ $educacion->extedu_cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($valor == 'participante')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo documento</th>
                <th>Número documento</th>
                <th>Nombre completo</th>
                <th>Telefono</th>
                <th>Correo electronico personal</th>
                <th>Correo electronico institucional</th>
                <th>Dirección</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $participante)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $participante->per_tipo_documento }}</td>
                    <td>{{ $participante->per_numero_documento }}</td>
                    <td>{{ $participante->per_nombre.' '.$participante->per_apellido }}</td>
                    <td>{{ $participante->per_telefono }}</td>
                    <td>{{ $participante->per_correo }}</td>
                    <td>{{ $participante->dop_correo_personal }}</td>
                    <td>{{ $participante->dop_direccion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif


    <footer>
        <p class="left__footer">Fundación Universitaria de Unisangil</p>
        <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
    </footer>
