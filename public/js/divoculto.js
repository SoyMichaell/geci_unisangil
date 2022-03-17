    $(document).ready(function() {
        tipo = $('#tipo_persona').val();
        tipomovilidad = $('#tipo_persona_movilidad').val();
        if (tipo == "") {
            $('#docente').hide();
            $('#estudiante').hide();
        } else if (tipo == '1' || tipo == '2') {
            $('#docente').show();
            $('#estudiante').hide();
        } else {
            $('#docente').hide();
            $('#estudiante').show();
        }

        if (tipomovilidad == "") {
            $('#docente').hide();
            $('#estudiante').hide();
        } else if (tipomovilidad == 'administrativo' || tipomovilidad == 'docente') {
            $('#docente').show();
            $('#estudiante').hide();
        } else if (tipomovilidad == 'estudiante') {
            ('#docente').hide();
            $('#estudiante').show();
        }
    });

    $('#tipo_persona').on('change', function() {
        var selectValor = $(this).val();
        //alert(selectValor);

        if (selectValor == '1') {
            $('#docente').show();
            $('#estudiante').hide();
        } else if (selectValor == '2') {
            $('#estudiante').show();
            $('#docente').hide();
        }
    });

    $('#tipo_persona_movilidad').on('change', function() {
        var selectValor = $(this).val();
        //alert(selectValor);

        if (selectValor == 'administrativo' || selectValor == 'docente') {
            $('#docente').show();
            $('#estudiante').hide();
        } else if (selectValor == 'estudiante') {
            $('#estudiante').show();
            $('#docente').hide();
        }
    });