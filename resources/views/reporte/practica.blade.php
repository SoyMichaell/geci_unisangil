<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;600;800;900&display=swap');

    body {
        font-family: "Nunito Sans", sans-serif !important;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .table th,
    .table td {
        border: 1px solid #dddddd;
        padding: 4px;
        font-size: 14px;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        font-size: 14px;
        color: #000;
    }

    hr {
        color: #dddddd;
        margin-bottom: 10px;
    }

    img {
        width: 80px;
        float: left;
    }

    .header_right {
        font-size: 12px;
        text-align: right;
    }

    .titulo__header {
        font-size: 20px;
        text-align: left;
    }

    .left__footer {
        text-align: left;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

    .right__footer {
        text-align: right;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

</style>

<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">Unisangil <br>@php
    $fecha = date('Y-m-d');
    echo $fecha;
@endphp
    <br>
    @if ($valor == 'general')
        Practica laboral: Listado general
    @elseif($valor == 'docente')
        Practica laboral: Listado docentes
    @elseif($valor == 'estudiante')
        Practica laboral: Listado estudiantes
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

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
