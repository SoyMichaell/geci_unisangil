@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa">Programa</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
<style>
    h4 {
        color: brown;
        font-weight: bold;
    }

    li {
        font-size: 16px;
        text-decoration: none;
        list-style: none;
    }

    #integrantes {
        text-decoration: none;
    }

    #card-programa {
        width: 410px;
        margin-left: 20px;
        text-decoration: none;
        color: black;
        border-top: 5px solid green;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    #card-programa:hover {
        transition: .5s;
        -webkit-box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
        box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
    }

</style>
@section('content')
    <div class="container">
        <div class="tile">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h4 class="fw-bold">{{ $programa->pro_nombre }}</h4>
                    <p>{{ $programa->per_nombre . ' ' . $programa->per_apellido }}</p>
                    <hr>
                    <table class="p-3">
                        <thead>
                            <tr>
                                <th>Área del conocimiento
                                <td> {{ $programa->pro_grupo_referencia }} </td>
                                </th>
                            </tr>
                            <tr>
                                <th>Facultad
                                <td>{{ $programa->fac_nombre }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Nivel de formación
                                <td>{{ $programa->niv_nombre }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Metodologia</th>
                                <td>{{ $programa->met_nombre . ', ' . $programa->mun_nombre }}</td>
                            </tr>
                            <tr>
                                <th>Duracción semestres
                                <td>{{ $programa->pro_duraccion . ' Niveles de aprendizaje' }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Código SNIES</th>
                                <td>{{ $programa->pro_codigosnies }}</td>
                            </tr>
                            <tr>
                                <th>Registro calificado</th>
                                <td>{{ $programa->pro_resolucion }}</td>
                            </tr>
                            <tr>
                                <th>Fecha ultimo registro</th>
                                <td>{{ $programa->pro_fecha_ult }}</td>
                            </tr>
                            <tr>
                                <th>Fecha próximo registro</th>
                                <td>{{ $programa->pro_fecha_prox }}</td>
                            </tr>
                            <tr>
                                <th>Programa ofrecido por ciclso</th>
                                <td>{{ $programa->pro_programa_ciclo }}</td>
                            </tr>
                            <tr>
                                <th>Periodo de admisión
                                <td>{{ $programa->pro_periodo_admision }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Grupo de referencia
                                <td>{{ $programa->pro_grupo_referencia }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Grupo de referencia NBC
                                <td>{{ $programa->pro_grupo_referencia_nbc }}</td>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                @if ($planes->count() >= 1)
                    <div class="col-md-12 mx-auto">
                        <h4 class="fw-bold">Plan de estudio (s)</h4>
                        <table class="table">
                            <tr>
                                <th>Plan de estudio</th>
                                <th>No. Creditos</th>
                                <th>No. Asignaturas</th>
                            </tr>
                            @foreach ($planes as $plan)
                                <tr>
                                    <td>{{ $plan->pp_plan }}</td>
                                    <td>{{ $plan->pp_creditos }}</td>
                                    <td>{{ $plan->pp_no_asignaturas }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-primary" role="alert">
                            <strong>El programa no cuenta con un plan de estudio <a
                                    href="/programa/mostrarplan">Registrar</a></strong>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@endif
