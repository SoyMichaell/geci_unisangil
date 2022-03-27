    $(document).ready(function() {
        tipomovilidad = $('#tipo_persona_movilidad').val();

        if (tipomovilidad == "") {
            $('#docente').hide();
            $('#estudiante').hide();
            $('#administrativo').hide();
        } else if (tipomovilidad == 'docente') {
            $('#docente').show();
            $('#estudiante').hide();
            $('#administrativo').hide();
        } else if (tipomovilidad == 'estudiante') {
            $('#docente').hide();
            $('#estudiante').show();
            $('#administrativo').hide();
        } else if (tipomovilidad == 'administrativo') {
            $('#administrativo').show();
            $('#docente').hide();
            $('#estudiante').hide();
        }
    });

    $('#tipo_persona_movilidad').on('change', function() {
        var selectValor = $(this).val();
        //alert(selectValor);

        if (selectValor == 'docente') {
            $('#docente').show();
            $('#estudiante').hide();
            $('#administrativo').hide();
        } else if (selectValor == 'estudiante') {
            $('#estudiante').show();
            $('#docente').hide();
            $('#administrativo').hide();
        } else if (selectValor == 'administrativo') {
            $('#estudiante').hide();
            $('#docente').hide();
            $('#administrativo').show();
        }
    });