@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/docente/{{$persona->id}}">Vista</a> / <a href="/docente">Docente</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro</p>
    @endsection
@endsection
<style>
    ul {
        list-style: none;
    }

    ul li {
        font-size: 14px;
    }
    h5{
        color: brown;
        font-weight: 900;
    }

</style>
@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="col-md-8">
                <h5 class="fw-bold"><i class="fa fa-question-circle"></i> Información básica</h5>
                <ul>
                    <li><strong>Nombre completo</strong> <br>
                        {{ $persona->per_nombre . ' ' . $persona->per_apellido }}</li>
                    <li><strong>Tipo de documento </strong> <br> {{ $persona->per_tipo_documento }}</li>
                    <li><strong>Número de documento </strong> <br> {{ $persona->per_numero_documento }}</li>
                    <li><strong>Telefono </strong> <br> {{ $persona->per_telefono }}</li>
                    <li><strong>Correo eletronico institucional</strong> <br> {{ $persona->per_correo }}</li>
                    <li><strong>Departamento</strong> <br> {{ $persona->dep_nombre }}</li>
                    <li><strong>Municipio</strong> <br> {{ $persona->mun_nombre }}</li>
                </ul>
                <h5 class="fw-bold"><i class="fa fa-question-circle"></i> Información complementaria</h5>
                <ul>
                    <li><strong>Ciudad de procedencia</strong> <br>
                        {{ $persona->ciudad_procedencia == '' ? 'Sin registro' : $persona->ciudad_procedencia }}</li>
                    <li><strong>Correo persona</strong> <br>
                        {{ $persona->correo_personal == '' ? 'Sin registro' : $persona->correo_personal }}</li>
                    <li><strong>Dedicación</strong> <br>
                        {{ $persona->dedicacion == '' ? 'Sin registro' : $persona->dedicacion }}</li>
                    <li><strong>Tipo de contratación</strong> <br>
                        {{ $persona->tipo_contratacion == '' ? 'Sin registro' : $persona->tipo_contratacion }}</li>
                    <li><strong>Fecha de vinculación</strong> <br>
                        {{ $persona->fecha_vinculacion == '' ? 'Sin registro' : $persona->fecha_vinculacion }}</li>
                    <li><strong>EPS Afiliado</strong> <br> {{ $persona->eps == '' ? 'Sin registro' : $persona->eps }}
                    </li>
                    <li><strong>Riesgo</strong> <br> {{ $persona->riesgo == '' ? 'Sin registro' : $persona->riesgo }}
                    </li>
                    <li><strong>Caja de compensación</strong> <br>
                        {{ $persona->caja_compensacion == '' ? 'Sin registro' : $persona->caja_compensacion }}</li>
                    <li><strong>Banco </strong> <br> {{ $persona->banco == '' ? 'Sin registro' : $persona->banco }}
                    </li>
                    <li><strong>No. cuenta</strong> <br>
                        {{ $persona->no_cuenta == '' ? 'Sin registro' : $persona->no_cuenta }}</li>
                    <li><strong>Pensión</strong> <br>
                        {{ $persona->pension == '' ? 'Sin registro' : $persona->pension }}</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold"><i class="fa fa-question-circle"></i> Formación académica</h5>
                <ul>
                    <li><strong>Institución especialización</strong> <br>
                        {{ $persona->institucion_esp == "" ? 'Sin registro' : $persona->institucion_esp }}</li>
                    <li><strong>Institución diplomado</strong> <br>
                        {{ $persona->institucion_dip == "" ? 'Sin registro' : $persona->institucion_dip }}</li>
                    <li><strong>Titulo pregrado</strong> <br>
                        {{ $persona->titulo_pregrado == "" ? 'Sin registro' : $persona->titulo_pregrado }}</li>
                    <li><strong>Institución pregrado</strong> <br>
                        {{ $persona->institucion_pre == "" ? 'Sin registro' : $persona->institucion_pre }}</li>
                    <li><strong>Titulo especialización</strong> <br>
                        {{ $persona->titulo_especializacion == "" ? 'Sin registro' : $persona->titulo_especializacion }}</li>
                    <li><strong>Institución especialización</strong> <br>
                        {{ $persona->institucion_espe == "" ? 'Sin registro' : $persona->institucion_espe }}</li>
                    <li><strong>Titulo maestría</strong> <br>
                        {{ $persona->titulo_maestria == "" ? 'Sin registro' : $persona->titulo_maestria }}</li>
                    <li><strong>Institución maestría</strong> <br>
                        {{ $persona->institucion_mae == "" ? 'Sin registro' : $persona->institucion_mae }}</li>
                    <li><strong>Titulo doctorado</strong> <br>
                        {{ $persona->titulo_doctorado == "" ? 'Sin registro' : $persona->titulo_doctorado }}</li>
                    <li><strong>Institución doctorado</strong> <br>
                        {{ $persona->institucion_doc == "" ? 'Sin registro' : $persona->institucion_doc }}</li>
                    <li><strong>Área de conocimiento</strong> <br>
                        {{ $persona->area_conocimiento == "" ? 'Sin registro' : $persona->area_conocimiento }}</li>
                    <li><strong>Máximo nivel de formación</strong> <br>
                        {{ $persona->maximo_nivel_formacion == "" ? 'Sin registro' : $persona->maximo_nivel_formacion }}</li>
                    <li><strong>Titulo máximo nivel de formación</strong> <br>
                        {{ $persona->titulo_maximo_nivel == "" ? 'Sin registro' : $persona->titulo_maximo_nivel }}</li>
                    <li><strong>Institución máximo nivel de formación</strong> <br>
                        {{ $persona->institucion_maximo_nivel == "" ? 'Sin registro' : $persona->institucion_maximo_nivel }}</li>
                    <li><strong>Modalidad programa</strong> <br>
                        {{ $persona->modalidad_programa == "" ? 'Sin registro' : $persona->modalidad_programa }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
