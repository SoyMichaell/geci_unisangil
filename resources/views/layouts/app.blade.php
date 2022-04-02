<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/x-icon">
    <title>{{ 'UNISANGIL' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!--DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">

    <!--Select2-->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />


</head>

<body class="app sidebar-mini" style="background-color: var(--bs-gray-200);">
    @include('sweetalert::alert')
    <header class="app-header"><a class="app-header__logo" href="{{ url('home') }}">GIC<span>PAC</span></a>
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                            Salir</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <div>
                <p class="app-sidebar__user-name">
                    {{ Str::ucfirst(auth()->user()->per_nombre.' '.auth()->user()->per_apellido) }}
                </p>
                <p class="app-sidebar__user-designation">{{ auth()->user()->tiposusuario->tip_nombre }}</p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="{{ url('home') }}"><i class="app-menu__icon fa fa-dashboard"
                        data-toggle="modal" data-target="#roles"></i><span class="app-menu__label">Dashboard</span></a>
            </li>
            <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i
                        class="app-menu__icon fa-solid fa-gears"></i><span
                        class="app-menu__label">Configuración</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ url('departamento') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Departamentos</a></li>
                    <li><a class="treeview-item" href="{{ url('municipio') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Municipios</a>
                    </li>
                    <li><a class="treeview-item" href="{{ url('facultad') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Facultades</a>
                    </li>
                    <li><a class="treeview-item" href="{{ url('nivelformacion') }}"><i
                                class="icon fa-solid fa-circle-notch"></i> Nivel de formación</a>
                    </li>
                    <li><a class="treeview-item" href="{{ url('metodologia') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Metodologia</a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Módulos</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ url('programa') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Programas</a></li>
                    <li><a class="treeview-item" href="{{ url('estudiante') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Estudiantes</a></li>
                    <li><a class="treeview-item" href="{{ url('docente') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Docentes</a></li>
                    <li><a class="treeview-item" href="{{ url('prueba') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Pruebas saber</a></li>
                    <li><a class="treeview-item" href="{{ url('trabajo') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Trabajo de grado</a></li>
                    <li><a class="treeview-item" href="{{ url('practica') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Practica Laboral</a></li>
                    <li><a class="treeview-item" href="{{ url('software') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            TIC'S</a></li>
                    <li><a class="treeview-item" href="{{ url('extension') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Extensión e Internacialización</a></li>
                    <li><a class="treeview-item" href="{{ url('red') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Redes acádemicas</a></li>
                    <li><a class="treeview-item" href="{{ url('laboratorio') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Laboratorios</a></li>
                    <li><a class="treeview-item" href="{{ url('movilidad') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Movilidad</a></li>
                    <li><a class="treeview-item" href="{{ url('convenio') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Convenio</a></li>
                    <li><a class="treeview-item" href="{{ url('bienestar') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Bienestar Institucional</a></li>
                    <li><a class="treeview-item" href="{{ url('investigacion') }}"><i
                                class="icon fa-solid fa-circle-notch"></i>
                            Investigación</a></li>
                </ul>
            </li>
        </ul>
    </aside>

    <main class="app-content">
        <div class="app-title">
            <div>
                @yield('title')
                @yield('message')
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="#">@yield('navegar')</a></li>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home fa-lg"></i></a></li>
            </ul>
        </div>
        @yield('content')
    </main>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    @yield('scripts')

    <script src="{{ asset('js/dataTable.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tables').DataTable();
            $('.js-example-placeholder-single').select2();

            $('.js-example-basic-multiple').select2();
        });
    </script>




    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
