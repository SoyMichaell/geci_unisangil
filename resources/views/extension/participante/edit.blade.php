@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('navegar')
    <a href="/extension/{{$participante->id}}/editarparticipante">Editar</a> / <a href="/extension/mostrarparticipante">Participante</a> / <a href="/extension">Extensión - internacionalización</a>  
    @endsection
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición</h1>
    @section('message')
        <p>Diligenciar todos los campos requeridos.</p>
    @endsection
@endsection
@section('content')
    <div class="container">
        <div class="tile">
            <h4><i class="fa fa-pencil"></i> Actualizar información</h4>
            <form action="/extension/{{$participante->id}}/actualizarparticipante" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dop_id_docente">Docente *</label>
                        <select class="form-control js-example-placeholder-single @error('dop_id_docente') is-invalid @enderror" name="dop_id_docente" id="dop_id_docente">
                            <option value="">---- SELECCIONE ----</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}" {{ $docente->id == $participante->dop_id_docente  ? 'selected' : ''}}>
                                    {{ Str::ucfirst($docente->per_nombre) . ' ' . Str::ucfirst($docente->per_apellido) }}
                                </option>
                            @endforeach
                        </select>
                        @error('dop_id_docente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dop_fecha_expedicion">Fecha expedición *</label>
                        <input class="form-control @error('dop_fecha_expedicion') is-invalid @enderror"
                            name="dop_fecha_expedicion" id="dop_fecha_expedicion"
                            value="{{$participante->dop_fecha_expedicion}}" type="date" autocomplete="dop_fecha_expedicion"
                            autofocus>
                        @error('dop_fecha_expedicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dop_sexo_biologico">Sexo biologico *</label>
                        <select class="form-control @error('dop_sexo_biologico') is-invalid @enderror" name="dop_sexo_biologico" id="dop_sexo_biologico">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1" {{$participante->dop_sexo_biologico == '1' ? 'selected' : ''}}>Masculino</option>
                            <option value="2" {{$participante->dop_sexo_biologico == '2' ? 'selected' : ''}}>Femenino</option>
                        </select>
                        @error('extedu_numero_horas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dop_estado_civil">Estado civil *</label>
                        <select class="form-control @error('dop_estado_civil') is-invalid @enderror" name="dop_estado_civil" id="dop_estado_civil">
                            <option value="">---- SELECCIONE ----</option>
                            <option value="1" {{$participante->dop_estado_civil == '1' ? 'selected' : ''}}>Soltero (a)</option>
                            <option value="2" {{$participante->dop_estado_civil == '2' ? 'selected' : ''}}>Casado (a)</option>
                            <option value="3" {{$participante->dop_estado_civil == '3' ? 'selected' : ''}}>Divorciado (a)</option>
                            <option value="4" {{$participante->dop_estado_civil == '4' ? 'selected' : ''}}>Viudo (a)</option>
                            <option value="5" {{$participante->dop_estado_civil == '5' ? 'selected' : ''}}>Unión libre</option>
                            <option value="6" {{$participante->dop_estado_civil == '6' ? 'selected' : ''}}>Religioso (a)</option>
                            <option value="7" {{$participante->dop_estado_civil == '7' ? 'selected' : ''}}>Separado (a)</option>
                        </select>
                        @error('dop_estado_civil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dop_id_pais">ID País (El código 170 es para colombia, si desea otro país consultar
                            lista de paises según ISO 3166-1</label>
                        <input class="form-control @error('dop_id_pais') is-invalid @enderror" name="dop_id_pais"
                            id="dop_id_pais" value="{{$participante->dop_id_pais}}" type="number" autocomplete="dop_id_pais"
                            autofocus>
                        @error('dop_id_pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dop_id_municipio">ID Municipio *</label>
                        <input class="form-control @error('dop_id_municipio') is-invalid @enderror"
                            name="dop_id_municipio" id="dop_id_municipio" value="{{$participante->dop_id_municipio}}"
                            type="number" autocomplete="dop_id_municipio" autofocus>
                        @error('dop_id_municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dop_correo_personal">Correo personal (Opcional)</label>
                        <input class="form-control @error('dop_correo_personal') is-invalid @enderror"
                            name="dop_correo_personal" id="dop_correo_personal"
                            value="{{$participante->dop_correo_personal}}" type="email" autocomplete="dop_correo_personal"
                            autofocus>
                        @error('dop_correo_personal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dop_direccion">Dirección (Opcional)</label>
                        <input class="form-control @error('dop_direccion') is-invalid @enderror" name="dop_direccion"
                            id="dop_direccion" value="{{$participante->dop_direccion}}" type="text"
                            autocomplete="dop_direccion" autofocus>
                        @error('dop_direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
