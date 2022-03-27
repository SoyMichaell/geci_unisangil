@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/laboratorio/{{$laboratorio->id}}">Vista</a> / <a href="/laboratorio">Laboratorio</a>
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
    <div class="container col-md-12 bg-white p-3">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td colspan="2" class="center">Información básica registro laboratorio</td>
                </tr>
                <tr>
                    <td colspan="2" align="left"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, est natus laborum ad molestiae porro cumque officia culpa inventore itaque, illum esse tenetur, tempore eaque dolorem nobis ducimus magnam neque!</td>
                </tr>
                
                <tr><td colspan="2"><hr></td></tr>
                <tr>
                    <td class="left">Fecha</td>
                    <td class="right">{{ $laboratorio->lab_fecha }}</td>
                </tr>
                <tr>
                    <td class="left">Laboratorio</td>
                    <td class="right">{{ $laboratorio->lab_nombre }}</td>
                </tr>
                <tr>
                    <td class="left">Ubicación</td>
                    <td class="right">{{ $laboratorio->lab_ubicacion }}</td>
                </tr>
                <tr>
                    <td class="left">Docente responsable</td>
                    <td class="right">{{ $laboratorio->docentes->per_nombre.' '.$laboratorio->docentes->per_apellido }}</td>
                </tr>
                <tr>
                    <td class="left">Finalidad</td>
                    <td class="right">{{ $laboratorio->lab_finalidad }}</td>
                </tr>
                <tr>
                    <td class="left">Facultad</td>
                    <td class="right">{{ $laboratorio->facultades->fac_nombre }}</td>
                </tr>
                <tr>
                    <td class="left">Programa</td>
                    <td class="right">{{ $laboratorio->programas->pro_nombre }}</td>
                </tr>
                <tr>
                    <td class="left">Practicante responsable</td>
                    <td class="right">{{ $laboratorio->estudiantes->per_nombre.' '.$laboratorio->estudiantes->pera_apellido }}</td>
                </tr>
                <tr>
                    <td class="left">Nombre practica</td>
                    <td class="right">{{ $laboratorio->lab_nombre_practica }}</td>
                </tr>
                <tr>
                    <td class="left">Cantidad estudiantes</td>
                    <td class="right">{{ $laboratorio->lab_cantidad_estudiante }}</td>
                </tr>
                <tr>
                    <td class="left">Software utilizado</td>
                    <td class="right">{{ $laboratorio->softwares->sof_nombre }}</td>
                </tr>
                <tr>
                    <td class="left">Materiales</td>
                    <td class="right">{{ $laboratorio->lab_material }}</td>
                </tr>
                <tr>
                    <td class="left">Observaciones</td>
                    <td class="right">{{ $laboratorio->lab_observaciones }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@endif
