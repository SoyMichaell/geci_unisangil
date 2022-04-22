$(function() {
    var modalidad_grado = $('#tra_modalidad_grado').val();
    if (modalidad_grado == '10') {
        $('#practica-laboral').show();

    } else {
        $('#practica-laboral').hide();
    }
    $('#tra_modalidad_grado').on('change', onChangeModalidadGrado);
    console.log(modalidad_grado);
});

function onChangeModalidadGrado() {
    var modalidad_grado = $('#tra_modalidad_grado').val();
    console.log(modalidad_grado);
    if (modalidad_grado == '10') {
        $('#practica-laboral').show();
    } else {
        $('#practica-laboral').hide();
    }
}