$(function() {
    var rol = $('#per_tipo_usuario').val();
    if (rol == '9') {
        $('#administrador-estudiante').show();
    } else {
        $('#administrador-estudiante').hide();
    }
    $('#per_tipo_usuario').on('change', onChangeRole);
    //console.log(rol);
});

function onChangeRole() {

    var rol = $('#per_tipo_usuario').val();
    if (rol == '9') {
        $('#administrador-estudiante').show();
    } else {
        $('#administrador-estudiante').hide();
    }
    //console.log(rol);
}