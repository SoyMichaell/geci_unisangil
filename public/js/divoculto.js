    $(document).ready(function() {
    $('#docente').hide();
        $('#estudiante').hide();
});

$('#tipo_persona').on('change', function() {
    
    var selectValor = $(this).val();
    //alert(selectValor);

    if(selectValor == '1'){
        $('#docente').show();
        $('#estudiante').hide();
    }else if(selectValor == '2'){
        $('#estudiante').show();
        $('#docente').hide();
    }
});