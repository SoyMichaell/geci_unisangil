@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/prueba/{{$saber->id}}/versaber">Vista</a> / <a href="/prueba/mostrarsaber">Saber 11</a> / <a href="/prueba">Pruebas saber</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro.</p>
    @endsection
@endsection
<style>
    #prueba-saber-ul{
        list-style: none;
    }
    #prueba-saber-ul li {
        font-size: 18px;
    }
</style>
@section('content')
    <div class="container bg-white p-3">
        <h5><i class="fa fa-question-circle-o"></i> Información prueba saber 11</h5><hr>
        <div class="row">
            <div class="col-md-5">
                <ul id="prueba-saber-ul">
                    <li><strong>Nombre completo: </strong>{{ $saber->per_nombre . ' ' . $saber->per_apellido }}</li>
                    <li><strong>Año de presentación: </strong>{{ $saber->prueba_saber_year }}</li>
                    <li><strong>Periodo: </strong>{{ $saber->prueba_saber_periodo }}</li>
                    <li><strong>Puntaje global: </strong>{{ number_format($saber->prueba_saber_puntaje_global, 2) }}
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <tr>
                        <th>Módulo</th>
                        <th>Puntaje</th>
                    </tr>
                    @foreach ($saberes as $saberx)
                        <tr>
                            <th>Módulo {{ $saberx->tipo_modulo_nombre }}</th>
                            <td>{{ $saberx->prsamo_puntaje }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection
@endif
