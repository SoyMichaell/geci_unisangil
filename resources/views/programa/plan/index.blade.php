@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
        <a href="/programa/mostrarplan">Plan de estudio</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Planes de estudio</h1>
        <p>Listado plan de estudios programas</p>
    @section('message')
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive tile mt-2">
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <h4>Listado plan de estudios</h4>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            <a class="btn btn-outline-success" href="/programa/crearplan"><i class="fa-solid fa-circle-plus"></i>
                                Nuevo</a>
                        </div>
                    </div>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sede</th>
                                <th>Programa</th>
                                <th>Plan de estudio</th>
                                <th>Número de creditos</th>
                                <th>Número de asignaturas</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->id }}</td>
                                    <td>{{ $plan->sedes->mun_nombre }}</td>
                                    <td>{{ $plan->programas->pro_nombre }}</td>
                                    <td>{{ $plan->pp_plan }}</td>
                                    <td>{{ $plan->pp_creditos }}</td>
                                    <td>{{ $plan->pp_no_asignaturas }}</td>
                                    <td>{{ Str::ucfirst($plan->pp_estado) }}</td>
                                    <td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <form action="/programa/{{ $plan->id }}/estado" method="POST">
                                                <div class="d-flex text-center">
                                                    @if ($plan->pp_estado == 'activo')
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="/programa/{{ $plan->id }}/editarplan"><i
                                                                class="fa-solid fa-refresh text-center"></i> Editar</a>
                                                    @endif
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($plan->pp_estado == 'activo')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa-solid fa-ban"></i> Inactivar</button>
                                                    @else
                                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                                class="fa-solid fa-circle-check"></i> Activar</button>
                                                    @endif
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
