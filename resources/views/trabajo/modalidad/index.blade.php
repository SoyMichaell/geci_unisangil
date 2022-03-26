@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Modalidades de grado</h1>
    @section('message')
        <p>Programas acádemicos </p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="{{ url('modalidad/create') }}"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
                </div>
                <div class="table-responsive tile mt-2">
                    <table class="table table-borderd" id="tables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modalidad de grado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modalidades as $modalidad)
                                <tr>
                                    <td>{{ $modalidad->id }}</td>
                                    <td>{{ $modalidad->mod_nombre }}</td>
                                    <td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <form action="{{ route('modalidad.destroy', $modalidad->id) }}"
                                                method="POST">
                                                <div class="d-flex text-center">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/modalidad/{{ $modalidad->id }}/edit"><i
                                                            class="fa-solid fa-refresh text-center"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa-solid fa-trash"></i></button>
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
    <br>
@endsection
@endif
