@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
         <a href="/extension/crearcurriculo">Crear</a> / <a href="/extension/mostrarcurriculo">Curriculo</a> / <a href="/extension">Extension - internacionalización</a>
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-cubes"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-cube"></i>Registro curriculo internacional</h4><hr>
            <form action="/extension/registrocurriculo" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exincu_year">Año</label>
                        <input class="form-control @error('exincu_year') is-invalid @enderror" name="exincu_year"
                            id="exincu_year" value="{{ old('exincu_year') }}" type="number" autocomplete="exincu_year"
                            autofocus>
                        @error('exincu_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exincu_periodo">Periodo</label>
                        <input class="form-control @error('exincu_periodo') is-invalid @enderror" name="exincu_periodo"
                            id="exincu_periodo" value="{{ old('exincu_periodo') }}" type="text"
                            autocomplete="exincu_periodo" autofocus>
                        @error('exincu_periodo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exincu_id_asignatura">Asignatura</label>
                        <select class="form-control @error('exincu_id_asignatura') is-invalid @enderror" name="exincu_id_asignatura" id="exincu_id_asignatura">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}">{{ $asignatura->asig_nombre }}
                                </option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger"><strong>{{$asignaturas->count()<=0 ? 'No existen registros de asignaturas' : ''}}</strong></p>
                        @error('exincu_id_asignatura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exincu_id_docente">Docente</label>
                        <select class="form-control @error('exincu_id_docente') is-invalid @enderror" name="exincu_id_docente" id="exincu_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">
                                    {{ $docente->per_nombre . ' ' . $docente->per_apellido }}</option>
                            @endforeach
                        </select>
                        <p class="badge badge-danger"><strong>{{$docentes->count()<=0 ? 'No existen registros de docentes' : ''}}</strong></p>
                        @error('exincu_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 mb-3">
                        <h5>USO DE OTRO IDIOMA</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Metodología Clil" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Metodología Clil
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Metodología Emi" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Metodología Emi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Glosario de asignatura en otro idiona: Inglés, portigués, etc." id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Glosario de asignatura en otro idiona: Inglés, portigués, etc.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Revisión de articulos - textos" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Revisión de articulos - textos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Evaluación en inglés quices - preguntas de parcial" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Evaluación en inglés quices - preguntas de parcial
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_idioma[]" type="checkbox" value="Ayudas didácticas en inblés (mapas, diapositivas, otros)" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Ayudas didácticas en inblés (mapas, diapositivas, otros)
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>USO TIC</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Cátedra virtual - orientada por docente internacional" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Cátedra virtual - orientada por docente internacional
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Inclusión de videoconferencia webinar sincronico" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Inclusión de videoconferencia webinar sincronico
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Uso de platafoma aprendizaje: agora - my elt, edmodo, etc." id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Uso de platafoma aprendizaje: agora - my elt, edmodo, etc.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Metodologías medidadas por tic: clase espejo, coil, clases invertidas" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Metodologías medidadas por tic: clase espejo, coil, clases invertidas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Uso de recurso en linea de libre acceso: mooc, coursera, merlot, rie, upm, etc. " id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Uso de recurso en linea de libre acceso: mooc, coursera, merlot, rie, upm, etc. 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_uso_tic[]" type="checkbox" value="Uso de ovas - juegos -simuladores - aplicaciones" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Uso de ovas - juegos -simuladores - aplicaciones
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>COMPETENCIAS GLOBALES</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_competencia_global[]" type="checkbox" value="Contenidos disciplinares de carácter global - internacional" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Contenidos disciplinares de carácter global - internacional
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_competencia_global[]" type="checkbox" value="Reconocimiento de disciplina - profesión en otros entornos" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Reconocimiento de disciplina - profesión en otros entornos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ext_competencia_global[]" type="checkbox" value="Reconocimiento de multirculturalidad, diversidad" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Reconocimiento de multirculturalidad, diversidad
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ext_movilidad_estudiante">Movilidad estudiante</label>
                        <input class="form-control @error('ext_movilidad_estudiante') is-invalid @enderror"
                            name="ext_movilidad_estudiante" id="ext_movilidad_estudiante"
                            value="{{ old('ext_movilidad_estudiante') }}" type="number"
                            placeholder="Indique número de estudiantes"
                            autocomplete="ext_movilidad_estudiante" autofocus>
                        @error('ext_movilidad_estudiante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ext_otra_actividad">Otra actividad? ¿Cual?</label>
                        <textarea class="form-control" name="ext_otra_actividad" id="ext_otra_actividad" cols="30"
                            rows="10"></textarea>
                        @error('ext_otra_actividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
