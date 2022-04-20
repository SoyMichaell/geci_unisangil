$(function() {
    var tipoInter = $('#exmoin_tipo').val();
    var rolInter = $('#exmoin_rol').val();

    console.log(tipoInter);
    console.log(rolInter);

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
    $('#tipo-estudiante').hide();
    $('#entrante-docente').hide();
    $('#saliente-docente').hide();
    $('#entrante-administrativo').hide();
    $('#estudiantes').hide();
    $('#otros').show();
}
    $('#exmoin_tipo').on('change', onSelectTipoMovilidadIntersede);
    $('#exmoin_rol').on('change', onSelectTipoMovilidadIntersede);
});

function onSelectTipoMovilidadIntersede() {

    var tipoInter = $('#exmoin_tipo').val();
    var rolInter = $('#exmoin_rol').val();

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
