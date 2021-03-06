@extends('reporte.app')
@section('title_report')<p>EXTENSIÓN</p>@endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL<br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp <br>
    <?php
    if ($valor == 'actividadcultural') {
        echo 'MÓDULO: EXTENSIÓN | ACTIVIDAD CULTURAL';
    } elseif ($valor == 'consultoria') {
        echo 'MÓDULO: EXTENSIÓN | CONSULTORIA';
    } elseif ($valor == 'curso') {
        echo 'MÓDULO: EXTENSIÓN | CURSO';
    } elseif ($valor == 'educacioncontinua') {
        echo 'MÓDULO: EXTENSIÓN | EDUCACIÓN CONTINUA';
    } elseif ($valor == 'participante') {
        echo 'MÓDULO: EXTENSIÓN | PARTICIPANTE';
    } elseif ($valor == 'proyectoextension') {
        echo 'MÓDULO: EXTENSIÓN | PROYECTOS EXTENSIÓN';
    } elseif ($valor == 'servicioextension') {
        echo 'MÓDULO: EXTENSIÓN | SERVICIOS EXTENSIÓN';
    } elseif ($valor == 'fotografico') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | REGISTRO FOTOGRAFICO';
    } elseif ($valor == 'redacademica') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | REDES ACADÉMICAS';
    } elseif ($valor == 'redorganizacion') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | REDES DISCIPLINARIAS - ASOCIACIONES - ORGANIZACIONES';
    } elseif ($valor == 'curriculo') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | CURRICULO INTERNACIONAL';
    } elseif ($valor == 'eventovirtual') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | EVENTO VIRTUAL';
    } elseif ($valor == 'participacion') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | PARTICIPACIÓN EVENTOS';
    } elseif ($valor == 'einternacional') {
        echo 'MÓDULO: INTERNACIONALIZACIÓN | EVENTO INTERNACIONAL';
    } elseif ($valor == 'mnacional') {
        echo 'MÓDULO: EXTENSIÓN | MOVILIDAD NACIONAL';
    } elseif ($valor == 'mintersede') {
        echo 'MÓDULO: EXTENSIÓN | MOVILIDAD INTERSEDE';
    } elseif ($valor == 'minternacional') {
        echo 'MÓDULO: EXTENSIÓN | MOVILIDAD INTERNACIONAL';
    }
    ?></p>
