$(function() {
    var tipoInterna = $('#exmointer_tipo').val();
    var rolInterna = $('#exmointer_rol').val();

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
        $('#tipo-estudiante').hide();
        $('#entrante-docente').hide();
        $('#saliente-docente').hide();
        $('#entrante-administrativo').hide();
        $('#estudiantes').hide();
        $('#otros').show();
    }
    $('#exmointer_tipo').on('change', onSelectTipoMovilidadInternacional);
        $('#exmointer_rol').on('change', onSelectTipoMovilidadInternacional);
});

    function onSelectTipoMovilidadInternacional() {

        var tipoInterna = $('#exmointer_tipo').val();
        var rolInterna = $('#exmointer_rol').val();
    
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