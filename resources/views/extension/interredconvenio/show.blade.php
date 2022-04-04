@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension/{{ $interredconvenio->id }}/verrinterredconvenio">Vista</a> / <a href="/extension/mostrarinterredconvenio">Redes académicas</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
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
    ul{
        list-style: none;
    }
    
    #content-convenio{
       font-size: 16px;
    }

</style>
@section('content')
    <div class="container">
        <h4><i class="fa fa-question-circle"></i> Vista de registro</h4><hr>
        <div class="row">
            <div class="col-md-6" style="width: 500px">
                <ul>
                    <li id="content-convenio">Año <p id="content-convenio">{{ $interredconvenio->exsered_year }}</p>
                    </li>
                    <li id="content-convenio">Periodo <p id="content-convenio">{{ $interredconvenio->exsered_periodo }}</p>
                    </li id="content-convenio">
                    <li id="content-convenio">IES <p id="content-convenio">{{ $interredconvenio->exsered_ies }}</p>
                    </li>
                    <li id="content-convenio">Carácter <p id="content-convenio">{{ $interredconvenio->exsered_caracter }}</p>
                    </li>
                    <li id="content-convenio">Fecha <p id="content-convenio">{{ $interredconvenio->exsered_fecha }}</p>
                    </li>
                    <li id="content-convenio">Logros <p id="content-convenio">{{ $interredconvenio->exsered_logros }}</p>
                    </li>
                    <li id="content-convenio">Resultados <p id="content-convenio">{{ $interredconvenio->exsered_resultados }}</p>
                    </li>
                    <li id="content-convenio">Productos <p id="content-convenio">{{ $interredconvenio->exsered_productos }}</p>
                    </li>
                    <li id="content-convenio">Función <p id="content-convenio">{{ $interredconvenio->exsered_funcion }}</p>
                    </li>
                    <li id="content-convenio">Cantidad participantes <p id="content-convenio">({{ $interredconvenio->exsered_participantes }})</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <ul>
                    @foreach ($participantes as $participante)
                        <li id="content-convenio">
                            <p id="content-convenio">{{ $participante->exseredpar_numero_identificacion .' ' .$participante->exseredpar_nombre_participante .' [' .$participante->exseredpar_rol_participante .']' }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
