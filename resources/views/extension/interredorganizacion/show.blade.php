@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{$interredorganizacion->id}}/verinterorganizacion">Vista</a> / <a href="/extension/mostrarinterorganizacion">Red organizaciones</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro</p>
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
    #content-convenio{
       font-size: 18px;
       font-weight: 300px; 
    }

</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="width: 500px">
                <ul>
                    <li id="content-convenio">Año <p id="content-convenio">{{ $interredorganizacion->exseor_year }}</p>
                    </li>
                    <li id="content-convenio">Periodo <p id="content-convenio">{{ $interredorganizacion->exseor_periodo }}</p>
                    </li id="content-convenio">
                    <li id="content-convenio">Tipo <p id="content-convenio">{{ $interredorganizacion->exseor_tipo }}</p>
                    </li>
                    <li id="content-convenio">Nombre <p id="content-convenio">{{ $interredorganizacion->exseor_nombre }}</p>
                    </li>
                    <li id="content-convenio">Carácter <p id="content-convenio">{{ $interredorganizacion->exseor_caracter }}</p>
                    </li>
                    <li id="content-convenio">Fecha <p id="content-convenio">{{ $interredorganizacion->exseor_fecha }}</p>
                    </li>
                    <li id="content-convenio">Actividades  <p id="content-convenio">{{ $interredorganizacion->exseor_actividades }}</p>
                    </li>
                    <li id="content-convenio">Logros <p id="content-convenio">{{ $interredorganizacion->exseor_logros }}</p>
                    </li>
                    <li id="content-convenio">Resultados <p id="content-convenio">{{ $interredorganizacion->exseor_resultados }}</p>
                    </li>
                    <li id="content-convenio">Productos <p id="content-convenio">({{ $interredorganizacion->exseor_productos }})</p>
                    </li>
                    <li id="content-convenio">Función <p id="content-convenio">({{ $interredorganizacion->exseor_funcion }})</p>
                    </li>
                    <li id="content-convenio">Participantes <p id="content-convenio">({{ $interredorganizacion->exseor_participantes }})</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <ul>
                    @foreach ($participantes as $participante)
                        <li id="content-convenio">
                            <p id="content-convenio">{{ $participante->exseorpar_numero_identificacion .' ' .$participante->exseorpar_nombre_completo .' [' .$participante->exseorpar_rol .']' }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
