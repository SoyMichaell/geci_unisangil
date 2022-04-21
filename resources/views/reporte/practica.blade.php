@extends('reporte.app')
@section('title_report')<p>PRACTICA LABORAL</p>@endsection
@section('content')
<img src="{{ asset('image/logo.jpg') }}">
<p class="header_right">UNISANGIL <br>@php
    $fecha = date('Y-m-d');
    echo 'FECHA: '.$fecha;
@endphp
    <br>
    @if ($valor == 'general')
        PRACTICA LABORAL: LISTADO GENERAL
    @elseif($valor == 'docente')
        PRACTICA LABORAL: LISTADO DOCENTES
    @elseif($valor == 'estudiante')
        PRACTICA LABORAL: LISTADO ESTUDIANTES
</p>
@endif
<br><br><br>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Nombre completo</th>
            <th>Razón social</th>
            <th>Nit</th>
            <th>País</th>
            <th>Departamento</th>
            <th>Ciudad</th>
            <th>Dirección</th>
            <th>Telefono</th>
        </tr>
    </thead>
    <?php if($valor == 'general'){ ?>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->prac_year }}</td>
                <td>
                    @php
                        if ($item->prac_rol == 'Estudiante') {
                            foreach ($estudiantes as $estu) {
                                echo $estu->per_nombre . ' ' . $estu->per_apellido;
                            }
                        } elseif ($item->prac_rol == 'Docente') {
                            foreach ($docentes as $doc) {
                                echo $doc->per_nombre . ' ' . $doc->per_apellido;
                            }
                        }
                    @endphp
                </td>
                <td>{{ $item->prac_razon_social }}</td>
                <td>{{ $item->prac_nit_empresa }}</td>
                <td>{{ $item->prac_pais }}</td>
                <td>{{ $item->prac_departamento }}</td>
                <td>{{ $item->prac_ciudad }}</td>
                <td>{{ $item->prac_direccion }}</td>
                <td>{{ $item->prac_telefono }}</td>
            </tr>
        @endforeach
    </tbody>
    <?php } else if($valor == 'docente'){ ?>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($datos as $item)
            <?php if($item->prac_rol == 'Docente'){ ?>
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->prac_year }}</td>
                <td>
                    @php
                        if ($item->prac_rol == 'Docente') {
                            foreach ($docentes as $doc) {
                                echo $doc->per_nombre . ' ' . $doc->per_apellido;
                            }
                        }
                    @endphp
                </td>
                <td>{{ $item->prac_razon_social }}</td>
                <td>{{ $item->prac_nit_empresa }}</td>
                <td>{{ $item->prac_pais }}</td>
                <td>{{ $item->prac_departamento }}</td>
                <td>{{ $item->prac_ciudad }}</td>
                <td>{{ $item->prac_direccion }}</td>
                <td>{{ $item->prac_telefono }}</td>
            </tr>
            <?php } ?>
        @endforeach
    </tbody>
    <?php }else if($valor == 'estudiante'){ ?>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datos as $item)
                <?php if($item->prac_rol == 'Estudiante'){ ?>
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->prac_year }}</td>
                    <td>
                        @php
                            if ($item->prac_rol == 'Estudiante') {
                                foreach ($estudiantes as $estu) {
                                    echo $estu->per_nombre . ' ' . $estu->per_apellido;
                                }
                            }
                        @endphp
                    </td>
                    <td>{{ $item->prac_razon_social }}</td>
                    <td>{{ $item->prac_nit_empresa }}</td>
                    <td>{{ $item->prac_pais }}</td>
                    <td>{{ $item->prac_departamento }}</td>
                    <td>{{ $item->prac_ciudad }}</td>
                    <td>{{ $item->prac_direccion }}</td>
                    <td>{{ $item->prac_telefono }}</td>
                </tr>
                <?php } ?>
            @endforeach
        </tbody>
    <?php } ?>
</table>
@endsection
