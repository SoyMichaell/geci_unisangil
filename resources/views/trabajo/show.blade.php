@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-wpforms"></i> Módulo trabajo de grado</h1>
    @section('message')
        <p>Lista de registro trabajo de grado</p>
    @endsection
@endsection
<style>
    .left {
        width: 50%;
        font-size: 16px;
    }

    .right {
        float: left;
        font-size: 16px;
    }

    .center {
        font-size: 18px;
        text-align: center;
        border-bottom: 1px solid brown;
    }

</style>
@section('content')
    <div class="container">
        <div class="tile col-md-12">
            <h4 class="tile">Información trabajo de grado</h4>
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td class="center" colspan="2" class="TitleCell"><strong>Datos básicos
                                proyecto</strong>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="left">Código proyecto</td>
                        <td class="right">{{ $trabajo->tra_codigo_proyecto }}</td>
                    </tr>
                    <tr>
                        <td class="left">Titulo proyecto</td>
                        <td class="right">{{ $trabajo->tra_titulo_proyecto }}</td>
                    </tr>
                    <tr>
                        <td class="left">Estudiantes</td>
                        <td class="right" class="left">{{ $trabajo->tra_id_estudiante }}</td>
                    </tr>
                    <tr>
                        <td class="left">Fecha de inicio</td>
                        <td class="right">{{ $trabajo->tra_fecha_inicio }}</td>
                    </tr>
                    <tr>
                        <td class="left">Modalidad de grado</td>
                        <td class="right">{{ $trabajo->mod_nombre }}</td>
                    </tr>
                    <tr>
                        <td class="left">Director de grado</td>
                        <td class="right">
                            {{ $director == '' ? 'Sin asignación' : $director->per_nombre . ' ' . $director->per_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Codirector</td>
                        <td class="right">
                            {{ $codirector == '' ? 'Sin asignación' : $codirector->per_nombre . ' ' . $codirector->per_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Estado de la propuesta</td>
                        <td class="right">{{ $trabajo->tra_estado_propuesta }}</td>
                    </tr>
                    <tr>
                        <td class="left">Estado del proyecto</td>
                        <td class="right">{{ $trabajo->tra_estado_proyecto }}</td>
                    </tr>
                    <tr>
                        <td class="left">Jurado 1</td>
                        <td class="right">
                            {{ $jurado1 == ''? 'Sin asignación o sin contrato asignado': $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Jurado 2</td>
                        <td class="right">
                            {{ $jurado2 == ''? 'Sin asignación o sin contrato asignado': $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Acta de sustentación</td>
                        <td class="right">
                            {{ $trabajo->tra_numero_acta_sustentacion == '' ? 'Sin registro' : $trabajo->tra_numero_acta_sustentacion }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Soporte</td>
                        <td class="right">
                            {{ $trabajo->tra_acta_sustentacion_soporte == '' ? 'Sin registro' : '' }} <a
                                href="{{ url('datos/acta/actasustentancion/' . $trabajo->tra_acta_sustentacion_soporte) }}">{{ $trabajo->tra_acta_sustentacion_soporte != '' ? $trabajo->tra_acta_sustentacion_soporte : '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Acta de grado</td>
                        <td class="right">
                            {{ $trabajo->tra_numero_acta_grado == '' ? 'Sin registro' : $trabajo->tra_numero_acta_grado }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Soporte</td>
                        <td class="right">{{ $trabajo->tra_acta_grado_soporte == '' ? 'Sin registro' : '' }}
                            <a
                                href="{{ url('datos/acta/actasustentancion/' . $trabajo->tra_acta_grado_soporte) }}">{{ $trabajo->tra_acta_grado_soporte != '' ? $trabajo->tra_acta_grado_soporte : '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Fecha finalización</td>
                        <td class="right">
                            {{ $trabajo->tra_fecha_finalizacion == '' ? 'Sin registro' : $trabajo->tra_fecha_finalizacion }}
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="2" class="TitleCell"><strong>Observaciones</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Observación</td>
                        <td class="right">
                            {{ $trabajo->tra_observacion == '' ? 'Sin registro' : $trabajo->tra_observacion }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4 class="tile">Contratos jurados</h4>
            @if ($contratos->count() > 0)
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre completo</th>
                                    <th>Contrato</th>
                                    <th>Estado pago</th>
                                    <th>---</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($jurado1 != '')
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}</td>
                                        <td><a
                                                href="/datos/contrato/{{ $jurado1->doco_url_soporte }}">{{ $jurado1->doco_url_soporte }}</a>
                                        </td>
                                        <td>{{ $jurado1->doco_estado }}</td>
                                        <td><a href="/docente">Cambiar estado de pago</a></td>
                                    </tr>
                                @else
                                    <div class="alert alert-primary" role="alert">
                                        <strong>El jurado 1 no registra contrato como rol de jurado-tesis</strong>
                                    </div>
                                @endif
                                @if ($jurado2 != '')
                                    <tr>
                                        <td>2</td>
                                        <td>{{ $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}</td>
                                        <td><a
                                                href="/datos/contrato/{{ $jurado2->doco_url_soporte }}">{{ $jurado2->doco_url_soporte }}</a>
                                        </td>
                                        <td>{{ $jurado2->doco_estado }}</td>
                                        <td><a href="/docente">Cambiar estado de pago</a></td>
                                    </tr>
                                @else
                                    <div class="alert alert-primary" role="alert">
                                        <strong>El jurado 2 no registra contrato como rol de jurado-tesis</strong>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    <strong>Los jurados no registran contratos</strong>
                </div>
            @endif
        </div>
    </div>
@endsection
@endif
