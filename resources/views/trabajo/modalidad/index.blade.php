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
                    <a class="btn btn-success" href="{{ url('modalidad/create') }}"><i
                            class="fa fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="table-responsive tile mt-2">
                    <h4>Listado modalidad de grado</h4><hr>
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
                                        <form action="{{ route('modalidad.destroy', $modalidad->id) }}" method="POST">
                                            <div class="d-flex text-center">
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/modalidad/{{ $modalidad->id }}/edit"><i
                                                        class="fa fa-refresh text-center"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
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
