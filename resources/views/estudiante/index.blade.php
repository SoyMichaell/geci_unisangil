@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-table"></i> Módulo Estudiantes</h1>
    @section('message')
        <p>Estudiantes - programas</p>
    @endsection
@endsection
<style>
    #card-programa {
        width: 410px;
        margin-left: 20px;
        text-decoration: none;
        color: black;
        border-top: 5px solid green;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    #card-programa:hover {
        transition: .5s;
        -webkit-box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
        box-shadow: 0px 10px 13px -7px #000000, -6px -5px 15px 7px rgba(0, 0, 0, 0);
    }

</style>
@section('content')
    <div class="container">
        <h3>Listado de estudiantes registrados por programa académico</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus enim eius quaerat? Consectetur
            esse, explicabo obcaecati libero iste et vero ratione, eius voluptates cupiditate dolore illum? Repudiandae,
            blanditiis inventore.</p>
        <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-outline-danger" href="{{ url('estudiante/exportpdfgeneral') }}" title="Generar reporte pdf"
                target="_blank"><i class="fa fa-file-pdf-o"></i></a>
            <a class="btn btn-outline-success" href="{{ url('estudiante/exportexcelgeneral') }}"
                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
            <a class="btn btn-outline-success btn-sm" href="{{ url('estudiante/create') }}"><i
                    class="fa fa-plus-circle"></i>
                Nuevo</a>
        </div>
        <div class="row mt-3">
            @foreach ($programas as $programa)
                <a class="bg-white p-3 col-md-4" id="card-programa"
                    href="estudiante/{{ $programa->id }}/verestudiantes">
                    <ul style="list-style: none">
                        <h5 class="fw-bold">{{ $programa->pro_nombre }}</h5>
                        <li>{{ $programa->per_nombre . ' ' . $programa->per_apellido }}</li>
                        <li>{{ $programa->niv_nombre }}</li>
                        <li>{{ $programa->pro_grupo_referencia }}</li>
                        <li>{{ $programa->pro_grupo_referencia_nbc }}</li>
                    </ul>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@endif
