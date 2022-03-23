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
        font-weight: 900;
    }

    li {
        font-size: 16px;
        text-decoration: none;
        list-style: none;
    }

    #integrantes {
        text-decoration: none;
    }

</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h3>{{ $programa->pro_nombre }}</h3>
                <hr>
                <div class="table table-bordered">
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
                    </thead>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table table-bordered" id="tables">
                    <tr>
                        <th>Asignatura</th>
                        <th>Creditos</th>
                    </tr>
                    @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{$asignatura->asig_nombre}}</td>
                        <td>{{$asignatura->asig_no_creditos}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@endif
