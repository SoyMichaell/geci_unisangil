$(function() {

    var tipo = $('#exmona_tipo').val();
    var rol = $('#exmona_rol').val();

    console.log(tipo);
    console.log(rol);

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
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#entrante-administrativo').hide();
        $('#estudiantes').hide();
        $('#otros').show();
    }
    $('#exmona_tipo').on('change', onSelectTipoMovilidad);
        $('#exmona_rol').on('change', onSelectTipoMovilidad);
});

function onSelectTipoMovilidad() {

    var tipo = $('#exmona_tipo').val();
    var rol = $('#exmona_rol').val();

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
