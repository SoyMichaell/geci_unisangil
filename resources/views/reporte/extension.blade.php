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
        echo 'Módulo: extensión | actividad cultural';
    } elseif ($valor == 'consultoria') {
        echo 'Módulo: extensión | consultoria';
    } elseif ($valor == 'curso') {
        echo 'Módulo: extensión | curso';
    } elseif ($valor == 'educacioncontinua') {
        echo 'Módulo: extensión | educación continua';
    } elseif ($valor == 'participante') {
        echo 'Módulo: extensión | participante';
    } elseif ($valor == 'proyectoextension') {
        echo 'Módulo: extensión | proyectos extensión';
    } elseif ($valor == 'servicioextension') {
        echo 'Módulo: extensión | servicios extensión';
    } elseif ($valor == 'fotografico') {
        echo 'Módulo: internacionalización | registro fotografico';
    } elseif ($valor == 'redacademica') {
        echo 'Módulo: internacionalización | redes académicas';
    } elseif ($valor == 'redorganizacion') {
        echo 'Módulo: internacionalización | redes disciplinarias - asociaciones - organizaciones';
    } elseif ($valor == 'curriculo') {
        echo 'Módulo: internacionalización | curriculo internacional';
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
                    <td>{{ number_format($actividad->extcul_valor_financiacion_nac, 2) }}</td>
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
                    <td>{{ number_format($consultoria->extcon_valor, 2) }}</td>
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
                    <td>{{ $curso->per_nombre . ' ' . $curso->per_apellido }}</td>
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
                    <td>{{ $educacion->per_nombre . ' ' . $curso->per_apellido }}</td>
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
                    <td>{{ $participante->per_nombre . ' ' . $participante->per_apellido }}</td>
                    <td>{{ $participante->per_telefono }}</td>
                    <td>{{ $participante->per_correo }}</td>
                    <td>{{ $participante->dop_correo_personal }}</td>
                    <td>{{ $participante->dop_direccion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'proyectoextension')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Código proyecto</th>
                <th>Nombre proyecto</th>
                <th>Valor</th>
                <th>Área de extensión</th>
                <th>Fecha de inicio</th>
                <th>Fecha final</th>
                <th>Nombre contacto</th>
                <th>Telefono</th>
                <th>Correo electronico</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $proyecto)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $proyecto->extprex_year }}</td>
                    <td>{{ $proyecto->extprex_semestre }}</td>
                    <td>{{ $proyecto->extprex_codigo_pr }}</td>
                    <td>{{ $proyecto->extprex_nombre_pr }}</td>
                    <td>{{ number_format($proyecto->extprex_valor_pr, 2) }}</td>
                    <td>{{ $proyecto->extprex_fecha_inicio }}</td>
                    <td>{{ $proyecto->extprex_fecha_final }}</td>
                    <td>{{ $proyecto->extprex_nombre_contacto . ' ' . $proyecto->extprex_apellido_contacto }}</td>
                    <td>{{ $proyecto->extprex_telefono_contacto }}</td>
                    <td>{{ $proyecto->extprex_correo_contacto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'servicioextension')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Código proyecto</th>
                <th>Nombre proyecto</th>
                <th>Valor</th>
                <th>Área de extensión</th>
                <th>Fecha de inicio</th>
                <th>Fecha final</th>
                <th>Nombre contacto</th>
                <th>Telefono</th>
                <th>Correo electronico</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $servicio)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $servicio->extseex_year }}</td>
                    <td>{{ $servicio->extseex_semestre }}</td>
                    <td>{{ $servicio->extseex_codigo_ser }}</td>
                    <td>{{ $servicio->extseex_nombre_ser }}</td>
                    <td>{{ number_format($servicio->extseex_valor_ser, 2) }}</td>
                    <td>{{ $servicio->extseex_fecha_inicio }}</td>
                    <td>{{ $servicio->extseex_fecha_final }}</td>
                    <td>{{ $servicio->extseex_nombre_contacto . ' ' . $servicio->extseex_apellido_contacto }}</td>
                    <td>{{ $servicio->extseex_telefono_contacto }}</td>
                    <td>{{ $servicio->extseex_correo_contacto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'fotografico')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Tipo actividad</th>
                <th>Actividad</th>
                <th>Ente organizador</th>
                <th>Fecha</th>
                <th>Tipo evento</th>
                <th>Tipo modalidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $fotografico)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $fotografico->extrefoin_year }}</td>
                    <td>{{ $fotografico->extrefoin_periodo }}</td>
                    <td>{{ $fotografico->extrefoin_tipo_actividad }}</td>
                    <td>{{ $fotografico->extrefoin_actividad }}</td>
                    <td>{{ $fotografico->extrefoin_ente_organizador }}</td>
                    <td>{{ $fotografico->extrefoin_fecha }}</td>
                    <td>{{ $fotografico->extrefoin_tipo_evento }}</td>
                    <td>{{ $fotografico->extrefoin_tipo_modalidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'redacademica')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>IES</th>
                <th>Caracter</th>
                <th>Fecha</th>
                <th>Logro (s)</th>
                <th>Resultado (s)</th>
                <th>Función</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $redacademica)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $redacademica->exsered_year }}</td>
                    <td>{{ $redacademica->exsered_periodo }}</td>
                    <td>{{ $redacademica->exsered_ies }}</td>
                    <td>{{ $redacademica->exsered_caracter }}</td>
                    <td>{{ $redacademica->exsered_fecha }}</td>
                    <td>{{ $redacademica->exsered_logros }}</td>
                    <td>{{ $redacademica->exsered_resultados }}</td>
                    <td>{{ $redacademica->exsered_funcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'redorganizacion')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Caracter</th>
                <th>Fecha</th>
                <th>Actividades</th>
                <th>Función</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $redorganizacion)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $redorganizacion->exseor_year }}</td>
                    <td>{{ $redorganizacion->exseor_periodo }}</td>
                    <td>{{ $redorganizacion->exseor_tipo }}</td>
                    <td>{{ $redorganizacion->exseor_nombre }}</td>
                    <td>{{ $redorganizacion->exseor_caracter }}</td>
                    <td>{{ $redorganizacion->exseor_fecha }}</td>
                    <td>{{ $redorganizacion->exseor_actividades }}</td>
                    <td>{{ $redorganizacion->exseor_funcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'curriculo')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Idioma</th>
                <th>Uso tic</th>
                <th>Competencias globales</th>
                <th>Número estudiante</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $curriculo)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $curriculo->exincu_year }}</td>
                    <td>{{ $curriculo->exincu_periodo }}</td>
                    <td>{{ $curriculo->asig_nombre }}</td>
                    <td>{{ $curriculo->per_nombre.' '.$curriculo->per_apellido }}</td>
                    <td>{{ $curriculo->ext_uso_idioma }}</td>
                    <td>{{ $curriculo->ext_uso_tic }}</td>
                    <td>{{ $curriculo->ext_competencia_global }}</td>
                    <td>{{ $curriculo->ext_movilidad_estudiante }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
