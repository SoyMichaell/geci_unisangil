@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas | listado asignaturas</h1>
    @section('message')
        <p>Historial de asignaturas</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-book"></i> Nueva asignatura</a>
                    </button>
                @endif
            </div>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-danger" style="border-radius: 100%" href="{{ url('asignatura/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                    <a class="btn btn-outline-success" style="border-radius: 100%" href="{{ url('asignatura/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa-solid fa-file-excel"></i></a>

                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Facultad</th>
                            <th>Programa</th>
                            <th>Programa plan</th>
                            <th>Nombre</th>
                            <th>Creditos</th>
                            <th>Hra. semana</th>
                            <th>Hra. semestre</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($asignaturas as $asignatura)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $asignatura->facultades->fac_nombre }}</td>
                                <td>{{ $asignatura->programas->pro_nombre }}</td>
                                <td>{{ $asignatura->planes->pp_nombre }}</td>
                                <td>{{ $asignatura->pas_nombre }}</td>
                                <td>{{ $asignatura->pas_creditos }}</td>
                                <td>{{ $asignatura->pas_horas_semana }}</td>
                                <td>{{ $asignatura->pas_horas_semestre }}</td>
                                <td>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <form action="{{ route('asignatura.destroy', $asignatura->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/asignatura/{{ $asignatura->id }}"><i
                                                        class="fa-solid fa-folder-open"></i></a>
                                                <a class="btn btn-outline-info btn-sm "
                                                    href="/asignatura/{{ $asignatura->id }}/edit"><i
                                                        class="fa-solid fa-refresh"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registro de asignaturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/asignatura/" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_id_municipio">{{ __('Sede *') }}</label>
                                <select class="form-select" name="pas_id_municipio" id="pas_id_municipio">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($municipios as $municipios)
                                        <option value="{{ $municipios->id }}">{{ $municipios->mun_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_id_facultad">{{ __('Facultad *') }}</label>
                                <select class="form-select" name="pas_id_facultad" id="pas_id_facultad">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($facultades as $facultad)
                                        <option value="{{ $facultad->id }}">{{ $facultad->fac_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_id_programa">{{ __('Programa *') }}</label>
                                <select class="form-select" name="pas_id_programa" id="pas_id_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    <small><strong>{{$programas->count()<=0 ? 'No hay programas' : '' }}</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_id_programa_plan">{{ __('Plan estudio programa *') }}</label>
                                <select class="form-select" name="pas_id_programa_plan" id="pas_id_programa_plan">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->pp_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    <small><strong>{{$plans->count()<=0 ? 'No hay planes de estudio' : '' }}</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_nombre">{{ __('Nombre asignatura *') }}</label>
                                <input id="pas_nombre" type="text" class="form-control @error('pas_nombre') is-invalid @enderror"
                                    name="pas_nombre" value="{{ old('pas_nombre') }}" autocomplete="pas_nombre" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_creditos">{{ __('Número de creditos *') }}</label>
                                <input id="pas_creditos" type="number" class="form-control @error('pas_creditos') is-invalid @enderror"
                                    name="pas_creditos" value="{{ old('pas_creditos') }}" autocomplete="pas_creditos" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_horas_semana">{{ __('Número de horas a la semana *') }}</label>
                                <input id="pas_horas_semana" type="number" class="form-control @error('pas_horas_semana') is-invalid @enderror"
                                    name="pas_horas_semana" value="{{ old('pas_horas_semana') }}" autocomplete="pas_horas_semana" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="pas_horas_semestre">{{ __('Número de horas semestre *') }}</label>
                                <input id="pas_horas_semestre" type="number" class="form-control @error('pas_horas_semestre') is-invalid @enderror"
                                    name="pas_horas_semestre" value="{{ old('pas_horas_semestre') }}" autocomplete="pas_horas_semestre" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif
