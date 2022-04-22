@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/empresa/{{$empresa->id}}">Vista</a> / <a href="/empresa">Empresa</a></a>
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
        <h4><i class="fa fa-question-circle-o"></i> Información empresas</h4>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Razón social</th>
                        <td>{{$empresa->razon_social}}</td>
                    </tr>
                    <tr>
                        <th>Nit</th>
                        <td>{{$empresa->nit}}</td>
                    </tr>
                    <tr>
                        <th>País</th>
                        <td>{{$empresa->pais}}</td>
                    </tr>
                    <tr>
                        <th>Departamento</th>
                        <td>{{$empresa->departamento}}</td>
                    </tr>
                    <tr>
                        <th>Ciudad</th>
                        <td>{{$empresa->ciudad}}</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>{{$empresa->direccion}}</td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td>{{$empresa->telefono}}</td>
                    </tr>
                    <tr>
                        <th>Dirección web</th>
                        <td>{{$empresa->url}}</td>
                    </tr>
                    <tr>
                        <th>Correo electronico</th>
                        <td>{{$empresa->correo}}</td>
                    </tr>
                    <tr>
                        <th>Área</th>
                        <td>{{$empresa->area}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
@endsection
@endif
