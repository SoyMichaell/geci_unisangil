@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/trabajo/{{ $trabajo->id }}">Vista</a> / <a href="/trabajo">Trabajo de grado</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
<style>
    .center {
        font-size: 18px;
        text-align: left;
    }

</style>
@section('content')
    <div class="container">
        <div class="tile col-md-12">
            <h4><i class="fa fa-question-circle"></i> Información registrada</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="center" colspan="2" class="TitleCell"><strong>Datos básicos</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Código proyecto / practica laboral</td>
                        <td>{{ $trabajo->tra_codigo_proyecto }}</td>
                    </tr>
                    <tr>
                        <td>Titulo proyecto / practica laboral</td>
                        <td>{{ $trabajo->tra_titulo_proyecto }}</td>
                    </tr>
                    <tr>
                        <td>Estudiante (s)</td>
                        <td>{{ $trabajo->tra_id_estudiante }}</td>
                    </tr>
                    <tr>
                        <td>Fecha de inicio</td>
                        <td>{{ $trabajo->tra_fecha_inicio }}</td>
                    </tr>
                    <tr>
                        <td>Modalidad de grado</td>
                        <td>{{ $trabajo->mod_nombre }}</td>
                    </tr>
                    <tr>
                        <td>Director de grado</td>
                        <td>
                            {{ $director == '' ? 'Sin asignación' : $director->per_nombre . ' ' . $director->per_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <td>Codirector</td>
                        <td>
                            {{ $codirector == '' ? 'Sin asignación' : $codirector->per_nombre . ' ' . $codirector->per_apellido }}
                        </td>
                    </tr>
                    @if ($trabajo->tra_modalidad_grado == '10')
                        <tr>
                            <td>Empresa</td>
                            <td>
                                {{ $trabajo->razon_social }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nit</td>
                            <td>
                                {{ $trabajo->nit }}
                            </td>
                        </tr>
                        <tr>
                            <td>País</td>
                            <td>
                                {{ $trabajo->pais }}
                            </td>
                        </tr>
                        <tr>
                            <td>Departamento</td>
                            <td>
                                {{ $trabajo->departamento }}
                            </td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>
                                {{ $trabajo->ciudad }}
                            </td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td>
                                {{ $trabajo->direccion }}
                            </td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td>
                                {{ $trabajo->telefono }}
                            </td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td>
                                {{ $trabajo->correo }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>Estado de la propuesta</td>
                            <td>{{ $trabajo->tra_estado_propuesta }}</td>
                        </tr>
                        <tr>
                            <td>Estado del proyecto</td>
                            <td>{{ $trabajo->tra_estado_proyecto }}</td>
                        </tr>
                        <tr>
                            <td>Jurado 1</td>
                            <td>
                                {{ $jurado1 == ''? 'Sin asignación o sin contrato asignado': $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jurado 2</td>
                            <td>
                                {{ $jurado2 == ''? 'Sin asignación o sin contrato asignado': $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}
                            </td>
                        </tr>
                        <tr>
                            <td>Acta de sustentación</td>
                            <td>
                                {{ $trabajo->tra_numero_acta_sustentacion == '' ? 'Sin registro' : $trabajo->tra_numero_acta_sustentacion }}
                            </td>
                        </tr>
                        <tr>
                            <td>Soporte</td>
                            <td>
                                {{ $trabajo->tra_acta_sustentacion_soporte == '' ? 'Sin registro' : '' }} <a
                                    href="{{ url('datos/acta/actasustentancion/' . $trabajo->tra_acta_sustentacion_soporte) }}">{{ $trabajo->tra_acta_sustentacion_soporte != '' ? $trabajo->tra_acta_sustentacion_soporte : '' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Acta de grado</td>
                            <td>
                                {{ $trabajo->tra_numero_acta_grado == '' ? 'Sin registro' : $trabajo->tra_numero_acta_grado }}
                            </td>
                        </tr>
                        <tr>
                            <td>Soporte</td>
                            <td>
                                {{ $trabajo->tra_acta_grado_soporte == '' ? 'Sin registro' : '' }}
                                <a
                                    href="{{ url('datos/acta/actasustentancion/' . $trabajo->tra_acta_grado_soporte) }}">{{ $trabajo->tra_acta_grado_soporte != '' ? $trabajo->tra_acta_grado_soporte : '' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha finalización</td>
                            <td>
                                {{ $trabajo->tra_fecha_finalizacion == '' ? 'Sin registro' : $trabajo->tra_fecha_finalizacion }}
                            </td>
                        </tr>
                        <tr>
                            <td class="center" colspan="2" class="TitleCell"><strong>Observaciones</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Observación</td>
                            <td>
                                {{ $trabajo->tra_observacion == '' ? 'Sin registro' : $trabajo->tra_observacion }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            @if ($trabajo->tra_modalidad_grado != '10')
                <h4><i class="fa fa-question-circle"></i> Contratos jurados</h4>
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
                                            <td>{{ $jurado1->per_nombre . ' ' . $jurado1->per_apellido }}
                                            </td>
                                            <td><a
                                                    href="/datos/contrato/{{ $jurado1->doco_url_soporte }}">{{ $jurado1->doco_url_soporte }}</a>
                                            </td>
                                            <td>{{ $jurado1->doco_estado }}</td>
                                            <td><a href="/docente">Cambiar estado de pago</a></td>
                                        </tr>
                                    @else
                                        <div class="alert alert-primary" role="alert">
                                            <strong>El jurado 1 no registra contrato como rol de
                                                jurado-tesis</strong>
                                        </div>
                                    @endif
                                    @if ($jurado2 != '')
                                        <tr>
                                            <td>2</td>
                                            <td>{{ $jurado2->per_nombre . ' ' . $jurado2->per_apellido }}
                                            </td>
                                            <td><a
                                                    href="/datos/contrato/{{ $jurado2->doco_url_soporte }}">{{ $jurado2->doco_url_soporte }}</a>
                                            </td>
                                            <td>{{ $jurado2->doco_estado }}</td>
                                            <td><a href="/docente">Cambiar estado de pago</a></td>
                                        </tr>
                                    @else
                                        <div class="alert alert-primary" role="alert">
                                            <strong>El jurado 2 no registra contrato como rol de
                                                jurado-tesis</strong>
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
            @endif
        </div>
    </div>
@endsection
@endif