@if ($valor == 'actividadcultural')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Cod. und organizacional</th>
                <th>Cod. actividad</th>
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
                <th>Cod. consultoria</th>
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
                <th>Cod. curso</th>
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
                <th>Cod. curso</th>
                <th>No. de horas</th>
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
                    <td>{{ $educacion->per_nombre . ' ' . $educacion->per_apellido }}</td>
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
                <th>No. documento</th>
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
                <th>Cod. proyecto</th>
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
                    <td>{{ $proyecto->extprex_id_area_extension}}</td>
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
                <th>Cod. proyecto</th>
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
                    <td>{{ $servicio->extseex_id_area_extension}}</td>
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
                    <td>{{ $curriculo->per_nombre . ' ' . $curriculo->per_apellido }}</td>
                    <td>{{ $curriculo->ext_uso_idioma }}</td>
                    <td>{{ $curriculo->ext_uso_tic }}</td>
                    <td>{{ $curriculo->ext_competencia_global }}</td>
                    <td>{{ $curriculo->ext_movilidad_estudiante }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'eventovirtual')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre evento</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Enlace ingreso</th>
                <th>Nombre ponente</th>
                <th>Institución</th>
                <th>País</th>
                <th>Ponencia</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $evento)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $evento->exevir_nombre_evento }}</td>
                    <td>{{ $evento->exevir_fecha_inicio }}</td>
                    <td>{{ $evento->exevir_fecha_fin }}</td>
                    <td>{{ $evento->exevir_enlace_ingreso }}</td>
                    <td>{{ $evento->exevir_nombre_ponente }}</td>
                    <td>{{ $evento->exevir_institucion_origen }}</td>
                    <td>{{ $evento->exevir_pais }}</td>
                    <td>{{ $evento->exevir_nombre_ponencia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'participacion')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Tipo evento</th>
                <th>Nombre evento</th>
                <th>Fecha</th>
                <th>Organizador</th>
                <th>Tipo documento</th>
                <th>No. documento</th>
                <th>Nombre (s)</th>
                <th>Apellido (s)</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $participacion)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $participacion->expaev_year }}</td>
                    <td>{{ $participacion->expaev_periodo }}</td>
                    <td>{{ $participacion->expaev_tipo_evento }}</td>
                    <td>{{ $participacion->expaev_nombre_evento }}</td>
                    <td>{{ $participacion->expaev_fecha }}</td>
                    <td>{{ $participacion->expaev_organizador }}</td>
                    <td>{{ $participacion->per_tipo_documento }}</td>
                    <td>{{ $participacion->per_numero_documento }}</td>
                    <td>{{ $participacion->per_nombre }}</td>
                    <td>{{ $participacion->per_apellido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'einternacional')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Nombre evento</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Lugar</th>
                <th>Sede</th>
                <th>Ponente (s)</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $einternacional)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $einternacional->exevin_tipo }}</td>
                    <td>{{ $einternacional->exevin_year }}</td>
                    <td>{{ $einternacional->exevin_periodo }}</td>
                    <td>{{ $einternacional->exevin_nombre_evento }}</td>
                    <td>{{ $einternacional->exevin_fecha_inicio }}</td>
                    <td>{{ $einternacional->exevin_fecha_final }}</td>
                    <td>{{ $einternacional->exevin_lugar }}</td>
                    <td>{{ $einternacional->exevin_sede }}</td>
                    <td>{{ $einternacional->exevin_ponentes }}</td>
                    <td>{{ $einternacional->exevin_pais }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'mnacional')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Rol</th>
                <th>Sede</th>
                <th>Facultad</th>
                <th>Programa</th>
                <th>Nombre completo</th>
                <th>Tipo movilidad</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $mnacional)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $mnacional->exmona_tipo }}</td>
                    <td>{{ $mnacional->exmona_rol }}</td>
                    <td>{{ $mnacional->mun_nombre }}</td>
                    <td>{{ $mnacional->fac_nombre }}</td>
                    <td>{{ $mnacional->pro_nombre }}</td>
                    <td>{{ $mnacional->per_nombre . ' ' . $mnacional->per_apellido }}</td>
                    <td>{{ $mnacional->exmona_tipo_movilidad }}</td>
                    <td>{{ $mnacional->exmona_fecha_inicio }}</td>
                    <td>{{ $mnacional->exmona_fecha_final }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'mintersede')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Rol</th>
                <th>Sede origen</th>
                <th>Facultad origen</th>
                <th>Programa origen</th>
                <th>Nombre completo</th>
                <th>Tipo movilidad</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $mintersede)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $mintersede->exmoin_tipo }}</td>
                    <td>{{ $mintersede->exmoin_rol }}</td>
                    <td>{{ $mintersede->mun_nombre }}</td>
                    <td>{{ $mintersede->fac_nombre }}</td>
                    <td>{{ $mintersede->pro_nombre }}</td>
                    <td>{{ $mintersede->per_nombre . ' ' . $mintersede->per_apellido }}</td>
                    <td>{{ $mintersede->exmoin_tipo_movilidad }}</td>
                    <td>{{ $mintersede->exmoin_fecha_inicio }}</td>
                    <td>{{ $mintersede->exmoin_fecha_final }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@elseif($valor == 'minternacional')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Rol</th>
                <th>Sede origen</th>
                <th>Facultad origen</th>
                <th>Programa origen</th>
                <th>Nombre completo</th>
                <th>Tipo movilidad</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $minternacional)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $minternacional->exmointer_tipo }}</td>
                    <td>{{ $minternacional->exmointer_rol }}</td>
                    <td>{{ $minternacional->mun_nombre }}</td>
                    <td>{{ $minternacional->fac_nombre }}</td>
                    <td>{{ $minternacional->pro_nombre }}</td>
                    <td>{{ $minternacional->per_nombre . ' ' . $minternacional->per_apellido }}</td>
                    <td>{{ $minternacional->exmointer_tipo_movilidad }}</td>
                    <td>{{ $minternacional->exmointer_fecha_inicio }}</td>
                    <td>{{ $minternacional->exmointer_fecha_final }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
