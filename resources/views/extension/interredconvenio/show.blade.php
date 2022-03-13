@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/extension">Extensión</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo Extensión</h1>
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
    #content-convenio{
       font-size: 18px;
       font-weight: 300px; 
    }

</style>
@section('content')
    <div class="container-fluid">
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
