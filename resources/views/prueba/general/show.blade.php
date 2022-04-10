@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/{{ $resultado->id }}/verrresultado">Vista</a> / <a href="/prueba/mostrarresultado">Resultado
            programa</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container tile">
        <h4><i class="fa fa-question-circle-o"></i> Vista de registro</h4><hr>
        <table class="table table-bordered">
            <tr>
                <th>Programa: </th>
                <td>{{ Str::upper($resultado->pro_nombre) }}</td>
            </tr>
            <tr>
                <th>Codigo SNIES: </th>
                <td>{{ $resultado->pro_codigosnies }}</td>
            </tr>
            <tr>
                <th>Grupo de referencia: </th>
                <td>{{ Str::upper($resultado->pro_grupo_referencia) }}</td>
            </tr>
            <tr>
                <th>Grupo de referencia (NBC)</th>
                <td>{{ Str::upper($resultado->pro_grupo_referencia_nbc) }}</td>
            </tr>
        </table>
        <div class="alert alert-primary" role="alert">
            RESULTADOS GLOBALES <a href="/prueba/crearresultado" class="alert-link">Nuevo</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Nivel de agregación</th>
                <td class="text-center fw-bold">{{ $resultado->prurepro_year }}</td>
            </tr>
            <tr>
                <th>Programa</th>
                <td class="text-center">{{ $resultado->prurepro_global_programa }}</td>
            </tr>
            <tr>
                <th>Institución</th>
                <td class="text-center">{{ $resultado->prurepro_global_institucion }}</td>
            </tr>
            <tr>
                <th>Sede</th>
                <td class="text-center">{{ $resultado->prurepro_global_sede }}</td>
            </tr>
            <tr>
                <th>Grupo de referencia NBC</th>
                <td class="text-center">{{ $resultado->prurepro_global_grupo_referencia }}</td>
            </tr>
        </table>
        <div class="alert alert-primary" role="alert">
            MÓDULO DE COMPETENCIAS GENÉRICAS <a href="/prueba/crearresultado" class="alert-link">Nuevo</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Nivel de agregación</th>
                @foreach ($resultados as $resultadox)
                    <td>{{ $resultadox->tipo_modulo_nombre }}</td>
                @endforeach
            </tr>
            <tr>
                <th>Programa</th>
                @foreach ($resultados as $resultadox)
                    <td>{{ $resultadox->prureprono_puntaje_programa }}</td>
                @endforeach
            </tr>
            <tr>
                <th>Institución</th>
                @foreach ($resultados as $resultadox)
                    <td>{{ $resultadox->prureprono_puntaje_institucion }}</td>
                @endforeach
            </tr>
            <tr>
                <th>Sede</th>
                @foreach ($resultados as $resultadox)
                    <td>{{ $resultadox->prureprono_puntaje_sede }}</td>
                @endforeach
            </tr>
            <tr>
                <th>Grupo de referencia NBC</th>
                @foreach ($resultados as $resultadox)
                    <td>{{ $resultadox->prureprono_puntaje_grupo_referencia }}</td>
                @endforeach
            </tr>
        </table>
    </div>
@endsection
@endif
