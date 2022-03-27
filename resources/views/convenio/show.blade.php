@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/convenio/{{ $convenio->id }}">Vista</a> / <a href="/convenio">Convenio</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Visualizar información</h1>
    @section('message')
        <p>Información de registro</p>
    @endsection
@endsection
<style>
    .left {
        width: 50%;
        font-size: 16px;
    }

    .right {
        float: left;
        font-size: 16px;
    }
    .center {
        font-weight: 900;
        font-size: 18px;
        text-align: left;
    }
</style>
@section('content')
    <div class="container col-md-12 bg-white shadow-sm p-3">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td colspan="2" class="center">Información convenio</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td class="left">Número de convenio</td>
                    <td class="right">{{$convenio->con_numero}}</td>
                </tr>
                <tr>
                    <td class="left">Alcance</td>
                    <td class="right">{{$convenio->con_alcance}}</td>
                </tr>
                <tr>
                    <td class="left">Tipo de convenio</td>
                    <td class="right">{{$convenio->con_tipo}}</td>
                </tr>
                <tr>
                    <td class="left">Institución con la cual se celebró el convenio</td>
                    <td class="right">{{$convenio->con_institucion}}</td>
                </tr>
                <tr>
                    <td class="left">Nit</td>
                    <td class="right">{{$convenio->con_nit}}</td>
                </tr>
                <tr>
                    <td class="left">Dirección</td>
                    <td class="right">{{$convenio->con_direccion}}</td>
                </tr>
                <tr>
                    <td class="left">País</td>
                    <td class="right">{{$convenio->con_pais}}</td>
                </tr>
                <tr>
                    <td class="left">Ciudad</td>
                    <td class="right">{{$convenio->con_ciudad}}</td>
                </tr>
                <tr>
                    <td class="left">Nombre contacto</td>
                    <td class="right">{{$convenio->con_contacto}}</td>
                </tr>
                <tr>
                    <td class="left">Correo electronico</td>
                    <td class="right">{{$convenio->con_correo}}</td>
                </tr>
                <tr>
                    <td class="left">Telefono</td>
                    <td class="right">{{$convenio->con_telefono}}</td>
                </tr>
                <tr>
                    <td class="left">Objeto</td>
                    <td class="right">{{$convenio->con_objeto}}</td>
                </tr>
                <tr>
                    <td class="left">Logros o Resultados</td>
                    <td class="right">{{$convenio->con_logro_resultado}}</td>
                </tr>
                <tr>
                    <td class="left">Vigencia</td>
                    <td class="right">{{$convenio->con_vigencia}}</td>
                </tr>
                <tr>
                    <td class="left">Programa Beneficiarios</td>
                    <td class="right">{{$convenio->con_programa_beneficiado}}</td>
                </tr>
                <tr>
                    <td class="left">Actividades</td>
                    <td class="right">{{$convenio->con_actividad_year_programa}}</td>
                </tr>
                <tr>
                    <td class="left">Fecha inicio</td>
                    <td class="right">{{$convenio->con_fecha_inicio}}</td>
                </tr>
                <tr>
                    <td class="left">Fecha final</td>
                    <td class="right">{{$convenio->con_fecha_final}}</td>
                </tr>
                <tr>
                    <td class="left">Observaciones</td>
                    <td class="right">{{$convenio->con_observacion}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@endif
