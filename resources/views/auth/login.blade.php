@if (Auth::check())
    @include('home')
@else
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/x-icon">
        <title>{{ 'GICPAC | Ingreso al sistema' }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!--DataTables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

        <!--Select2-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <style>
        body{
            background-color: #f2f3f8;
        }
        .card-login{
            width: 400px;
            margin: auto;
            margin-top: 15%;
        }
        .footer {
            text-align: center;
            width: 100%;
            bottom: 10px;
            position: fixed;
        }
    </style>

    <body>
        <div class="container">
            <div class="row mx-auto">
                <div class="card-login tile">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <a class="navbar-brand" href="/home"><img src="{{ asset('image/logo.jpg') }}" width="300px"></a>
                        </div>
                        <div class="row mb-3">
                            <label for="per_correo"
                                class="col-md-12 col-form-label text-md-left">{{ __('Correo electronico *') }}</label>
                            <div class="col-md-12">
                                <input id="per_correo" type="email"
                                    class="form-control @error('per_correo') is-invalid @enderror" name="per_correo"
                                    value="{{ old('per_correo') }}" autocomplete="per_correo" autofocus>
                                @error('per_correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-12 col-form-label text-md-left">{{ __('Contrase??a *') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success w-100">
                                    {{ __('Iniciar sesi??n') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="d-flex justify-content-end">
                        <a href="/usuario/create">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center footer">Copyright &copy 2022. Todos los derechos reservados</p>

    </body>

    </html>
@endif
