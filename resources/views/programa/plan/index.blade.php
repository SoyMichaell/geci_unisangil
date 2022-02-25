@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Planes de estudio</h1>
    @section('message')
        <p>Programa {{ $programa->pro_nombre }} </p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success" href="/programa/{{ $programa->id }}/crearplan"><i
                            class="fa-solid fa-circle-plus"></i> Nuevo</a>
                </div>
                <div class="table-responsive tile mt-2">
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <h2> Plan de estudio</h2>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            
                        </div>
                    </div>
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                    <td>{{ $plan->pp_nombre }}</td>
                                    <td>{{ $plan->pp_creditos }}</td>
                                    <td>{{ $plan->pp_asignaturas }}</td>
                                    <td>{{ Str::ucfirst($plan->pp_estado) }}</td>
                                    <td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <form action="/programa/{{ $plan->id }}/{{$plan->pp_estado}}/estado" method="POST">
                                                <div class="d-flex text-center">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/programa/{{ $programa->id }}/{{ $plan->id }}/editarplan"><i
                                                            class="fa-solid fa-refresh text-center"></i> Editar</a>
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
