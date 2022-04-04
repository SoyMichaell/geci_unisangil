@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
         <a href="/extension/{{ $curriculo->id }}/vercurriculo">Vista</a> / <a href="/extension/mostrarcurriculo">Curriculo</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Listado de registro programas académicos</p>
    @endsection
@endsection
<style>
    .card__extension {
        width: 250px !important;
        border: 1px solid #cccc;
        padding: 15px;
        text-decoration: none;
        color: inherit;
        text-align: center;
        background: #fff;
        margin-left: 25px;
    }

    .content-convenio {
        font-size: 18px;
    }

    .content-convenio span {
        font-size: 20px;
        font-weight: bold;
    }

</style>
@section('content')
    <div class="container">
        <h4><i class="fa fa-quesiton-circle"></i> Vista de registro</h4><hr>
        <div class="row">
            <div class="col-md-12">
                <h4 class="fw-bold">Datos asignatura</h4>
                <hr>
                <p class="content-convenio"> <span>Código</span> <br> {{ $curriculo->asig_codigo }}</p>
                <p class="content-convenio"> <span>Nombre asignatura</span> <br> {{ $curriculo->asig_nombre }}</p>
                <p class="content-convenio"> <span>Docente</span> <br>
                    {{ $curriculo->per_nombre . ' ' . $curriculo->per_apellido }}</p>
            </div>
            <br>
            @php
                $uso_idioma = explode(';', $curriculo->ext_uso_idioma);
                $uso_tic = explode(';', $curriculo->ext_uso_tic);
                $uso_global = explode(';', $curriculo->ext_competencia_global);
            @endphp
            <table class="ml-2 table table-bordered">
                <tr>
                    <th>USO DE IDIOMA</th>
                    @foreach ($uso_idioma as $idioma)
                        <td>
                            {{ $idioma }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>USO DE TIC</th>
                    @foreach ($uso_tic as $tic)
                        <td>
                            {{ $tic }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>COMPETENCIA GLOBALES</th>
                    @foreach ($uso_global as $global)
                        <td>
                            {{ $global }}
                        </td>
                    @endforeach
                </tr>
            </table>
            <br>
            <p class="content-convenio"><span>Movilidad Entrante De Estudiantes En Cátedra Virtual. Indique Número De Estudiantes</span> <br> ({{$curriculo->ext_movilidad_estudiante == "" ? '0' : $curriculo->ext_movilidad_estudiante}})</p>
            <p class="content-convenio"><span>Otra actividad ¿Cual?</span> <br> {{$curriculo->ext_otra_actividad}}</p>
        </div>
    </div>
@endsection
@endif

