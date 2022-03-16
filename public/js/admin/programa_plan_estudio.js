$(function() {

    var tipo = $('#exmona_tipo').val();
    var rol = $('#exmona_rol').val();

    var tipoInter = $('#exmoin_tipo').val();
    var rolInter = $('#exmoin_rol').val();

    var tipoInterna = $('#exmointer_tipo').val();
    var rolInterna = $('#exmointer_rol').val();

    if ((tipo == 'entrante' && rol == 'estudiante') || (tipo == 'saliente' && rol == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipo == 'entrante' && rol == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipo == 'saliente' && rol == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipo == 'entrante' && rol == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipo == 'saliente' && rol == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else {
        $('#estu_programa').on('change', onSelectProgramaEstudio);
        $('#estu_departamento').on('change', onSelectMunicipio);
        $('#exmona_tipo').on('change', onSelectTipoMovilidad);
        $('#exmona_rol').on('change', onSelectTipoMovilidad);

        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#entrante-administrativo').hide();
        $('#estudiantes').hide();
        $('#otros').show();
    }

    if ((tipoInter == 'entrante' && rolInter == 'estudiante') || (tipoInter == 'saliente' && rolInter == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipoInter == 'entrante' && rolInter == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInter == 'saliente' && rolInter == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInter == 'entrante' && rolInter == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipoInter == 'saliente' && rolInter == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else {
        $('#estu_programa').on('change', onSelectProgramaEstudio);
        $('#estu_departamento').on('change', onSelectMunicipio);
        $('#exmoin_tipo').on('change', onSelectTipoMovilidadIntersede);
        $('#exmoin_rol').on('change', onSelectTipoMovilidadIntersede);

        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#entrante-administrativo').hide();
        $('#estudiantes').hide();
        $('#otros').show();
    }

    if ((tipoInterna == 'entrante' && rolInterna == 'estudiante') || (tipoInterna == 'saliente' && rolInterna == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipoInterna == 'entrante' && rolInterna == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInterna == 'saliente' && rolInterna == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInterna == 'entrante' && rolInterna == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipoInterna == 'saliente' && rolInterna == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else {
        $('#estu_programa').on('change', onSelectProgramaEstudio);
        $('#estu_departamento').on('change', onSelectMunicipio);
        $('#exmointer_tipo').on('change', onSelectTipoMovilidadInternacional);
        $('#exmointer_rol').on('change', onSelectTipoMovilidadInternacional);

        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#entrante-administrativo').hide();
        $('#estudiantes').hide();
        $('#otros').show();
    }



});

function onSelectProgramaEstudio() {
    var id_programa_plan = $(this).val();

    $.get('/programa/' + id_programa_plan + '/selectivoplan', function(data) {
        var html_select = '<option value="">---- SELECCIONE PLAN DE ESTUDIO ----</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id + '">' + data[i].pp_plan + '</option>';
        $('#estu_programa_plan').html(html_select);
    });
}

function onSelectMunicipio() {
    var id_municipio_plan = $(this).val();

    $.get('/programa/' + id_municipio_plan + '/selectivomunicipio', function(data) {
        var html_select = '<option value="">---- SELECCIONE MUNICIPIO ----</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id + '">' + data[i].mun_nombre + '</option>';
        $('#estu_ciudad').html(html_select);
    });
}

function onSelectTipoMovilidad() {

    var tipo = $('#exmona_tipo').val();
    var rol = $('#exmona_rol').val();

    //console.log(tipo);
    //console.log(rol);
    if ((tipo == 'entrante' && rol == 'estudiante') || (tipo == 'saliente' && rol == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipo == 'entrante' && rol == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipo == 'saliente' && rol == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipo == 'entrante' && rol == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipo == 'saliente' && rol == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    }

}

function onSelectTipoMovilidadIntersede() {

    var tipoInter = $('#exmoin_tipo').val();
    var rolInter = $('#exmoin_rol').val();

    //console.log(tipoInter);
    //console.log(rolInter);

    //console.log(tipo);
    //console.log(rol);
    if ((tipoInter == 'entrante' && rolInter == 'estudiante') || (tipoInter == 'saliente' && tipoInter == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipoInter == 'entrante' && rolInter == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInter == 'saliente' && rolInter == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInter == 'entrante' && rolInter == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipoInter == 'saliente' && rolInter == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    }

}

function onSelectTipoMovilidadInternacional() {

    var tipoInterna = $('#exmointer_tipo').val();
    var rolInterna = $('#exmointer_rol').val();

    //console.log(tipoInter);
    //console.log(rolInter);

    //console.log(tipo);
    //console.log(rol);
    if ((tipoInterna == 'entrante' && rolInterna == 'estudiante') || (tipoInterna == 'saliente' && rolInterna == 'estudiante')) {
        $('#tipo-estudiante').show();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').show();
        $('#otros').hide();
    } else if (tipoInterna == 'entrante' && rolInterna == 'docente') {
        $('#entrante-docente').show();
        $('#tipo-estudiante').hide();
        $('#saliente-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInterna == 'saliente' && rolInterna == 'docente') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    } else if (tipoInterna == 'entrante' && rolInterna == 'administrativo') {
        $('#saliente-docente').hide();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').show();
    } else if (tipoInterna == 'saliente' && rolInterna == 'administrativo') {
        $('#saliente-docente').show();
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#estudiantes').hide();
        $('#otros').show();
        $('#entrante-administrativo').hide();
    }

}